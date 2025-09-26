<?php

namespace App\Listeners;

use App\Events\EventRegistrationUpdated;
use App\Mail\EventRegistrationUpdated as MailEventRegistrationUpdated;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EventRegistrationUpdatedNotification
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
    public function handle(EventRegistrationUpdated $eventRegistration): void
    {
        $event = $eventRegistration->eventRegistration->event;
        $user = $event->user;

        if ($user->able('notify-event-registration')) {
            Log::info('Sending event registration update notification to ' . $eventRegistration->eventRegistration->email . ' for event ID: ' . $event->id);
            Mail::to($eventRegistration->eventRegistration->email)->queue(new MailEventRegistrationUpdated($event, [
                'name' => $eventRegistration->eventRegistration->name,
                'email' => $eventRegistration->eventRegistration->email,
                'phone' => $eventRegistration->eventRegistration->phone,
                'status' => $eventRegistration->eventRegistration->status->value,
            ]));
        }
    }
}
