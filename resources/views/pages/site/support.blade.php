<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Support' }}
</x-slot>

<div class="pb-5">
    <section class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <h6 class="text-lg text-blue-600 font-medium text-center mb-2">FAQs</h6>
                <h2 class="text-4xl font-manrope text-center font-bold text-gray-900 leading-[3.25rem]">Frequently asked questions</h2>
            </div>

            <div class="max-w-3xl mx-auto">
                <div class="space-y-6">
                    <div class="border border-gray-200 rounded-lg p-6 bg-white shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">What is EventAgile?</h3>
                        <p class="text-gray-700">
                            EventAgile is a simple and affordable event management platform designed for small organizations, individuals, and community groups.
                            It allows you to easily create events, manage registrations, and track attendees without the complexity or high cost of larger
                            systems.
                        </p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6 bg-white shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">Who is EventAgile for?</h3>
                        <p class="text-gray-700">
                            EventAgile is perfect for anyone who needs a simple solution to manage event sign-ups. This includes small clubs, community
                            organizers, freelance trainers, workshop hosts, and anyone tired of managing event registrations with spreadsheets and manual
                            emails.
                        </p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6 bg-white shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">Is EventAgile a downloadable software?</h3>
                        <p class="text-gray-700">
                            No, EventAgile is a cloud-based SaaS (Software as a Service) solution. There is nothing to download or install. You can access your
                            account from any web browser on any device, anywhere in the world.
                        </p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6 bg-white shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">How do I create my first event?</h3>
                        <p class="text-gray-700">
                            Simply sign up for an account, and you will be guided to your dashboard. From there, you can fill out a straightforward form with
                            your event's name, description, date, time, and location to get started in minutes.
                        </p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6 bg-white shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">How do attendees register for my event?</h3>
                        <p class="text-gray-700">
                            Once you publish your event, EventAgile generates a unique public page with all the details. You can share this link with your
                            audience, and they can register by providing their name and email address. Attendees do not need to create an account.
                        </p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6 bg-white shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">How do I track who has registered?</h3>
                        <p class="text-gray-700">
                            On your dashboard, you can view a real-time list of all attendees for each event you've created. You can also easily export this
                            list to a CSV file for your records or for use in other applications.
                        </p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6 bg-white shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">Can I charge for my events?</h3>
                        <p class="text-gray-700">
                            The MVP version of EventAgile is focused on free events to keep the process as simple as possible. We plan to add integrated payment
                            processing for paid tickets in future updates.
                        </p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6 bg-white shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">Is my data safe?</h3>
                        <p class="text-gray-700">
                            Yes. We take security seriously. All data is stored securely on our servers, and we follow industry-standard practices to ensure
                            your event and attendee information is protected.
                        </p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6 bg-white shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">How do I get help if I have a question?</h3>
                        <p class="text-gray-700">
                            You can contact our support team through the contact form on our website. We're here to help you get the most out of EventAgile!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>