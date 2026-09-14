<?php

namespace App\Listeners;

use App\Models\Subscription;
use App\Models\Tenant;
use Illuminate\Support\Facades\DB;
use Stancl\Tenancy\Events\TenancyBootstrapped;

class EnsureSubscriptionActive
{
    public function handle(TenancyBootstrapped $event): void
    {
        $tenant = $event->tenancy->tenant;

        if (! $tenant instanceof Tenant) {
            return;
        }

        $this->ensureSubscription($tenant);
    }

    protected function ensureSubscription(Tenant $tenant): void
    {
        $subscription = Subscription::query()
            ->where('tenant_id', $tenant->id)
            ->where('status', 'active')
            ->latest('starts_at')
            ->first();

        if (! $subscription) {
            return;
        }

        if ($subscription->ends_at && $subscription->ends_at->lte(now())) {
            $this->tryAutoRenew($subscription);
        }
    }

    protected function tryAutoRenew(Subscription $subscription): void
    {
        if ($subscription->status !== 'active') {
            return;
        }

        if (! $subscription->ends_at || $subscription->ends_at->gt(now())) {
            return;
        }

        $gracePeriodDays = 7;
        $gracePeriodEnds = $subscription->ends_at->copy()->addDays($gracePeriodDays);

        if (now()->gt($gracePeriodEnds)) {
            return;
        }

        DB::transaction(function () use ($subscription) {
            $locked = Subscription::query()
                ->whereKey($subscription->id)
                ->lockForUpdate()
                ->first();

            if (! $locked || $locked->status !== 'active') {
                return;
            }

            if (! $locked->ends_at || $locked->ends_at->gt(now())) {
                return;
            }

            $gracePeriodEnds = $locked->ends_at->copy()->addDays($gracePeriodDays);
            if (now()->gt($gracePeriodEnds)) {
                return;
            }

            $renewed = $locked->replicate();
            $renewed->starts_at = $locked->ends_at;
            $renewed->ends_at = $locked->calculateNextEndsAt();
            $renewed->status = 'active';
            $renewed->renewal_status = null;
            $renewed->renewal_date = null;
            $renewed->save();

            $locked->status = 'expired';
            $locked->renewal_status = 'completed';
            $locked->renewal_date = now()->format('Y-m-d H:i:s');
            $locked->save();
        });
    }
}