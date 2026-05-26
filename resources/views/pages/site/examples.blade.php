<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Example Usage' }}
</x-slot>

<div class="pb-5">
    <section class="py-10">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="mb-14 text-center">
                <h2 class="text-4xl text-center font-bold text-gray-900 py-5">where and how you can put it to use</h2>
                <p class="text-lg font-normal text-gray-500 max-w-12xl md:max-w-12xl mx-auto">
                    EventAgile is the fast, simple, and reliable event management tool designed to cover all your small-scale scheduling needs. Whether you are
                    a freelance fitness instructor organizing your weekly online classes, the leader of a community book club managing private monthly meetings,
                    a small non-profit collecting sign-ups for a local workshop, or a corporate team manager scheduling internal training sessions, EventAgile
                    provides a clean, stress-free platform to create events, manage all registrations, and keep your attendees fully informed. Use it for
                    anything that needs a simple, professional sign-up system.
                </p>
            </div>
        </div>
    </section>
    <section class="py-2">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="mb-10 lg:mb-16 flex justify-center items-center flex-col gap-x-0 gap-y-6 lg:gap-y-0 lg:flex-row lg:justify-between max-md:max-w-lg max-md:mx-auto">
                <div class="relative w-full text-center lg:text-left lg:w-2/5">
                    <img src="/assets/images/birthday-invitation.png" alt="Manage birthday party invitations" class="mx-auto rounded-md w-full" />
                </div>
                <div class="relative w-full text-center lg:text-left lg:w-3/5 px-4">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Manage birthday party invitations</h2>
                    <p class="text-lg font-normal text-gray-500 mb-5">
                        You are planning a private 40th birthday celebration and need to manage the guest list discreetly. You use EventAgile to create the
                        event page, setting the party details and a realistic RSVP deadline. Because it's a private gathering, you set the event to
                        'Password-Protected,' choosing a simple password. You then copy the event link and the password and send them out with your digital
                        invitations. As RSVPs arrive, you track the Basic Reporting dashboard to see the total headcount in real-time. The night before the
                        party, you use the Export Registrations feature to download the final guest list to your phone for easy check-in at the door, ensuring
                        only confirmed guests attend. EventAgile ensures your focus remains on celebrating, not chasing RSVPs.
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
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Charity organisations</h2>

                    <p class="text-lg font-normal text-gray-500 mb-5">
                        Imagine your local community non-profit is organizing a small, free "Awareness & Volunteer Drive" event. You use EventAgile to quickly
                        create a public event page with the time, date, and a brief description of your mission. You set the capacity limit based on your venue
                        size. You then share the public event link across your social media channels and email newsletter to encourage sign-ups.
                    </p>

                    <p class="text-lg font-normal text-gray-500 mb-5">
                        As registrations come in, you monitor the Basic Reporting dashboard to track how close you are to capacity. For the final preparation,
                        you use the Export Registrations feature to download a complete list of attendees and volunteers, ensuring you have accurate counts for
                        seating, materials, and follow-up communications. EventAgile helps you maximize outreach with minimal administrative effort.
                    </p>
                </div>
                <div class="relative w-full text-center lg:text-left lg:w-2/5">
                    <img src="/assets/images/charity-event.jpg" alt="Power your events with EventAgile"
                        class="mx-auto rounded-md w-full p-1" />
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
                        src="/assets/images/wedding-party.jpg" alt="Power your events with EventAgile" class="mx-auto rounded-md w-full p-1" />
                </div>
                <div class="relative w-full text-center lg:text-left lg:w-4/6 px-4">
                    <h2 class="text-4xl font-bold text-gray-900 leading-[3.25rem] lg:mb-6 mx-auto max-w-max lg:max-w-md lg:mx-0">Manage your wedding day</h2>
                    <p class="text-lg font-normal text-gray-500 mb-5">
                        For your wedding, EventAgile provides a clean, secure solution to handle RSVPs and guest list management. Organizers create a single,
                        'Password-Protected' event page that acts as the digital RSVP form, sharing the private password only with invited guests via their
                        physical or digital invitations. The dashboard instantly updates with a live headcount as guests respond. For the final planning stages,
                        the organizer utilizes the Export Registrations feature to download the complete, final guest list into a spreadsheet. This file can
                        then be effortlessly used by the wedding planner to finalize seating charts, confirm catering numbers, and produce place cards.
                        EventAgile ensures guest tracking is seamless and stress-free, allowing the couple to focus entirely on their special day.
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
                        src="/assets/images/events-organization.jpg" alt="Power your events with EventAgile"
                        class="mx-auto rounded-md w-full" />
                </div>
                <div class="relative w-full text-center lg:text-left lg:w-3/5 p-2">
                    <h2 class="text-4xl font-bold text-gray-900 leading-[3.25rem] lg:mb-6 mx-auto max-w-max lg:max-w-md lg:mx-0">Special day events</h2>
                    <p class="text-lg font-normal text-gray-500 mb-5">
                        EventAgile is the go-to tool for any organizer needing quick, reliable, and straightforward registration. The process begins when the
                        organizer creates an event, quickly defining the title, description, and capacity. They then choose the event's visibility: Public for
                        maximum exposure, Unlisted for private sharing via a direct link, or Password-Protected for secure, exclusive access. Once the link is
                        shared, registrations flow in, and the organizer can monitor the Basic Reporting dashboard for a real-time headcount and status update.
                        When ready for the event day, the organizer uses the Export Registrations feature to instantly download a comprehensive list of all
                        confirmed attendees. This seamless, agile workflow eliminates manual data entry, reduces administrative overhead, and ensures the
                        organizer always has accurate information at their fingertips.
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
                        src="/assets/images/waiting-list.jpg" alt="Power your events with EventAgile"
                        class="mx-auto rounded-md w-full mt-12" />
                </div>
                <div class="relative w-full text-center lg:text-left lg:w-4/6 px-4">
                    <h2 class="text-4xl font-bold text-gray-900 leading-[3.25rem] lg:mb-6 mx-auto max-w-max lg:max-w-md lg:mx-0">Manage waitlist guests</h2>
                    <p class="text-lg font-normal text-gray-500 mb-5">
                        The Waiting List feature transforms a "Sold Out" sign into a new opportunity, ensuring you never miss a potential attendee.
                    </p>
                    <p class="text-lg font-normal text-gray-500 mb-5">
                        Here's how it works:
                    <ul class="list-decimal px-4 mt-4 space-y-2 text-lg font-normal text-gray-500 mb-5">
                        <li>
                            Enabling the Waitlist: When setting up your event, the organizer simply sets the event's Maximum Capacity and then activates the
                            Waiting List toggle. Once the capacity limit is reached, the public registration button automatically changes to "Join Waiting
                            List."
                        </li>
                        <li>
                            Attendee Joins the Queue: Prospective attendees can still submit their contact details, and their registration is securely
                            logged with a "Waitlisted" status in the order they signed up.
                        </li>
                        <li>
                            Organizer Management: When an approved registrant cancels, or when the organizer increases the event capacity, a spot opens up.
                            The organizer views the Waiting List from their dashboard, which is sorted by the First-In, First-Out (FIFO) method.
                        </li>
                        <li>
                            Converting a Spot: The organizer can then manually select the top person on the list and take one of two actions:
                            <br />
                            - Directly Register the user (if the event is free). <br />
                            - Notify/Invite the user to complete their registration (if the event is paid or requires further action). <br />
                            <br />
                        </li>
                        <li>
                            Data for Future Events: The waiting list data can be exported and used as a highly engaged mailing list for future, similar
                            events, maximizing the organizer's marketing efforts.
                        </li>

                        This feature ensures the organizer has complete control over who fills the newly available spot, maintaining the integrity and
                        quality of their attendee list while capitalizing on high demand.
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </section>

</div>