<?php

namespace App\Http\Livewire\Table;

use App\Models\Gunabayar;
use App\Models\Kelas;
use App\Models\Keterangan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Siswa;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

class Tablecetakpdf extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $nosurat = '001/SMK.BN/SPO';
    public $tahunsurat;
    public $bulansurat;
    public $bulan;
    public $isOpen = 0;
    public $perPage = 40;
    public $sortField = "idkelas";
    public $sortKelas = '';
    public $sortTahun = '';
    public $sortAsc = false;
    public $search = '';
    public $action;
    public $button;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function get_pagination_data()
    {
        switch ($this->name) {
            case 'cetakpdf':
                $cetakpdfs = $this->model::search($this->search)
                    ->join('kelas', 'kelas.id', '=', 'siswa.idkelas')
                    ->select(
                        'siswa.id as id',
                        'siswa.nama as nama',
                        'siswa.nis as nis',
                        'siswa.tahun as tahun',
                        'siswa.idkelas as idkelas',
                        'kelas.tingkat as tingkat',
                        'kelas.jurusan as jurusan',
                    )
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->orderBy('nama', 'asc')
                    ->where('idkelas', $this->sortKelas)
                    ->where('tahun', $this->sortTahun)
                    ->paginate($this->perPage);
                return [
                    "view" => 'livewire.table.cetakpdf',
                    "cetakpdfs" => $cetakpdfs,
                    'kelas' => Kelas::orderBy('tingkat')->orderBy('jurusan')->get(),
                    "data" => array_to_object([
                        'href' => [
                            'kelase' => Kelas::orderBy('tingkat')->orderBy('jurusan')->get(),
                            'tahune' => Siswa::select('tahun')->distinct()->orderBy('tahun', 'asc')->get(),
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }

    public function romawi()
    {
        $this->bulan = gmdate('m');
        switch ($this->bulan) {
            case '1':
                $this->bulansurat = 'I';
                break;
            case '2':
                $this->bulansurat = 'II';
                break;
            case '3':
                $this->bulansurat = 'III';
                break;
            case '4':
                $this->bulansurat = 'IV';
                break;
            case '5':
                $this->bulansurat = 'V';
                break;
            case '6':
                $this->bulansurat = 'VI';
                break;
            case '7':
                $this->bulansurat = 'VII';
                break;
            case '8':
                $this->bulansurat = 'VIII';
                break;
            case '9':
                $this->bulansurat = 'IX';
                break;
            case '10':
                $this->bulansurat = 'X';
                break;
            case '11':
                $this->bulansurat = 'XI';
                break;
            case '12':
                $this->bulansurat = 'XII';
                break;
        }
    }
    public function cetak($id)
    {
        $cari = Siswa::findOrFail($id);
        $ckelas = Kelas::findOrFail($cari->idkelas);
        $kelas = $ckelas->tingkat . '-' . $ckelas->jurusan;
        $this->tahunsurat = gmdate('Y');
        $this->romawi();
        $data = [
            'nosurat' => $this->nosurat,
            'bulansurat' => $this->bulansurat,
            'tahunsurat' => $this->tahunsurat,
            'nama' => $cari->nama,
            'kelas' => $kelas,
            'idkelas' => $cari->idkelas,
            'tingkatkelas' => $ckelas->tingkat,
            'jurusankelas' => $ckelas->jurusan,
            'nis' => $cari->nis,
            'tahun' => $this->sortTahun,
            'gunabayarspp' => Gunabayar::where('ket', '1')->orderBy('urut', 'asc')->get(),
            'gunabayarug' => Gunabayar::where('ket', '2')->get(),
        ];
        $html = view('pages.cetakpdf.pdf', $data);
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Tagihan ' . $cari->nama . '.pdf', Destination::DOWNLOAD);
    }
    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }
}
