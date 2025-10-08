<?php

use function Laravel\Folio\{name,middleware};

use Livewire\Volt\Component;


name('home');
middleware('web');
new class extends Component
{
   
};

?>

<x-layouts.empty>

    <x-slot name="title">
        {{ 'EventAgile' }}
    </x-slot>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Scheduled Public Events') }}
        </h2>
    </x-slot>

    @volt('home.index')
    <div class="pb-5">
        <div class="mx-auto space-y-6">
            <x-card shadow>
                <div class="mb-3 text-lg font-medium text-gray-900 dark:text-gray-100 m-8 pt-18">
                    Welcome to EventAgile!
                     <p>Please, log in to see your events. If you want to register for an event, please go to the event page.</p>
                </div>

            </x-card>
        </div>
    </div>
    @endvolt

</x-layouts.frontend>