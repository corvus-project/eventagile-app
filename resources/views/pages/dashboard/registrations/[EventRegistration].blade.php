<?php

use App\Enums\RegistrationStatus;
use App\Events\EventRegistrationUpdated;
use App\Models\Event;
use App\Models\EventRegistration;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

use Livewire\Volt\Component;
use function Laravel\Folio\{middleware, name};
use Mary\Traits\Toast;

name('events.registrations.show');
middleware(['auth', 'verified', 'role:admin,organizer']);
new class extends Component {

    use Toast;

    public EventRegistration $eventRegistration;

    public Event $event;

    public $status_options;

    public $status;

    public $notify = false;

    public $canNotify = false;

    public $eventRegistrationModal = false;

    public function mount(EventRegistration $eventRegistration)
    {
        Gate::authorize('view-event', $eventRegistration->event);
        $this->eventRegistration = $eventRegistration;
        $this->event = Event::findOrFail($eventRegistration->event_id);
        $this->status_options = RegistrationStatus::toCollection();
        $this->status = $eventRegistration->status->name;
        $user = auth()->user();
        $this->canNotify = $user->able('notify-event-registration');
    }

    public function with(): array
    {
        return [
            'eventRegistration' => $this->eventRegistration,
            'event' => $this->event
        ];
    }

    public function save()
    {
        $this->validate([
            'status' => 'required',
        ]);

        $this->eventRegistration->status = RegistrationStatus::fromName($this->status);
        $this->eventRegistration->save();

        $this->success('Registration updated successfully!');
        $this->eventRegistrationModal = false;
        Log::debug('Sending email to ' . $this->eventRegistration->email . ' with status ' . $this->eventRegistration->status->value . ' and notify ' . ($this->notify ? 'true' : 'false'));

        if ($this->notify && $this->canNotify) {
            EventRegistrationUpdated::dispatch($this->eventRegistration);
        }
    }
}
?>
<x-layouts.admin>

    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Registration Detail:')  }}
        </h2>
    </x-slot>



    @volt('eventRegistrations.show')

    <div class="mb-6">


        <x-slot name="title">
            Registrations for Event: {{ $event->title }}
        </x-slot>

        <div class="flex justify-end mb-4">
            <x-ui.text-link href="{{ route('events.show', ['event' => $event->slug]) }}" class="border-2 border-red-600 border-solid text-red-600 p-2 m-1">
                Visit back Event
            </x-ui.text-link>

            <x-ui.text-link href="{{ route('events.registrations', ['event' => $event->slug]) }}" class="border-2 border-red-600 border-solid text-red-600 p-2 m-1">
                Registration List
            </x-ui.text-link>



        </div>
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h3 class="text-md font-semibold text-gray-800 dark:text-gray-200 mb-4">Event Details</h3>
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Event Title</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $event->title }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Event Date</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $event->start_time->format('F j, Y') }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Location</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $event->location }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $event->status }}</dd>
                </div>
                <!-- Add more event fields as needed -->
            </dl>
        </div>
    </div>
    @endvolt
    @volt('eventRegistrations.event.show')
    <div class="mt-6">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h3 class="text-md font-semibold text-gray-800 dark:text-gray-200 mb-4">Registration Details</h3>
            <div class="flex justify-end mb-4">
                <x-button label="Update the registration" @click="$wire.eventRegistrationModal = true" class="border-2 border-red-600 border-solid text-red-600 p-2" />
            </div>
            <x-modal wire:model="eventRegistrationModal" title="Update Registration Status" subtitle="Update Registration Status">
                <x-form no-separator wire:submit="save">
                    <x-select label="Status" wire:model="status" :options="$status_options" />

                    @if($canNotify)
                    <x-checkbox label="" wire:model="notify" hint="Notify the user" />
                    @endif
                    <x-slot:actions>
                        <x-button label="Save" class="border-2 border-red-600 border-solid text-red-600 p-2" type="primary" submit="true" spinner="save" />
                    </x-slot:actions>
                </x-form>
            </x-modal>
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $eventRegistration->name }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $eventRegistration->email }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Registered At</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $eventRegistration->created_at->format('F j, Y H:i') }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $eventRegistration->status->value }}</dd>
                </div>
                <!-- Add more fields as needed -->
            </dl>
        </div>

    </div>
    @endvolt

</x-layouts.admin>