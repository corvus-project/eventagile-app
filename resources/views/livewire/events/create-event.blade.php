<div>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create an event') }}
        </h2>
    </x-slot>

    <x-slot name="title">
        {{ __('Create an event') }}
    </x-slot>
    <section
        class="shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg dark:bg-gray-900/50 dark:border dark:border-gray-200/10">
        <div class="w-full max-w-3xl mx-auto p-2">

            @if ($eventLimit)

            <x-form wire:submit="save" class="space-y-3">

                <x-input label="Title" wire:model="form.title" />
                <x-textarea label="Description" wire:model="form.description" rows="5" />

                <x-datetime label="Event Date" wire:model="form.start_time" type="datetime-local" />
                <x-datetime label="Registration Ends at" wire:model="form.registration_ends_at" type="datetime-local" />


                <x-input label="Location" wire:model="form.location" />
                <x-input label="Organizer" wire:model="form.organizer" />
                <x-input label="Capacity" wire:model="form.capacity" />
                <x-checkbox label="Public" wire:model="form.is_public" hint="Can everyone register this event?" />

                <x-select label="Status" wire:model="form.status" :options="$status" />

                <x-slot:actions>
                    <x-button label="Create" class="btn-seconday" type="primary" submit="true" spinner="save" />
                </x-slot:actions>
            </x-form>
            @else
            <div class="p-4 text-sm text-yellow-800 bg-yellow-50 rounded-lg dark:bg-gray-800/50 dark:text-yellow-300" role="alert">
                <span class="font-medium">You have reached the maximum number of events you can create. Please delete an existing event or contact support to increase your limit.</span>
            </div>
            @endif
        </div>
    </section>

</div>