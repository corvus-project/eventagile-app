<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {

    public array $plans = [
        'starter' => [
            'name' => 'Starter',
            'tagline' => 'For new instructors and hobbyists',
            'price' => '£0',
            'summary' => 'Everything you need to run and fill your first events — free for your first year.',
            'highlights' => [
                'Unlimited events & registrations',
                'Zero-friction booking page',
                'Basic instant confirmations',
                'EventAgile branding',
            ],
            'cta' => 'Get Started Free',
            'route' => 'signup',
            'featured' => false,
        ],
        'pro' => [
            'name' => 'Pro',
            'tagline' => 'For independent instructors who need automation',
            'price' => '£12',
            'summary' => 'Automation and admin tools for teachers and studios with a growing audience.',
            'highlights' => [
                'Up to 3 team members',
                '2,000 email reminders / month',
                'Waitlist management & CSV export',
                '3 custom registration questions',
                'Digital door check-in',
            ],
            'cta' => 'Start Pro',
            'route' => 'contact',
            'featured' => true,
        ],
        'business' => [
            'name' => 'Business',
            'tagline' => 'For small studios and high-volume organisers',
            'price' => '£29',
            'summary' => 'Advanced tooling for studios running many events with unlimited capacity.',
            'highlights' => [
                'Unlimited team members',
                'Unlimited email reminders',
                'Unlimited custom questions',
                'Embeddable website widget',
                'White-label branding',
            ],
            'cta' => 'Contact Sales',
            'route' => 'contact',
            'featured' => false,
        ],
    ];

    /**
     * Feature matrix rendered in the comparison table. A null value means the
     * feature is not available on that plan and is shown as unavailable.
     */
    public array $features = [
        [
            'label' => 'Active Events & Registrations',
            'starter' => 'Unlimited',
            'pro' => 'Unlimited',
            'business' => 'Unlimited',
        ],
        [
            'label' => 'Team Access / Users',
            'starter' => 'Single user (1 admin)',
            'pro' => 'Up to 3 team members',
            'business' => 'Unlimited team members',
        ],
        [
            'label' => 'Registration & Booking',
            'starter' => true,
            'pro' => true,
            'business' => true,
        ],
        [
            'label' => 'Instant Confirmations',
            'starter' => 'Basic confirmation',
            'pro' => true,
            'business' => true,
        ],
        [
            'label' => 'Automated Email Reminders',
            'starter' => null,
            'pro' => 'Up to 2,000 reminders / month',
            'business' => 'Unlimited reminders',
        ],
        [
            'label' => 'Waitlist Management',
            'starter' => null,
            'pro' => 'FIFO automatic queue',
            'business' => 'FIFO automatic queue',
        ],
        [
            'label' => 'Registration Exporting',
            'starter' => null,
            'pro' => 'CSV export',
            'business' => 'CSV export',
        ],
        [
            'label' => 'Custom Registration Questions',
            'starter' => null,
            'pro' => 'Up to 3 custom fields',
            'business' => 'Unlimited custom fields',
        ],
        [
            'label' => 'Check-in / Attendance Tool',
            'starter' => null,
            'pro' => 'Digital door check-in',
            'business' => 'Digital door check-in',
        ],
        [
            'label' => 'Embeddable Website Widget',
            'starter' => null,
            'pro' => null,
            'business' => 'iFrame / HTML snippet',
        ],
        [
            'label' => 'White-Labeling / Branding',
            'starter' => 'EventAgile branding shown',
            'pro' => 'EventAgile branding shown',
            'business' => 'Remove "Powered by EventAgile" & custom logo',
        ],
    ];

};

?>

<x-slot name="title">
    {{'Pricing — EventAgile Plans & Pricing'}}
</x-slot>

