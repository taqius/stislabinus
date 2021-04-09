<?php

namespace App\Http\Controllers;

use App\Models\SectionMenu;
use Illuminate\Http\Request;

class SectionMenuController extends Controller
{
    public function index()
    {
        return view('pages.menu.menu-data', [
            'menu' => SectionMenu::class
        ]);
    }
}
