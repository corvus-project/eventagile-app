<?php

namespace App\Listeners;

use App\Events\Registered;
use App\Models\Subscription;
use Illuminate\Auth\Events\Registered as EventsRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SubscribeUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventsRegistered $event): void
    {
        Log::info('Subscribing user ID: ' . $event->user->id . ' to default plan.');
        $plan = \App\Models\Plan::where('is_default', true)->first();
        Subscription::create(
            [

                'user_id' => $event->user->id,
                'starts_at' => now(),
                'ends_at' => now()->addMonth(),
                'status' => 'active',
                'plan_id' => $plan->id,
                'interval' => $plan->interval,
                'plan_limitations' => $plan->limitations,
                'plan_features' => $plan->features,
                'plan_name' => $plan->name,
                'plan_description' => $plan->description,

            ]
        );
    }
}
