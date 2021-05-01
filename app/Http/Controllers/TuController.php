<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use App\Models\Siswa;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\App;

class TuController extends Controller
{
    public function index()
    {
        return view('pages.tu.siswa-data', [
            'siswa' => User::class
        ]);
    }
    public function kelas()
    {
        return view('pages.binus.kelas-data', [
            'kelas' => Kelas::class
        ]);
    }
    public function siswa()
    {
        return view('pages.binus.siswa-data', [
            'siswa' => Siswa::class
        ]);
    }
    public function pembayaran()
    {
        return view('pages.binus.pembayaran-data', [
            'pembayaran' => Pembayaran::class
        ]);
    }
    public function pembayaranpt()
    {
        return view('pages.binus.pembayaranp-data', [
            'pembayaran' => Pembayaran::class,
        ]);
    }
    public function pengeluaran()
    {
        return view('pages.binus.pengeluaran-data', [
            'pengeluaran' => Pengeluaran::class,
        ]);
    }
    public function keuangan()
    {
        return view('pages.binus.keuangan-data');
    }
    // public function pdf()
    // {

    // $pdf = PDF::loadView('pages.cetakpdf.cetakpdf');
    // return $pdf->download('Cetak.pdf');
    // $pdf = App::make('dompdf.wrapper');
    // $pdf->loadView('pages.cetakpdf.cetakpdf');
    // return $pdf->stream('cetak.pdf', array('attachment' => false));
    // }
    public function show($id)
    {
        $bayar = Pembayaran::findOrFail($id);
        $cari = Pembayaran::join('siswa', 'siswa.id', '=', 'pembayaran.idsiswa')
            ->join('kelas', 'kelas.id', '=', 'pembayaran.idkelas')
            ->join('gunabayar', 'gunabayar.id', '=', 'pembayaran.idgunabayar')
            ->where('pembayaran.id', $id)
            ->select(
                'pembayaran.id as id',
                'pembayaran.tanggalbayar as tanggalcetak',
                'pembayaran.jumlahbayar as jumlahbayar',
                'pembayaran.wajibbayar as wajibbayar',
                'pembayaran.tahun as tahun',
                'siswa.nama as nama',
                'kelas.tingkat as tingkat',
                'kelas.jurusan as jurusan',
                'gunabayar.gunabayar as gunabayar',
            )
            ->first();

        return view('pages.cetakpdf.printkwitansi', compact('cari'));
    }
}
