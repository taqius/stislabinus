<?php

namespace App\View\Components;

use App\Models\Section;
use App\Models\SectionMenu;
use App\Models\UserSection;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\Component;

class AppLayout extends Component
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
        // auth()->user()->assignRole('user');
        return view('layouts.app', [
            'section' => Section::get(),
            'menu' => SectionMenu::get(),
            'usersection' => UserSection::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
