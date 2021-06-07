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
