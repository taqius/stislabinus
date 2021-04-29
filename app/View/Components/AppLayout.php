<?php

namespace App\View\Components;

use App\Models\Menu;
use App\Models\Role as ModelsRole;
use App\Models\RoleMenu;
use App\Models\SubMenu;
use App\Models\UserMenu;
use App\Models\UserRole;
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
            'role' => ModelsRole::get(),
            'menu' => Menu::get(),
            'userrole' => UserRole::where('model_id', auth()->user()->id)->get()
        ]);
    }
}
