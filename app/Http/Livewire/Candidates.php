<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use Livewire\WithPagination;

class Candidates extends Component
{
    use WithPagination;

    public $confirmingCandidateDeletion = false;
    public $model_id;

    public function delete($id)
    {
        $this->model_id = $id;
        $this->confirmingCandidateDeletion = true;
    }

    public function deleteCandidate()
    {
        $candidate = Candidate::find($this->model_id);

        $candidate->technologies()->detach();

        $candidate->delete();

        $this->confirmingCandidateDeletion = false;

        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.candidates', [
            'candidates' => Candidate::latest()->paginate(12)
        ]);
    }
}
