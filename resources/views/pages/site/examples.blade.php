<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Example Usage' }}
</x-slot>

<!-- Main content -->
<main id="main-content" tabindex="-1">

    <!-- Page Header -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 leading-tight">
                See EventAgile in Action
            </h1>
            <p class="text-base text-gray-600 leading-relaxed mt-4 max-w-2xl mx-auto">
                Real-world examples of how instructors, studios, and organisers use EventAgile to manage and sell
                bookable events.
            </p>
        </div>
    </section>

    <!-- Use Cases Grid -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Use Case 1: Fitness Class Booking -->
                <div class="bg-white rounded-2xl shadow-md p-8">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg aria-hidden="true" class="w-7 h-7 text-indigo-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 0 0 4.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 0 1-15.357-2m15.357 2H15" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Fitness Class Booking</h2>
                            <p class="text-sm text-gray-500">Yoga &middot; Pilates &middot; HIIT</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">Emma runs a yoga studio with 12 weekly
                        classes. She uses EventAgile to create recurring sessions, set capacity limits, and let
                        members book online. Automated reminders cut her no-show rate by 40%.</p>
                    <div class="bg-indigo-50 rounded-lg p-4">
                        <p class="text-xs font-semibold text-indigo-700 uppercase tracking-wide">How it works</p>
                        <ol class="mt-2 text-sm text-gray-700 list-decimal list-inside space-y-1">
                            <li>Create a recurring class series once</li>
                            <li>Share the unique booking link on social media</li>
                            <li>Attendees self-register — no account needed</li>
                            <li>Email reminders go out automatically 24 hours before</li>
                        </ol>
                    </div>
                </div>

                <!-- Use Case 2: Dance Studios -->
                <div class="bg-white rounded-2xl shadow-md p-8">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg aria-hidden="true" class="w-7 h-7 text-indigo-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2zm0 0V9a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v10m-6 0a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2m0 0V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Dance Studios</h2>
                            <p class="text-sm text-gray-500">Ballet &middot; Tap &middot; Modern</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">James runs a dance school with classes for
                        children and adults. He uses EventAgile to manage term-based courses, process registrations,
                        and communicate with parents via automated emails.</p>
                    <div class="bg-indigo-50 rounded-lg p-4">
                        <p class="text-xs font-semibold text-indigo-700 uppercase tracking-wide">How it works</p>
                        <ol class="mt-2 text-sm text-gray-700 list-decimal list-inside space-y-1">
                            <li>Set up a term as a multi-session course</li>
                            <li>Enable guest check-in at the studio door</li>
                            <li>Send term updates and reminders to all parents</li>
                            <li>Track attendance and view reports per class</li>
                        </ol>
                    </div>
                </div>

                <!-- Use Case 3: Art Class Management -->
                <div class="bg-white rounded-2xl shadow-md p-8">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg aria-hidden="true" class="w-7 h-7 text-indigo-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21a4 4 0 0 1-4-4V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v12a4 4 0 0 1-4 4zm0 0h12a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 0 1 2.828 0l2.829 2.829a2 2 0 0 1 0 2.828l-8.486 8.485M7 17h.01" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Art & Craft Classes</h2>
                            <p class="text-sm text-gray-500">Pottery &middot; Painting &middot; Workshops</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">Local artist Priya sells places on her
                        weekend pottery workshops. EventAgile handles ticket sales, capacity limits, and waitlists so
                        she never oversells a workshop.</p>
                    <div class="bg-indigo-50 rounded-lg p-4">
                        <p class="text-xs font-semibold text-indigo-700 uppercase tracking-wide">How it works</p>
                        <ol class="mt-2 text-sm text-gray-700 list-decimal list-inside space-y-1">
                            <li>Create a one-off workshop with a fixed price</li>
                            <li>Set max capacity — waitlist activates automatically</li>
                            <li>Collect payment at booking (Stripe integration)</li>
                            <li>Export attendee list for workshop materials prep</li>
                        </ol>
                    </div>
                </div>

                <!-- Use Case 4: Birthday Parties -->
                <div class="bg-white rounded-2xl shadow-md p-8">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg aria-hidden="true" class="w-7 h-7 text-indigo-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 0 1-3 0 2.704 2.704 0 0 0-3 0 2.704 2.704 0 0 1-3 0 2.704 2.704 0 0 0-3 0 2.704 2.704 0 0 1-3 0A2.701 2.701 0 0 0 3 15.546V5.5a2.5 2.5 0 0 1 2.5-2.5h13a2.5 2.5 0 0 1 2.5 2.5v10.046z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Birthday Party Invitations</h2>
                            <p class="text-sm text-gray-500">Kids &middot; Adults &middot; Private Events</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">Parents use EventAgile to send digital
                        invitations, collect RSVPs, and manage guest lists for birthday parties. No more chasing
                        replies — everything is tracked automatically.</p>
                    <div class="bg-indigo-50 rounded-lg p-4">
                        <p class="text-xs font-semibold text-indigo-700 uppercase tracking-wide">How it works</p>
                        <ol class="mt-2 text-sm text-gray-700 list-decimal list-inside space-y-1">
                            <li>Create a private event with invitation-only access</li>
                            <li>Share the booking link with invited guests only</li>
                            <li>Guests RSVP with dietary requirements or plus-ones</li>
                            <li>Track who's coming in real time from the dashboard</li>
                        </ol>
                    </div>
                </div>

                <!-- Use Case 5: Gymnastics Clubs -->
                <div class="bg-white rounded-2xl shadow-md p-8">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg aria-hidden="true" class="w-7 h-7 text-indigo-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Gymnastics Clubs</h2>
                            <p class="text-sm text-gray-500">Recreational &middot; Competitive</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">A gymnastics club with 200+ members
                        manages multiple class levels, holiday camps, and competitive team tryouts — all from a
                        single EventAgile account.</p>
                    <div class="bg-indigo-50 rounded-lg p-4">
                        <p class="text-xs font-semibold text-indigo-700 uppercase tracking-wide">How it works</p>
                        <ol class="mt-2 text-sm text-gray-700 list-decimal list-inside space-y-1">
                            <li>Create separate event pages for each class level</li>
                            <li>Set recurring weekly schedules for term-long classes</li>
                            <li>Members book their regular slots in advance</li>
                            <li>Waitlist fills cancellations automatically</li>
                        </ol>
                    </div>
                </div>

                <!-- Use Case 6: Charity Organisations -->
                <div class="bg-white rounded-2xl shadow-md p-8">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg aria-hidden="true" class="w-7 h-7 text-indigo-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 0 0 0 6.364L12 20.364l7.682-7.682a4.5 4.5 0 0 0-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 0 0-6.364 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Charity Organisations</h2>
                            <p class="text-sm text-gray-500">Fundraisers &middot; Community Events</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">Community charities organise fundraising
                        galas, volunteer days, and awareness workshops. EventAgile's free Starter plan helps them keep
                        costs low while managing attendees efficiently.</p>
                    <div class="bg-indigo-50 rounded-lg p-4">
                        <p class="text-xs font-semibold text-indigo-700 uppercase tracking-wide">How it works</p>
                        <ol class="mt-2 text-sm text-gray-700 list-decimal list-inside space-y-1">
                            <li>Create a free fundraising event page</li>
                            <li>Collect donations alongside registrations</li>
                            <li>Send thank-you emails automatically after the event</li>
                            <li>Download attendee data for donor follow-ups</li>
                        </ol>
                    </div>
                </div>

                <!-- Use Case 7: General Course Booking -->
                <div class="bg-white rounded-2xl shadow-md p-8">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg aria-hidden="true" class="w-7 h-7 text-indigo-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">General Course Booking</h2>
                            <p class="text-sm text-gray-500">Workshops &middot; Seminars &middot; Classes</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">Instructors teaching anything from
                        photography to languages use EventAgile to publish courses, accept payments, and communicate
                        with students — all in one place.</p>
                    <div class="bg-indigo-50 rounded-lg p-4">
                        <p class="text-xs font-semibold text-indigo-700 uppercase tracking-wide">How it works</p>
                        <ol class="mt-2 text-sm text-gray-700 list-decimal list-inside space-y-1">
                            <li>Create a course with multiple dates or sessions</li>
                            <li>Set pricing per session or for the full course</li>
                            <li>Students browse available dates and book online</li>
                            <li>Send course materials and updates before each session</li>
                        </ol>
                    </div>
                </div>

                <!-- Use Case 8: Wedding Day Management -->
                <div class="bg-white rounded-2xl shadow-md p-8">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg aria-hidden="true" class="w-7 h-7 text-indigo-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 0 0 0 6.364L12 20.364l7.682-7.682a4.5 4.5 0 0 0-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 0 0-6.364 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Wedding Day Management</h2>
                            <p class="text-sm text-gray-500">RSVPs &middot; Guest Lists &middot; Schedules</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">Wedding planners use EventAgile to create
                        private event pages for couples, manage guest RSVPs with meal preferences, and coordinate
                        the wedding day timeline with vendors.</p>
                    <div class="bg-indigo-50 rounded-lg p-4">
                        <p class="text-xs font-semibold text-indigo-700 uppercase tracking-wide">How it works</p>
                        <ol class="mt-2 text-sm text-gray-700 list-decimal list-inside space-y-1">
                            <li>Create a private wedding event page</li>
                            <li>Send invitation links to guests with plus-one options</li>
                            <li>Collect meal preferences and dietary requirements</li>
                            <li>Export final guest list and share with vendors</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-indigo-600">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">Ready to Create Your Own Success Story?</h2>
            <p class="text-base text-indigo-100 leading-relaxed mb-8">Start your free trial today and see how
                EventAgile can transform the way you manage events.</p>
            <a href="contact.html"
                class="inline-block bg-white text-indigo-600 font-semibold px-6 py-3 rounded-lg hover:bg-indigo-50 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-white min-h-[44px]">Get
                Started Free</a>
        </div>
    </section>

</main>