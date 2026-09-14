<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\SubscriptionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Stancl\Tenancy\Database\Concerns\CentralConnection;

class Subscription extends Model
{
    /** @use HasFactory<SubscriptionFactory> */
    use CentralConnection, HasFactory;

    protected $fillable = [
        'tenant_id',
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

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'plan_limitations' => 'array',
        'plan_features' => 'array',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function renew(): bool
    {
        return DB::transaction(function () {
            $subscription = static::query()
                ->whereKey($this->id)
                ->lockForUpdate()
                ->first();

            if (! $subscription || $subscription->status !== 'active') {
                return false;
            }

            if (! $subscription->ends_at || $subscription->ends_at->gt(now())) {
                return false;
            }

            $renewed = $subscription->replicate();
            $renewed->starts_at = $subscription->ends_at;
            $renewed->ends_at = $subscription->calculateNextEndsAt();
            $renewed->status = 'active';
            $renewed->renewal_status = null;
            $renewed->renewal_date = null;
            $renewed->save();

            $subscription->status = 'expired';
            $subscription->renewal_status = 'completed';
            $subscription->renewal_date = now()->format('Y-m-d H:i:s');
            $subscription->save();

            return true;
        });
    }

    private function calculateNextEndsAt(): Carbon
    {
        $start = $this->ends_at->copy();
        $count = max(1, (int) $this->interval_count);

        return match ($this->interval) {
            'day' => $start->addDays($count),
            'week' => $start->addWeeks($count),
            'month' => $start->addMonths($count),
            'year' => $start->addYears($count),
            default => $start->addMonth(),
        };
    }
}
