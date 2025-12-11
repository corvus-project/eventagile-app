<?php

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use function Laravel\Folio\{middleware, name};
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use Illuminate\Validation\ValidationException;

middleware(['throttle:5,1']);
name('login');
new class extends Component
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public $remember = false;

    public ?string $captchaToken = null;

    public string $siteKey = '';

    public ?string $gRecaptchaResponse = null;

    public function mount()
    {
        $this->siteKey = config('services.recaptcha.public_key');
    }

    public function authenticate()
    {
 
        $query = http_build_query([
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $this->gRecaptchaResponse,
        ]);

        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?' . $query);
        $captchaLevel = $response->json('score');

        throw_if($captchaLevel <= 0.5, ValidationException::withMessages([
            'gRecaptchaResponse' => __('Error on captcha verification. Please, refresh the page and try again.')
        ]));

        $this->validate();


        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }

        event(new Login(auth()->guard('web'), User::where('email', $this->email)->first(), $this->remember));

        return redirect()->intended('/');
    }
};

?>

<x-layouts.main>

    <x-slot name="title">
        {{ __('dashboard.login') }}
    </x-slot>
    <div class="flex flex-col items-stretch justify-center w-screen min-h-screen py-10 sm:items-center">

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <x-ui.link href="{{ route('home') }}">
                <x-ui.logo class="w-auto h-10 mx-auto text-gray-700 fill-current dark:text-gray-100" />
            </x-ui.link>

            <h2 class="mt-5 text-2xl font-extrabold leading-9 text-center text-gray-800 dark:text-gray-200">{{__('dashboard.Sign in to your account')}}</h2>
            <div class="text-sm leading-5 text-center text-gray-600 dark:text-gray-400 space-x-0.5">
                <span>{{__('dashboard.or')}}</span>
                <x-ui.text-link href="{{ route('register') }}">{{__('dashboard.create a new account')}}</x-ui.text-link>
            </div>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-10 py-0 sm:py-8 sm:shadow-sm sm:bg-white dark:sm:bg-gray-950/50 dark:border-gray-200/10 sm:border sm:rounded-lg border-gray-200/60">
                @volt('auth.login')

                @error('gRecaptchaResponse')
                <div class="bg-red-300 text-red-700 p-3 rounded">{{ $message }}</div>
                @enderror
                <form wire:submit="authenticate" wire:recaptcha class="space-y-6">

                    <x-ui.input label="Email" type="email" id="email" name="email" wire:model="email" />
                    <x-ui.input label="Password" type="password" id="password" name="password" wire:model="password" />

                    <div class="flex items-center justify-between mt-6 text-sm leading-5">
                        <x-ui.checkbox label="Remember me" id="remember" name="remember" wire:model="remember" />
                        <x-ui.text-link href="{{ route('password.request') }}">{{__('dashboard.Forgot your password?')}}</x-ui.text-link>
                    </div>


                    <x-button rounded="md" class="btn-primary" type="primary" submit="true" >
                        {{ __('dashboard.login') }}
                    </x-button>

                </form>

                <script>
                    document.addEventListener('livewire:init', () => {
                        Livewire.directive('recaptcha', ({
                            el,
                            directive,
                            component,
                            cleanup
                        }) => {
                            const submitExpression = (() => {
                                for (const attr of el.attributes) {

                                    if (attr.name.startsWith('wire:submit')) {

                                        return attr.value;
                                    }
                                }
                            })();

                            const onSubmit = (e) => {
                                e.preventDefault();
                                e.stopImmediatePropagation();

                                grecaptcha.ready(async () => {
                                    const token = await grecaptcha.execute('{{$siteKey}}', {
                                        action: 'submit'
                                    }); 
                                    component.$wire.$set('gRecaptchaResponse', token).then(() => {
                                        Alpine.evaluate(el, "$wire." + submitExpression, {
                                            scope: {
                                                $event: e
                                            }
                                        });
                                    });
 
                                });
                            }

                            el.addEventListener('submit', onSubmit, {
                                capture: true
                            });
                            cleanup(() => el.removeEventListener('submit', onSubmit, {
                                capture: true
                            }));
                        });
                    });
                </script>
                <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.public_key') }}"></script>

                @endvolt
            </div>
        </div>

    </div>

</x-layouts.main>