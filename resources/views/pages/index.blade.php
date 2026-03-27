<?php

use function Laravel\Folio\{name, middleware};

use App\Enums\EventStatus;
use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

name('home');
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

        </x-card>
    </div>
</div>