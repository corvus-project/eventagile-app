<?php


use function Laravel\Folio\{middleware, name};

use App\Models\Event;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Gate;

name('events.show');
middleware(['auth', 'verified', 'role:organizer']);
new class extends Component {

    public Event $event;

    public function mount(Event $event)
    {
        Gate::authorize('view-event', $event);
        $this->event = $event;
    }

    public function with(): array
    {
        return [
            'event' => $this->event,
        ];
    }
};
?>

<x-layouts.admin>

    <x-slot name="title">
        {{ __('Event Detail: ') . $event->title }}
    </x-slot>
 

    @volt('events.show')
    <div class="bg-white dark:bg-gray-800 shadow rounded p-6">

        <div class="flex justify-end mb-4">
            @can('view-event', $event)
            <x-ui.text-link href="{{ route('events.registrations', ['event' => $event->slug]) }}" class="dark:bg-gray-900/40 font-sans text-sm border-1 no-underline hover:underline bg-slate-50 border-red-600 border-solid  rounded-lg text-red-600 p-2 m-1">
                Registrations
            </x-ui.text-link>

            <x-ui.text-link href="{{ route('events.registrations.export', ['event' => $event->slug]) }}" class="dark:bg-gray-900/40 font-sans text-sm border-1 no-underline hover:underline bg-slate-50 border-red-600 border-solid  rounded-lg text-red-600 p-2 m-1">
                Export Registration List
            </x-ui.text-link>
            @endcan
            @can('update-event', $event)
            <x-ui.text-link href="{{ route('events.update', ['event' => $event->slug]) }}" class="dark:bg-gray-900/40 font-sans text-sm border-1 no-underline hover:underline bg-slate-50 border-red-600 border-solid  rounded-lg text-red-600 p-2 m-1">
                Update Event
            </x-ui.text-link>
            @endcan

        </div>

        <div class="mb-4">
            <strong>{{ __('Title:') }}</strong> {{ $event->title }}
        </div>
        <div class="mb-4">
            <strong>{{ __('Date:') }}</strong> {{ $event->start_time->format('F j, Y') }}
        </div>
        <div class="mb-4">
            <strong>{{ __('Registration Ends At:') }}</strong> {{ $event->registration_ends_at?->format('F j, Y') }}
        </div>
        <div class="mb-4">
            <strong>{{ __('Location:') }}</strong> {{ $event->location }}
        </div>
        <div class="mb-4">
            <strong>{{ __('Organizer:') }}</strong> {{ $event->organizer }}
        </div>
        <div class="mb-4">
            <strong>{{ __('Status:') }}</strong> {{ $event->status->value }}
        </div>
        <div class="mb-4">
            <strong>{{ __('Visiblity:') }}</strong> {{ $event->public_status }}
            @if($event->is_public == 0)
            <span class="bg-slate-200 p-2 font-italic">{{ $event->is_public == 0  ? 'Registration code: ' . $event->registration_code : '' }}</span>
            @endif
        </div>
        <div class="mb-4">
            <strong>{{ __('Description:') }}</strong>
            <p>{{ $event->description }}</p>
        </div>
        <div class="mb-4">
            <strong>{{ __('Registration Link:') }}</strong>
            <p class="text-gray-600 dark:text-gray-400">
                <x-ui.link href="{{ route('event.registration', ['event' => $event->slug]) }}" class="text-blue-600 hover:underline">
                    {{ route('event.registration', ['event' => $event->slug]) }}
                </x-ui.link>
            </p>
        </div>


    </div>
    @endvolt

</x-layouts.admin>