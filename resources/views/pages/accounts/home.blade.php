<?php

use App\Models\Event;
use App\Models\Tenant;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

new #[Layout('layouts.frontend')]  class extends Component
{
    use WithPagination;

    public function mount() {}

    #[Computed]
    public function events()
    {
        return Event::paginate();
    }
}
?>
<x-slot name="title">
    {{ tenant('name') }} - Home
</x-slot>
<x-slot name="header">
    <h2 class="text-3xl font-semibold leading-tight text-gray-800 dark:text-gray-200">

    </h2>
</x-slot>
<div class="pb-5">
    <div class="mx-auto space-y-6">

        <h2 class="text-3xl">Welcome to {{ tenant('name') }}</h2>

        @foreach($this->events as $event)
        <div class="p-4 bg-white rounded-lg shadow mt-8  dark:bg-gray-800 dark:border dark:border-gray-200/10">

            <a href="{{ route('tenant.event.view', $event) }}" class="block">
                <h4 class="text-lg font-semibold">{{ $event->title }}</h4>
            </a>
            <p class="text-sm text-gray-600">
                Date: {{ $event->start_time->format('F j, Y H:i') }}
                Please register until {{ $event->registration_ends_at ? $event->registration_ends_at->format('F j, Y H:i') : 'N/A' }}.
            </p>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                <x-icon name="o-envelope" /> Organizer: {{ $event->organizer }}
                <x-icon name="o-map-pin" /> Location: {{ $event->location }}
                <x-icon name="o-users" /> Capacity: {{ $event->capacity }}
            </p>
            <blockquote class="mt-2">{{ $event->description }}</blockquote>
        </div>
        @endforeach

        <div class="mt-4 flex justify-end-safe gap-1">
            {{ $this->events->links() }}
        </div>
    </div>
</div>