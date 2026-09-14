<?php

namespace App\Listeners;

use App\Models\AccountSetup;
use App\Models\Subscription;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\DB;
use Stancl\Tenancy\Events\TenancyBootstrapped;

class AccountSetupListener
{
    public function handle(Verified $event): void
    {
        $user = $event->user;
        $accountSetup = AccountSetup::where('user_id', $user->id)->where('action', 'NOTVERIFIED')->latest('created_at')->first();
        if ($accountSetup) {
            $accountSetup->update([
                'action' => 'SETUP'
            ]);
        }
    }
}
