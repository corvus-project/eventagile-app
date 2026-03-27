<?php

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

use Livewire\Attributes\{Computed, Title, Layout};
use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;

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

    #[Computed()]
    public function registrations()
    {
        return EventRegistration::query()
            ->where('event_id', $this->event->id)
            ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->paginate($this->perPage);
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
                <x-ui.text-link href="{{ route('dashboard.events.show', ['event' => $event->slug]) }}" class="btn-ghost btn-sm text-red-600 p-2">
                    Visit back Event
                </x-ui.text-link>

                <x-ui.text-link href="{{ route('events.registrations.export', ['event' => $event->slug]) }}" class="btn-ghost btn-sm text-red-600 p-2">
                    Export Registration List
                </x-ui.text-link>

            </div>

            <div class="pb-5">
                <div class="mx-auto space-y-6">
                    <x-card shadow>
                        <div class="p-6">
                            @if($this->registrations->isEmpty())
                            <div class="text-center py-8 text-gray-500">
                                No registrations found for this event.
                            </div>
                            @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-900">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">#</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">Name</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">Email</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">Phone</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">Status</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">Registered At</th>
                                            <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        @foreach($this->registrations as $registration)
                                        <tr>
                                            <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300">{{ $registration->id }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300">{{ $registration->name }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300">{{ $registration->email ?? 'N/A' }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300">{{ $registration->phone ?? 'N/A' }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300">{{ $registration->status ?? 'Unknown' }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300">{{ optional($registration->registered_at)->format('F j, Y H:i') ?? 'N/A' }}</td>
                                            <td class="px-4 py-4 text-right">
                                                <button type="button" wire:click="show({{ $registration->id }})" class="btn-ghost btn-sm text-red-600">View</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-6">
                                {{ $this->registrations->links() }}
                            </div>
                            @endif
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
</div>