    <div class="flex flex-col flex-1">
        <div class="flex flex-col  flex-1 pb-5 mx-auto  w-full">
            <div class="relative flex-1 w-full ">
                <div class="flex justify-between items-center w-full bg-pink- overflow-hidden">
                    <div class="flex relative flex-col h-full w-full">


                        <div class="pb-5">
                            <div class="mx-auto space-y-6">


                                <section
                                    class="">
                                    <div class="w-full max-w-3xl mx-auto p-2">

                                <div class="flex items-center  b-5 space-x-1.5 text-lg font-bold text-gray-800 uppercase border-b border-dotted border-zinc-200 dark:border-gray-800 dark:text-gray-200">
                                    Update the event
                                </div>
                                        <x-form wire:submit="save">

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
                                                <x-button label="Cancel" />
                                                <x-button label="Update" class="btn-seconday" type="primary" submit="true" spinner="save" />
                                            </x-slot:actions>
                                        </x-form>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>