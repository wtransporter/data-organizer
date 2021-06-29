<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class SingleTag extends Component
{
    public $tag;

    public function delete(Tag $tag)
    {
        $tag->delete();

        $this->emit('deleted');
    }

    public function render()
    {
        return view('livewire.single-tag');
    }
}
