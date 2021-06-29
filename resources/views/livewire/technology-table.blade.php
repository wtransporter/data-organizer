<div class="bg-white p-4 rounded">
    <x-message />
    <div>
        <h5 class="text-xl font-semibold px-1">
            {{ __('Insert new technology') }}
        </h5>
        <form wire:submit.prevent="store" method="POST" class="py-2 flex flex-col max-w-md">
            @csrf
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center justify-items-start">
                <x-jet-input wire:model="title" type="text" 
                    id="title" name="title" placeholder="Title" class="w-full mr-2"/>
                <div class="h-10 my-2 sm:my-0">
                    <x-jet-button type="submit" class="bg-blue-800 hover:bg-blue-600 active:bg-blue-900 h-full">
                        <span>{{ __('Submit') }}</span>
                    </x-jet-button>
                </div>
            </div>
            <x-jet-input-error for="title" class="mt-2 italic" />
        </form>
    </div>

    @if (count($technologies) > 0)
    <div>
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
                                    <a wire:click="showEditForm({{ $technology->id }})" href="#" class="text-blue-700 hover:text-blue-500">
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
    </div>

    <!-- Edit Technology -->
    <x-jet-dialog-modal wire:model="managingTechnologies">
        <x-slot name="title">
            {{ __('Edit Technology') }}
        </x-slot>

        <x-slot name="content">
            <label class="flex items-center">
                <x-jet-input wire:model="title" id="title" name="title"/>
                <x-jet-input-error for="title" />
            </label>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="updateTechnology" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

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
