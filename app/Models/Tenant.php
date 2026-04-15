<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Domain;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase;
    use HasDomains;


    public static function getCustomColumns(): array
    {
        return [
            'id',
            'user_id',
            'name',
            'email',
            'is_active',
        ];
    }

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
