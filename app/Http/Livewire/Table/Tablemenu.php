<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Menu;
use App\Models\Role;

class Tablemenu extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $idmenu;
    public $role_id;
    public $menu;
    public $route;
    public $icon;
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
        'menu' => 'required',
        'route' => 'required',
        'icon' => 'required',
    ];
    protected $messages = [
        'menu.required' => 'Isi Menu',
        'route.required' => 'Isi Route',
        'icon.required' => 'Isi Icon',
    ];

    public function store()
    {
        $data = [
            'role_id' => $this->role_id,
            'menu' => $this->menu,
            'route' => $this->route,
            'icon' => $this->icon,
        ];

        $this->validate();
        Menu::updateOrCreate(['id' => $this->idmenu], $data);
        $this->resetErrorBag();
        $this->clearVar();
        $this->emit('saved');
        $this->hideModal();
    }

    public function edit($id)
    {
        $cari = Menu::findOrFail($id);
        $this->idmenu = $id;
        $this->role_id = $cari->role_id;
        $this->menu = $cari->menu;
        $this->route = $cari->route;
        $this->icon = $cari->icon;
        $this->simpan = 'Update';
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
            case 'menu':
                $menus = $this->model::search($this->search)
                    ->join('roles', 'roles.id', '=', 'menus.role_id')
                    ->select(
                        'menus.id as id',
                        'roles.name as name',
                        'menus.menu as menu',
                        'menus.route as route',
                        'menus.icon as icon'
                    )
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.menu',
                    'role' => Role::get(),
                    "menus" => $menus,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => 'showModal()',
                            'create_new_text' => 'Buat Menu Baru',
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
        $this->idmenu = '';
        $this->menu = '';
        $this->route = '';
        $this->icon = '';
        $this->simpan = 'Simpan';
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
