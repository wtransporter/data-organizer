<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class UploadDocument extends Component
{
    use WithFileUploads;

    public $candidate;
    public $file;
    public $filePath = 'documents';

    protected function rules() {
        return [
            'file' => 'file|mimes:pdf,txt'
        ];
    }

    public function upload()
    {
        $this->validate();

        $this->delete();

        $url = $this->file->store($this->filePath, 'public');

        $this->candidate->update(['document' => $url]);

        $this->reset('file');
        $this->resetValidation();

        session()->flash('message', 'File uploaded');
    }

    public function delete()
    {
        $path = storage_path('app/public/' . $this->candidate->document);

        $this->candidate->update(['document' => null]);

        if(File::exists($path)) {
            File::delete($path);
        }
    }
    public function render()
    {
        return view('livewire.upload-document');
    }
}
