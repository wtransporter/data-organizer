<div {{ $attributes->merge(['class' => 'mb-6']) }}>
    <label class="block text-gray-700 text-sm font-bold mb-2" for="technologies">
        {{ __('Technologies') }}*
    </label>
    <div class="grid grid-cols-2 md:grid-cols-5 gap-2">
    @foreach ($allTechnologies as $technology)
    <div class="flex items-start">
        <div class="flex flex-col items-center h-5">
            <input id="check{{ $technology->id }}" name="technologies[{{ $technology->id }}]" type="checkbox" 
                value="{{ $technology->id }}"
                @if(isset($candidate) && $candidate->technologies->find($technology->id))
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
    <x-jet-input-error for="technologies" class="mt-1 italic" />
</div>