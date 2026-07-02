<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Alpha Release' }}
</x-slot>


<!-- Main content — sections 4.2–4.6 will be added here -->
<main id="main-content" tabindex="-1">
    <section class="relative overflow-hidden bg-gradient-to-br from-white via-slate-50 to-blue-50">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="grid items-center gap-16 lg:grid-cols-2 lg:grid-cols-[45%_55%]">

                <!-- Left -->
                <div>

                    <!-- Badge -->

                    <div class="inline-flex items-center rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-sm font-medium text-blue-600">
                        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9
                            8h10M5 21h14a2 2 0
                            002-2V7a2 2 0
                            00-2-2H5a2 2 0
                            00-2 2v12a2 2 0
                            002 2z" />
                        </svg>

                        All-in-One Event Management Platform

                    </div>

                    <h1 class="mt-8 text-5xl font-black tracking-tight leading-none text-slate-900 sm:text-6xl lg:text-7xl">

                        Event Management

                        <span class="block bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-blue-600">
                            Simplified.
                        </span>

                    </h1>
                    <p class="mt-6 max-w-xl text-lg leading-8 text-slate-600">
                        Create, promote, and manage events from one intuitive platform.
                        Accept registrations, sell tickets, track attendance, and engage
                        your audience—all without the complexity.
                    </p>

                    <div class="mt-10 flex flex-wrap gap-4">

                        <a href="{{ route('signup') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-6 py-3 font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700">
                            Start Free
                        </a>

                        <a href="{{ route('demo') }}"
                            class="border-2 inline-flex items-center justify-center rounded-xl border-slate-300 bg-white px-6 py-3 font-semibold text-slate-700 transition hover:bg-slate-50">
                            Test Online Demo
                        </a>

                    </div>

                    <div class="mt-6 flex flex-wrap gap-x-6 gap-y-3 text-sm text-slate-500">

                        <div class="flex items-center gap-2">
                            @svg('heroicon-o-check-circle','w-5 h-5 text-green-500')
                            Free forever
                        </div>

                        <div class="flex items-center gap-2">
                            @svg('heroicon-o-check-circle','w-5 h-5 text-green-500')
                            No credit card
                        </div>

                        <div class="flex items-center gap-2">
                            @svg('heroicon-o-check-circle','w-5 h-5 text-green-500')
                            Setup in minutes
                        </div>

                    </div>

                </div>

                <!-- Right -->
                <div class="relative mt-12 lg:mt-0">

                    <div class="absolute -inset-12 rounded-full bg-blue-200/40 blur-3xl"></div>

                    <img
                        src="/assets/images/dashboard.webp"
                        class="relative rounded-3xl border border-slate-200 shadow-[0_40px_120px_rgba(37,99,235,.18)]">

                </div>


            </div>


        </div>

    </section>

    <section class="bg-gray-50 py-16">
        <div class="mx-auto max-w-7xl px-6">

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

                <!-- Main Feature -->
                <div class="lg:col-span-8">
                    <div class="flex h-full items-start gap-6 rounded-2xl border border-gray-100 bg-white p-8 shadow-sm">

                        <!-- Icon -->
                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-blue-50">
                            @svg('mdi-web', 'w-8 h-8 text-blue-600')
                        </div>

                        <!-- Content -->
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">
                                Your Brand, Your Space
                            </h3>

                            <p class="mt-3 text-gray-600 leading-7">
                                Give every client their own branded event portal with a
                                dedicated subdomain. Customize colors, logos, and event
                                pages while keeping your business front and center.
                            </p>
                        </div>

                    </div>
                </div>

                <!-- URL Card -->
                <div class="lg:col-span-4">
                    <div class="flex h-full flex-col justify-center rounded-2xl border border-blue-100 bg-gradient-to-br from-blue-50 to-white p-8">

                        <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                            Example URL
                        </span>

                        <div class="mt-4 flex items-center gap-3 rounded-xl border border-blue-200 bg-white px-4 py-3 shadow-sm">
                            @svg('heroicon-o-lock-closed', 'w-5 h-5 text-blue-500')
                            <span class="font-medium text-gray-800">
                                yourbrand.eventagile.com
                            </span>
                        </div>

                        <p class="mt-4 text-sm text-gray-500">
                            Every organizer gets a unique branded event URL.
                        </p>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Key Features section (task 4.3) -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 text-center mb-12">Everything You Need to Run Great Events</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Card 1: Smart Event Builder -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zm6-7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 0v3" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Smart Event Builder</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Create and publish events in minutes with our step-by-step builder.</p>
                </div>

                <!-- Card 2: Online Booking Engine -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7A1 1 0 0 0 6.54 17H17m-10 0a2 2 0 1 0 4 0m6 0a2 2 0 1 0 4 0" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Online Booking Engine</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Let customers book their spot online, 24/7, from any device.</p>
                </div>

                <!-- Card 3: Automated Email Reminders -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Automated Email Reminders</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Send automatic confirmations and reminders so attendees never miss a session.</p>
                </div>

                <!-- Card 4: Attendee Dashboard -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2zm0 0V9a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v10m-6 0a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2m0 0V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Attendee Dashboard</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Track registrations, manage waitlists, and view attendance in real time.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Who It's For section (task 4.4) -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 text-center mb-12">Who It's For</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Fitness Studios -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Fitness Studios</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Perfect for yoga, pilates, and gym instructors who run regular classes and need simple online booking for their members.</p>
                </div>

                <!-- Dance Studios -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Dance Studios</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Manage weekly dance classes, recitals, and workshops with easy registration and automated reminders for students and parents.</p>
                </div>

                <!-- Art & Craft Classes -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Art &amp; Craft Classes</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Sell places on pottery, painting, or craft workshops with capacity controls and waitlist support built in.</p>
                </div>

                <!-- Sports Clubs -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Sports Clubs</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Handle gymnastics, tennis, and swimming club sessions with recurring schedules and real-time attendance tracking.</p>
                </div>

                <!-- Birthday Parties -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Birthday Parties</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Send invitations, collect RSVPs, and manage guest lists for birthday parties and private celebrations effortlessly.</p>
                </div>

                <!-- Charities & Community Groups -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Charities &amp; Community Groups</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Organise fundraising events, community workshops, and volunteer sessions with free-tier access available.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Social Proof section (task 4.5) -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 text-center mb-12">What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <blockquote class="bg-white rounded-2xl shadow-md p-8">
                    <p class="text-base text-gray-600 leading-relaxed italic">"EventAgile completely transformed how I manage my yoga classes. Booking used to take hours — now it's automatic."</p>
                    <footer class="mt-4">
                        <cite class="text-sm font-semibold text-gray-900 not-italic">Sarah M., Yoga Studio Owner</cite>
                    </footer>
                </blockquote>

                <blockquote class="bg-white rounded-2xl shadow-md p-8">
                    <p class="text-base text-gray-600 leading-relaxed italic">"We switched to EventAgile for our dance school last year and our no-show rate dropped by half thanks to the automated reminders."</p>
                    <footer class="mt-4">
                        <cite class="text-sm font-semibold text-gray-900 not-italic">James R., Dance Studio Director</cite>
                    </footer>
                </blockquote>

            </div>
        </div>
    </section>

    <!-- Secondary CTA Section (task 4.6) -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-indigo-600">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">Ready to Simplify Your Event Management?</h2>
            <p class="text-base text-indigo-100 leading-relaxed mb-8">Join hundreds of instructors, studios, and event organisers who use EventAgile to save time and grow their bookings.</p>
            <a href="contact.html" class="inline-block bg-white text-indigo-600 font-semibold px-6 py-3 rounded-lg hover:bg-indigo-50 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-white min-h-[44px]">Get Started Free</a>
        </div>
    </section>

</main>