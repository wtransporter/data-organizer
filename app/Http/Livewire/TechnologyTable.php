<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Technology;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class TechnologyTable extends Component
{
    use WithPagination;

    public $confirmingTechnologyDeletion = false;
    public $managingTechnologies = false;
    public $title;
    public $technology;

    protected function rules()
    {
        return [
            'title' => ['required', Rule::unique('technologies')->ignore($this->technology)]
        ];
    }

    public function store()
    {
        $this->validate();

        Technology::create($this->loadData());

        $this->resetAll();
    }

    public function loadData()
    {
        return [
            'title' => $this->title
        ];
    }

    public function confirmTechnologyDelete(Technology $technology)
    {
        $this->confirmingTechnologyDeletion = true;
        $this->technology = $technology;
    }

    public function showEditForm(Technology $technology)
    {
        $this->resetAll();
        $this->managingTechnologies = true;
        $this->technology = $technology;
        $this->modelData();
    }

    public function modelData()
    {
        $this->title = $this->technology->title;
    }

    public function updateTechnology()
    {
        $this->validate();

        $this->technology->update($this->loadData());

        $this->resetAll();
    }

    public function deleteTechnology()
    {
        $this->technology->delete();

        $this->confirmingTechnologyDeletion = false;
    }

    public function cancel()
    {
        $this->managingTechnologies = false;
        $this->resetAll();
    }

    public function resetAll()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.technology-table', [
            'technologies' => Technology::paginate(10)
        ]);
    }
}
