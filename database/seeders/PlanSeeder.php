<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Basic Plan',
                'slug' => 'basic-plan',
                'description' => 'A basic plan for individual users.',
                'price' => 0.00,
                'currency' => 'gbp',
                'interval' => 'month',
                'interval_count' => 1,
                'features' => json_encode(['Access to basic features', 'Email support']),
                'limitations' => json_encode(['max-events' => 1, 'max-registrations' => 100, 'notify-event-registration' => false]),
                'is_active' => true,
            ],
            [
                'name' => 'Pro Plan',
                'slug' => 'pro-plan',
                'description' => 'A pro plan for small teams.',
                'price' => 9.99,
                'currency' => 'gbp',
                'interval' => 'month',
                'interval_count' => 1,
                'features' => json_encode(['Access to all features', 'Priority email support', 'Team collaboration']),
                'limitations' => json_encode(['Up to 50 events per month']),
                'is_active' => false,
            ],
            [
                'name' => 'Enterprise Plan',
                'slug' => 'enterprise-plan',
                'description' => 'An enterprise plan for large organizations.',
                'price' => 14.99,
                'currency' => 'gbp',
                'interval' => 'month',
                'interval_count' => 1,
                'features' => json_encode(['Dedicated account manager', '24/7 support', 'Custom integrations']),
                'limitations' => json_encode(['Unlimited events']),
                'is_active' => false,
            ],
        ];

        foreach ($plans as $plan) {
            \App\Models\Plan::updateOrCreate(
                ['slug' => $plan['slug']],
                $plan
            );
        }
    }
}
