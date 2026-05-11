<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Privacy Policy' }}
</x-slot>

<div class="pb-5 h-screen">
    <div class="mb-5 bg-white border-b border-gray-200/80 dark:border-gray-200/10 dark:bg-gray-900/40">
        <div class="py-6 mx-auto max-w-6xl sm:px-6 lg:px-12">
            <h1 class="text-3xl font-bold mb-4">Privacy Policy</h1>

            <p class="mb-4">At Event Agile, we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and safeguard your personal information when you use our website and services.</p>
        </div>
    </div>

</div>