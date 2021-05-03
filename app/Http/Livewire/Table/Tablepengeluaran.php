<?php

namespace App\Http\Livewire\Table;

use App\Models\Pengeluaran;
use Livewire\Component;
use Livewire\WithPagination;

class Tablepengeluaran extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $idpengeluaran;
    public $keterangan;
    public $tanggalsimpan;
    public $tanggalnota;
    public $jumlahbayar;
    public $jumlahbayarf;
    public $simpan = 'Simpan';

    public $isOpen = 0;
    public $perPage = 10;
    public $sortField = "tanggalsimpan";
    public $sortAsc = false;
    public $search = '';
    public $action;
    public $button;

    protected $listeners = ["deleteItem" => "delete_item"];
    protected $rules = [
        'keterangan' => 'required',
        'tanggalsimpan' => 'required',
        'tanggalnota' => 'required',
        'jumlahbayar' => 'required|numeric',
    ];
    protected $messages = [
        'keterangan.required' => 'Isi Keterangan',
        'tanggalsimpan.required' => 'Pilih Tanggal Simpan',
        'tanggalnota.required' => 'Pilih Tanggal Nota',
        'jumlahbayar.required' => 'Isi Jumlah Bayar',
        'jumlahbayar.numeric' => 'Jumlah Bayar Harus Angka',
    ];

    public function store()
    {
        $data = [
            'keterangan' => $this->keterangan,
            'tanggalsimpan' => $this->tanggalsimpan,
            'tanggalnota' => $this->tanggalnota,
            'jumlahbayar' => $this->jumlahbayar,
        ];

        $this->validate();
        Pengeluaran::updateOrCreate(['id' => $this->idpengeluaran], $data);
        $this->resetErrorBag();
        $this->clearVar();
        $this->emit('saved');
        $this->hideModal();
    }

    public function edit($id)
    {
        $cari = Pengeluaran::findOrFail($id);
        $this->idpengeluaran = $id;
        $this->keterangan = $cari->keterangan;
        $this->tanggalnota = date('Y-m-d', strtotime($cari->tanggalnota));
        $this->tanggalsimpan = date('Y-m-d', strtotime($cari->tanggalsimpan));
        $this->jumlahbayar = $cari->jumlahbayar;
        $this->simpan = 'Update';
        $this->button = create_button('update', "Pengeluaran");
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
            case 'pengeluaran':
                $pengeluarans = $this->model::search($this->search)
                    ->select(
                        'pengeluaran.id as id',
                        'pengeluaran.keterangan as keterangan',
                        'pengeluaran.tanggalsimpan as tanggals',
                        'pengeluaran.tanggalnota as tanggaln',
                        'pengeluaran.jumlahbayar as jumlahbayar'
                    )
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->orderBy('pengeluaran.created_at', 'desc')
                    ->paginate($this->perPage);
                $this->jumlahbayarf = 'Rp. ' . number_format(intval($this->jumlahbayar), 0, ".", ".") . ",-";
                return [
                    "view" => 'livewire.table.pengeluaran',
                    "pengeluarans" => $pengeluarans,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => 'showModal()',
                            'create_new_text' => 'Input Pengeluaran',
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
        $this->idpengeluaran = '';
        $this->tanggalnota = gmdate('Y-m-d');
        $this->keterangan = '';
        $this->tanggalsimpan = gmdate('Y-m-d');
        $this->jumlahbayar = '';
        $this->simpan = 'Simpan';
        $this->button = create_button($this->action, "Pengeluaran Baru");
    }

    public function mount()
    {
        $this->tanggalnota = gmdate('Y-m-d');
        $this->tanggalsimpan = gmdate('Y-m-d');
        $this->button = create_button($this->action, "Pengeluaran Baru");
        // this button untuk menampilkan emit atau message toast 

    }

    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }
}
