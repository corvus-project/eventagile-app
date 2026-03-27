<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'List all events' }}
</x-slot>
<x-slot name="header">
    <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('Scheduled Public Events') }}
    </h2>
</x-slot>
<div class="pb-5">
    <div class="mx-auto space-y-6">
        <x-card shadow>
            <div class="p-4 bg-white rounded-lg shadow mt-8  dark:bg-gray-800 dark:border dark:border-gray-200/10">
                <p class="text-sm text-gray-600">
                    {{ __('There are no public events scheduled at the moment. Please check back later.') }}
                </p>
            </div>
        </x-card>
    </div>
</div>