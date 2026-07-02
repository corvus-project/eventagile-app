<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Terms of Service' }}
</x-slot>


<!-- Main content -->
<main id="main-content" tabindex="-1">

    <!-- Page Header -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 leading-tight">Terms of Service</h1>
            <p class="text-sm text-gray-500 mt-2">Last updated: 1 January 2025</p>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-3xl mx-auto prose prose-sm sm:prose-base text-gray-600 leading-relaxed space-y-8">

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">1. Acceptance of Terms</h2>
                <p>By accessing or using EventAgile ("the Platform"), you agree to be bound by these Terms of Service.
                    If you do not agree to all of these terms, do not use the Platform.</p>
                <p>These terms apply to all visitors, users, and others who access or use the Platform ("Users").
                </p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">2. Description of Service</h2>
                <p>EventAgile provides an online event management platform that allows instructors, studios, clubs,
                    and small businesses to create, promote, and manage bookable events, classes, and lessons. The
                    Platform includes tools for event creation, online booking, attendee management, automated
                    communications, and analytics.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">3. Account Registration</h2>
                <p class="mb-2">To use the Platform, you must create an account. You agree to:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li>Provide accurate, current, and complete registration information</li>
                    <li>Maintain and update your account information as needed</li>
                    <li>Keep your password secure and confidential</li>
                    <li>Notify us immediately of any unauthorised use of your account</li>
                    <li>Be responsible for all activities that occur under your account</li>
                </ul>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">4. Subscriptions and Billing</h2>
                <p class="mb-2">The Platform offers both free and paid subscription plans:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li><strong>Starter Plan:</strong> Free of charge with limited features as described on our
                        Pricing page.</li>
                    <li><strong>Professional and Business Plans:</strong> Paid subscriptions billed monthly. Fees
                        are non-refundable except as stated in our refund policy.</li>
                    <li>We reserve the right to change our pricing at any time. We will notify you of any price
                        changes at least 30 days in advance.</li>
                    <li>All prices are in British Pounds (£) and exclude applicable taxes.</li>
                </ul>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">5. User Responsibilities</h2>
                <p class="mb-2">As a user of the Platform, you agree not to:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li>Use the Platform for any unlawful purpose or in violation of any applicable laws</li>
                    <li>Create events that promote illegal activities, hate speech, or harmful content</li>
                    <li>Attempt to gain unauthorised access to any part of the Platform</li>
                    <li>Interfere with or disrupt the integrity or performance of the Platform</li>
                    <li>Collect or harvest any personally identifiable information from the Platform</li>
                    <li>Use the Platform to send unsolicited communications (spam)</li>
                </ul>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">6. Event Organiser Responsibilities</h2>
                <p class="mb-2">If you create events on the Platform, you are responsible for:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li>Ensuring your events comply with all applicable laws and regulations</li>
                    <li>Providing accurate information about your events, including dates, times, locations, and
                        pricing</li>
                    <li>Managing attendee communications and data in accordance with data protection laws</li>
                    <li>Honouring bookings and cancellations in accordance with your stated policies</li>
                    <li>Obtaining all necessary licences, permits, and insurance for your events</li>
                </ul>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">7. Intellectual Property</h2>
                <p>The Platform and its original content, features, and functionality are owned by EventAgile and are
                    protected by international copyright, trademark, and other intellectual property laws. You may
                    not modify, reproduce, distribute, or create derivative works based on the Platform without our
                    express written consent.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">8. Limitation of Liability</h2>
                <p>To the fullest extent permitted by law, EventAgile shall not be liable for any indirect,
                    incidental, special, consequential, or punitive damages arising out of or related to your use of
                    the Platform. Our total liability for any claims under these terms shall not exceed the amount
                    you have paid us in the 12 months preceding the claim.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">9. Disclaimer of Warranties</h2>
                <p>The Platform is provided on an "as is" and "as available" basis without any warranties of any
                    kind, either express or implied. We do not guarantee that the Platform will be uninterrupted,
                    timely, secure, or error-free.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">10. Cancellation and Termination</h2>
                <p class="mb-2">You may cancel your account at any time from your Account Settings. Upon
                    cancellation:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li>Your paid plan remains active until the end of the current billing period</li>
                    <li>You will lose access to premium features at the end of the billing period</li>
                    <li>We will retain your data for 30 days after cancellation, during which you may reactivate
                        your account</li>
                    <li>After 30 days, we may permanently delete your data in accordance with our Privacy Policy
                    </li>
                </ul>
                <p class="mt-3">We reserve the right to suspend or terminate your account if you violate these
                    terms.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">11. Changes to Terms</h2>
                <p>We reserve the right to modify these terms at any time. We will notify you of material changes
                    via email or through the Platform. Your continued use of the Platform after such changes
                    constitutes your acceptance of the new terms.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">12. Governing Law</h2>
                <p>These terms shall be governed by and construed in accordance with the laws of England and Wales.
                    Any disputes relating to these terms shall be subject to the exclusive jurisdiction of the
                    courts of England and Wales.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">13. Contact Information</h2>
                <p>If you have any questions about these Terms of Service, please contact us:</p>
                <p class="mt-2">
                    Email: <a href="mailto:support@EventAgile.com"
                        class="text-indigo-600 hover:underline">support@EventAgile.com</a><br>
                    Address: 123 Event Street, London, EC1A 1BB, United Kingdom
                </p>
            </div>

        </div>
    </section>

</main>