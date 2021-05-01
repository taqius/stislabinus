<?php

namespace App\Http\Livewire;

use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use App\Models\Siswa;
use Livewire\Component;

class Keuangan extends Component
{
    public $tanggalmulai;
    public $tanggalakhir;
    public $pilihlaporan;
    public $pilihbulan;
    public $saldospp;
    public $saldomasuk;
    public $saldomasuknon;
    public $pengeluaran;
    public $totalpemasukan;
    public $sisasaldo;
    public $bulan;
    public $tahun;
    public $pengeluarans;
    public $pemasukans;
    public $isPemasukan = 0;
    public $isPengeluaran = 0;
    public $laporanpemasukan;
    public $laporanpengeluaran;
    public function mount()
    {
        $this->tanggalmulai = gmdate('Y-m-d');
        $this->tanggalakhir = gmdate('Y-m-d');
    }
    public function render()
    {
        $this->saldomasuk = Pembayaran::join('gunabayar', 'gunabayar.id', '=', 'pembayaran.idgunabayar')
            ->where('gunabayar.ket', 1)
            ->whereMonth('pembayaran.tanggalbayar', date('m'))
            ->whereYear('pembayaran.tanggalbayar', date('Y'))
            ->sum('jumlahbayar');
        $this->saldomasuknon = Pembayaran::join('gunabayar', 'gunabayar.id', '=', 'pembayaran.idgunabayar')
            ->where('gunabayar.ket', 2)
            ->whereMonth('pembayaran.tanggalbayar', date('m'))
            ->whereYear('pembayaran.tanggalbayar', date('Y'))
            ->sum('jumlahbayar');
        $this->totalpemasukan = intval($this->saldomasuk) + intval($this->saldomasuknon);
        $this->pengeluaran = Pengeluaran::whereMonth('tanggalsimpan', date('m'))
            ->whereYear('tanggalsimpan', date('Y'))
            ->sum('jumlahbayar');
        $this->sisasaldo = intval($this->totalpemasukan) - intval($this->pengeluaran);
        if ($this->pilihlaporan == 'Pengeluaran') {
            $this->pengeluarans = Pengeluaran::whereBetween('tanggalsimpan', [$this->tanggalmulai, $this->tanggalakhir])
                ->select(
                    'pengeluaran.id as id',
                    'pengeluaran.keterangan as keterangan',
                    'pengeluaran.tanggalsimpan as tanggals',
                    'pengeluaran.tanggalnota as tanggaln',
                    'pengeluaran.jumlahbayar as jumlahbayar'
                )
                ->get();
            $this->laporanpengeluaran = Pengeluaran::whereBetween('tanggalsimpan', [$this->tanggalmulai, $this->tanggalakhir])
                ->sum('jumlahbayar');
            $this->isPemasukan = false;
            $this->isPengeluaran = true;
        } elseif ($this->pilihlaporan == 'SPP') {
            $this->pemasukans = Pembayaran::join('siswa', 'siswa.id', '=', 'pembayaran.idsiswa')
                ->join('kelas', 'kelas.id', '=', 'pembayaran.idkelas')
                ->join('gunabayar', 'gunabayar.id', '=', 'pembayaran.idgunabayar')
                ->whereBetween('pembayaran.tanggalbayar', [$this->tanggalmulai, $this->tanggalakhir])
                ->where('gunabayar.ket', '1')
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
                ->get();
            $this->laporanpemasukan = Pembayaran::join('gunabayar', 'gunabayar.id', '=', 'pembayaran.idgunabayar')
                ->whereBetween('pembayaran.tanggalbayar', [$this->tanggalmulai, $this->tanggalakhir])
                ->where('gunabayar.ket', '1')
                ->sum('pembayaran.jumlahbayar');
            $this->isPengeluaran = false;
            $this->isPemasukan = true;
        } elseif ($this->pilihlaporan == 'Non-SPP') {
            $this->pemasukans = Pembayaran::join('siswa', 'siswa.id', '=', 'pembayaran.idsiswa')
                ->join('kelas', 'kelas.id', '=', 'pembayaran.idkelas')
                ->join('gunabayar', 'gunabayar.id', '=', 'pembayaran.idgunabayar')
                ->whereBetween('pembayaran.tanggalbayar', [$this->tanggalmulai, $this->tanggalakhir])
                ->where('gunabayar.ket', '2')
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
                ->get();
            $this->laporanpemasukan = Pembayaran::join('gunabayar', 'gunabayar.id', '=', 'pembayaran.idgunabayar')
                ->whereBetween('pembayaran.tanggalbayar', [$this->tanggalmulai, $this->tanggalakhir])
                ->where('gunabayar.ket', '2')
                ->sum('pembayaran.jumlahbayar');
            $this->isPengeluaran = false;
            $this->isPemasukan = true;
        } else {
            $this->isPemasukan = false;
            $this->isPengeluaran = false;
        }
        if (!empty($this->pilihbulan) && !empty($this->tahun)) {
            $this->saldospp = Pembayaran::where('idgunabayar', $this->pilihbulan)
                ->where('tahun', $this->tahun)->sum('jumlahbayar');
            $this->bulan = date('F', strtotime(date('Y') . '-' . $this->pilihbulan . '-01'));
        }
        $data = [
            'now' => date('Y'),
            'nowm' => date('F'),
            'tahuns' => Siswa::select('tahun')->distinct()->orderBy('tahun')->get(),
            'pengeluaranss' => $this->pengeluarans,
            'pemasukanss' => $this->pemasukans,
            'lappemasukan' => $this->laporanpemasukan,
            'lappengeluaran' => $this->laporanpengeluaran,
        ];
        return view('livewire.keuangan', $data);
    }
}
