<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Pricing' }}
</x-slot>

<div class="pb-5 h-screen">
    <div class="p-4 mt-16">
        <div class="max-w-6xl max-lg:max-w-3xl mx-auto">
            <div class="text-center">
                <h2 class="text-slate-900 text-3xl font-bold mb-4">Choose the right plan for you</h2>
                <p class="text-[15px] text-slate-600">Flexible plans designed for individuals, teams, and growing businesses.</p>
            </div>
            <div class="text-center p-12 m-12">
                <span class="text-slate-900 text-lg font-semibold">EventAgile is currently free to use during our early access period. Enjoy all features at no cost!</span>
            </div>
        </div>
    </div>

</div>