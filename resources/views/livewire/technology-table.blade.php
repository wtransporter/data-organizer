<div>
    <x-message />
    @if (count($technologies) > 0)
    <table class="table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 border w-64">{{ __('Title') }}</th>
                <th class="px-4 py-2 border">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <td class="border px-4 py-2">
                        {{ $technology->title }}
                    </td>
                    <td class="border px-4 py-2">
                        <div class="flex items-center">
                            <div class="w-4 mr-2">
                                <a href="{{ route('technologies.edit', [$technology]) }}" class="text-blue-700 hover:text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="w-4">
                                <a wire:click.prevent="confirmTechnologyDelete({{ $technology->id }})" href="#" class="text-red-700 hover:text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p class="bg-white p-2 rounded">
            {{ __('There are no entries yet') }}
        </p>
    @endif

    <!-- Delete Technology Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingTechnologyDeletion">
        <x-slot name="title">
            {{ __('Delete technology') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this technology?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingTechnologyDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteTechnology" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
