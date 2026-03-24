<?php

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

use function Laravel\Folio\{middleware, name};
use Livewire\Attributes\{Title, Layout};
use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;

name('events.registrations');
middleware(['auth', 'verified', 'role:admin,organizer']);
new #[Layout('layouts.admin')] class extends Component {

    use Toast;
    use WithPagination;

    public int $perPage = 10;
    public  Event $event;
    public string $search = '';
    public array $sortBy = ['column' => 'name', 'direction' => 'desc'];

    public function mount(Event $event)
    {
        Gate::authorize('view-event', $event);
        $this->event = $event;
    }

    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'name', 'label' => 'Name', 'class' => 'w-64'],
            ['key' => 'email', 'label' => 'Email', 'class' => 'w-8'],
            ['key' => 'status', 'label' => 'Status', 'class' => 'w-8'],
            ['key' => 'phone', 'label' => 'Phone', 'class' => 'w-32'],
            ['key' => 'registered_at', 'label' => 'Registered At', 'class' => 'w-24'],
        ];
    }

    public function registrations()
    {
        /* return EventRegistration::query()
            ->select('id', 'name')
            ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->where('event_id', $this->event->id)
            ->paginate($this->perPage); */

        return DB::table('event_registrations')
            ->select('id', 'name', 'email', 'status', 'phone', 'registered_at')
            ->where('event_id', $this->event->id)
            ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->paginate($this->perPage);
    }


    public function with(): array
    {
        return [
            'registrations' => $this->registrations(),
            'headers' => $this->headers(),
            'event' => $this->event,
        ];
    }

    public function show(int $id)
    {
        return redirect()->route('events.registrations.show', ['EventRegistration' => $id]);
    }
};
?>


<x-slot name="title">
    Registrations for Event: {{ $event->title }}
</x-slot>
<x-slot name="header">
    <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
        Registrations for Event: {{ $event->title }}
    </h2>
</x-slot>
<div class="flex flex-col flex-1">
    <div class="flex flex-col  flex-1 pb-5 mx-auto  w-full">
        <div class="relative flex-1 w-full ">
            <div class="flex justify-end mb-4">
                <x-ui.text-link href="{{ route('events.show', ['event' => $event->slug]) }}" class="btn-ghost btn-sm text-red-600 p-2">
                    Visit back Event
                </x-ui.text-link>

                <x-ui.text-link href="{{ route('events.registrations.export', ['event' => $event->slug]) }}" class="btn-ghost btn-sm text-red-600 p-2">
                    Export Registration List
                </x-ui.text-link>

            </div>

            <div class="pb-5">
                <div class="mx-auto space-y-6">
                    <x-card shadow>

                        @if(empty($registrations) || $registrations->count() === 0)
                        <div class="p-6 text-center">
                            <p class="text-gray-500">No registrations found for this event.</p>
                        </div>
                        @else
                        <div class="p-6 text-center">
                            <p class="text-gray-500">Total Registrations: {{ $registrations->total() }}</p>
                        </div>
                        <x-table :headers="$headers" :rows="$registrations"
                            :sort-by="$sortBy"
                            with-pagination
                            per-page="perPage"
                            :per-page-values="[3, 5, 10]">
                            @scope('actions', $registration)
                            <div class="flex space-x-2">
                                <x-button wire:click="show({{ $registration->id }})" class="btn-ghost btn-sm text-red-600" icon="o-link" />
                            </div>
                            @endscope
                        </x-table>
                        @endif
                    </x-card>
                </div>
            </div>
        </div>
    </div>
</div>