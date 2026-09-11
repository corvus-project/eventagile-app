<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

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
                Start free and upgrade as you grow. No hidden fees, no long-term contracts. Cancel anytime.
            </p>
        </div>
    </section>

    <!-- Pricing Cards -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Starter Plan -->
                <div class="bg-white rounded-2xl shadow-md p-8 flex flex-col">
                    <h2 class="text-xl font-bold text-gray-900">Starter</h2>
                    <p class="text-sm text-gray-500 mt-1">For individuals getting started</p>
                    <p class="mt-6">
                        <span class="text-5xl font-bold text-gray-900">£0</span>
                        <span class="text-base text-gray-500">/mo</span>
                    </p>
                    <ul class="mt-8 space-y-3 text-sm text-gray-600 flex-1">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Up to 3 active events
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            50 registrations per event
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Basic booking page
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Email confirmations
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Attendee dashboard
                        </li>
                    </ul>
                    <a href="{{ route('signup') }}"
                        class="mt-8 block w-full text-center px-4 py-3 border border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-50 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-blue-600 min-h-[44px] flex items-center justify-center">
                        Get Started Free
                    </a>
                </div>

                <!-- Professional Plan (Demo) -->
                <div class="bg-blue-600 rounded-2xl shadow-md p-8 flex flex-col relative">
                     
                    <h2 class="text-xl font-bold text-white">Professional</h2>
                    <p class="text-sm text-blue-200 mt-1">For growing studios and clubs</p>
                    <p class="mt-6">
                        <span class="text-5xl font-bold text-white">£0</span>
                        <span class="text-base text-blue-200">/mo</span>
                    </p>
                    <ul class="mt-8 space-y-3 text-sm text-blue-100 flex-1">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Unlimited active events
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Unlimited registrations
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Automated email reminders
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Waitlist management
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Recurring schedule support
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Revenue & analytics reports
                        </li>
                    </ul>
                    <a href="{{ route('contact') }}"
                        class="mt-8 block w-full text-center px-4 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-50 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-white min-h-[44px] flex items-center justify-center">
                        Coming soon
                    </a>
                </div>

                <!-- Business Plan (Demo) -->
                <div class="bg-blue-600 rounded-2xl shadow-md p-8 flex flex-col">
                    <h2 class="text-xl font-bold text-white">Business</h2>
                    <p class="text-sm text-blue-200 mt-1">For multi-venue organisations</p>
                    <p class="mt-6">
                        <span class="text-5xl font-bold text-white">£0</span>
                        <span class="text-base text-blue-200">/mo</span>
                    </p>
                    <ul class="mt-8 space-y-3 text-sm text-blue-100 flex-1">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Unlimited active events
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Unlimited registrations
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Multi-venue management
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            SMS notifications
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Priority support
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Team member accounts
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            API access & integrations
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-200 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            White-label booking pages
                        </li>
                    </ul>
                    <a href="{{ route('contact') }}"
                        class="mt-8 block w-full text-center px-4 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-50 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-white min-h-[44px] flex items-center justify-center">
                        Contact Sales
                    </a>
                </div>

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
