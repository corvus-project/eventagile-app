<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Demo' }}
</x-slot>

<div class="pb-5">
    <section class="py-10">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="mb-14 text-center">
                <h2 class="text-4xl text-center font-bold text-gray-900 py-5">How EventAgile Can Help You?</h2>
                <p class="text-lg font-normal text-gray-500 max-w-12xl md:max-w-12xl mx-auto">
                    Here it's a full working demo. The demo data is refreshing with random dataset daily. You can create your own event and test the features. The demo is open to everyone,
                    so you can share the link with your friends and colleagues. We hope you enjoy using EventAgile and find it useful for your events.
                    If you have any questions or feedback, please don't hesitate to contact us. We are always happy to hear from our users and improve our product.
                </p>

                <p class="text-lg font-normal text-gray-500 max-w-12xl md:max-w-12xl mx-auto my-5">
                    <x-button label="Visit sample event site" link="https://acme.eventagile.com/" class="btn-info btn-md m-3" icon="o-arrow-right-circle" tooltip="Visit sample event site" />
                    <x-button label="Manage the event site" link="https://acme.eventagile.com/dashboard" class="btn-success btn-md m-3" icon="o-cog-8-tooth" tooltip="Manage sample event site" />
                    <br />

                    Login: acme@example.com |

                    Password: password
                </p>
            </div>
        </div>
    </section>
    <section class="py-2">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="mb-10 lg:mb-16 flex justify-center items-center flex-col gap-x-0 gap-y-6 lg:gap-y-0 lg:flex-row lg:justify-between max-md:max-w-lg max-md:mx-auto">
                <div class="relative w-full text-center lg:text-left lg:w-2/5">
                    <img
                        class="mx-auto rounded-md w-full"
                        src="./assets/images/event-agile-dashboard.png"
                        alt="Power your events with EventAgile" />
                </div>
                <div class="relative w-full text-center lg:text-left lg:w-3/5 px-4">
                    <h2 class="text-4xl font-bold text-gray-900 mb-2">Comfortable dashboard</h2>
                    <p class="text-lg font-normal text-gray-500 mb-5">
                        A snapshot of the EventAgile dashboard, showcasing its clean and intuitive interface.
                        The dashboard provides a comprehensive overview of all your events, with key metrics and insights displayed prominently.
                        From here, you can easily navigate to manage your events, view registrations, and access powerful reporting features.
                        The design is focused on usability, ensuring that event organizers can quickly find the information they need and take action without any hassle. Whether you're tracking attendance, monitoring registration trends, or exporting data for analysis, the EventAgile dashboard is your central hub for all things event management.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-2">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="mb-10 lg:mb-16 flex justify-center items-center flex-col gap-x-0 gap-y-6 lg:gap-y-0 lg:flex-row lg:justify-between max-md:max-w-lg max-md:mx-auto">
                <div class="relative w-full text-center lg:text-left lg:w-3/5">
                    <h2 class="text-4xl font-bold text-gray-900 leading-[3.25rem] mb-2">Advanced event managements</h2>

                    <p class="text-lg font-normal text-gray-500 mb-5">
                        For your community fundraiser, you create a new event in EventAgile, setting the title, description, and a realistic capacity based on your venue size.
                        You choose the "Public" visibility option to maximize outreach and share the event link across social media and local community boards.

                        The dashboard provides real-time insights into registration trends, allowing you to adjust your marketing efforts as needed.
                        For the final preparation, you use the Export Registrations feature to download a complete list of attendees and volunteers, ensuring you have accurate counts for seating arrangements, materials preparation, and follow-up communications.

                        With EventAgile's streamlined workflow, you can focus on making your event a success while effortlessly managing all the logistics behind the scenes.
                    </p>


                </div>
                <div class="relative w-full text-center lg:text-left lg:w-2/5">
                    <img
                        class="mx-auto rounded-md w-full"
                        src="./assets/images/event-agile-events.png"
                        alt="Power your events with EventAgile" />
                </div>
            </div>
        </div>
    </section>

    <section class="py-2">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="mb-10 lg:mb-16 flex justify-center items-center flex-col gap-x-0 gap-y-6 lg:gap-y-0 lg:flex-row lg:justify-between max-md:max-w-lg max-md:mx-auto">
                <div class="relative w-full text-center lg:text-left lg:w-2/6">
                    <img
                        class="mx-auto rounded-md w-full"
                        src="./assets/images/event-agile-detail.png"
                        alt="Power your events with EventAgile" />
                </div>
                <div class="relative w-full text-center lg:text-left lg:w-4/6 px-4">
                    <h2 class="text-4xl font-bold text-gray-900 mb-2">Detailed event page</h2>
                    <p class="text-lg font-normal text-gray-500 mb-5">
                        The Event Detail page is designed to provide attendees with all the information they need about your event in a clear and engaging way.
                        It features a clean layout that highlights the event title, date, time, and location at the top, making it easy for visitors to quickly grasp the essential details.


                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-2">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="mb-10 lg:mb-16 flex justify-center items-center flex-col gap-x-0 gap-y-6 lg:gap-y-0 lg:flex-row lg:justify-between max-md:max-w-lg max-md:mx-auto">
                <div class="relative w-full text-center lg:text-left lg:w-2/5">
                    <img
                        class="mx-auto rounded-md w-full"
                        src="./assets/images/event-agile-export.png"
                        alt="Power your events with EventAgile" />
                </div>
                <div class="relative w-full text-center lg:text-left lg:w-3/5 px-2">
                    <h2 class="text-4xl font-bold text-gray-900 leading-[3.25rem] lg:mb-6 mx-auto max-w-max lg:max-w-md lg:mx-0">Export registrations</h2>
                    <p class="text-lg font-normal text-gray-500 mb-5">
                        EventAgile allows you to easily export your event registrations in a convenient CSV format, making it simple to manage and analyze your attendee data.
                        With just a few clicks, you can download a comprehensive list of all registered attendees, including their names, contact information, registration status, and any custom fields you've set up for your event. This feature is perfect for organizing your guest list, sending follow-up communications, or importing the data into other tools for further analysis. Whether you're preparing for a small gathering or a large conference, EventAgile's export functionality ensures you have all the information you need at your fingertips to make your event a success.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-2">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="mb-10 lg:mb-16 flex justify-center items-center flex-col gap-x-0 gap-y-6 lg:gap-y-0 lg:flex-row lg:justify-between max-md:max-w-lg max-md:mx-auto">
                <div class="relative w-full text-center lg:text-left lg:w-2/6 self-start">
                    <img
                        class="mx-auto rounded-md w-full"
                        src="./assets/images/event-agile-list.png"
                        alt="Power your events with EventAgile" />
                </div>
                <div class="relative w-full text-center lg:text-left lg:w-4/6 px-4">
                    <h2 class="text-4xl font-bold text-gray-900mb-2">Manage registration and waitlist guests</h2>

                    <p class="text-lg font-normal text-gray-500 mb-5">
                        When your event reaches capacity, interested attendees can join the waiting list with a simple click. As spots become available due to cancellations or no-shows, EventAgile automatically promotes guests from the waiting list to the registered attendees list, sending them an instant notification about their new status. This seamless process not only maximizes your event's attendance but also keeps your audience engaged and informed, turning potential disappointments into opportunities for success.
                    </p>
                </div>
            </div>
        </div>
    </section>

</div>