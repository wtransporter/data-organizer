<div class="col-span-6 sm:col-span-3 p-2 md:pb-4">
    <label for="technology" class="block text-sm font-medium text-gray-700">
        {{ __('Technology') }}
    </label>

    <div class="mt-4 space-y-2  bg-white rounded">
        <form action="{{ route('candidates.technologies.store', $candidate) }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 md:grid-cols-5 gap-2">
            @foreach ($allTechnologies as $technology)
            <div class="flex items-start">
                <div class="flex flex-col items-center h-5">
                    <input id="check{{ $technology->id }}" name="technologies[{{ $technology->id }}]" type="checkbox" 
                        value="{{ $technology->id }}"
                        @if($candidate->technologies->find($technology->id))
                            checked
                        @endif
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                </div>
                <div class="ml-3 text-sm">
                    <label for="check{{ $technology->id }}" class="font-medium text-gray-700">{{ $technology->title }}</label>
                </div>
            </div>
            @endforeach
            </div>
            <div class="mt-2">
                <x-jet-button class="bg-blue-500 hover:bg-blue-700 active:bg-blue-900 focus:ring-blue-200 outline-none focus:outline-none border-0">Submit</x-jet-button>
            </div>
        </form>
    </div>
</div>