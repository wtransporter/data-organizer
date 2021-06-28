<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-4 md:p-0 md:py-12">
        <x-message />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('candidates')
        </div>
    </div>
</x-app-layout>
