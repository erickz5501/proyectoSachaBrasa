<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;
use App\Models\User;
use DB;

class PermisosController extends Component
{
    use WithPagination;
    public $permissionName, $search, $selected_id, $pagetitle, $componentName;
    private $pagination = 5;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function mount(){
        $this->pagetitle = 'Listado';
        $this->componentName = 'Permisos';
    }   


    public function render()
    {
        if (strlen($this->search) > 0) 
            $permisos = Permission::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $permisos = Permission::orderBy('name', 'asc')->paginate($this->pagination);

        return view('livewire.permisos.permisos',[
            'permisos'=> $permisos
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function CreatePermission()
    {
        $rules = ['permissionName' => 'required|min:2|unique:permissions,name'];
        $this->validate($rules);


        Permission::Create(['name' => $this->permissionName]);

        $this->emit('permiso-added', 'Se registró el permiso con éxito');
        $this->resetUI();
    }
    public function Edit(Permission $permiso)
    {
        $this->selected_id = $permiso->id;
        $this->roleName = $permiso->name;

        $this->emit('modal-show', 'modal show!!');
    }

    public function UpdatePermission()
    {
        $rules = ['permissionName' => 'required|min:2|unique:roles,name, {$this->selected_id}'];
        $this->validate($rules);

        $permiso = Permission::find($this->selected_id);
        $permiso -> name = $this->permissionName;
        $permiso->save();

        $this->emit('permiso-updated', 'Se Actualizo el permiso con éxito');
        $this->resetUI();
    }

    public function resetUI(){//Limpiamos los valores de las propiedades publicas
        $this->permissionName = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->resetValidation();
        $this->resetPage();

    }
    protected $listeners = ['deleteRow'=> 'Destroy'];

    public function Destroy($id)
    {
        $rolesCount=Permission::find($id)->getRoleNames()->count();
        if($rolesCount > 0){
            $this ->emit('permiso-error', 'No se puede eliminar el permiso porque tiene roles asociados');
            return;
        }
        Permission::find($id)->delete();
        $this ->emit('permiso-deleted', 'Permiso eliminado xd'); 
        
    }
    // public function AsignarRoles($rolesList)
    // {
    //     if ($this->userSelected > 0) {
    //         $user = User::find($this->userSelected);
    //         if ($user) {
    //             $user->syncRoles($rolesList);
    //             $this->emit('msg-ok', 'Roles asignados correctamente');
    //             $this->resetInput();
    //         }
    //     }
    // }
}
