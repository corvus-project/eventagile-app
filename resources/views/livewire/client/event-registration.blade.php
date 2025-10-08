<div class="shadow-lg rounded-lg p-2 dark:bg-gray-800 dark:border dark:border-gray-200/10">

    <div class="flex flex-col lg:flex-row items-start justify-between space-y-4 lg:space-y-0  min-h-[400px]">

        <div class="lg:w-full mx-auto mt-8 px-8 space-y-6">
            <h3 class="text-2xl">{{ $event->title }}</h3>
            <p>{{ $event->description }}</p>
            <p>Location: {{ $event->location }}</p>
            <p>Organizer: {{ $event->organizer }}</p>
            <p>Start Time: {{ $event->start_time->format('d M Y H:i') }}</p>
        </div>
        <div class="mx-auto px-8 lg:ml-8 lg:mt-0 mt-8 w-full lg:w-3/5">
            <div class="mx-auto space-y-6 ">
                <section
                    class="bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg dark:bg-gray-900/50 dark:border dark:border-gray-200/10">
                    @if (session('register-status'))
                    <div class="alert alert-warning mb-4">
                        {{ session('register-status') }}
                    </div>
                    @endif

                    @if( $event->status !== \App\Enums\EventStatus::SCHEDULED)
                    <div class="alert alert-warning mb-4">
                        This event is not open for registration.
                    </div>
                    @elseif( $event->registration_ends_at != null && $event->registration_ends_at < now())
                        <div class="alert alert-warning mb-4">
                        Registration ends at {{ $event->registration_ends_at?->format('d M Y H:i') }}
            </div>
            @elseif($registrations_count >= $event->capacity)
            <div class="alert alert-warning mb-4">
                This event has reached its capacity.
            </div>
            @else
            <h3 class="text-lg font-semibold mb-4">Register for Event</h3>
            <p class="mb-4">Please fill in your details to register for the event.</p>

            @error('captchaToken')
            <div class="bg-red-300 text-red-700 p-3 rounded">{{ $message }}</div>
            @enderror

            <x-form wire:submit="save" wire:recaptcha  class="mt-1 space-y-2">

                <x-input label=" Name" wire:model="form.name" />
                <x-input label="Email" wire:model="form.email" />
                <x-input label="Phone" wire:model="form.phone" />

                @if($event->is_public == 0)
                <x-input label="Registration Code" wire:model="form.registration_code" placeholder="Enter registration code" />
                @endif

                <x-button
                    label="Register"
                    class="btn-seconday"
                    type="primary"
                    submit="true" />

            </x-form>

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

                            component.$wire.$set('captchaToken', token).then(() => {
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
                        
                    });
                });
            </script>
            <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.public_key') }}"></script>

            @endif
            </section>
        </div>
    </div>
</div>
</div>