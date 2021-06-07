<?php

namespace App\Http\Livewire\Table;

use App\Models\Gunabayar;
use App\Models\Kelas;
use App\Models\Pembayaran;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Siswa;

class Tablecetakpdf extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $pilihgunane;
    public $pilihlaporan;
    public $pilihtahun;
    public $saldogunane;
    public $gunabayare;

    public $isOpen = 0;
    public $perPage = 5;
    public $sortField = "nama";
    public $sortGunabayar = '';
    public $sortTahun = '';
    public $sortKelas = '';
    public $sortSiswa = '';
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
                $cetakpdfs = Siswa::search($this->search)
                    ->join('kelas', 'kelas.id', '=', 'siswa.idkelas')
                    ->select(
                        'siswa.id as id',
                        'siswa.nama as nama',
                        'siswa.nis as nis',
                        'siswa.tahun as tahun',
                        'siswa.ortu as ortu',
                        'siswa.ket as ket',
                        'siswa.idkelas as idkelas',
                        'kelas.tingkat as tingkat',
                        'kelas.jurusan as jurusan',
                    )
                    ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                    ->orderBy('nama', 'asc')
                    ->where('idkelas', $this->sortKelas)
                    ->where('tahun', $this->sortTahun)
                    ->paginate($this->perPage);
                if (!empty($this->pilihgunane) && !empty($this->pilihtahun)) {
                    $this->saldogunane = Pembayaran::where('idgunabayar', $this->pilihgunane)
                        ->where('tahun', $this->pilihtahun)
                        ->sum('jumlahbayar');
                    $cari = Gunabayar::findOrFail($this->pilihgunane);
                    $this->gunabayare = $cari->gunabayar;
                }
                return [
                    "view" => 'livewire.table.cetakpdf',
                    "cetakpdfs" => $cetakpdfs,
                    'tahuns' => Siswa::select('tahun')->distinct()->orderBy('tahun', 'asc')->get(),
                    'gunans' => Gunabayar::where('ket', '1')->orderBy('urut')->get(),
                    'gunans2' => Gunabayar::where('ket', '2')->orderBy('urut')->get(),
                    'siswane' => Siswa::where('idkelas', $this->sortKelas)->where('tahun', $this->sortTahun)->orderBy('nama', 'asc')->get(),
                    "data" => array_to_object([
                        'href' => [
                            'tahune' => Siswa::select('tahun')->distinct()->orderBy('tahun', 'asc')->get(),
                            'kelase' => Kelas::orderBy('tingkat', 'asc')->orderBy('jurusan', 'asc')->get(),
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }


    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }
}
