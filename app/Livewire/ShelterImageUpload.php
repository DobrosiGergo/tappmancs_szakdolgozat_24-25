<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ShelterImageUpload extends Component
{
    use WithFileUploads;

    public array $images = [];
    public array $previews = [];

    public function updatedImages()
    {
        logger('updatedImages() futott');

        $this->validate([
            'images.*' => 'image|max:2048', // max 2MB per image
        ]);

        foreach ($this->images as $image) {
            $tempPath = $image->store('temp/shelters', 'public');
            $this->previews[] = [
                'name' => $image->getClientOriginalName(),
                'path' => $tempPath,
            ];
        }

        // Frissítsük a session-t az aktuális állapotra
        session()->put('shelter_temp_images', collect($this->previews)->pluck('path')->toArray());

        // Ürítjük a fájllistát, mert már elmentettük őket
        $this->images = [];
    }

    public function removeImage($index)
    {
        if (isset($this->previews[$index])) {
            $path = $this->previews[$index]['path'];

            // Töröljük a fájlt fizikailag is
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            // Törlés a previews tömbből
            unset($this->previews[$index]);
            $this->previews = array_values($this->previews);

            // Session frissítése
            session()->put('shelter_temp_images', collect($this->previews)->pluck('path')->toArray());
        }
    }

    public function render()
    {
        return view('livewire.shelter-image-upload');
    }
    
}
