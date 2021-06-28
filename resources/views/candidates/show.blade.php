<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidate') }}: <span class="text-blue-900 underline">{{ $candidate->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12 p-4">
        <div class="bg-white max-w-4xl mx-auto p-4 sm:p-6 lg:p-8 rounded md:flex md:space-x-4">
            <div class="flex-1">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Full name') }}
                    </label>
                    <label class="w-full py-2 text-gray-700">
                        {{ $candidate->name }}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Address') }}
                    </label>
                    <label class="w-full py-2 text-gray-700">
                        {{ $candidate->address }}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Date of birth') }}
                    </label>
                    <label class="w-full py-2 text-gray-700">
                        {{ $candidate->birth_date->format('m.d.Y') }}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Phone') }}
                    </label>
                    <label class="w-full py-2 text-gray-700">
                        {{ $candidate->phone ?: '----' }}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('College') }}
                    </label>
                    <label class="w-full py-2 text-gray-700">
                        {{ $candidate->college ?: '----' }}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Note') }}
                    </label>
                    <p class="w-full py-2 text-gray-700">
                        {{ $candidate->Note ?: '----' }}
                    </p>
                </div>
            </div>
            <div class="flex-1">
                <h5>{{ __('Technologies') }}</h5>
                <ul>
                    @foreach ($candidate->technologies as $technology)
                        <li>
                            {{ $technology->title }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>