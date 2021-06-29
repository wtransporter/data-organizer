<div class="">
    @foreach ($tags as $tag)
        @livewire('single-tag', ['tag' => $tag], key($tag->id))
    @endforeach
</div>
