<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class ImageUpload extends Component
{
    use WithFileUploads;

    public $candidate;
    public $photo;

    protected function rules() {
        return [
            'photo' => 'image|mimes:png,jpg|max:2048'
        ];
    }

    public function upload()
    {
        $this->validate();

        $this->deleteAvatar();

        $url = $this->photo->store('images/avatars', 'public');

        $this->candidate->update(['avatar' => $url]);

        $this->reset('photo');
        $this->resetValidation();

        session()->flash('message', 'Image uploaded');
    }

    public function deleteAvatar()
    {
        $path = storage_path('app/public/' . $this->candidate->avatar);

        $this->candidate->update(['avatar' => null]);

        if(File::exists($path)) {
            File::delete($path);
        }
    }

    public function render()
    {
        return view('livewire.image-upload', [
            'candidate' => $this->candidate
        ]);
    }
}
