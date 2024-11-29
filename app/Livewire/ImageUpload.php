<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUpload extends Component
{

    use WithFileUploads;

    public $images = [];

    public function save()
    {
        $this->validate([
            'images.*' => 'image|max:1024', // Max 1 mb
        ]);

        foreach($this->images as $image) {
            $image->store('public');
        }
    }

    public function render()
    {
        return view('livewire.image-upload', [
            "allImages" => collect(Storage::files('public'))
                ->filter(function($file) {
                    return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['png', 'jpg', 'jpeg', 'gif']);
                })
                ->map(function ($file) {
                    return Storage::url($file);
                })
        ]);
    }
}
