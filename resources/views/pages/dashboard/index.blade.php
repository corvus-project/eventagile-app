<?php

use App\Enums\EventStatus;
use App\Models\Event;
use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

new #[Layout('layouts.admin')]  class extends Component
{
    use WithPagination;
    use Toast;
    public $account;

    public function mount()
    {
        $this->account = auth()->user()->account;
    }

    #[Computed]
    public function events()
    {
        return Event::query()
            ->where('organizer_id', auth()->user()->id)
            ->paginate();
    }


    public function show(int $id)
    {
        $slug = Event::findOrFail($id);
        return redirect()->route('events.show', ['event' => $slug]);
    }
};
?>

<x-slot name="title">
    {{ __('Dashboard') }}
</x-slot>

<x-slot name="header">
    <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="flex flex-col flex-1">
    <div class="flex flex-col  flex-1 pb-5 mx-auto  w-full">
        <div class="relative flex-1 w-full ">
            <div class="flex justify-between items-center w-full bg-pink- overflow-hidden border border-dashed bg-gradient-to-br from-white to-zinc-50 rounded-lg border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800">
                <div class="flex relative flex-col p-10 h-full w-full">
                    <div class="flex items-center pb-5 mb-5 space-x-1.5 text-lg font-bold text-gray-800 uppercase border-b border-dotted border-zinc-200 dark:border-gray-800 dark:text-gray-200">
                        Welcome to Admin Dashboard
                    </div>

                    <div class="pb-5">
                        <div class="mx-auto space-y-6">
                            <x-card shadow>

                                @if($this->events && $this->events->count() > 0)

                                @foreach($this->events as $event)
                                <div class="p-4 bg-white rounded-lg shadow mt-8  dark:bg-gray-800 dark:border dark:border-gray-200/10">

                                    <a href="{{ route('dashboard.events.show', $event->slug) }}" class="text-blue-600 hover:underline">
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

                                @else
                                <div class="text-center text-gray-500 dark:text-gray-400">
                                    No events found.
                                </div>
                                @endif
                            </x-card>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>