<?php


use App\Enums\RegistrationStatus;
use App\Livewire\Forms\EventRegistrationForm;
use App\Models\Account;
use App\Models\Event;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

new #[Layout('layouts.frontend')]  class extends Component
{
    use WithPagination;

    public $account;

    public $event;
    public ?string $captchaToken = null;
    public EventRegistrationForm $form;
    public int $registrations_count = 0;

    public function mount(Event $event, Account $account,)
    {
        $this->account = $account;
        $this->event = $event;
        $this->form->setEvent($event);
        $this->registrations_count = $this->event->registrations()->where('status', RegistrationStatus::CONFIRMED->value)->count();
    }

    public function save()
    {
        $query = http_build_query([
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $this->captchaToken,
        ]);

        Log::debug('Captcha query', ['query' => $query, 'captchaToken' => $this->captchaToken]);
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?' . $query);
        $captchaLevel = $response->json('score');

        throw_if($captchaLevel <= 0.5, ValidationException::withMessages([
            'captchaToken' => __('Error on captcha verification. Please, refresh the page and try again.')
        ]));

        $this->form->store();
    }
}
?>
<x-slot name="title">
    {{ $account->name }} ~ {{ $event->title }}
</x-slot>
<x-slot name="header">
    <h2 class="text-3xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        <a href="{{ route('account.home', $account->subdomain) }}" class="text-blue-500 hover:text-blue-700">{{ $account->name }}</a>
    </h2>
</x-slot>
<div class="shadow-lg rounded-lg p-2 bg-white dark:bg-gray-800 dark:border dark:border-gray-200/10">

    <div class="flex flex-col lg:flex-row items-start  justify-between space-y-4 lg:space-y-0  min-h-[400px] p-6">

        <div class="mx-auto px-2 space-y-6 align-top text-base/8">

            <h3 class="text-2xl">{{ $event->title }}</h3>
            <p>{{ $event->description }}</p>
            <p><span class="font-bold">Location:</span> <br>{{ $event->location }}</p>

            <p><span class="font-bold">Organizer:</span> <br>{{ $event->organizer }}</p>
            <p><span class="font-bold">Start Time:</span> <br>{{ $event->start_time->format('d M Y H:i') }}</p>

            <p><span class="font-bold">Registration Deadline:</span> <br>
                Please register until {{ $event->registration_ends_at ? $event->registration_ends_at->format('F j, Y H:i') : 'N/A' }}.
            </p>
        </div>

        <div class="mx-auto px-1 lg:ml-8 lg:mt-0 mt-8 w-full lg:w-3/5 ">
            <div class="mx-auto space-y-6">
                <section
                    class="shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg  bg-blue-50 p-6 rounded-lg dark:bg-gray-900/50 dark:border dark:border-gray-200/10">
                    @if (session('register-status'))
                    <div class="alert alert-warning mb-4">
                        {{ session('register-status') }}
                    </div>
                    @endif
                    @if( $event->status !== \App\Enums\EventStatus::SCHEDULED)
                    <div class="alert alert-warning mb-4">
                        This event is not open for registration.
                    </div>
                    @elseif( $event->registration_ends_at && $event->registration_ends_at < now())
                        <div class="alert alert-warning mb-4">
                        Registration ends at {{ $event->registration_ends_at ? $event->registration_ends_at?->format('d M Y H:i') : 'N/A'   }}.
            </div>
            @elseif($this->registrations_count >= $event->capacity)
            <div class="alert alert-warning mb-4">
                This event has reached its capacity.
            </div>
            @else
            <h3 class="text-lg font-semibold mb-4">Register for Event</h3>
            <p class="mb-4">Please fill in your details to register for the event.</p>

            @error('captchaToken')
            <div class="bg-red-300 text-red-700 p-3 rounded">{{ $message }}</div>
            @enderror

            <x-form wire:submit.prevent="save" class="mt-1 space-y-2">
                <x-input label="Name" wire:model="form.name" />
                <x-input label="Email" wire:model="form.email" />
                <x-input label="Phone" wire:model.live="form.phone" />

                @if(!$event->is_public)
                <x-input label="Registration Code" wire:model="form.registration_code" placeholder="Enter registration code" />
                @endif

                <x-slot:actions>
                    <x-button label="Register" class="btn-seconday g-recaptcha" type="primary" submit="true" spinner="save"
                        data-sitekey="{{ config('services.recaptcha.public_key') }}"
                        data-callback='handle'
                        data-action='submit' />
                </x-slot:actions>
            </x-form>


            <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.public_key') }}"></script>
            <script>
                function handle(e) {
                    grecaptcha.ready(function() {
                        grecaptcha.execute('{{ config("services.recaptcha.public_key") }}', {
                                action: 'submit'
                            })
                            .then(function(token) {

                                @this.set('captchaToken', token);
                                @this.save()
                            });
                    })
                }
            </script>
            @endif
            </section>
        </div>
    </div>
</div>
</div>