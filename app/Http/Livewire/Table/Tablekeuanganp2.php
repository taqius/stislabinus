<?php

namespace App\Http\Livewire\Table;

use App\Models\Gunabayar;
use App\Models\Kelas;
use App\Models\Pembayaran;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Siswa;

class Tablekeuanganp2 extends Component
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
    public $perPage = 10;
    public $sortField = "tanggalbayar";
    public $sortGunabayar = '';
    public $sortTahun = '';
    public $sortKelas = '';
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
            case 'keuanganp2':
                $keuanganp2s = Pembayaran::searchp($this->search)
                    ->join('siswa', 'siswa.id', '=', 'pembayaran.idsiswa')
                    ->join('kelas', 'kelas.id', '=', 'pembayaran.idkelas')
                    ->join('gunabayar', 'gunabayar.id', '=', 'pembayaran.idgunabayar')
                    ->where('pembayaran.idgunabayar', $this->sortGunabayar)
                    ->where('pembayaran.tahun', $this->sortTahun)
                    ->where('pembayaran.idkelas', $this->sortKelas)
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
                    ->paginate($this->perPage);
                if (!empty($this->pilihgunane) && !empty($this->pilihtahun)) {
                    $this->saldogunane = Pembayaran::where('idgunabayar', $this->pilihgunane)
                        ->where('tahun', $this->pilihtahun)
                        ->sum('jumlahbayar');
                    $cari = Gunabayar::findOrFail($this->pilihgunane);
                    $this->gunabayare = $cari->gunabayar;
                }
                return [
                    "view" => 'livewire.table.keuanganp2',
                    "keuanganp2s" => $keuanganp2s,
                    'tahuns' => Siswa::select('tahun')->distinct()->orderBy('tahun', 'asc')->get(),
                    'gunans' => Gunabayar::where('jenisket', 'Non-SPP')->orderBy('gunabayar')->get(),
                    "data" => array_to_object([
                        'href' => [
                            'gunabayare' => Gunabayar::where('jenisket', 'Non-SPP')->orderBy('gunabayar')->get(),
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
