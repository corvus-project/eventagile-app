<?php

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use function Laravel\Folio\{middleware, name};
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;

middleware(['throttle:5,1']);
name('login');

new #[Layout('layouts.auth')] class extends Component
{
    #[Validate('required|string|email')]
    public $email = '';

    #[Validate('required|string', message: 'Please provide a password')]
    public $password = '';

    public $remember = false;

    public ?string $captchaToken = null;



    #[On('formSubmitted')]
    public function authenticate($token)
    {
        $this->captchaToken = $token;
        Log::info('Starting authentication process for email: ' . $this->email);
        $query = http_build_query([
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $this->captchaToken,
        ]);

        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?' . $query);
        $captchaLevel = $response->json('score');

        throw_if($captchaLevel <= 0.5, ValidationException::withMessages([
            'captchaToken' => __('Error on captcha verification. Please, refresh the page and try again.')
        ]));

        Log::info('Login attempt', ['email' => $this->email, 'password' => $this->password]);

        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            Log::warning('Failed login attempt', ['email' => $this->email, 'ip' => request()->ip(), 'captcha_score' => $captchaLevel]);
            $this->addError('email', trans('auth.failed'));
            return;
        }

        event(new Login(auth()->guard('web'), User::where('email', $this->email)->first(), $this->remember));

        return redirect()->intended('/');
    }
};

?>


<x-slot name="title">
    Login to EventAgile
</x-slot>
<div class="flex flex-col items-stretch justify-center w-screen min-h-screen py-10 sm:items-center">

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <x-ui.link href="{{ route('home') }}">
            <x-ui.logo class="w-auto h-10 mx-auto text-gray-700 fill-current dark:text-gray-100" />
        </x-ui.link>

        <h2 class="mt-5 text-2xl font-extrabold leading-9 text-center text-gray-800 dark:text-gray-200">Sign in to
            your account</h2>
        <div class="text-sm leading-5 text-center text-gray-600 dark:text-gray-400 space-x-0.5">
            <span>Or</span>
            <x-ui.text-link href="{{ route('register') }}">create a new account</x-ui.text-link>
        </div>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-10 py-0 sm:py-8 sm:shadow-sm sm:bg-white dark:sm:bg-gray-950/50 dark:border-gray-200/10 sm:border sm:rounded-lg border-gray-200/60">

            @error('captchaToken')
            <div class="bg-red-300 text-red-700 p-3 rounded">{{ $message }}</div>
            @enderror
            <form wire:submit.prevent="authenticate" class="space-y-6">

                <x-ui.input label="Email address" type="email" id="email" name="email" wire:model="email" />
                <x-ui.input label="Password" type="password" id="password" name="password" wire:model="password" />
                <div class="flex items-center justify-between mt-6 text-sm leading-5">
                    <x-ui.checkbox label="Remember me" id="remember" name="remember" wire:model="remember" />
                    <x-ui.text-link href="{{ route('password.request') }}">Forgot your password?</x-ui.text-link>
                </div>


                <x-button label="Login" rounded="md" class="btn-primary g-recaptcha" type="primary" submit="true"
                    data-sitekey="{{ config('services.recaptcha.public_key') }}"
                    data-callback='handle'
                    data-action='submit' />

            </form>

            <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.public_key') }}"></script>
            <script>
                function handle(e) {
                    grecaptcha.ready(function() {
                        grecaptcha.execute('{{ config("services.recaptcha.public_key") }}', {
                                action: 'submit'
                            })
                            .then(function(token) {

                                Livewire.dispatch('formSubmitted', {
                                    token: token
                                });

                            });
                    })
                }
            </script>

        </div>
    </div>

</div>