<div class="mb-4">
    <div class="w-48">
        @if (session()->has('message'))
            <span class="text-green-500 text-sm italic block">{{ session('message') }}</span>
        @endif

        @if ($candidate->document)
            <a href="{{ asset('storage') }}/{{ $candidate->document }}" class="w-24 text-2xl">
                <img src="{{ asset('storage/images/file.png') }}" alt="File" class="w-20">
                {{ __('View document') }}
            </a>
        @endif
    </div>

    <input wire:model="file" class="w-full py-2 text-gray-700 focus:outline-none focus:shadow-outline" 
        id="file" name="file" type="file">
    <x-jet-button wire:click.prevent="upload" type="submit" class="bg-blue-800 hover:bg-blue-600 active:bg-blue-900">
        <span>{{ __('Upload') }}</span>
    </x-jet-button>
    <x-jet-button wire:click.prevent="delete" type="submit" class="bg-red-800 hover:bg-red-600 active:bg-red-900">
        <span>{{ __('Remove') }}</span>
    </x-jet-button>
    <x-jet-input-error for="file" class="mt-1 italic" />
</div>