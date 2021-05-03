<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Gunabayar;
use App\Models\Keterangan;
use App\Models\Pembayaran;

class Tablepanitia extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $idpembayaran;
    public $idsiswa;
    public $nis;
    public $idkelas;
    public $idgunabayar;
    public $tahun;
    public $tanggalbayar;
    public $wajibbayar;
    public $jumlahbayar;
    public $jumlahbayarf;
    public $simpan = 'Simpan';

    public $isOpen = 0;
    public $perPage = 10;
    public $sortField = "tanggalbayar";
    public $sortAsc = false;
    public $search = '';
    public $action;
    public $button;

    protected $listeners = ["deleteItem" => "delete_item"];
    protected $rules = [
        'idsiswa' => 'required',
        'nis' => 'required',
        'idkelas' => 'required',
        'idgunabayar' => 'required',
        'tahun' => 'required',
        'tanggalbayar' => 'required',
        'wajibbayar' => 'required',
        'jumlahbayar' => 'required',
    ];
    protected $messages = [
        'idsiswa.required' => 'Pilih Siswa',
        'nis.required' => 'Isi NIS',
        'idkelas.required' => 'Pilih Kelas',
        'idgunabayar.required' => 'Pilih Pembayaran',
        'tahun.required' => 'Pilih Tahun',
        'tanggalbayar.required' => 'Isi Tanggal',
        'wajibbayar.required' => 'Isi Wajib Bayar',
        'jumlahbayar.required' => 'Isi Jumlah Bayar',
    ];

    public function store()
    {
        $data = [
            'idsiswa' => $this->idsiswa,
            'nis' => $this->nis,
            'idkelas' => $this->idkelas,
            'idgunabayar' => $this->idgunabayar,
            'tahun' => $this->tahun,
            'tanggalbayar' => $this->tanggalbayar,
            'wajibbayar' => preg_replace("/[^0-9]/", "", $this->wajibbayar),
            'jumlahbayar' => $this->jumlahbayar,
        ];

        $this->validate();
        Pembayaran::updateOrCreate(['id' => $this->idpembayaran], $data);
        $this->resetErrorBag();
        $this->clearVar();
        $this->emit('saved');
        $this->hideModal();
    }

    public function edit($id)
    {
        $cari = Pembayaran::findOrFail($id);
        $this->idpembayaran = $id;
        $this->idkelas = $cari->idkelas;
        $this->tahun = $cari->tahun;
        $this->idsiswa = $cari->idsiswa;
        $this->nis = $cari->nis;
        $this->idgunabayar = $cari->idgunabayar;
        $this->tanggalbayar = date('Y-m-d', strtotime($cari->tanggalbayar));
        $this->jumlahbayar = $cari->jumlahbayar;
        $this->jumlahbayarf = $cari->jumlahbayar;
        $this->wajibbayar = $cari->wajibbayar;
        $this->simpan = 'Update';
        $this->button = create_button('update', "Pembayaran");
        $this->showModal();
    }

    public function showModal()
    {
        $this->isOpen = true;
    }

    public function hideModal()
    {
        $this->resetErrorBag();
        $this->clearVar();
        $this->isOpen = false;
    }

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
            case 'pembayaran':
                $pembayarans = $this->model::search($this->search)
                    ->join('siswa', 'siswa.id', '=', 'pembayaran.idsiswa')
                    ->join('kelas', 'kelas.id', '=', 'pembayaran.idkelas')
                    ->join('gunabayar', 'gunabayar.id', '=', 'pembayaran.idgunabayar')
                    ->where('gunabayar.jenisket', 'SPP')
                    ->select(
                        'pembayaran.id as id',
                        'pembayaran.tanggalbayar as tanggal',
                        'pembayaran.jumlahbayar as jumlahbayar',
                        'pembayaran.wajibbayar as wajibbayar',
                        'pembayaran.tahun as tahun',
                        'siswa.nama as nama',
                        'kelas.tingkat as tingkat',
                        'kelas.jurusan as jurusan',
                        'gunabayar.gunabayar as gunabayar',
                    )
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->orderBy('pembayaran.created_at', 'desc')
                    ->paginate($this->perPage);
                $siswane = [];
                if (!empty($this->idkelas) && !empty($this->tahun)) {
                    $siswane = Siswa::where('idkelas', $this->idkelas)->where('tahun', $this->tahun)->get();
                }
                if (!empty($this->idsiswa)) {
                    $cari3 = Siswa::findOrFail($this->idsiswa);
                    $this->nis = $cari3->nis;
                }
                if (!empty($this->idgunabayar)) {
                    $cari2 = Gunabayar::findOrFail($this->idgunabayar);
                    $this->wajibbayar = 'Rp. ' . number_format($cari2->wajibbayar, 0, ".", ".") . ",-";
                }
                $this->jumlahbayarf = 'Rp. ' . number_format(intval($this->jumlahbayar), 0, ".", ".") . ",-";
                return [
                    "view" => 'livewire.table.pembayaran',
                    "pembayarans" => $pembayarans,
                    'kelas' => Kelas::orderBy('tingkat')->orderBy('jurusan')->get(),
                    'tahuns' => Siswa::select('tahun')->distinct()->orderBy('tahun')->get(),
                    'siswane' => $siswane,
                    'gunane' => Gunabayar::where('jenisket', 'SPP')->orderBy('urut', 'asc')->get(),
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => 'showModal()',
                            'create_new_text' => 'Input Bayar',
                            'export' => '#',
                            'export_text' => 'Disabled'
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }

    public function delete_item($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Gagal menghapus data " . $this->name
            ]);
            return;
        }

        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil dihapus!"
        ]);
    }

    public function clearVar()
    {
        $this->idpembayaran = '';
        $this->idkelas = '';
        $this->idsiswa = '';
        $this->nis = '';
        $this->idgunabayar = '';
        $this->tahun = '';
        $this->tanggalbayar = gmdate('Y-m-d');
        $this->jumlahbayar = '';
        $this->wajibbayar = '';
        $this->simpan = 'Simpan';
        $this->button = create_button($this->action, "Pembayaran Baru");
    }

    public function mount()
    {
        $this->tanggalbayar = gmdate('Y-m-d');
        $this->button = create_button($this->action, "Pembayaran Baru");
        // this button untuk menampilkan emit atau message toast 

    }

    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }
}
