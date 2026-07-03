<?php


use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component {};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Contact' }}
</x-slot>

<div class="pb-5 h-screen">
    <div class="p-4 mt-16">
        <div class="max-w-6xl max-lg:max-w-3xl mx-auto">
            <div class="text-center">
                <h2 class="text-slate-900 text-3xl font-bold mb-4">Contact Us</h2>
                <p class="text-[15px] text-slate-600">Have questions or need assistance? Get in touch with our team.</p>
            </div>
            <div class="text-center p-12 m-12">
                <span class="text-slate-900 text-lg font-semibold">For support, feedback, or general inquiries, please email us at
                    <a href="mailto:support@eventagile.com" class="text-blue-600 hover:text-blue-800">support@eventagile.com</a>. We look forward to hearing from you!</span>
            </div>
        </div>
    </div>

</div>