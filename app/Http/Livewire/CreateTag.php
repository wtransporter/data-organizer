<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class CreateTag extends Component
{
    public $title;
    public $candidate_id;

    protected function rules()
    {
        return [
            'title' => 'required'
        ];
    }

    public function store()
    {
        $this->validate();

        Tag::create($this->loadData());

        $this->reset('title');

        $this->emit('tagCreated');
    }

    public function loadData()
    {
        return [
            'candidate_id' => $this->candidate_id,
            'title' => $this->title
        ];
    }

    public function render()
    {
        return view('livewire.create-tag');
    }
}
