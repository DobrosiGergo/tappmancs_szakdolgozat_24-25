<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUploader extends Component
{
    use WithFileUploads;

    public string $context = 'shelter';

    public int $max = 10;

    public int $maxSize = 2048;

    public array $images = [];

    public array $previews = [];

    public string $uid;

    public function mount(string $context = 'shelter', int $max = 10, int $maxSize = 2048)
    {
        $this->context = $context;
        $this->max     = $max;
        $this->maxSize = $maxSize;
        $this->uid     = uniqid($context . '_');

        $existing       = session()->get($this->sessionKey(), []);
        $this->previews = collect($existing)->map(fn ($path) => [
            'name' => basename($path),
            'path' => $path,
        ])->toArray();
    }

    protected function sessionKey(): string
    {
        return $this->context . '_temp_images';
    }

    protected function tempDir(): string
    {
        return 'temp/' . $this->context;
    }

    public function updatedImages()
    {
        $this->validate([
            'images'   => 'array|max:' . $this->max,
            'images.*' => 'image|max:' . $this->maxSize,
        ]);

        foreach ($this->images as $image) {
            $path             = $image->store($this->tempDir(), 'public');
            $this->previews[] = [
                'name' => $image->getClientOriginalName(),
                'path' => $path,
            ];
        }

        session()->put($this->sessionKey(), collect($this->previews)->pluck('path')->toArray());
        $this->images = [];
    }

    public function removeImage($index)
    {
        if (! isset($this->previews[$index])) {
            return;
        }

        $path = $this->previews[$index]['path'];
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        unset($this->previews[$index]);
        $this->previews = array_values($this->previews);
        session()->put($this->sessionKey(), collect($this->previews)->pluck('path')->toArray());
    }

    public function render()
    {
        return view('livewire.image-uploader');
    }
}
