<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class WalikelasController extends Controller
{
    public function Pembayaranperkelas()
    {
        return view('pages.binus.pembayaranperkelas-data', [
            'pembayaranperkelas' => Pembayaran::class
        ]);
    }
    public function Pembayaransppperkelas()
    {
        return view('pages.binus.pembayaransppperkelas-data', [
            'pembayaransppperkelas' => Pembayaran::class
        ]);
    }
    public function cetakpdf()
    {
        return view('pages.binus.cetakpdf-data', [
            'cetakpdf' => Siswa::class
        ]);
    }
}
