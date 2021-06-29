<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomTags extends Component
{
    public $tags;

    protected $listeners = ['deleted' => '$refresh'];

    public function render()
    {
        return view('livewire.custom-tags');
    }
}
