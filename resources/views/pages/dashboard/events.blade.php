<?php

use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

new #[Layout('layouts.admin')]  class extends Component
{
    use WithPagination;
    use Toast;
    public int $perPage = 10;
    public string $search = '';
    public array $sortBy = ['column' => 'start_time', 'direction' => 'desc'];

    public function mount() {}

    #[Computed]
    public function events()
    {
        return Event::query()
            ->when($this->search, function ($query) {
                $search = Str::lower($this->search);
                Log::debug('Searching events with query', ['search' => $search]);
                $query->where(function ($query) use ($search) {
                    $query->whereRaw('LOWER(title) LIKE ?', ['%' . $search . '%'])
                        ->orWhereRaw('LOWER(organizer) LIKE ?', ['%' . $search . '%'])
                        ->orWhereRaw('LOWER(location) LIKE ?', ['%' . $search . '%']);
                });
            })
            ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->paginate($this->perPage);
    }

    public function updatedSearch()
    {
        Log::debug('Search term updated', ['search' => $this->search]);

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

    public function show(int $id)
    {
        $slug = Event::findOrFail($id);
        return redirect()->route('events.show', ['event' => $slug]);
    }
};
?>

<x-slot name="title">
    {{ __('Events') }}
</x-slot>

<x-slot name="header">
    <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('Events') }}
    </h2>
</x-slot>

<div class="flex flex-col flex-1">
    <div class="flex flex-col  flex-1 pb-5 mx-auto  w-full">
        <div class="relative flex-1 w-full ">
            <div class="flex justify-between items-center w-full bg-pink- overflow-hidden border border-dashed bg-gradient-to-br from-white to-zinc-50 rounded-lg border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800">
                <div class="flex relative flex-col   h-full w-full">


                    <div class="mx-auto min-w-full">

                        <div class="shadow p-4 dark:bg-gray-800 sm:rounded-lg  bg-slate-50  rounded-lg dark:bg-gray-900/50 dark:border dark:border-gray-200/10">
                            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between ">
                                <div class="w-full md:w-1/2">
                                    <x-ui.input
                                        id="search"
                                        type="search"
                                        wire:model.live.debounce.300ms="search"
                                        placeholder="Search events by title, organizer, or location"
                                        class="w-full" />
                                </div>
                                <div class="flex flex-wrap items-center gap-2 text-sm text-gray-600 dark:text-gray-300">
                                    <span class="font-medium">Sort by:</span>
                                    <button type="button" wire:click="sortByColumn('title')" class="btn-ghost btn-xs">Title</button>
                                    <button type="button" wire:click="sortByColumn('start_time')" class="btn-ghost btn-xs">Start date</button>

                                </div>
                            </div>

                            <div class="overflow-x-auto ">
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
                                                Status
                                                @if($sortBy['column'] === 'status')
                                                <span>{{ $sortBy['direction'] === 'asc' ? '↑' : '↓' }}</span>
                                                @endif
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase">Capacity</th>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase">Registrations</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        @foreach($this->events as $event)
                                        <tr>
                                            <td class="px-4 py-4">
                                                <a href="{{ route('dashboard.events.update', $event->slug) }}" class="text-sm text-blue-600 hover:underline">{{ $event->title }}</a>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-300">
                                                {{ \Carbon\Carbon::parse($event->start_time)->format('F j, Y H:i') }}
                                            </td>
                                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $event->organizer }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $event->status }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $event->capacity }}</td>
                                            <td class="px-4 py-4 text-xs">
                                                <a href="{{ route('dashboard.events.registrations.show', $event->slug) }}" class="text-blue-600 no-underline  bg-blue-100 box-border border border-transparent hover:bg-brand-strong shadow-xs text-xs px-1.5 py-1.5 focus:outline-none">Registrations</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $this->events->links() }}
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>