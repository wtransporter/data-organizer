<span class="bg-blue-400 px-2 text-white text-sm rounded-md my-2 mr-1">
    {{ $tag->title }}
    <a wire:click.prevent="delete({{ $tag->id }})" href="#" class="ml-1 text-blue-700 hover:text-blue-900">x</a>
</span>