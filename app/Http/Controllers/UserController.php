<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        // auth()->user()->assignRole('user');
        return view('pages.user.user-data', [
            'user' => User::class
        ]);
    }
    public function index_role()
    {
        // auth()->user()->assignRole('user');
        return view('pages.user.userrole-data', [
            'user' => User::class
        ]);
    }
    public function role_view()
    {
        // auth()->user()->assignRole('user');
        return view('pages.user.role-data', [
            'role' => Role::class
        ]);
    }
}
