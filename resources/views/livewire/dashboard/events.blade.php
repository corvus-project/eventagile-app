<x-slot name="title">
    {{ 'List all events' }}
</x-slot>

<div class="flex flex-col flex-1">
    <div class="flex flex-col  flex-1 pb-5 mx-auto  w-full">
        <div class="relative flex-1 w-full ">
            @can('create-event')
            <div class="flex justify-end mb-4">
                <x-ui.text-link href="{{ route('dashboard.events.create') }}" class="text-white no-underline rounded-full bg-indigo-600 box-border border border-transparent hover:bg-brand-strong shadow-xs font-medium leading-5 text-sm px-4 py-2.5 focus:outline-none">
                    <x-icon name="o-plus" />
                    Create Event
                </x-ui.text-link>
            </div>
            @endcan

            <div class="pb-5">
                <div class="mx-auto space-y-6">

                    <x-card shadow>
                        <div class="p-4 space-y-4 shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg  bg-slate-50 p-6 rounded-lg dark:bg-gray-900/50 dark:border dark:border-gray-200/10">
                            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between ">
                                <div class="w-full md:w-1/2">
                                    <x-ui.input
                                        id="search"
                                        type="search"
                                        wire:model.live.debounce.300ms="search"
                                        placeholder="Search events by title, organizer, or location"
                                        class="w-full" />
                                </div>
                                <div class="flex flex-wrap items-center gap-2 text-sm text-gray-600 dark:text-gray-300">
                                    <span class="font-medium">Sort by:</span>
                                    <button type="button" wire:click="sortByColumn('title')" class="btn-ghost btn-xs">Title</button>
                                    <button type="button" wire:click="sortByColumn('start_time')" class="btn-ghost btn-xs">Start date</button>
                                    <button type="button" wire:click="sortByColumn('location')" class="btn-ghost btn-xs">Location</button>
                                </div>
                            </div>

                            <div class="overflow-x-auto ">
                                <table class="min-w-full text-left divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-900">
                                        <tr>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase cursor-pointer" wire:click="sortByColumn('title')">
                                                Title
                                                @if($sortBy['column'] === 'title')
                                                <span>{{ $sortBy['direction'] === 'asc' ? '↑' : '↓' }}</span>
                                                @endif
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase cursor-pointer" wire:click="sortByColumn('start_time')">
                                                Start date
                                                @if($sortBy['column'] === 'start_time')
                                                <span>{{ $sortBy['direction'] === 'asc' ? '↑' : '↓' }}</span>
                                                @endif
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase cursor-pointer" wire:click="sortByColumn('organizer')">
                                                Organizer
                                                @if($sortBy['column'] === 'organizer')
                                                <span>{{ $sortBy['direction'] === 'asc' ? '↑' : '↓' }}</span>
                                                @endif
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase cursor-pointer" wire:click="sortByColumn('location')">
                                                Status
                                                @if($sortBy['column'] === 'status')
                                                <span>{{ $sortBy['direction'] === 'asc' ? '↑' : '↓' }}</span>
                                                @endif
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase">Capacity</th>
                                            <th scope="col" class="px-4 py-3 text-xs font-semibold tracking-wider uppercase">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        @foreach($events as $event)
                                        <tr>
                                            <td class="px-4 py-4">
                                                <a href="{{ route('dashboard.events.update', $event->slug) }}" class="font-medium text-blue-600 hover:underline">{{ $event->title }}</a>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-300">
                                                {{ \Carbon\Carbon::parse($event->start_time)->format('F j, Y H:i') }}
                                            </td>
                                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $event->organizer }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $event->status }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $event->capacity }}</td>
                                            <td class="px-4 py-4 text-xs">
                                                <a href="{{ route('dashboard.events.update', $event->slug) }}" class="text-blue-600 no-underline  bg-blue-100 box-border border border-transparent hover:bg-brand-strong shadow-xs text-xs px-1.5 py-1.5 focus:outline-none">Update</a>
                                                <a href="{{ route('dashboard.events.registrations.show', $event->slug) }}" class="text-blue-600 no-underline  bg-blue-100 box-border border border-transparent hover:bg-brand-strong shadow-xs text-xs px-1.5 py-1.5 focus:outline-none">Registrations</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $events->links() }}
                            </div>

                        </div>
                    </x-card>

                </div>
            </div>
        </div>
    </div>
</div>