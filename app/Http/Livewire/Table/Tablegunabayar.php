<?php

namespace App\Http\Livewire\Table;

use App\Models\Gunabayar;
use Livewire\Component;
use Livewire\WithPagination;

class Tablegunabayar extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $idgunabayar;
    public $role_id;
    public $gunabayar;
    public $wajibbayar;
    public $jenisket = 'Non-SPP';
    public $simpan = 'Simpan';

    public $isOpen = 0;
    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';
    public $action;
    public $button;

    protected $listeners = ["deleteItem" => "delete_item"];
    protected $rules = [
        'gunabayar' => 'required',
        'wajibbayar' => 'required|numeric',
    ];
    protected $messages = [
        'gunabayar.required' => 'Isi Guna Bayar',
        'wajibbayar.required' => 'Isi Wajib Bayar',
        'wajibbayar.numeric' => 'Wajib Bayar Harus Berupa Angka',
    ];

    public function store()
    {
        $data = [
            'gunabayar' => $this->gunabayar,
            'wajibbayar' => $this->wajibbayar,
            'jenisket' => $this->jenisket,
            'pdf' => '',
            'ket' => '',
            'urut' => 0,
        ];

        $this->validate();
        Gunabayar::updateOrCreate(['id' => $this->idgunabayar], $data);
        $this->resetErrorBag();
        $this->clearVar();
        $this->emit('saved');
        $this->hideModal();
    }

    public function edit($id)
    {
        $cari = gunabayar::findOrFail($id);
        $this->idgunabayar = $id;
        $this->gunabayar = $cari->gunabayar;
        $this->wajibbayar = $cari->wajibbayar;
        $this->simpan = 'Update';
        $this->button = create_button('update', "Gunabayar");
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
            case 'gunabayar':
                $gunabayars = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.gunabayar',
                    "gunabayars" => $gunabayars,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => 'showModal()',
                            'create_new_text' => 'Buat Gunabayar',
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
        $this->idgunabayar = '';
        $this->gunabayar = '';
        $this->wajibbayar = '';
        $this->simpan = 'Simpan';
        $this->button = create_button($this->action, "Gunabayar Baru");
    }

    public function mount()
    {
        $this->button = create_button($this->action, "Gunabayar Baru");
        // this button untuk menampilkan emit atau message toast 

    }

    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }
}
