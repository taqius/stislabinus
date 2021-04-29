<?php

namespace App\Http\Livewire\Table;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Role as ModelsRole;
use Illuminate\Foundation\Auth\User as AuthUser;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Collection;

class Tableuserrole extends Component
{
    use WithPagination;

    public Collection $cari;
    public $model;
    public $name;
    public $role_id;
    public $model_type = 'App/Models/User';
    public $user_id;
    public $user;
    public $simpan = 'Simpan';

    public $isOpen = 0;
    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';
    public $action;
    public $button;

    protected $listeners = ["deleteItem" => "delete_item"];


    public function add()
    {
        // $data = [
        //     'role_id' => $this->role_id,
        //     'model_type' => $this->model_type,
        //     'model_id' => $this->user_id,
        // ];

        // UserRole::create($data);
        // $this->resetErrorBag();
        $userid = User::find($this->user_id);
        $rolename = $this->role_id;
        $userid->assignRole($rolename);
        $this->emit('saved');
        // $this->hideModal();
    }

    public function edit($id)
    {
        $cari = User::find($id);
        $this->user = $cari->name;
        $this->user_id = $id;
        $this->showModal();
    }
    public function delete_t($id)
    {
        $userid = User::find($this->user_id);
        $rolename = Role::find($id);
        $userid->removeRole($rolename->name);
        $this->emit('saved');



        // $data = UserRole::find($id);
        // if (!$data) {
        //     $this->emit('deleteResult', [
        //         'status' => false,
        //         'message' => 'Gagal menghapus data Transaksi'
        //     ]);
        //     return;
        // }
        // $data->delete();
    }
    public function showModal()
    {
        $this->isOpen = true;
    }

    public function hideModal()
    {
        $this->resetErrorBag();
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
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                $roless = ModelsRole::get();
                $rolenya = ModelsRole::join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->join('users', 'users.id', '=', 'model_has_roles.model_id')
                    ->select(
                        'roles.name as name',
                        'roles.id as id',
                    )
                    ->where('users.id', $this->user_id)
                    ->get();
                // $role2 = UserRole::where('model_id', '=', $this->user_id)
                //     ->first();
                // $roless = Role::join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
                //     ->select(
                //         'roles.name as name',
                //         'roles.id as id',
                //         'model_has_roles.model_id as model_id',
                //         'model_has_roles.role_id as role_id'
                //     )
                //     ->where('model_id', '!=', $this->user_id)
                //     ->where('role_id', '!=', $role2->role_id)
                //     ->get();
                return [
                    "view" => 'livewire.table.userrole',
                    "rolenya" => $rolenya,
                    'roless' => $roless,
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => '',
                            'create_new_text' => 'Disabled',
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

    public function mount()
    {
        $this->button = create_button('update', "Set Role");
        // this button untuk menampilkan emit atau message toast 

    }

    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }
}
