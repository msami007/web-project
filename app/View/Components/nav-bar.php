<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavBar extends Component
{
    public function __construct()
    {
        // Initialization code here, if needed.
    }

    public function render(): View|Closure|string
    {
        return view('components.nav-bar');
    }
}