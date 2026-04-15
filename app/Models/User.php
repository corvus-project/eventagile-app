<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use App\Services\SubscriptionService;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Support\Facades\Log;
use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable  implements MustVerifyEmail, FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoleAndPermission, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'created_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class, 'user_id', 'id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'organizer_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function able($action)
    {
        Log::info('Checking ability for user ID: ' . $this->id . ' and action: ' . $action);
        return app(SubscriptionService::class)->can($this, $action);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($this->hasRole('admin')) {
            return true;
        }
        return false;
    }

    public function getMaxEventsAllowedAttribute()
    {
        $subscription = $this->subscriptions()->where('status', 'active')->latest()->first();
        if ($subscription) {
            $plan_limitations = json_decode($subscription->plan_limitations, true);
            return $plan_limitations['max_events'] ?? 0;
        }
        return 0;
    }
}
