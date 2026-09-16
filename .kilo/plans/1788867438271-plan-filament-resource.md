# Plan Filament Resource & Tenant Form Bug Fix - Plan

## Part 1: Tenant Form Bug Diagnosis

### Problem
When editing a Tenant in the Filament admin panel, the form tries to update the `users` table instead of only updating the `tenants` table.

**Error:**
```
SQLSTATE[HY000]: General error: 20 datatype mismatch
SQL: update "users" set "id" = ?, "updated_at" = ... where "users"."id" = 4 and "users"."deleted_at" is null
```

### Root Cause

The `Tenant` model (`app/Models/Tenant.php:37`) defines the `user()` relationship as:
```php
return $this->hasOne(User::class, 'id', 'user_id');
```

This is a `HasOne` relationship where the **foreign key is `id`** (on the `users` table). When Filament v5 processes the `Select::make('user_id')->relationship('user', 'name')` field during form save, it calls `saveStateToRelationship()` (see `vendor/filament/forms/src/Components/Select.php:1333`).

For a `HasOne` relationship, this method enters the `HasOne`/`HasMany` branch and executes:
```php
$query->update([
    $relationship->getForeignKeyName() => null,  // 'id' => null
]);
```

This translates to: `UPDATE users SET id = NULL, updated_at = NOW() WHERE users.id = {tenant.user_id}`

Setting `id` (a primary key) to `NULL` on the `users` table causes the SQLite "datatype mismatch" error.

The fundamental issue is that `hasMany` (on User) / `hasOne` (on Tenant) is the **wrong relationship type** here. The `user_id` foreign key lives on the `tenants` table, making `belongsTo` the semantically correct relationship.

### Fix

**File to modify:** `app/Models/Tenant.php`

**Change:**
```php
// Before (line 37):
public function user()
{
    return $this->hasOne(User::class, 'id', 'user_id');
}

// After:
public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}
```

**Why this works:**
1. `belongsTo::associate()` only sets `user_id` on the Tenant model — it never touches the User model
2. The `saveStateToRelationship()` method takes the `BelongsTo` branch (line 1397), calling `$relationship->associate($state)` which sets `$tenant->user_id = $state` — no SQL query on `users` table
3. This aligns with the inverse relationship on `User` model: `hasMany(Tenant::class, 'user_id', 'id')` (User model line 60)
4. All existing usages of `$tenant->user` (in `TenantInfolist.php` lines 88-93) continue to work identically

### Verification
- Edit Tenant in `/cp/tenants/{record}/edit` → should save without touching `users` table
- Create Tenant in `/cp/tenants/create` → should create AccountSetup, then save Tenant with user_id
- Check Tenant view page → `user.name`, `user.email` still display correctly

---

## Part 2: Plan Filament Resource (awaiting approval)

### Design Decisions (Confirmed)

1. **Navigation**: Top-level, sort 3 (after Subscriptions)
2. **Navigation Icon**: `Heroicon::OutlinedCurrencyDollar`
3. **JSON Fields (features/limitations)**: CodeEditor with JSON language
4. **Stripe Price ID**: Hidden (read-only, set via Stripe integration)
5. **Currency**: Select with common currencies (GBP, USD, EUR)
6. **Interval**: Select using PlanInterval enum
7. **Table Columns**: name, price, interval, interval_count, is_active badge, created_at

### Plan Model Structure (from migration `2025_08_01_093415_create_plans_table.php`)

| Column             | Type          | Notes                              |
|--------------------|---------------|------------------------------------|
| id                 | bigIncrements | Primary key                        |
| name               | string        | required                           |
| slug               | string        | unique, required                   |
| description        | string        | nullable                           |
| price              | decimal(10,2) | required                           |
| currency           | string(3)     | default 'gbp'                      |
| interval           | enum          | day/week/month/year, default month |
| interval_count     | integer       | default 1                          |
| stripe_price_id    | string        | nullable, hidden from form         |
| features           | json          | nullable                           |
| limitations        | json          | nullable                           |
| is_active          | boolean       | default true                       |
| softDeletes        | timestamp     | nullable                           |
| timestamps         | timestamps    | created_at, updated_at            |

### Files to Create

1. `app/Filament/Resources/Plans/PlanResource.php`
2. `app/Filament/Resources/Plans/Pages/ListPlans.php`
3. `app/Filament/Resources/Plans/Pages/CreatePlan.php`
4. `app/Filament/Resources/Plans/Pages/EditPlan.php`
5. `app/Filament/Resources/Plans/Pages/ViewPlan.php`
6. `app/Filament/Resources/Plans/Schemas/PlanForm.php`
7. `app/Filament/Resources/Plans/Schemas/PlanInfolist.php`
8. `app/Filament/Resources/Plans/Tables/PlansTable.php`

### Implementation Steps (blocked by bug fix above)

1. Fix `Tenant::user()` relationship (Part 1)
2. Create directory structure: `app/Filament/Resources/Plans/{Pages,Schemas,Tables}`
3. Create PlanForm.php — sections: Basic Info, Pricing, Billing Cycle, Stripe (hidden), Features (JSON), Limitations (JSON)
4. Create PlanInfolist.php — mirror form fields in infolist view
5. Create PlansTable.php — columns: name, price + currency, interval badge, interval_count, is_active badge, created_at
6. Create 4 Page classes (List, Create, Edit, View)
7. Create PlanResource.php — model=Plan, nav icon, nav sort 3, pages
8. Test CRUD at `/cp/plans`