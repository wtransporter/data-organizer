<?php

namespace App\Http\Livewire;

use App\Models\Technology;
use Livewire\Component;
use Livewire\WithPagination;

class TechnologyTable extends Component
{
    use WithPagination;

    public $confirmingTechnologyDeletion = false;
    public $model_id;
    public $title;

    protected function rules()
    {
        return [
            'title' => 'required|unique:technologies,title'
        ];
    }

    public function store()
    {
        $this->validate();

        Technology::create($this->loadData());

        $this->reset();
        $this->resetValidation();
    }

    public function loadData()
    {
        return [
            'title' => $this->title
        ];
    }

    public function confirmTechnologyDelete($id)
    {
        $this->confirmingTechnologyDeletion = true;
        $this->model_id =$id;
    }

    public function deleteTechnology()
    {
        Technology::find($this->model_id)->delete();

        $this->confirmingTechnologyDeletion = false;
    }

    public function render()
    {
        return view('livewire.technology-table', [
            'technologies' => Technology::paginate(10)
        ]);
    }
}
