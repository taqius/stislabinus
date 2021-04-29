<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PanitiaController extends Controller
{
    public function pembayaranp()
    {
        return view('pages.binus.pembayaranp-data', [
            'pembayaran' => Pembayaran::class
        ]);
    }
}
