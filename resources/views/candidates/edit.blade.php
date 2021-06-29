<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit candidate') }}:
            <a href="{{ route('candidates.show', $candidate) }}" class="underline text-blue-900">
                {{ $candidate->name }}
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <x-message />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="w-full max-w-sm md:max-w-5xl mx-auto">
                    <form action="{{ route('candidates.update', $candidate) }}" method="POST"
                        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')
                        <div class="block md:flex md:space-x-4">
                            <div class="flex-1">
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fullname">
                                        {{ __('Full name') }}*
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="fullname" name="name" type="text" placeholder="Full name" value="{{ $candidate->name }}">
                                    <x-jet-input-error for="name" class="mt-1 italic" />
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                        {{ __('Address') }}
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="address" name="address" type="text" placeholder="Address" value="{{ $candidate->address }}">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="birth_date">
                                        {{ __('Date of birth') }}*
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="birth_date" name="birth_date" type="date" placeholder="Date of birth" value="{{ $candidate->birth_date->format('Y-m-d') }}">
                                    <x-jet-input-error for="birth_date" class="mt-1 italic" />
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                                        {{ __('Phone') }}
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="phone" name="phone" type="text" placeholder="Phone" value="{{ $candidate->phone }}">
                                    <x-jet-input-error for="phone" class="mt-1 italic" />
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="college">
                                        {{ __('College') }}
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="college" name="college" type="text" placeholder="College" value="{{ $candidate->college }}">
                                    <x-jet-input-error for="college" class="mt-1 italic" />
                                </div>
                                <div class="mb-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="note">
                                        {{ __('Note') }}
                                    </label>
                                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" 
                                        rows="4" id="note" name="note" placeholder="Note">{{ $candidate->note }}</textarea>
                                    <x-jet-input-error for="note" class="mt-1 italic" />
                                </div>
                            </div>
                        </div>
                        <x-assign-technology :allTechnologies="$allTechnologies" :model="$candidate" />
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                                type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>