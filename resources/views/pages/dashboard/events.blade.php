<?php

use App\Enums\EventStatus;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;

new #[Layout('layouts.admin')] class extends Component {

    use Toast;
    use WithPagination;

    public int $perPage = 10;
    public string $search = '';
    public array $sortBy = ['column' => 'start_time', 'direction' => 'desc'];

    protected array $queryString = [
        'search' => ['except' => ''],
    ];

    #[Computed()]
    public function events()
    {
        return DB::table('events')
            ->where('organizer_id', auth()->user()->id)
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('organizer', 'like', '%' . $this->search . '%')
                        ->orWhere('location', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->paginate($this->perPage);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function sortByColumn(string $column): void
    {
        if ($this->sortBy['column'] === $column) {
            $this->sortBy['direction'] = $this->sortBy['direction'] === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = ['column' => $column, 'direction' => 'asc'];
        }

        $this->resetPage();
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
                        <div class="p-4 space-y-4">
                            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                                <div class="w-full md:w-1/2">
                                    <x-ui.input
                                        id="search"
                                        type="search"
                                        wire:model.debounce.300ms="search"
                                        placeholder="Search events by title, organizer, or location"
                                        class="w-full" />
                                </div>
                                <div class="flex flex-wrap items-center gap-2 text-sm text-gray-600 dark:text-gray-300">
                                    <span class="font-medium">Sort by:</span>
                                    <button type="button" wire:click="sortByColumn('title')" class="btn-ghost btn-xs">Title</button>
                                    <button type="button" wire:click="sortByColumn('start_time')" class="btn-ghost btn-xs">Start date</button>
                                    <button type="button" wire:click="sortByColumn('location')" class="btn-ghost btn-xs">Location</button>
                                </div>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-900">
                                        <tr>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase cursor-pointer" wire:click="sortByColumn('title')">
                                                Title
                                                @if($sortBy['column'] === 'title')
                                                <span>{{ $sortBy['direction'] === 'asc' ? '↑' : '↓' }}</span>
                                                @endif
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase cursor-pointer" wire:click="sortByColumn('start_time')">
                                                Start date
                                                @if($sortBy['column'] === 'start_time')
                                                <span>{{ $sortBy['direction'] === 'asc' ? '↑' : '↓' }}</span>
                                                @endif
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase cursor-pointer" wire:click="sortByColumn('organizer')">
                                                Organizer
                                                @if($sortBy['column'] === 'organizer')
                                                <span>{{ $sortBy['direction'] === 'asc' ? '↑' : '↓' }}</span>
                                                @endif
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase cursor-pointer" wire:click="sortByColumn('location')">
                                                Location
                                                @if($sortBy['column'] === 'location')
                                                <span>{{ $sortBy['direction'] === 'asc' ? '↑' : '↓' }}</span>
                                                @endif
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase">Capacity</th>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        @foreach($this->events as $event)
                                        <tr>
                                            <td class="px-4 py-4">
                                                <a href="{{ route('dashboard.events.show', $event->slug) }}" class="font-medium text-blue-600 hover:underline">{{ $event->title }}</a>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-300">
                                                {{ \Carbon\Carbon::parse($event->start_time)->format('F j, Y H:i') }}
                                            </td>
                                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $event->organizer }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $event->location }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $event->capacity }}</td>

                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $this->events->links() }}
                            </div>

                        </div>
                    </x-card>

                </div>
            </div>
        </div>
    </div>
</div>