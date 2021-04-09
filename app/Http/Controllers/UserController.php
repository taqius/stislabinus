<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index_view()
    {
        // auth()->user()->assignRole('user');
        return view('pages.user.user-data', [
            'user' => User::class
        ]);
    }
}
