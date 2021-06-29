<div class="flex flex-wrap">
    @forelse ($candidate->tags as $tag)
        @livewire('single-tag', ['tag' => $tag], key($tag->id))
    @empty
        <span class="text-sm text-blue-800 italic">{{ ('No tags yet') }}</span>
    @endforelse
</div>
