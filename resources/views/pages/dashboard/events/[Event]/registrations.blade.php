<?php

use App\Models\Event;
use Illuminate\Support\Facades\Gate;

use function Laravel\Folio\{middleware, name};
use Livewire\Attributes\{Title, Layout};
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;

name('events.registrations');
middleware(['auth', 'verified', 'role:organizer']);
new class extends Component {

    use Toast;
    use WithPagination;

    public  Event $event;

    public string $search = '';

    public array $sortBy = ['column' => 'name', 'direction' => 'desc'];

    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'name', 'label' => __('dashboard.Name'), 'class' => 'w-64'],
            ['key' => 'email', 'label' =>  __('dashboard.Email'), 'class' => 'w-8'],
            ['key' => 'status', 'label' =>  __('dashboard.Status'), 'format' => fn($row, $field) => __('dashboard.'.($field)->value), 'class' => 'w-8'],
            ['key' => 'phone', 'label' =>  __('dashboard.Phone'), 'class' => 'w-32'],
            ['key' => 'registered_at', 'label' =>  __('dashboard.registered_at'), 'class' => 'w-24'],
        ];
    } 

    public function registrations()
    {
        return $this->event->registrations()
            ->orderBy($this->sortBy['column'], $this->sortBy['direction'])->paginate(10);
    }

    #[Layout('components.layouts.admin')]
    public function mount(Event $event)
    {
        Gate::authorize('view-event', $event);
        $this->event = $event;
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
        return redirect()->route('events.registrations.show', ['Registration' => $id]);
    }
};
?>


<x-layouts.admin>

    <x-slot name="title">
        {{__('dashboard.Registrations for Event')}}: {{ $event->title }}
    </x-slot>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{__('dashboard.Registrations for Event')}}: {{ $event->title }}
        </h2>
    </x-slot>

    <div class="flex flex-col flex-1">
        <div class="flex flex-col  flex-1 pb-5 mx-auto  w-full">
            <div class="relative flex-1 w-full ">
                <div class="flex justify-between items-center w-full bg-pink- overflow-">
                    <div class="flex relative flex-col p-10 h-full w-full">


                        <div class="flex justify-end mb-4">
                            <x-ui.text-link href="{{ route('events.show', ['event' => $event->slug]) }}" class="dark:bg-gray-900/40 font-sans text-sm border-1 no-underline hover:underline bg-slate-50 border-red-600 border-solid  rounded-lg text-red-600 p-2 m-1">
                                {{__('dashboard.Visit back Event')}}
                            </x-ui.text-link>

                            <x-ui.text-link href="{{ route('events.registrations.export', ['event' => $event->slug]) }}" class="dark:bg-gray-900/40 font-sans text-sm border-1 no-underline hover:underline bg-slate-50 border-red-600 border-solid  rounded-lg text-red-600 p-2 m-1">
                                {{__('dashboard.Export Registration List')}}
                            </x-ui.text-link>

                        </div>

                        @volt('events.registrations')
                        <div class="pb-5">
                            <div class="mx-auto space-y-6">
                                <x-card shadow>

                                    @if($registrations->isEmpty())
                                    <div class="p-6 text-center">
                                        <p class="text-gray-500">{{__('dashboard.No registrations found for this event')}}.</p>
                                    </div>
                                    @else
                                    <div class="p-6 text-center">
                                        <p class="text-gray-500">{{__('dashboard.Total Registrations')}}: {{ $registrations->total() }}</p>
                                    </div>
                                    <x-table :headers="$headers" :rows="$registrations" :sort-by="$sortBy" with-pagination>
                                        @scope('actions', $event)
                                        <div class="flex space-x-2">
                                            <x-button wire:click="show({{ $event['id'] }})" class="btn-ghost btn-sm text-red-600" icon="o-link" />
                                        </div>
                                        @endscope
                                    </x-table>
                                    @endif
                                </x-card>
                            </div>
                        </div>

                        @endvolt

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layouts.admin>