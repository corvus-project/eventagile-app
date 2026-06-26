<?php

namespace App\Listeners;


use App\Models\AccountSetup as AccountSetupModel;
use Illuminate\Auth\Events\Verified as EventsVerified;

class AccountSetup
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
    public function handle(EventsVerified $event): void
    {
        $accountSetup = AccountSetupModel::where('user_id', $event->user->id)
            ->where('action', 'PRESETUP')
            ->first();

        if ($accountSetup) {
            $accountSetup->action = 'SETUP';
            $accountSetup->save();
        }
    }
}
