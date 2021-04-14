<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'user']);
        return view('layouts.guest');
    }
}
