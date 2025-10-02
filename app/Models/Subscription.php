<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /** @use HasFactory<\Database\Factories\SubscriptionFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'starts_at',
        'ends_at',
        'status',
        'plan_id',
        'interval',
        'plan_limitations',
        'plan_features',
        'plan_name',
        'plan_description',
    ];

    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
            'plan_limitations' => 'array',
            'plan_features' => 'array',
        ];
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function getPlanFeaturesListAttribute()
    {
        return is_array($this->plan_features) ? $this->plan_features : [];
    }

    public function getPlanLimitsAttribute()
    {
        return is_array($this->plan_limitations) ? $this->plan_limitations : [];
    }
}
