<div class="mb-4">
    <div>
        @if (session()->has('message'))
            <span class="text-green-500 text-sm italic">{{ session('message') }}</span>
        @endif
        @if ($photo)
            <img src="{{ $photo->temporaryUrl() }}" class="w-32">
        @else
            <img src="{{ asset('storage') }}/{{ $candidate->avatar ?? 'images/no-image.png' }}" alt="Avatar"
                class="w-56">
        @endif
    </div>

    <input wire:model="photo" class="w-full py-2 text-gray-700 focus:outline-none focus:shadow-outline" 
        id="photo" name="photo" type="file">
    <x-jet-button wire:click.prevent="upload" type="submit" class="bg-blue-800 hover:bg-blue-600 active:bg-blue-900 h-full">
        <span>{{ __('Upload') }}</span>
    </x-jet-button>
    <x-jet-button wire:click.prevent="deleteAvatar" type="submit" class="bg-red-800 hover:bg-red-600 active:bg-red-900 h-full">
        <span>{{ __('Remove') }}</span>
    </x-jet-button>
    <x-jet-input-error for="photo" class="mt-1 italic" />
</div>