<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Menu;
use Spatie\Permission\Models\Role;
use App\Models\Role as ModelsRole;

class Tablerole extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $idrole;
    public $rolename;

    public $isOpen = 0;
    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';
    public $action;
    public $button;
    public $simpan = 'Simpan';
    public $strupdt = 'store()';


    protected $listeners = ["deleteItem" => "delete_item"];
    protected $rules = [
        'rolename' => 'required',
    ];
    protected $messages = [
        'rolename.required' => 'Isi Icon',
    ];

    public function store()
    {

        $this->validate();
        Role::create([
            'name' => $this->rolename,
            'guard_name' => 'web'
        ]);
        $this->resetErrorBag();
        $this->clearVar();
        $this->emit('saved');
        $this->hideModal();
    }

    public function updt($id)
    {
        ModelsRole::where('id', $id)->update(['name' => $this->rolename]);
        $this->emit('saved');
        $this->hideModal();
    }
    public function edit($id)
    {
        $cari = Role::findOrFail($id);
        $this->idrole = $id;
        $this->rolename = $cari->name;
        $this->simpan = 'Update';
        $this->strupdt = 'updt(' . $id . ')';
        $this->button = create_button('update', "Menu");
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
            case 'role':
                $roles = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.role',
                    "roles" => $roles,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => 'showModal()',
                            'create_new_text' => 'Buat Role Baru',
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
        $this->rolename = '';
        $this->simpan = 'Simpan';
        $this->strupdt = 'store()';
        $this->button = create_button($this->action, "Menu Baru");
    }

    public function mount()
    {
        $this->button = create_button($this->action, "Menu Baru");
        // this button untuk menampilkan emit atau message toast 

    }

    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }
}
