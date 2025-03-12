<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

use Livewire\Attributes\Layout;

class AppLayout extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('layouts.app');
        // Eltávolítottuk a styleClass átadását, mert JavaScript kezeli
    }
}