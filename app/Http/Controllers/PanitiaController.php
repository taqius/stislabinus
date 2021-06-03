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
    public function keuanganp()
    {
        return view('pages.binus.keuanganp2-data', [
            'keuanganp2' => Pembayaran::class
        ]);
    }
    public function Pembayaranperkelas()
    {
        return view('pages.binus.pembayaranperkelas-data', [
            'pembayaranperkelas' => Pembayaran::class
        ]);
    }
}
