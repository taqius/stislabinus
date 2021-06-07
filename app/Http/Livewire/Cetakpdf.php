<?php

namespace App\Http\Livewire;

use App\Models\Gunabayar;
use App\Models\Kelas;
use Livewire\Component;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade as PDF;
use Mpdf\Mpdf;

class Cetakpdf extends Component
{
    public $pilihgunane;
    public $tahun;
    public $pilihlaporan;
    public $pilihtahun;
    public $saldogunane;
    public $gunabayare;
    public $pemasukans;
    public $idkelas;
    public $idsiswa;

    public function cetak()
    {
        // $pdf = MpdfMpdf::loadView('pages.cetakpdf');
        // return $pdf->download('cetak.pdf');
        $html = view('pages.cetakpdf.pdf');
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    public function mount()
    {
        $this->tanggalmulai = gmdate('Y-m-d');
        $this->tanggalakhir = gmdate('Y-m-d');
    }
    public function render()
    {
        if (!empty($this->pilihgunane) && !empty($this->tahun)) {
            $this->saldogunane = Pembayaran::where('idgunabayar', $this->pilihgunane)
                ->where('tahun', $this->tahun)
                ->sum('jumlahbayar');
            $cari = Gunabayar::findOrFail($this->pilihgunane);
            $this->gunabayare = $cari->gunabayar;
        }
        if (!empty($this->pilihlaporan) && !empty($this->pilihtahun)) {
            $this->pemasukans = Pembayaran::join('siswa', 'siswa.id', '=', 'pembayaran.idsiswa')
                ->join('kelas', 'kelas.id', '=', 'pembayaran.idkelas')
                ->join('gunabayar', 'gunabayar.id', '=', 'pembayaran.idgunabayar')
                ->where('pembayaran.idgunabayar', $this->pilihlaporan)
                ->where('pembayaran.tahun', $this->pilihtahun)
                ->select(
                    'pembayaran.id as id',
                    'pembayaran.tanggalbayar as tanggal',
                    'pembayaran.jumlahbayar as jumlahbayar',
                    'pembayaran.tahun as tahun',
                    'siswa.nama as nama',
                    'kelas.tingkat as tingkat',
                    'kelas.jurusan as jurusan',
                    'gunabayar.gunabayar as gunabayar',
                )
                ->orderBy('pembayaran.tanggalbayar', 'desc')
                ->orderBy('pembayaran.created_at', 'desc')
                ->get();
        }
        $data = [
            'now' => date('Y'),
            'nowm' => date('F'),
            'kelass' => Kelas::orderBy('tingkat')->orderBy('jurusan')->get(),
            'tahuns' => Siswa::select('tahun')->distinct()->orderBy('tahun')->get(),
            'siswas' => Siswa::where('idkelas', $this->idkelas)->where('tahun', $this->tahun)->get(),
            'gunane' => Gunabayar::where('jenisket', 'Non-SPP')->orderBy('gunabayar')->get(),
            'pemasukanss' => $this->pemasukans,
        ];
        return view('livewire.cetakpdf', $data);
    }
}