<main id="main-content" tabindex="-1">

    <!-- Page Header -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 leading-tight">
                Simple, Transparent Pricing
            </h1>
            <p class="text-base text-gray-600 leading-relaxed mt-4 max-w-2xl mx-auto">
                New instructors get the Starter plan free for their first year. Upgrade as you grow — no hidden
                fees, no long-term contracts, cancel anytime.
            </p>
        </div>
    </section>

    <!-- Pricing Cards -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

                @foreach ($plans as $key => $plan)
                    @if ($plan['featured'])
                        <div class="bg-blue-600 rounded-2xl shadow-md p-8 flex flex-col relative md:-mt-4 md:pb-10">
                            <span
                                class="absolute -top-3 left-1/2 -translate-x-1/2 bg-blue-600 text-white text-xs font-semibold uppercase tracking-wide px-3 py-1 rounded-full">
                                Most Popular
                            </span>
                    @else
                        <div class="bg-white rounded-2xl shadow-md p-8 flex flex-col">
                    @endif

                    <h2 class="text-xl font-bold {{ $plan['featured'] ? 'text-white' : 'text-gray-900' }}">
                        {{ $plan['name'] }}
                    </h2>
                    <p class="text-sm mt-1 {{ $plan['featured'] ? 'text-blue-200' : 'text-gray-500' }}">
                        {{ $plan['tagline'] }}
                    </p>
                    <p class="mt-6">
                        <span class="text-5xl font-bold {{ $plan['featured'] ? 'text-white' : 'text-gray-900' }}">
                            {{ $plan['price'] }}
                        </span>
                        <span class="text-base {{ $plan['featured'] ? 'text-blue-200' : 'text-gray-500' }}">/mo</span>
                    </p>
                    <p class="text-sm mt-3 {{ $plan['featured'] ? 'text-blue-100' : 'text-gray-600' }}">
                        {{ $plan['summary'] }}
                    </p>
                    <ul class="mt-6 space-y-3 text-sm flex-1 {{ $plan['featured'] ? 'text-blue-100' : 'text-gray-600' }}">
                        @foreach ($plan['highlights'] as $highlight)
                            <li class="flex items-start gap-2">
                                <svg
                                    class="w-5 h-5 flex-shrink-0 mt-0.5 {{ $plan['featured'] ? 'text-blue-200' : 'text-green-500' }}"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                {{ $highlight }}
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route($plan['route']) }}"
                        class="mt-8 block w-full text-center px-4 py-3 font-semibold rounded-lg min-h-[44px] flex items-center justify-center focus:outline focus:outline-2 focus:outline-offset-2 {{ $plan['featured'] ? 'bg-white text-blue-600 hover:bg-blue-50 focus:outline-white' : 'border border-blue-600 text-blue-600 hover:bg-blue-50 focus:outline-blue-600' }}">
                        {{ $plan['cta'] }}
                    </a>
                    </div>
                @endforeach

            </div>
            <p class="text-sm text-gray-500 text-center mt-8">
                Every plan includes unlimited events and unlimited registrations. See the full comparison below.
            </p>
        </div>
    </section>

    <!-- Feature Comparison -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 text-center mb-4">Compare plans</h2>
            <p class="text-base text-gray-600 text-center mb-10 max-w-2xl mx-auto">
                Every plan includes unlimited active events and unlimited registrations. The differences are in
                automation, team access, and branding.
            </p>

            <div class="overflow-x-auto -mx-4 px-4 sm:mx-0 sm:px-0">
                <table class="w-full min-w-[640px] text-sm border-collapse">
                    <caption class="sr-only">Feature comparison across the Starter, Pro and Business plans</caption>
                    <thead>
                        <tr class="border-b-2 border-gray-200">
                            <th scope="col" class="text-left font-semibold text-gray-900 py-4 pr-4 align-bottom">
                                Features
                            </th>
                            @foreach ($plans as $key => $plan)
                                <th scope="col"
                                    class="py-4 px-4 text-center align-bottom {{ $plan['featured'] ? 'bg-blue-50' : '' }}">
                                    <span class="block font-semibold text-gray-900">{{ $plan['name'] }}</span>
                                    <span class="block text-xs font-normal text-gray-500 mt-1">
                                        {{ $plan['price'] }}/mo
                                    </span>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($features as $feature)
                            <tr class="border-b border-gray-100">
                                <th scope="row" class="text-left font-medium text-gray-900 py-4 pr-4">
                                    {{ $feature['label'] }}
                                </th>
                                @foreach ($plans as $key => $plan)
                                    <td
                                        class="py-4 px-4 text-center {{ $plan['featured'] ? 'bg-blue-50' : '' }} {{ is_string($feature[$key]) ? 'text-gray-600' : '' }}">
                                        @if ($feature[$key] === true)
                                            <svg class="w-5 h-5 mx-auto text-green-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span class="sr-only">Included</span>
                                        @elseif ($feature[$key] === null)
                                            <span class="text-gray-300" aria-hidden="true">&mdash;</span>
                                            <span class="sr-only">Not available</span>
                                        @else
                                            {{ $feature[$key] }}
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 text-center mb-12">Pricing FAQ</h2>
            <div class="space-y-6">
                <div>
                    <h3 class="text-base font-semibold text-gray-900">Can I switch plans at any time?</h3>
                    <p class="text-sm text-gray-600 mt-1">Yes. You can upgrade or downgrade your plan at any time
                        from Account Settings. Changes take effect at the start of your next billing cycle.</p>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-900">How long is the free plan?</h3>
                    <p class="text-sm text-gray-600 mt-1">The Starter plan is free for your first year, with no
                        card required. After that you can move to Pro or Business whenever you need automation or
                        team access.</p>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-900">Is there a free trial for paid plans?</h3>
                    <p class="text-sm text-gray-600 mt-1">Absolutely. Every paid plan comes with a 14-day free trial
                        — no credit card required. Cancel anytime during the trial with no charge.</p>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-900">What payment methods do you accept?</h3>
                    <p class="text-sm text-gray-600 mt-1">We accept all major credit and debit cards (Visa,
                        Mastercard, American Express) as well as PayPal.</p>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-900">Can I cancel my subscription?</h3>
                    <p class="text-sm text-gray-600 mt-1">Yes, you can cancel at any time from Account Settings.
                        Your plan remains active until the end of the current billing period.</p>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-900">Do you offer refunds?</h3>
                    <p class="text-sm text-gray-600 mt-1">We offer a full refund within 14 days of your first paid
                        subscription charge if you are not satisfied. Contact our support team to request a refund.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-blue-600">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">Still Have Questions?</h2>
            <p class="text-base text-blue-100 leading-relaxed mb-8">Our team is here to help you find the right
                plan for your needs.</p>
            <a href="{{ route('contact') }}"
                class="inline-block bg-white text-blue-600 font-semibold px-6 py-3 rounded-lg hover:bg-blue-50 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-white min-h-[44px]">Contact
                Us</a>
        </div>
    </section>

</main>
