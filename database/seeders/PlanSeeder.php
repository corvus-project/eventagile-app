<?php

namespace Database\Seeders;

use App\Models\Plan;
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
                'name' => 'Starter',
                'slug' => 'starter',
                'description' => 'For independent instructors and new event hosts.',
                'price' => 0.00,
                'currency' => 'gbp',
                'interval' => 'month',
                'interval_count' => 1,
                'stripe_price_id' => null,
                'features' => json_encode([
                    'Unlimited active events & registrations',
                    'Single user (1 admin)',
                    'Zero-friction booking page',
                    'Basic instant confirmations',
                    'EventAgile branding',
                ]),
                'limitations' => json_encode([
                    'max_users' => 1,
                    'max_reminders' => 0,
                    'waitlist_enabled' => false,
                    'export_csv' => false,
                    'max_custom_fields' => 0,
                    'checkin_mode' => false,
                    'embeddable_widget' => false,
                    'white_label' => false,
                    'sending_emails' => false,
                ]),
                'is_active' => true,
            ],
            [
                'name' => 'Pro',
                'slug' => 'pro',
                'description' => 'For growing teachers needing automation and team access.',
                'price' => 12.00,
                'currency' => 'gbp',
                'interval' => 'month',
                'interval_count' => 1,
                'stripe_price_id' => config('services.stripe.prices.pro', 'price_pro_12_placeholder'),
                'features' => json_encode([
                    'Unlimited active events & registrations',
                    'Multi-User (Up to 3 team members)',
                    'Up to 2,000 automated email reminders/mo',
                    'FIFO Waitlist management',
                    'CSV Exporting',
                    'Up to 3 custom registration fields',
                    'Digital door check-in mode',
                ]),
                'limitations' => json_encode([
                    'max_users' => 3,
                    'max_reminders' => 2000,
                    'waitlist_enabled' => true,
                    'export_csv' => true,
                    'max_custom_fields' => 3,
                    'checkin_mode' => true,
                    'embeddable_widget' => false,
                    'white_label' => false,
                    'sending_emails' => true,
                ]),
                'is_active' => true,
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
                'description' => 'For small studios and high-volume event organizers requiring advanced tooling.',
                'price' => 29.00,
                'currency' => 'gbp',
                'interval' => 'month',
                'interval_count' => 1,
                'stripe_price_id' => config('services.stripe.prices.business', 'price_business_29_placeholder'),
                'features' => json_encode([
                    'Unlimited active events & registrations',
                    'Multi-User (Unlimited team members)',
                    'Unlimited automated email reminders',
                    'FIFO Waitlist management',
                    'CSV Exporting',
                    'Unlimited custom registration fields',
                    'Digital door check-in mode',
                    'Embeddable website widget',
                    'White-labeling / Branding removal',
                ]),
                'limitations' => json_encode([
                    'max_users' => -1,
                    'max_reminders' => -1,
                    'waitlist_enabled' => true,
                    'export_csv' => true,
                    'max_custom_fields' => -1,
                    'checkin_mode' => true,
                    'embeddable_widget' => true,
                    'white_label' => true,
                    'sending_emails' => true,
                ]),
                'is_active' => true,
            ],
        ];

        foreach ($plans as $plan) {
            Plan::updateOrCreate(
                ['slug' => $plan['slug']],
                $plan
            );
        }
    }
}
