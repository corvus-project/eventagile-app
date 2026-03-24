<?php

use App\Enums\EventStatus;
use App\Models\Event;
use function Laravel\Folio\{middleware, name};
use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Pagination\LengthAwarePaginator;

name('dashboard');
middleware(['auth', 'verified', 'role:admin, organizer']);
new #[Layout('layouts.admin')]  class extends Component
{
    use WithPagination;
    use Toast;

    public int $perPage = 10;
    public string $search = '';
    public array $sortBy = ['column' => 'title', 'direction' => 'desc'];


    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'title', 'label' => 'Title', 'class' => 'w-64'],
            ['key' => 'start_time_formatted', 'label' => 'Event Date', 'class' => 'w-8'],
            ['key' => 'organizer', 'label' => 'Organizer', 'class' => 'w-32'],
        ];
    }

    public function events(): LengthAwarePaginator
    {
        return Event::query()
            ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->where('status', EventStatus::SCHEDULED)
            ->where('organizer_id', auth()->user()->id)
            ->when($this->search, function () {
                return Event::where('title', 'like', $this->search . '%');
            })->paginate($this->perPage);
    }

    public function with(): array
    {
        return [
            'events' => $this->events(),
            'headers' => $this->headers()
        ];
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

                                @if($events && $events->count() > 0)
                                <x-table :headers="$headers" :rows="$events"
                                    :sort-by="$sortBy"
                                    with-pagination
                                    per-page="perPage"
                                    :per-page-values="[3, 5, 10]">
                                    @scope('actions', $event)
                                    <div class="flex space-x-2">
                                        <x-button wire:click="show({{ $event['id'] }})" class="btn-ghost btn-sm text-red-600" icon="o-link" />
                                    </div>
                                    @endscope
                                </x-table>

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