<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Gunabayar;

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
    public function savepdf($id)
    {
        $bulan = gmdate('m');
        $bulansurat = '';
        switch ($bulan) {
            case '1':
                $bulansurat = 'I';
                break;
            case '2':
                $bulansurat = 'II';
                break;
            case '3':
                $bulansurat = 'III';
                break;
            case '4':
                $bulansurat = 'IV';
                break;
            case '5':
                $bulansurat = 'V';
                break;
            case '6':
                $bulansurat = 'VI';
                break;
            case '7':
                $bulansurat = 'VII';
                break;
            case '8':
                $bulansurat = 'VIII';
                break;
            case '9':
                $bulansurat = 'IX';
                break;
            case '10':
                $bulansurat = 'X';
                break;
            case '11':
                $bulansurat = 'XI';
                break;
            case '12':
                $bulansurat = 'XII';
                break;
        }
        $cari = Siswa::findOrFail($id);
        $ckelas = Kelas::findOrFail($cari->idkelas);
        $kelas = $ckelas->tingkat . '-' . $ckelas->jurusan;
        $tahunsurat = gmdate('Y');
        $data = [
            'nosurat' => '001/SMK.BN/SPO',
            'bulansurat' => $bulansurat,
            'tahunsurat' => $tahunsurat,
            'nama' => $cari->nama,
            'kelas' => $kelas,
            'idkelas' => $cari->idkelas,
            'tingkatkelas' => $ckelas->tingkat,
            'jurusankelas' => $ckelas->jurusan,
            'nis' => $cari->nis,
            'gunabayarspp' => Gunabayar::where('ket', '1')->orderBy('urut', 'asc')->get(),
            'gunabayarug' => Gunabayar::where('ket', '2')->get(),
        ];
        return view('pages.cetakpdf.pdf', $data);
    }
}
