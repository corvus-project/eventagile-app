<?php

namespace App\Models;

use App\Enums\PlanInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /** @use HasFactory<\Database\Factories\PlanFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'currency',
        'interval',
        'interval_count',
        'stripe_price_id',
        'features',
        'limitations',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'interval' => PlanInterval::class,
        'is_active' => 'boolean',
        'features' => 'array',
        'limitations' => 'array',
    ];
}
