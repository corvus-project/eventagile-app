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

class User extends Authenticatable  implements MustVerifyEmail, FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoleAndPermission;

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
         if ($panel->getId() === 'admin') {
            // Allow access if user has 'admin' role
            Log::info('Checking admin panel access for user ID: ' . $this->id);
            if ($this->hasRole('admin')) {
                return true;
            }
            //return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
        } 

        return false;
    }
}
