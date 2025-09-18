<x-layouts.main>

    <x-slot name="title">
        {{ $title ?? 'CorvusApp' }}
    </x-slot>
    
    <x-ui.frontend.header />

  

    <div class="mx-auto  max-w-7xl">
        <div class="sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </div>
</x-layouts.main>