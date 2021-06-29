<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Candidate') }}: <span class="text-blue-900 underline">{{ $candidate->name }}</span>
        </h2>
    </x-slot>
    <x-second-navbar :candidate="$candidate" />
    <div class="py-12 p-4">
        <x-message />
        <div class="bg-white max-w-4xl mx-auto p-4 sm:p-6 lg:p-8 rounded">

            <div class="md:flex md:space-x-4">
                <div class="flex-1">
                    @livewire('image-upload', ['candidate' => $candidate], key($candidate->id))
                </div>
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
                <div class="flex-1 mb-4 md:mb-0">
                    <h5 class="text-gray-700 text-sm font-bold">{{ __('Technologies') }}</h5>
                    <ul>
                        @foreach ($candidate->technologies as $technology)
                            <li>
                                {{ $technology->title }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
                <h5 class="text-xl italic border-t border-b py-2 mb-2">{{ __('Experience') }}</h5>
            <div>
                <ul>
                    @forelse ($candidate->projects as $project)
                        <li>
                            <div class="flex justify-between items-center space-x-2">
                                <h5 class="text-xl font-semibold">{{ $project->title }}</h5>
                                <div class="flex">
                                    <a href="{{ route('candidates.projects.edit', [$candidate, $project]) }}" class="text-blue-700 hover:text-blue-500 w-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <form id="deleteForm{{$project->id}}" action="{{ route('candidates.projects.destroy', [$candidate, $project]) }}" method="POST" class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a onclick="var confirm = window.confirm('Are you sure?');
                                        event.preventDefault();
                                        if(confirm) {
                                            var id = {{ $project->id }}
                                            document.getElementById('deleteForm'+id).submit();
                                        }" href="{{ route('candidates.projects.destroy', [$candidate, $project]) }}" class="text-red-700 hover:text-red-500 w-4 ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <label class="italic text-sm block mt-2 underline">
                                {{ __('Description') }}
                            </label>
                            <p class="py-2">{{ $project->description }}</p>
                            <label class="italic text-sm block mt-2">
                                {{ __('Technologies used') }}
                            </label>
                            @foreach ($project->technologies as $technology)
                                <small class="px-2 bg-blue-500 text-white rounded-full mr-2">
                                    {{ $technology->title }}
                                </small>
                            @endforeach
                        </li>
                        <hr class="my-2">
                    @empty
                        <span class="italic text-red-600 text-sm">
                            {{ __('No experience yet') }}
                        </span>
                    @endforelse 
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>