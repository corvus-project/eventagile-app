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
        $event = $eventRegistration->event->event;
        $user = $event->user;

        if ($user->able('notify-event-registration')) {
            Log::info('Sending event registration notification to ' . $eventRegistration->event->email . ' for event ID: ' . $event->id);
            Mail::to($eventRegistration->event->email)->queue(new NewEventRegistration($event, [
                'name' => $eventRegistration->event->name,
                'email' => $eventRegistration->event->email,
                'phone' => $eventRegistration->event->phone
            ]));
        }
    }
}
