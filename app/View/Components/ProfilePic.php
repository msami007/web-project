<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use app\Models\user;
use Illuminate\View\Component;

class ProfilePic extends Component
{
    

    
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile-pic');
    }
}
