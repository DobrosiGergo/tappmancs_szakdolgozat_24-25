<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Shelter;

class ShelterCard extends Component
{
    /**
     * Create a new component instance.
     */
    public Shelter $shelter;
    public function __construct(Shelter $shelter)
    {
        $this->shelter=$shelter;
    }
    public function imageUrl(): string
    {
        return !empty($this->shelter->images[0]) ? asset('storage/'.$this->shelter->images[0]) : 'https://placehold.co/300x200?text=Nincs+kép&font=roboto';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shelter-card');
    }
}
