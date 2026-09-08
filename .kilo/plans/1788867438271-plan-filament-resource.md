# Plan Filament Resource - Implementation Plan

## Overview
Create a Filament Resource for the `Plan` model to allow creating and updating subscription plans in the admin panel.

## Current State Analysis

### Plan Model Structure (from migration)
- `id` - Primary key
- `name` - String (required)
- `slug` - String (unique, required)
- `description` - String (nullable)
- `price` - Decimal(10,2) (required)
- `currency` - String(3), default 'gbp'
- `interval` - Enum (day, week, month, year), default 'month'
- `interval_count` - Integer, default 1
- `stripe_price_id` - String (nullable)
- `features` - JSON (nullable)
- `limitations` - JSON (nullable)
- `is_active` - Boolean, default true
- `softDeletes` - Yes
- `timestamps` - Yes

### Existing Filament Pattern
- Resources auto-discovered from `app/Filament/Resources/`
- Structure: `{Resource}/Pages/{Create,Edit,List,View}.php`, `Schemas/{Form,Infolist}.php`, `Tables/{Resource}Table.php`
- UserResource: navigationSort 1, SubscriptionResource: navigationSort 2

## Design Decisions (Confirmed)

1. **Navigation**: Top-level, sort 3 (after Subscriptions)
2. **Navigation Icon**: `Heroicon::OutlinedCurrencyDollar`
3. **JSON Fields (features/limitations)**: CodeEditor with JSON language
4. **Stripe Price ID**: Hidden (read-only, set via Stripe integration)
5. **Currency**: Select with common currencies (GBP, USD, EUR)
6. **Interval**: Select using PlanInterval enum
7. **Table Columns**: name, price (formatted with currency), interval, interval_count, is_active badge, created_at
8. **Infolist**: All fields in sections

## Files to Create

### 1. PlanResource.php
Main resource class with navigation config, form, table, infolist, and pages.

### 2. Pages/ListPlans.php
Standard list page.

### 3. Pages/CreatePlan.php
Standard create page.

### 4. Pages/EditPlan.php
Standard edit page.

### 5. Pages/ViewPlan.php
Standard view page.

### 6. Schemas/PlanForm.php
Form schema with sections:
- **Basic Info**: name, slug, description
- **Pricing**: price, currency (select), is_active
- **Billing Cycle**: interval (enum select), interval_count
- **Stripe**: stripe_price_id (hidden)
- **Features**: features (CodeEditor JSON)
- **Limitations**: limitations (CodeEditor JSON)

### 7. Schemas/PlanInfolist.php
Infolist schema with sections mirroring form.

### 8. Tables/PlansTable.php
Table with columns:
- name (searchable, sortable)
- price (formatted with currency, sortable)
- interval (badge)
- interval_count
- is_active (boolean badge)
- created_at (dateTime, sortable, toggleable)

Filters: is_active, interval
Actions: View, Edit, Delete
Bulk: Delete

## Implementation Steps

1. Create directory structure: `app/Filament/Resources/Plans/{Pages,Schemas,Tables}`
2. Create PlanForm.php with all form components
3. Create PlanInfolist.php with all infolist components
4. Create PlansTable.php with table configuration
5. Create 4 Page classes (List, Create, Edit, View)
6. Create PlanResource.php tying everything together
7. Test by accessing `/cp/plans` in browser

## Validation

- Run `php artisan filament:upgrade` to check compatibility
- Test CRUD operations in browser
- Verify JSON fields save/load correctly in CodeEditor
- Check enum casting works for interval field
- Verify Stripe Price ID remains hidden
- Confirm navigation appears at correct position

## Out of Scope

- Modifying Subscription resource or any other existing resources
- Adding relationships to other resources
- Stripe webhook integration
- Custom validation beyond model/database constraints