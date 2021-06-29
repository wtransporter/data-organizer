<div class="flex space-x-2 mb-2">
    <input wire:model="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
        id="title" name="title" type="text" placeholder="Tag">
    <x-jet-input-error for="title" class="mt-1 italic" />
    <a wire:click.prevent="store" class="bg-blue-500 hover:cursor-pointer hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
        type="submit">
        {{ __('Add') }}
    </a>
</div>
