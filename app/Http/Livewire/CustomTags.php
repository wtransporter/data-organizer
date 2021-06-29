<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomTags extends Component
{
    public $candidate;

    protected $listeners = [
        'deleted' => '$refresh',
        'tagCreated' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.custom-tags');
    }
}
