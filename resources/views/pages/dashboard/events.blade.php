<?php

use App\Models\Event;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use function Laravel\Folio\{middleware, name};
use App\Traits\ClearsFilters;
use Illuminate\Support\Facades\Log;

name('events.index');
middleware(['auth', 'verified', 'role:organizer']);
new class extends Component {

    use Toast, ClearsFilters;
    use WithPagination;

    public string $search = '';

    public bool $drawer = false;
    public array $sortBy = ['column' => 'title', 'direction' => 'desc'];

    public int $perPage = 10;


    // Filter count
    public function filters()
    {
        $count = 0;

        if (!empty($this->search)) {
            $count++;
        }


        return $count;
    }

    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'title', 'label' => 'Title', 'class' => 'w-64'],
            ['key' => 'start_time_formatted', 'label' => 'Event Date', 'class' => 'w-32'],
            ['key' => 'registrations_count', 'label' => 'Registrations', 'class' => 'w-16'],
            ['key' => 'status', 'label' => 'Status', 'class' => 'w-24'],
            ['key' => 'public_status', 'label' => 'Public', 'class' => 'w-16'],
        ];
    }

    public function events()
    {
        $user = auth()->user();;
        return Event::query()
            ->withCount('registrations')
            ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->where('organizer_id', $user->id)
            ->when($this->search, function () {
                return Event::where(fn($query) => $query->where('title', 'like', $this->search . '%')->orWhere('organizer', 'like', $this->search . '%'));
            })


            ->paginate($this->perPage);
    }


    public function with(): array
    {
        return [
            'events' => $this->events(),
            'headers' => $this->headers(),
            'filters' => $this->filters(),
        ];
    }

    public function delete(int $id)
    {
        FacadesGate::authorize('delete-event', Event::findOrFail($id));
        $event = Event::findOrFail($id);
        $event->delete();
        $this->toast('success', 'Event deleted successfully');
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
<x-layouts.admin>

    <x-slot name="title">
        {{ 'List all events' }}
    </x-slot>

    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Events') }}
        </h2>
    </x-slot>


    @volt('events.index')
    <div class="flex flex-col flex-1">
        <div class="flex flex-col  flex-1 pb-5 mx-auto  w-full">
            <div class="relative flex-1 w-full ">
                <div class="flex justify-between items-center w-full bg-pink- overflow-hidden border border-dashed bg-gradient-to-br from-white to-zinc-50 rounded-lg border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800">
                    <div class="flex relative flex-col p-10 h-full w-full">
                        <div class="flex items-center pb-5 mb-5 space-x-1.5 text-lg font-bold text-gray-800 uppercase border-b border-dotted border-zinc-200 dark:border-gray-800 dark:text-gray-200">
                            Your events
                        </div>

                        <div class="pb-5">
                            <div class="mx-auto space-y-6">
                                <x-card shadow>
                                    @if($events && $events->count())
                                    <x-table :headers="$headers" :rows="$events" :sort-by="$sortBy" with-pagination
                                        with-pagination
                                        per-page="perPage"
                                        :per-page-values="[3, 5, 10]">
                                        @scope('actions', $event)
                                        <div class="flex space-x-2">

                                            @can('update-event', $event)
                                            <x-button wire:click="edit({{ $event['id'] }})" class="btn-ghost btn-sm text-red-600" icon="c-pencil-square" />
                                            @endcan
                                            @can('view-event', $event)
                                            <x-button wire:click="registrations({{ $event['id'] }})" class="btn-ghost btn-sm text-red-600" icon="o-user" />
                                            <x-button wire:click="show({{ $event['id'] }})" class="btn-ghost btn-sm text-red-600" icon="o-eye" />
                                            @endcan
                                        </div>
                                        @endscope
                                    </x-table>
                                    @else
                                    <div class="text-center text-gray-500 dark:text-gray-400">
                                        No events found.
                                    </div>
                                    @endif
                                </x-card>


                                <!-- FILTER DRAWER -->
                                <x-drawer wire:model="drawer" title="Filters" right separator with-close-button class="lg:w-1/3">
                                    <div class="grid gap-5">
                                        <x-input placeholder="Search..." wire:model.live.debounce="search" icon="o-magnifying-glass"
                                            @keydown.enter="$wire.drawer = false" />

                                    </div>

                                    <x-slot:actions>
                                        <x-button label="Reset" icon="o-x-mark" wire:click="clear" spinner />
                                        <x-button label="Done" icon="o-check" class="btn-primary" @click="$wire.drawer = false" />
                                    </x-slot:actions>
                                </x-drawer>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    @endvolt

</x-layouts.admin>