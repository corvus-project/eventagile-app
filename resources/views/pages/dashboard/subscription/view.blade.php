<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use function Laravel\Folio\{middleware, name};
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Locked;

name('subscription.view');
middleware(['auth', 'verified', 'role:admin,organizer']);
new class extends Component {
    #[Locked]
    public $user;
    public $subscription;


    #[Validate('required|confirmed|min:6')]
    public $new_password = '';
    public $new_password_confirmation = '';
    public $delete_confirm_password = '';

    public function mount()
    {
        $this->user = auth()->user();
        $this->subscription = $this->user->subscriptions()->where('status', 'active')->latest()->first();
    }
}

?>


<x-layouts.admin>

    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Subscription') }}
        </h2>
    </x-slot>

    @volt('subscription.view')
    <div class="pb-5">
        <div class="mx-auto space-y-6">

            <section
                class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg dark:bg-gray-900/50 dark:border dark:border-gray-200/10">


                <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                    <div class="md:col-span-1">
                        <p class="text-gray-700 dark:text-gray-300">Plan name</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-gray-700 dark:text-gray-300"> {{ $subscription->plan_name }}
                            <br>{{ $subscription->plan_description }}
                        </p>
                    </div>

                    <div class="md:col-span-1">
                        <p class="text-gray-700 dark:text-gray-300 ">Status</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-gray-700 dark:text-gray-300 capitalize"> {{ $subscription->status}}</p>
                    </div>


                    <div class="md:col-span-1">
                        <p class="text-gray-700 dark:text-gray-300 ">Started at </p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-gray-700 dark:text-gray-300 capitalize"> {{ $subscription->starts_at->format('d M y H:i')  }}</p>
                    </div>


                    <div class="md:col-span-1">
                        <p class="text-gray-700 dark:text-gray-300 ">Ending at </p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-gray-700 dark:text-gray-300 capitalize"> {{ $subscription->ends_at->format('d M y H:i')  }}</p>
                    </div>
                    <div class="md:col-span-1">
                        <p class="text-gray-700 dark:text-gray-300">Features & Limits</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-gray-700 dark:text-gray-300">
                            {{ $subscription->getPlanFeaturesListAttribute() ? implode(', ', $subscription->getPlanFeaturesListAttribute()) : 'N/A' }}
                        </p>
                        <hr class="my-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="grid grid-cols-2 gap-2">
                            @foreach($subscription->plan_limits as $key => $value)
                            <div class="text-gray-600 dark:text-gray-400 font-medium">{{ ucfirst(str_replace('-', ' ', $key)) }}</div>
                            <div class="text-gray-700 dark:text-gray-300">{{ $value }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </section>
            {{-- End Update Profile Information --}}

        </div>
    </div>
    @endvolt

</x-layouts.admin>