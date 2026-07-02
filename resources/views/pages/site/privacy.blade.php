<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Privacy Policy' }}
</x-slot>

<!-- Main content -->
<main id="main-content" tabindex="-1">

    <!-- Page Header -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 leading-tight">Privacy Policy</h1>
            <p class="text-sm text-gray-500 mt-2">Last updated: 1 January 2025</p>
        </div>
    </section>

    <!-- Privacy Policy Content -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-3xl mx-auto prose prose-sm sm:prose-base text-gray-600 leading-relaxed space-y-8">

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">1. Introduction</h2>
                <p>EventAgile ("we", "our", "us") is committed to protecting your privacy. This Privacy Policy
                    explains how we collect, use, disclose, and safeguard your information when you visit our
                    website and use our event management platform.</p>
                <p>We comply with the UK General Data Protection Regulation (UK GDPR) and the Data Protection Act
                    2018.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">2. Information We Collect</h2>
                <p class="mb-2">We may collect the following types of information:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li><strong>Personal Identification Information:</strong> Name, email address, phone number, and
                        billing information when you create an account or make a purchase.</li>
                    <li><strong>Event Data:</strong> Information about events you create, including dates, times,
                        locations, capacity, and pricing.</li>
                    <li><strong>Attendee Data:</strong> Information about individuals who register for your events,
                        including their names and contact details.</li>
                    <li><strong>Usage Data:</strong> Information about how you interact with our platform, including
                        pages visited, features used, and time spent.</li>
                    <li><strong>Technical Data:</strong> IP address, browser type, device information, and cookies.
                    </li>
                </ul>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">3. How We Use Your Information</h2>
                <p class="mb-2">We use the information we collect for the following purposes:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li>To provide, operate, and maintain our platform</li>
                    <li>To process transactions and send related information</li>
                    <li>To send administrative messages, updates, and security alerts</li>
                    <li>To send automated event reminders and confirmations on behalf of event organisers</li>
                    <li>To improve and personalise user experience</li>
                    <li>To comply with legal obligations</li>
                </ul>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">4. Legal Basis for Processing</h2>
                <p class="mb-2">We process your personal data on the following legal bases:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li><strong>Contractual Necessity:</strong> To fulfil our obligations under our Terms of Service
                    </li>
                    <li><strong>Consent:</strong> Where you have given explicit consent (e.g., marketing
                        communications)</li>
                    <li><strong>Legitimate Interests:</strong> For improving our services, security, and fraud
                        prevention</li>
                    <li><strong>Legal Obligation:</strong> To comply with applicable laws and regulations</li>
                </ul>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">5. Data Sharing and Disclosure</h2>
                <p class="mb-2">We may share your information with:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li><strong>Service Providers:</strong> Third-party vendors who help us operate our platform
                        (e.g., payment processors, email delivery services, cloud hosting)</li>
                    <li><strong>Legal Authorities:</strong> When required by law or to protect our rights</li>
                    <li><strong>Business Transfers:</strong> In connection with a merger, acquisition, or sale of
                        assets</li>
                </ul>
                <p class="mt-3">We do not sell your personal data to third parties.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">6. Data Retention</h2>
                <p>We retain your personal data only for as long as necessary to fulfil the purposes for which it
                    was collected, including to satisfy any legal, accounting, or reporting requirements. When you
                    delete your account, we will delete or anonymise your personal data within 30 days, unless we
                    are required to retain it by law.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">7. Your Rights</h2>
                <p class="mb-2">Under UK GDPR, you have the following rights:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li><strong>Right to Access:</strong> Request a copy of the personal data we hold about you</li>
                    <li><strong>Right to Rectification:</strong> Request correction of inaccurate data</li>
                    <li><strong>Right to Erasure:</strong> Request deletion of your data ("right to be forgotten")
                    </li>
                    <li><strong>Right to Restrict Processing:</strong> Request limitation of how we use your data
                    </li>
                    <li><strong>Right to Data Portability:</strong> Request transfer of your data to another service
                    </li>
                    <li><strong>Right to Object:</strong> Object to processing based on legitimate interests</li>
                </ul>
                <p class="mt-3">To exercise any of these rights, please contact us at <a
                        href="mailto:support@EventAgile.example"
                        class="text-indigo-600 hover:underline">support@EventAgile.example</a>.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">8. Cookies</h2>
                <p>We use cookies and similar tracking technologies to enhance your experience on our platform.
                    Cookies are small text files stored on your device. You can control cookie preferences through
                    your browser settings. Essential cookies are required for the platform to function; analytics
                    and marketing cookies are used only with your consent.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">9. Security</h2>
                <p>We implement appropriate technical and organisational measures to protect your personal data
                    against unauthorised access, alteration, disclosure, or destruction. This includes encryption in
                    transit and at rest, regular security audits, and access controls.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">10. International Transfers</h2>
                <p>Your data may be transferred to and processed in countries outside the UK. When we transfer your
                    data internationally, we ensure appropriate safeguards are in place, such as Standard
                    Contractual Clauses or adequacy decisions by the UK Government.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">11. Changes to This Policy</h2>
                <p>We may update this Privacy Policy from time to time. We will notify you of any material changes
                    by posting the new policy on this page and updating the "Last updated" date. We encourage you to
                    review this policy periodically.</p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-3">12. Contact Us</h2>
                <p>If you have any questions about this Privacy Policy or wish to exercise your data protection
                    rights, please contact us:</p>
                <p class="mt-2">
                    Email: <a href="mailto:support@EventAgile.com"
                        class="text-indigo-600 hover:underline">support@EventAgile.com</a><br>
                    Address: 123 Event Street, London, EC1A 1BB, United Kingdom
                </p>
            </div>

        </div>
    </section>

</main>