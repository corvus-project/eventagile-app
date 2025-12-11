<?php

use App\Models\Registration;
use function Laravel\Folio\{middleware, name};
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;

name('dashboard');
middleware(['auth', 'verified', 'role:organizer']);
new class extends Component
{
    use Toast;

    public int $perPage = 10;
    use WithPagination;

    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'event_title', 'label' =>  __('dashboard.Event'), 'class' => 'w-64'],
            ['key' => 'name', 'label' => __('dashboard.Name'), 'class' => 'w-64'],
            ['key' => 'email', 'label' => __('dashboard.Email'), 'class' => 'w-8'],
            ['key' => 'phone', 'label' => __('dashboard.Phone'), 'class' => 'w-32'],
            ['key' => 'registered_at', 'label' => __('dashboard.registered_at'), 'class' => 'w-24'],
        ];
    }

    public function registrations()
    {
        $user = auth()->user();
        return Registration::join('events', 'events.id', '=', 'registrations.event_id')
            ->select('registrations.*', 'events.title as event_title')
            ->where(function ($query) use ($user) {
                if ($user->isOrganizer()) {
                    return $query->where('events.organizer_id', $user->id);
                } else {
                    return $query;
                }
            })
            ->orderByDesc('created_at')
            ->paginate($this->perPage);
    }



    public function with(): array
    {
        return [
            'registrations' => $this->registrations(),
            'headers' => $this->headers()
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
        {{ __('dashboard.Dashboard') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('dashboard.Dashboard') }}
        </h2>
    </x-slot>

    @volt('dashboard')
    <div class="flex flex-col flex-1">
        
            <div class="relative flex-1 w-full ">
                <div class="flex relative flex-col  h-full w-full ">

                    <div class="mx-auto">
                        <x-card shadow>

                            @if($registrations && $registrations->count())
                            <x-table :headers="$headers" :rows="$registrations"
                                with-pagination
                                per-page="perPage"
                                :per-page-values="[3, 5, 10]">
                                @scope('actions', $registration)
                                <div class="flex space-x-2">
                                    <x-button wire:click="show({{ $registration['id'] }})" class="btn-ghost btn-sm text-red-600" icon="o-link" />
                                </div>
                                @endscope
                            </x-table>

                            @else
                            <div class="text-center text-gray-500 dark:text-gray-400">
                                
                                 {{ __('dashboard.No registrations found.') }}
                            </div>
                            @endif
                        </x-card>
                    </div>
                </div>

           
        </div>
    </div>

    @endvolt
</x-layouts.admin>