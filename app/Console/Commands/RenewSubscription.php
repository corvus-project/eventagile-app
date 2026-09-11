<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use Illuminate\Console\Command;

class RenewSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'renew-subscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Renew expired active subscriptions';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $subscriptions = Subscription::query()
            ->where('status', 'active')
            ->where('ends_at', '<=', now())
            ->get();

        $renewed = 0;
        foreach ($subscriptions as $subscription) {
            if ($subscription->renew()) {
                $renewed++;
            }
        }

        $this->info("Renewed {$renewed} subscription(s).");

        return self::SUCCESS;
    }
}
