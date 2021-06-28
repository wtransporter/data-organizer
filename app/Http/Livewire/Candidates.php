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
    public $search = '';

    public function delete($id)
    {
        $this->model_id = $id;
        $this->confirmingCandidateDeletion = true;
    }

    public function clearSearch()
    {
        $this->search = null;
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
            'candidates' => Candidate::when($this->search, function($query) {
                    return $query->where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('address', 'like', '%' . $this->search . '%')
                        ->orWhere('college', 'like', '%' . $this->search . '%')
                        ->orWhereHas('technologies', function($q) {
                            $q->where('title', 'like', '%' . $this->search . '%');
                        });
                })->latest()->paginate(12)
        ]);
    }
}
