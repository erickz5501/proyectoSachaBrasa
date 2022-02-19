<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;
use App\Models\User;
use DB;

class RolesController extends Component
{
    use WithPagination;
    public $roleName, $search, $selected_id, $pagetitle, $componentName;
    private $pagination = 5;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function mount(){
        $this->pagetitle = 'Listado';
        $this->componentName = 'Roles';
    }   


    public function render()
    {
        if (strlen($this->search) > 0) 
            $roles = Role::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $roles = Role::orderBy('name', 'asc')->paginate($this->pagination);

        return view('livewire.roles.roles',[
            'roles'=> $roles
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function CreateRole()
    {
        $rules = ['roleName' => 'required|min:2|unique:roles,name'];
        $this->validate($rules);

        Role::Create(['name' => $this->roleName]);

        $this->emit('rol-added', 'Se registró el Rol con éxito');
        $this->resetUI();
    }
    public function Edit(Role $role)
    {
        $this->selected_id = $role->id;
        $this->roleName = $role->name;

        $this->emit('modal-show', 'modal show!!');
    }

    public function UpdateRole()
    {
        $rules = ['roleName' => 'required|min:2|unique:roles,name, {$this->selected_id}'];
        $this->validate($rules);

        $roles = Role::find($this->selected_id);
        $roles -> name = $this->roleName;
        $roles->save();

        $this->emit('rol-updated', 'Se Actualizo el Rol con éxito');
        $this->resetUI();
    }

    public function resetUI(){//Limpiamos los valores de las propiedades publicas
        $this->roleName = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->resetValidation();
        $this->resetPage();

    }
    protected $listeners = ['deleteRow'=> 'Destroy'];

    public function Destroy($id)
    {
        $permissionsCount=Role::find($id)->permissions->count();
        if($permissionsCount > 0){
            $this ->emit('rol-error', 'No se puede eliminar el rol porque tiene permisos asociados');
            return;
        }
        Role::find($id)->delete();
        $this ->emit('rol-deleted', 'Rol eliminado xd'); 
        
    }
    public function AsignarRoles($rolesList)
    {
        if ($this->userSelected > 0) {
            $user = User::find($this->userSelected);
            if ($user) {
                $user->syncRoles($rolesList);
                $this->emit('msg-ok', 'Roles asignados correctamente');
                $this->resetInput();
            }
        }
    }
}
