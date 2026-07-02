<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Features' }}
</x-slot>
<!-- Main content -->
<main id="main-content" tabindex="-1">

    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 leading-tight">
                Powerful Features for Event Management
            </h1>
            <p class="text-base text-gray-600 leading-relaxed mt-4 max-w-2xl mx-auto">
                Tired of rigid registration forms? Our intuitive tools give you complete control. Easily create simple sign-ups or detailed, multi-event
                registration flows—designed exactly the way you want.
            </p>
        </div>
    </section>

    <!-- Page Header -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-blue-50">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <div class="text-center group">
                    <div
                        class="bg-indigo-50 rounded-lg flex justify-center items-center mb-5 w-20 h-20 mx-auto cursor-pointer transition-all duration-500 group-hover:bg-indigo-600">
                        <svg
                            class="stroke-indigo-600 transition-all duration-500 group-hover:stroke-white"
                            width="30"
                            height="30"
                            viewBox="0 0 30 30"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 27.5L15 25M15 25V21.25M15 25L20 27.5M8.75 14.375L12.5998 11.0064C13.1943 10.4862 14.1163 10.6411 14.5083 11.327L15.4917 13.048C15.8837 13.7339 16.8057 13.8888 17.4002 13.3686L21.25 10M2.5 2.5H27.5M26.25 2.5V13.25C26.25 17.0212 26.25 18.9069 25.0784 20.0784C23.9069 21.25 22.0212 21.25 18.25 21.25H11.75C7.97876 21.25 6.09315 21.25 4.92157 20.0784C3.75 18.9069 3.75 17.0212 3.75 13.25V2.5"
                                stroke=""
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-medium text-gray-900 mb-3 capitalize">Simple Registration System</h4>
                    <p class="text-sm font-normal text-gray-500">
                        This system is designed to remove friction, increase sign-up rates, and eliminate the need for attendees to create an account, making
                        the experience fast and hassle-free for everyone.
                    </p>
                </div>

                <div class="text-center group">
                    <div
                        class="bg-teal-50 rounded-lg flex justify-center items-center mb-5 w-20 h-20 mx-auto cursor-pointer transition-all duration-500 group-hover:bg-teal-600">
                        <svg
                            class="stroke-teal-600 transition-all duration-500 group-hover:stroke-white"
                            width="30"
                            height="30"
                            viewBox="0 0 30 30"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.75 26.25H26.25M6.25 22.875C4.86929 22.875 3.75 21.8676 3.75 20.625V12.75C3.75 11.5074 4.86929 10.5 6.25 10.5C7.63071 10.5 8.75 11.5074 8.75 12.75V20.625C8.75 21.8676 7.63071 22.875 6.25 22.875ZM15 22.875C13.6193 22.875 12.5 21.8676 12.5 20.625V9.375C12.5 8.13236 13.6193 7.125 15 7.125C16.3807 7.125 17.5 8.13236 17.5 9.375V20.625C17.5 21.8676 16.3807 22.875 15 22.875ZM23.75 22.875C22.3693 22.875 21.25 21.8676 21.25 20.625V6C21.25 4.75736 22.3693 3.75 23.75 3.75C25.1307 3.75 26.25 4.75736 26.25 6V20.625C26.25 21.8676 25.1307 22.875 23.75 22.875Z"
                                stroke=""
                                stroke-width="2"
                                stroke-linecap="round"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-medium text-gray-900 mb-3 capitalize">Basic Reporting</h4>
                    <p class="text-sm font-normal text-gray-500">
                        These simple metrics empower users to quickly evaluate their event's popularity and make informed decisions without needing complex
                        analytics dashboards.
                    </p>
                </div>
                <div class="text-center group">
                    <div
                        class="bg-orange-50 rounded-lg flex justify-center items-center mb-5 w-20 h-20 mx-auto cursor-pointer transition-all duration-500 group-hover:bg-orange-600">
                        <svg
                            class="stroke-orange-600 transition-all duration-500 group-hover:stroke-white"
                            width="30"
                            height="30"
                            viewBox="0 0 30 30"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.4167 12.0833V21.25M5.41667 21.25V20.8333C5.41667 19.262 5.41667 18.4763 5.90482 17.9882C6.39298 17.5 7.17865 17.5 8.75 17.5H22.0833C23.6547 17.5 24.4404 17.5 24.9285 17.9882C25.4167 18.4763 25.4167 19.262 25.4167 20.8333V21.25M15.4167 9.16667C13.8453 9.16667 13.0596 9.16667 12.5715 8.67851C12.0833 8.19036 12.0833 7.40468 12.0833 5.83333C12.0833 4.26198 12.0833 3.47631 12.5715 2.98816C13.0596 2.5 13.8453 2.5 15.4167 2.5C16.988 2.5 17.7737 2.5 18.2618 2.98816C18.75 3.47631 18.75 4.26198 18.75 5.83333C18.75 7.40468 18.75 8.19036 18.2618 8.67851C17.7737 9.16667 16.988 9.16667 15.4167 9.16667ZM7.08333 25.8333C7.08333 26.7538 6.33714 27.5 5.41667 27.5C4.49619 27.5 3.75 26.7538 3.75 25.8333C3.75 24.9129 4.49619 24.1667 5.41667 24.1667C6.33714 24.1667 7.08333 24.9129 7.08333 25.8333ZM17.0833 25.8333C17.0833 26.7538 16.3371 27.5 15.4167 27.5C14.4962 27.5 13.75 26.7538 13.75 25.8333C13.75 24.9129 14.4962 24.1667 15.4167 24.1667C16.3371 24.1667 17.0833 24.9129 17.0833 25.8333ZM27.0833 25.8333C27.0833 26.7538 26.3371 27.5 25.4167 27.5C24.4962 27.5 23.75 26.7538 23.75 25.8333C23.75 24.9129 24.4962 24.1667 25.4167 24.1667C26.3371 24.1667 27.0833 24.9129 27.0833 25.8333Z"
                                stroke=""
                                stroke-width="2"
                                stroke-linecap="round"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-medium text-gray-900 mb-3 capitalize">Always Up-to-Date</h4>
                    <p class="text-sm font-normal text-gray-500">
                        As a SaaS solution, the system is continuously maintained and hosted on our servers, which means users always have access to the latest
                        version of the software.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="mb-10 lg:mb-16 flex justify-center items-center flex-col gap-x-0 gap-y-6 lg:gap-y-0 lg:flex-row lg:justify-between max-md:max-w-lg max-md:mx-auto">
                <div class="relative w-full text-center lg:text-left lg:w-2/4">
                    <h2 class="text-4xl font-bold text-gray-900 leading-[3.25rem] lg:mb-6 mx-auto max-w-max lg:max-w-md lg:mx-0">
                        None-profite and small business friendly
                    </h2>
                </div>
                <div class="relative w-full text-center lg:text-left lg:w-2/4">
                    <p class="text-lg font-normal text-gray-500 mb-5">
                        Our platform offers fully customizable and intuitive event registration tools. Easily build registration forms that are either simple
                        and straightforward or complex and detailed. Streamline the process for attendees by managing multiple events within a single, seamless
                        registration flow.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Grid -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Feature 1: Smart Event Builder -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zm6-7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 0v3" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Smart Event Builder</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Create and publish events in minutes with our
                        step-by-step builder. Add dates, times, location, capacity, and pricing — all from one
                        simple form.</p>
                </div>

                <!-- Feature 2: Recurring Schedule Support -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 0 0 4.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 0 1-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Recurring Schedule Support</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Create weekly or monthly class series in one
                        go. Attendees can book the full series or individual sessions, and all instances update
                        automatically.</p>
                </div>

                <!-- Feature 3: Online Booking Engine -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7A1 1 0 0 0 6.54 17H17m-10 0a2 2 0 1 0 4 0m6 0a2 2 0 1 0 4 0" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Online Booking Engine</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Let customers book their spot online, 24/7,
                        from any device. Each event gets a unique booking page that you can share via link, email,
                        or social media.</p>
                </div>

                <!-- Feature 4: Guest Self-Registration -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM3 20a6 6 0 0 1 12 0v1H3v-1z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Guest Self-Registration</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Attendees can register without creating an
                        account. Just share the booking link and they can sign up in seconds — perfect for lowering
                        friction and increasing conversions.</p>
                </div>

                <!-- Feature 5: Waitlist Management -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Waitlist Management</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">When an event reaches capacity, new registrants
                        are automatically added to a waitlist. If a spot opens up, they get notified instantly.</p>
                </div>

                <!-- Feature 6: Automated Email Reminders -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Automated Email Reminders</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Send automatic confirmation and reminder emails
                        so attendees never miss a session. Customise the schedule and messaging to match your brand.
                    </p>
                </div>

                <!-- Feature 7: SMS Notifications -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 18h.01M8 21h8a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">SMS Notifications</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Reach attendees where they are with optional
                        SMS reminders and alerts. Perfect for last-minute updates or urgent schedule changes.</p>
                </div>

                <!-- Feature 8: Attendee Dashboard -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2zm0 0V9a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v10m-6 0a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2m0 0V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Attendee Dashboard</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Track registrations, manage waitlists, and view
                        attendance in real time. Export attendee lists, send bulk messages, and check in guests at
                        the door.</p>
                </div>

                <!-- Feature 9: Revenue & Analytics Reports -->
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                        <svg aria-hidden="true" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2zm0 0V9a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v10m-6 0a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2m0 0V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Revenue & Analytics Reports</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Understand your business with detailed reports
                        on bookings, revenue, attendance trends, and customer demographics. Make data-driven
                        decisions to grow.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-indigo-600">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">Ready to Try These Features?</h2>
            <p class="text-base text-indigo-100 leading-relaxed mb-8">Start your free trial today — no credit card
                required. Set up your first event in minutes.</p>
            <a href="{{ route('signup') }}"
                class="inline-block bg-white text-indigo-600 font-semibold px-6 py-3 rounded-lg hover:bg-indigo-50 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-white min-h-[44px]">Get
                Started Free</a>
        </div>
    </section>

</main>