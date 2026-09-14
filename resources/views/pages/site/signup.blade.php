<?php

use App\Models\AccountSetup;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;

new #[Layout('layouts.auth')] class extends Component
{
    public ?string $captchaToken = null;

    #[Validate('required')]
    public string $name = '';

    #[Validate('required|min:3|max:25|unique:domains,domain', message: 'Please, select a domain for your project!')]
    public string $domain = '';

    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    #[Validate('required|min:8|same:passwordConfirmation')]
    public string $password = '';

    #[Validate('required|min:8|same:password')]
    public string $passwordConfirmation = '';

    public function register($token = null)
    {
        Log::debug(
            'Starting registration process',
            ['email' => $this->email, 'domain' => $this->domain]
        );


        if ($token) {
            $this->captchaToken = $token;
        }

        $query = http_build_query([
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $this->captchaToken,
        ]);
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?' . $query);
        $captchaLevel = $response->json('score');
        $this->validate();
        throw_if($captchaLevel <= 0.5, ValidationException::withMessages([
            'captchaToken' => __('Error on captcha verification. Please, refresh the page and try again.')
        ]));

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
        ]);
        $userRole = config('roles.models.role')::where('name', '=', 'User')->first();
        $user->attachRole($userRole);

        AccountSetup::create([
            'user_id' => $user->id,
            'name' => $this->name,
            'email' => $this->email,
            'domain' => str_slug($this->domain),
            'action' => 'NOTVERIFIED'
        ]);

        Log::debug('registered new user', [
            'user_id' => $user->id,
            'name' => $this->name,
            'email' => $this->email,
            'domain' => str_slug($this->domain),
        ]);

        event(new Registered($user));

        Auth::login($user, true);
        session()->flash('message', 'Your account has been created, please verify your email using the link sent to your email address.');
        return redirect()->intended('account-setup');
    }
};

?>

<x-slot name="title">
    Create your EventAgile account
</x-slot>

<div class="flex min-h-screen">
    <!-- Form Panel - Centered -->
    <div class="flex w-full items-center justify-center p-6 sm:p-8 lg:p-12">
        <div class="w-full max-w-3xl mx-auto">

            <!-- Logo -->
            <div class="mb-8 text-center">
                <x-ui.link href="{{ route('home') }}">
                    <span class="text-4xl font-bold text-blue-600">EventAgile</span>
                </x-ui.link>
            </div>

            <!-- Form Card -->
            <div class="bg-white dark:bg-gray-950 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-8">

                <!-- Header -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Create your account</h1>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Start building your event experience in minutes.
                    </p>
                    <div class="mt-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-300">
                            No credit card required
                        </span>
                    </div>
                </div>

                @error('captchaToken')
                <div class="mb-5 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-400 px-4 py-3 rounded-lg text-sm">{{ $message }}</div>
                @enderror

                @if (session()->has('message'))
                <div class="mb-5 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 px-4 py-3 rounded-lg text-sm">
                    {{ session('message') }}
                </div>
                @endif

                <form onsubmit="handleSubmit(event)" class="space-y-5">
                    <x-input label="Domain" type="text" id="domain" name="domain" wire:model="domain" icon="o-globe-alt" placeholder="your-domain" />

                    <div class="grid grid-cols-2 gap-4">
                        <x-input label="Full name" type="text" id="name" name="name" wire:model="name" icon="o-user" placeholder="John Doe" />
                        <x-input label="Email address" type="email" id="email" name="email" wire:model="email" icon="o-envelope" placeholder="john@example.com" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <x-input label="Password" type="password" id="password" name="password" wire:model="password" icon="o-lock-closed" placeholder="••••••••" />
                        <x-input label="Confirm password" type="password" id="password_confirmation" name="password_confirmation" wire:model="passwordConfirmation" icon="o-lock-closed" placeholder="••••••••" />
                    </div>


                    <button type="primary" class="bg-blue-600 text-white hover:bg-blue-700 border-none w-full btn-md p-3"
                        submit="true" wire:loading.attr="disabled">
                        <!-- Default Text -->
                        <span wire:loading.remove>Create your account</span>

                        <!-- Loading State: Text -->
                        <span wire:loading>Creating...</span>

                        <!-- Loading State: Spinner Icon -->
                        <span wire:loading>
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://w3.org" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>


                    <p class="text-xs text-gray-400 dark:text-gray-500 text-center leading-relaxed">
                        By creating an account, you agree to our
                        <a href="{{ route('terms') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Terms of Service</a>
                        and
                        <a href="{{ route('privacy') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Privacy Policy</a>.
                    </p>
                </form>
                <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.public_key') }}"></script>
                <script>
                    function handleSubmit(event) {
                        event.preventDefault();
                        grecaptcha.ready(function() {
                            grecaptcha.execute('{{ config("services.recaptcha.public_key") }}', {
                                    action: 'register'
                                })
                                .then(function(token) {
                                    @this.call('register', token);
                                });
                        })
                    }
                </script>

                <div class="mt-6 pt-6 border-t border-gray-100 dark:border-gray-800 text-center">

                </div>
            </div>
        </div>
    </div>
</div>