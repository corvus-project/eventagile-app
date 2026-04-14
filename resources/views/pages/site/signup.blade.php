<?php

use App\Models\Tenant;
use App\Models\User;
use App\Services\OnBoardingService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;

new #[Layout('layouts.auth')] class extends Component
{
    public ?string $captchaToken = null;

    #[Validate('required')]
    public $name = '';

    #[Validate('required|unique:tenants,domain')]
    public $domain = '';

    #[Validate('required|email|unique:tenants,email')]
    public $email = '';

    #[Validate('required|min:8|same:passwordConfirmation')]
    public $password = '';

    #[Validate('required|min:8|same:password')]
    public $passwordConfirmation = '';

    public function register()
    {
        $query = http_build_query([
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $this->captchaToken,
        ]);
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?' . $query);
        $captchaLevel = $response->json('score');

        throw_if($captchaLevel <= 0.5, ValidationException::withMessages([
            'captchaToken' => __('Error on captcha verification. Please, refresh the page and try again.')
        ]));

        //$this->validate();

        $user = User::create([
            'email' => fake()->unique()->safeEmail(),
            'name' => fake()->name(),
            'password' => Hash::make('password'),
        ]);
        $userRole = config('roles.models.role')::where('name', '=', 'User')->first();
        $user->attachRole($userRole);

        $tenant = Tenant::create([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'is_active' => false,
        ]);

        $tenant->domains()->create([
            'domain' => fake()->word(),
        ]);

        event(new Registered($user));

        Auth::login($user, true);
        session()->flash('message', 'Your account has been created, please verify your email using the link sent to your email address.');
        return redirect()->intended('/');
    }
};

?>

<x-slot name="title">
    Create a new account
</x-slot>
<div class="flex flex-col items-stretch justify-center w-screen min-h-screen py-10 sm:items-center">

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <x-ui.link href="{{ route('home') }}">
            <x-ui.logo class="w-auto h-10 mx-auto text-gray-700 fill-current dark:text-gray-100" />
        </x-ui.link>
        <h2 class="mt-5 text-2xl font-extrabold leading-9 text-center text-gray-800 dark:text-gray-200">Create a new
            account</h2>
        <div class="text-sm leading-5 text-center text-gray-600 dark:text-gray-400 space-x-0.5">
            <span>Or</span>
            <x-ui.text-link href="{{ route('login') }}">sign in to your account</x-ui.text-link>
        </div>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-10 py-0 sm:py-8 sm:shadow-sm sm:bg-white dark:sm:bg-gray-950/50 dark:border-gray-200/10 sm:border sm:rounded-lg border-gray-200/60">

            @error('captchaToken')
            <div class="bg-red-300 text-red-700 p-3 rounded">{{ $message }}</div>
            @enderror


            @if (session()->has('message'))
            <div class="alert alert-success my-5 ">
                {{ session('message') }}
            </div>
            @endif


            <form wire:submit="register" class="space-y-6">
                <x-ui.input label="Domain" type="text" id="domain" name="domain" wire:model="domain" />

                <x-ui.input label="Name" type="text" id="name" name="name" wire:model="name" />
                <x-ui.input label="Email address" type="email" id="email" name="email" wire:model="email" />
                <x-ui.input label="Password" type="password" id="password" name="password" wire:model="password" />
                <x-ui.input label="Confirm Password" type="password" id="password_confirmation" name="password_confirmation" wire:model="passwordConfirmation" />

                <x-button label="Register" rounded="md" class="btn-primary g-recaptcha" type="primary" submit="true"
                    data-sitekey="{{ config('services.recaptcha.public_key') }}"
                    data-callback='handle'
                    data-action='register' />
            </form>
            <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.public_key') }}"></script>
            <script>
                function handle(e) {
                    grecaptcha.ready(function() {
                        grecaptcha.execute('{{ config("services.recaptcha.public_key") }}', {
                                action: 'submit'
                            })
                            .then(function(token) {

                                @this.set('captchaToken', token);
                                @this.register()
                            });
                    })
                }
            </script>

        </div>
    </div>
</div>