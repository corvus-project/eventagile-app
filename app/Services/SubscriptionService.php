<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SubscriptionService
{
    protected  $subscription;

    public function __construct()
    {
        $this->subscription = null;
    }

    public function can(User $user, string $action): bool
    {
        $action = Str::camel($action);
        return $this->$action($user);
    }

    private function createEvent(User $user): bool
    {
        if ($user->events()->count() >= $this->getMaxEvents($user)) {
            Log::warning('User ID: ' . $user->id . ' has reached the maximum number of events allowed by their subscription.');
            return false;
        }
        return true;
    }

    private function getMaxEvents(User $user): int
    {
        return $user->getMaxEventsAllowedAttribute();
    }

    public function getRegistrationLimit(User $user): int
    {
        $subscription = $user->subscriptions()->where('status', 'active')->latest()->first();
        if ($subscription) {
            $plan_limitations = json_decode($subscription->plan_limitations, true);
            return $plan_limitations['max_registrations'] ?? 0;
        }
        return 0;
    }
}
