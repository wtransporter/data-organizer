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

    public function confirmTechnologyDelete($id)
    {
        $this->confirmingTechnologyDeletion = true;
        $this->model_id =$id;
    }

    public function deleteTechnology()
    {
        $technology = Technology::find($this->model_id);
        $technology->delete();
        
        $this->confirmingTechnologyDeletion = false;
    }

    public function render()
    {
        return view('livewire.technology-table', [
            'technologies' => Technology::paginate(10)
        ]);
    }
}
