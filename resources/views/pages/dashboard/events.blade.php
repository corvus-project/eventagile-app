<?php

use App\Enums\EventStatus;
use App\Models\Event;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;

new #[Layout('layouts.admin')] class extends Component {

    use Toast;
    use WithPagination;

    #[Computed()]
    public function events()
    {
        return Event::query()
            ->where('organizer_id', auth()->user()->id)
            ->paginate();
    }


    public function delete(int $id)
    {
        FacadesGate::authorize('delete-event', Event::findOrFail($id));
        $product = Event::findOrFail($id);
        $product->delete();
        $this->toast('success', 'Product deleted successfully');
    }



    public function edit(int $id)
    {
        $slug = Event::findOrFail($id);
        return redirect()->route('events.update', ['event' => $slug]);
    }

    public function show(int $id)
    {
        $slug = Event::findOrFail($id);
        return redirect()->route('events.show', ['event' => $slug]);
    }

    public function registrations(int $id)
    {
        $slug = Event::findOrFail($id);
        return redirect()->route('events.registrations', ['event' => $slug]);
    }
};
?>
<x-slot name="title">
    {{ 'List all events' }}
</x-slot>

<div class="flex flex-col flex-1">
    <div class="flex flex-col  flex-1 pb-5 mx-auto  w-full">
        <div class="relative flex-1 w-full ">
            @can('create-event')
            <div class="flex justify-end mb-4">
                <x-ui.text-link href="{{ route('events.create') }}" class="btn-ghost btn-sm text-red-600">
                    <x-icon name="o-plus" />
                    Create Event
                </x-ui.text-link>
            </div>
            @endcan

            <div class="pb-5">
                <div class="mx-auto space-y-6">


                    <x-card shadow>
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

                    </x-card>


                </div>
            </div>
        </div>
    </div>
</div>