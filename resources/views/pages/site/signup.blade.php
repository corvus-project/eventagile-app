<?php

use App\Models\Tenant;
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

        $tenant = Tenant::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'is_active' => true,
        ]);

        $tenant->domains()->create([
            'domain' => str_slug($this->domain),
        ]);

        Log::debug('Tenant Creation: ', [
            'user' => $user->id,
            'tenant' => $tenant->id,
            'domain' =>  $this->domain
        ]);

        event(new Registered($user));

        Auth::login($user, true);
        session()->flash('message', 'Your account has been created, please verify your email using the link sent to your email address.');
        return redirect()->intended('account-setup');
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


            <form onsubmit="handleSubmit(event)" class="space-y-6">
                <x-input label="Domain" type="text" id="domain" name="domain" wire:model="domain" />
                <x-input label="Name" type="text" id="name" name="name" wire:model="name" />
                <x-input label="Email address" type="email" id="email" name="email" wire:model="email" />
                <x-input label="Password" type="password" id="password" name="password" wire:model="password" />
                <x-input label="Confirm Password" type="password" id="password_confirmation" name="password_confirmation" wire:model="passwordConfirmation" />


                <x-button label="Register" rounded="md" class="btn-primary"
                    type="primary"
                    submit="true" />
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

        </div>
    </div>
</div>