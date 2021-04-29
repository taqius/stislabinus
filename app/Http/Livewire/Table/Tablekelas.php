<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kelas;

class Tablekelas extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $idkelas;
    public $tingkat;
    public $jurusan;
    public $simpan = 'Simpan';

    public $isOpen = 0;
    public $perPage = 10;
    public $sortField = "tingkat";
    public $sortAsc = false;
    public $search = '';
    public $action;
    public $button;

    protected $listeners = ["deleteItem" => "delete_item"];
    protected $rules = [
        'jurusan' => 'required',
        'tingkat' => 'required',
    ];
    protected $messages = [
        'jurusan.required' => 'Isi Jurusan',
        'tingkat.required' => 'Isi Tingkat',
    ];

    public function store()
    {
        $data = [
            'tingkat' => $this->tingkat,
            'jurusan' => $this->jurusan,
        ];

        $this->validate();
        Kelas::updateOrCreate(['id' => $this->idkelas], $data);
        $this->resetErrorBag();
        $this->clearVar();
        $this->emit('saved');
        $this->hideModal();
    }

    public function edit($id)
    {
        $cari = Kelas::findOrFail($id);
        $this->idkelas = $id;
        $this->jurusan = $cari->jurusan;
        $this->tingkat = $cari->tingkat;
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
            case 'kelas':
                $kelass = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.kelas',
                    "kelass" => $kelass,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => 'showModal()',
                            'create_new_text' => 'Buat Kelas',
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
        $this->idkelas = '';
        $this->jurusan = '';
        $this->tingkat = '';
        $this->simpan = 'Simpan';
        $this->button = create_button($this->action, "Kelas Baru");
    }

    public function mount()
    {
        $this->button = create_button($this->action, "Kelas Baru");
        // this button untuk menampilkan emit atau message toast 

    }

    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }
}
