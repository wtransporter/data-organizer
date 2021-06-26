<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-message />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden grid md:grid-cols-3 lg:grid-cols-4 md:gap-2">
                @foreach ($candidates as $candidate)
                    <x-candidate-card :candidate="$candidate" />
                @endforeach
            </div>
            <div class="mt-4">
                {{ $candidates->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
