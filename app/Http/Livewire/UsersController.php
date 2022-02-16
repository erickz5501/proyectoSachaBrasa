<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Sale;
use Livewire\WithFileUploads; //Se usa para subir imagenes - Trait
use Livewire\WithPagination;


class UsersController extends Component
{
    use WithFileUploads; //Se usa para subir imagenes
    use WithPagination;

    public $name, $last_name, $email, $phone, $adress, $status, $password, $profile, $search, $selected_id, $pagetitle, $componentName;
    private $pagination = 5;

    public function mount(){
        $this->pagetitle = 'Listado';
        $this->componentName = 'Usuarios';
        $this->status = 'Elegir';
    }

    public function paginationView(){ //Paginacion personalizada
        return 'vendor.livewire.bootstrap';
    }

    public function render(){
        //$data = Product::all();

        if (strlen($this->search) > 0)
            $data = User::where('name', 'like', '%' .  $this->search . '%')
            ->orwhere('last_name','like','%'. $this->search .'%')
            ->select('*')->orderBy('name', 'asc')->paginate($this->pagination);
        else
            $data = User::select('*')->orderBy('name', 'asc')->paginate($this->pagination);   
        
        return view('livewire.users.users',[
            'data' => $data,
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }  
    public function Store()
    {
        $rules= [
            'name' => 'required',
            'last_name' => 'required',
            'adress' => 'required',
            'phone' => 'required|min:9|numeric',
            'email' => 'required|string|email|unique:users',
            'profile' => 'required|not_in:Elegir',
            'status' => 'required|not_in:Elegir',
            'password' => 'required|min:3'
        ];
        $this->validate($rules);

        $user = User::create([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'adress' => $this->adress,
            'phone' => $this->phone,
            'email' => $this->email,
            'profile' => $this->profile,
            'status' => $this->status,
            'password' => bcrypt($this->password)
        ]);
        $user->save();
        $this-> resetUI(); 
        $this-> emit('user-added', 'Usuario Reguistrado');
    }

    public function Edit(User $user){
        $this->selected_id = $user->id;
        $this->name = $user->name;
        $this->last_name = $user-> last_name;
        $this->adress = $user->adress;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->profile = $user->profile;
        $this->status = $user->status;
        $this->password = $user->password;
       
        //dd($user);
        $this->emit('modal-show' , 'Show modal!');

    }

    public function Update()
    {
        $rules= [
            'name' => 'required',
            'last_name' => 'required',
            'adress' => 'required',
            'phone' => 'required|min:9|numeric',
            'email' => "required|string|email|unique:users,email,{$this->selected_id}",
            'profile' => 'required|not_in:Elegir',
            'status' => 'required|not_in:Elegir',
            'password' => 'required|min:3'
        ];
        $this->validate($rules);

        $user = User::find($this->selected_id);
        $user->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'adress' => $this->adress,
            'phone' => $this->phone,
            'email' => $this->email,
            'profile' => $this->profile,
            'status' => $this->status,
            'password' => bcrypt($this->password)
        ]);

        $user->save();
        $this-> resetUI(); 
        $this-> emit('user-updated', 'Usuario Actualizado');
    }
    public function resetUI(){//Limpiamos los valores de las propiedades publicas
        
        $this->name = '';
        $this->last_name = '';
        $this->adress = '';
        $this->phone = '';
        $this->email = '';
        $this->profile = 'Elegir';
        $this->status = 'Elegir';
        $this->password = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->resetValidation();
        $this->resetPage();

    }  

    protected $listeners = ['deleteRow'=> 'Destroy'];

    public function Destroy(User $user )
    {
       if ($user) {
           $sales= Sale::where('user_id', $user->id)->count();
           if ($sales > 0) {
               $this->emit('user-withsales','No es posible eliminar el usuario, por que tiene ventas relacionadas');
           }else {
               $user-> delete();
               $this-> resetUI(); 
               $this->emit('user-deleted','Usuario Eliminado');
           }
       }
    }

}

