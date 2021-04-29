<?php

namespace App\Http\Controllers;

use App\Models\Gunabayar;
use App\Models\Kelas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function gunabayar()
    {
        return view('pages.binus.gunabayar-data', [
            'gunabayar' => Gunabayar::class
        ]);
    }
}
