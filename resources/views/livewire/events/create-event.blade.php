    <div class="flex flex-col flex-1">
        <div class="flex flex-col  flex-1 pb-5 mx-auto  w-full">
            <div class="relative flex-1 w-full ">
                <div class="flex justify-between items-center w-full bg-pink- overflow-">
                    <div class="flex relative flex-col h-full w-full">

                        <div class="pb-5">

                            <section
                                class="">
                                <div class="w-full max-w-3xl mx-auto p-2">


                                    <div class="flex items-center  b-5 space-x-1.5 text-lg font-bold text-gray-800 uppercase border-b border-dotted border-zinc-200 dark:border-gray-800 dark:text-gray-200">
                                        {{__('dashboard.Create an event')}}
                                    </div>

                                    @if ($eventLimit)

                                    <x-form wire:submit="save">

                                        <x-input label="{{ __('dashboard.Title') }}" wire:model="form.title" />
                                        <x-textarea label="{{ __('dashboard.Description') }}" wire:model="form.description" rows="5" />
                                        <x-datetime label="{{ __('dashboard.Event Date') }}" wire:model="form.start_time" type="datetime-local" />
                                        <x-datetime label="{{ __('dashboard.Registration Ends at') }}" wire:model="form.registration_ends_at" type="datetime-local" />
                                        <x-input label="{{ __('dashboard.Location') }}" wire:model="form.location" />
                                        <x-input label="{{ __('dashboard.Organizer') }}" wire:model="form.organizer" />
                                        <x-input label="{{ __('dashboard.Capacity') }}" wire:model="form.capacity" />
                                        <x-checkbox label="{{ __('dashboard.Public') }}" wire:model="form.is_public" hint="Can everyone register this event?" />

                                        <x-select label="{{ __('dashboard.Status') }}" wire:model="form.status" :options="$status" />

                                        <x-slot:actions>
                                            <x-button label="{{ __('dashboard.Create') }}" class="btn-seconday" type="primary" submit="true" spinner="save" />
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

                    </div>
                </div>
            </div>
        </div>
    </div>