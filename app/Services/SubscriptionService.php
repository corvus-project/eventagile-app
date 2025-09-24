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
        Log::info('Checking if user ID: ' . $user->id . ' can perform action: ' . $action);

        return $this->$action($user);
    }

    private function notifyEventRegistration(User $user): bool
    {
        Log::info('Checking notify-event-registration for user ID: ' . $user->id);
        return $this->getLimitations($user, 'notify-event-registration');
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
        $subscription = $user->subscriptions()->where('status', 'active')->latest()->first();
        if ($subscription) {
            return $subscription->plan_limitations['max-events'] ?? 0;
        }
        return 0;
    }   

    public function getRegistrationLimit(User $user): int
    {
        $subscription = $user->subscriptions()->where('status', 'active')->latest()->first();
        if ($subscription) {
            return $subscription->plan_limitations['max-registrations'] ?? 0;
        }
        return 0;
    }   

    public function getLimitations(User $user, $key): bool|int
    {
        $subscription = $user->subscriptions()->where('status', 'active')->latest()->first();
        Log::info('Retrieving limitation ' . $key . ' for user ID: ' . $user->id);
 
        if ($subscription) {
            Log::info('User ID: ' . $user->id . ' has limitation ' . $key . ': ' . ($subscription->plan_limitations["{$key}"] ? 'true' : 'false'));
            return $subscription->plan_limitations[$key] ? true : false;
        }
        return false;
    }  
}