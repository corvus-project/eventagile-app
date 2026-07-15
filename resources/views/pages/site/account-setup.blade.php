<?php

use App\Models\AccountSetup;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

new #[Layout('layouts.frontend')]  class extends Component {

    public string $domain;
    public string $action;
    public function mount(Request $request)
    {
        $accountSetup = AccountSetup::where('user_id', auth()->user()->id)->latest('created_at')->first();
        if ($accountSetup) {
            $this->action = $accountSetup->action;
            $this->domain = 'https://' . str_slug($accountSetup->domain) . '.' . parse_url(config('app.url'), PHP_URL_HOST);
        }
    }

    public function checkStatus()
    {
        $accountSetup = AccountSetup::where('user_id', auth()->user()->id)->latest('created_at')->first();
        if ($accountSetup) {
            $this->action = $accountSetup->action;
            $this->domain = 'https://' . str_slug($accountSetup->domain) . '.' . parse_url(config('app.url'), PHP_URL_HOST);
        }
    }
};

?>

<x-slot name="title">
    {{ 'Event Agile ~ Waiting for verification' }}
</x-slot>

<!-- Main content -->
<main id="main-content" tabindex="-1">

    <!-- Page Header -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto text-center ">
            <div class="py-6 mx-auto max-w-6xl sm:px-6 lg:px-12">

                @if (auth()->user()?->hasVerifiedEmail())

                <h1 class="text-3xl font-bold mb-4">Email Verified</h1>
                <p class="mb-4">Thank you for verifying your email address! </p>
                <p class="mb-4">Now we're creating your website, while processing the account, explore the features and plan your first event! </p>

                <div wire:poll.35s="checkStatus">

                    @if($this->action === 'FINISHED')
                    <p class="mb-4"> it's done, you may browse to your new site!</p>
                    <div class="text-2xl font-bold bg-blue-500 text-center text-amber-50 w-full p-1 m-2 rounded-md"
                        <a href="{{ $this->domain}}">{{ $this->domain}}</a></div>
                    @else

                    <p class="mb-4  mt-10 text-red-500"> The site and account setup may take 5 minutes, you may revisit this page or try to your websire later.</p>

                    <div class="text-2xl font-bold bg-blue-500 text-center text-gray-50 w-full p-1 m-2 rounded-md"
                        <span>{{$this->domain}}</span></div>
                    @endif
                </div>

                @else
                <h1 class="text-3xl font-bold mb-4">Waiting for verification</h1>

                <p class="mb-4">Your account is currently pending verification. Please check your email for a verification link. If you haven't received the email, please check your spam folder or contact support for assistance.</p>
                @endif
            </div>
        </div>
    </section>
    <!-- Use Cases Grid -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50 ">
        <div class="flex flex-col h-screen w-full"></div>
    </section>
</main>