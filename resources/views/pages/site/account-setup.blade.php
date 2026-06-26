<?php

use App\Models\Tenant;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

new #[Layout('layouts.frontend')]  class extends Component {

    public function mount(Request $request) {}
};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Waiting for verification' }}
</x-slot>

<div class="pb-5 h-screen">
    <div class="m-12 mb-5 bg-white border-b border-gray-200/80 dark:border-gray-200/10 dark:bg-gray-900/40">
        <div class="py-6 mx-auto max-w-6xl sm:px-6 lg:px-12">

            @if (auth()->user()?->hasVerifiedEmail())

            <h1 class="text-3xl font-bold mb-4">Email Verified</h1>
            <p class="mb-4">Thank you for verifying your email address! Your account is now active and you can start using Event Agile to manage your events efficiently. Explore our features and create your first event today!</p>


            @else
            <h1 class="text-3xl font-bold mb-4">Waiting for verification</h1>

            <p class="mb-4">Your account is currently pending verification. Please check your email for a verification link. If you haven't received the email, please check your spam folder or contact support for assistance.</p>
            @endif
        </div>

    </div>