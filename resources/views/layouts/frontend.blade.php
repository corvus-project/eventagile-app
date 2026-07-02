<x-layouts.main>

    <x-slot name="title">
        {{ $title ?? 'CorvusApp' }}
    </x-slot>

    <x-ui.frontend.header />


    {{ $slot }}

    <x-ui.frontend.footer />

</x-layouts.main>