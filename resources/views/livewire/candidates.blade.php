<div class="w-full">
    <div class="w-full flex h-8 my-2">
        <input wire:model.debounce.600ms="search" class="" 
            id="search" type="text" placeholder="search">
        <x-jet-button wire:click="clearSearch" type="submit" 
            class="bg-blue-800 hover:bg-blue-600 active:bg-blue-900 h-full ml-4">
            <span>{{ __('Clear') }}</span>
        </x-jet-button>
    </div>
    <div class="overflow-hidden grid md:grid-cols-3 lg:grid-cols-4 md:gap-2">
        @foreach ($candidates as $candidate)
            <x-candidate-card :candidate="$candidate" />
        @endforeach
    </div>
    <div class="mt-4">
        {{ $candidates->links() }}
    </div>
<!-- Delete Candidate Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingCandidateDeletion">
        <x-slot name="title">
            {{ __('Delete candidate') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this candidate?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingCandidateDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteCandidate" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
