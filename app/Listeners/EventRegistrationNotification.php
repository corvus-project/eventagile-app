<?php

namespace App\Listeners;

use App\Events\EventRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewEventRegistration;
use Illuminate\Support\Facades\Log;

class EventRegistrationNotification
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
    public function handle(EventRegistration $eventRegistration): void
    {
        $registration = $eventRegistration->registration;
 
        $event = $registration->event;
        $user = $event->user;
 
        if ($user->able('notify-event-registration')) {
            Log::info('Sending event registration notification to ' . $registration->email . ' for event ID: ' . $event->id);
            Mail::to($registration->email)->queue(new NewEventRegistration($event, [
                'name' => $registration->name,
                'email' => $registration->email,
                'phone' => $registration->phone
            ]));
        }
    }
}
