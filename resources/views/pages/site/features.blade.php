<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Features' }}
</x-slot>

<div class="pb-5">
    <section class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-14 text-center">
                <h2 class="text-4xl text-center font-bold text-gray-900 py-5">Affordable Features</h2>
                <p class="text-lg font-normal text-gray-500 max-w-md md:max-w-2xl mx-auto">
                    Tired of rigid registration forms? Our intuitive tools give you complete control. Easily create simple sign-ups or detailed, multi-event
                    registration flows—designed exactly the way you want.
                </p>
            </div>
            <div
                class="flex justify-center items-center gap-x-5 gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-8">
                <div class="relative w-full text-center max-md:max-w-sm max-md:mx-auto group md:w-2/5 lg:w-1/4">
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

                <div class="relative w-full text-center max-md:max-w-sm max-md:mx-auto group md:w-2/5 lg:w-1/4">
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
                <div class="relative w-full text-center max-md:max-w-sm max-md:mx-auto group md:w-2/5 lg:w-1/4">
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
    <section class="py-24">
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
            <div
                class="flex justify-center items-center gap-x-5 gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-8">
                <div
                    class="group relative w-full bg-gray-100 rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 md:h-64 xl:p-7 xl:w-1/4 hover:bg-indigo-600">
                    <div class="bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.7222 11.6667V7.22225C24.7222 5.99495 23.7273 5 22.5 5H4.72222C3.49492 5 2.5 5.99492 2.5 7.22222V22.7778C2.5 24.0051 3.49492 25 4.72222 25H22.5C23.7273 25 24.7222 24.005 24.7222 22.7777V17.7778M20.8333 17.7778H25.2778C26.5051 17.7778 27.5 16.7829 27.5 15.5556V13.8889C27.5 12.6616 26.5051 11.6667 25.2778 11.6667H20.8333C19.606 11.6667 18.6111 12.6616 18.6111 13.8889V15.5556C18.6111 16.7829 19.606 17.7778 20.8333 17.7778Z"
                                stroke="#4F46E5"
                                stroke-width="2"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3 capitalize transition-all duration-500 group-hover:text-white">
                        Approve the registration
                    </h4>
                    <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 group-hover:text-white">
                        Approve registrations before attendees can participate in the event, ensuring that only eligible participants are allowed.
                    </p>
                </div>
                <div
                    class="group relative w-full bg-gray-100 rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 md:h-64 xl:p-7 xl:w-1/4 hover:bg-indigo-600">
                    <div class="bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.375 15.8571C16.1009 15.8571 17.5 14.458 17.5 12.7321C17.5 11.0062 16.1009 9.6071 14.375 9.6071C12.6491 9.6071 11.25 11.0062 11.25 12.7321C11.25 14.458 12.6491 15.8571 14.375 15.8571ZM14.375 15.8571V20.8571M3.75 13.2264V15.2343C3.75 17.6868 3.75 18.9131 4.27747 19.9685C4.80493 21.0239 5.78567 21.76 7.74715 23.2322L8.57248 23.8516C11.4626 26.0208 12.9077 27.1054 14.5753 27.1054C16.243 27.1054 17.688 26.0208 20.5782 23.8516L21.4035 23.2322C23.365 21.76 24.3457 21.0239 24.8732 19.9685C25.4006 18.9131 25.4006 17.6868 25.4006 15.2343V13.2264C25.4006 9.95932 25.4006 8.32576 24.546 7.05852C23.6913 5.79128 22.1768 5.17918 19.1477 3.95499L18.3223 3.62144C16.4724 2.87381 15.5475 2.5 14.5753 2.5C13.6032 2.5 12.6782 2.87381 10.8283 3.62144L10.003 3.95499C6.97389 5.17919 5.45934 5.79128 4.60467 7.05852C3.75 8.32576 3.75 9.95932 3.75 13.2264Z"
                                stroke="#4F46E5"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3 capitalize transition-all duration-500 group-hover:text-white">Custom Event page</h4>
                    <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 group-hover:text-white">
                        A dedicated page for each event, allowing you to showcase event details, schedules, and other relevant information in a user-friendly
                        format.
                    </p>
                </div>
                <div
                    class="group relative w-full bg-gray-100 rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 md:h-64 xl:p-7 xl:w-1/4 hover:bg-indigo-600">
                    <div class="bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.0067 10V15.6652C15.0067 16.0358 15.1712 16.3873 15.4556 16.6248L18.75 19.375M15 27.5C8.09644 27.5 2.5 21.9036 2.5 15C2.5 8.09644 8.09644 2.5 15 2.5C21.9036 2.5 27.5 8.09644 27.5 15C27.5 21.9036 21.9036 27.5 15 27.5Z"
                                stroke="#4F46E5"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3 capitalize transition-all duration-500 group-hover:text-white">Mobile Friendly</h4>
                    <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 group-hover:text-white">
                        Designed to be fully responsive, ensuring that users can easily navigate and register for events on their mobile devices without any
                        issues.
                    </p>
                </div>
                <div
                    class="group relative w-full bg-gray-100 rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 md:h-64 xl:p-7 xl:w-1/4 hover:bg-indigo-600">
                    <div class="bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 14.7875L13.0959 17.8834C13.3399 18.1274 13.7353 18.1275 13.9794 17.8838L20.625 11.25M15 27.5C8.09644 27.5 2.5 21.9036 2.5 15C2.5 8.09644 8.09644 2.5 15 2.5C21.9036 2.5 27.5 8.09644 27.5 15C27.5 21.9036 21.9036 27.5 15 27.5Z"
                                stroke="#4F46E5"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3 capitalize transition-all duration-500 group-hover:text-white">Archieving Events</h4>
                    <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 group-hover:text-white">
                        The ability to archive events allows you to keep a record of past events while keeping the current event list clean.
                    </p>
                </div>
            </div>
        </div>
    </section>

</div>