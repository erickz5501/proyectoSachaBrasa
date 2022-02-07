<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads; //Se usa para subir imagenes - Trait
use Livewire\WithPagination;

class CoinsController extends Component
{
    use WithPagination;
    public $type, $value, $componentName, $pagetitle, $search, $selected_id; 
    private $pagination = 10;

    public function mount()
    {
        $this->pagetitle='Listado';
        $this->componentName='Denominaciones'; 
        $this->selected_id= 0;
        $this-> type = 'Elegir';
    }

    public function paginationView(){ //Paginacion personalizada
        return 'vendor.livewire.bootstrap';
    }

    
    public function render(){   
        if (strlen($this->search) > 0) {
            $data = Denomination::where('type', 'like', '%'.$this->search.'%' )->paginate($this->pagination);
        }else{
            $data = Denomination::orderBy('TYPE', 'desc')->paginate($this->pagination);
        }
        // $data = Category::all();
        return view('livewire.denominations.coins', ['data'=>$data])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function Edit($id){
        $record = Denomination::find($id, ['id', 'type', 'value']);
        $this -> type = $record->type;
        $this -> value = $record->value;
        $this -> selected_id = $record->id;
    
        $this-> emit('show-modal', 'show modal!');
    }

    public function Store(){//MEtodo para crear categorias
        $rules = [
            'type' => 'required|not_in:Elegir',
            'value' => 'required|unique:denominations'
        ];

        $this->validate($rules); //Ejecutamos las validaciones y los mensajes

        $coins = Denomination::create([ //Creamos la categoria
            'type' => $this->type,
            'value' => $this->value
        ]);

        $coins->save();//Actualizamos el registro
        $this->resetUI();//Limpamos las cajas de texto delformulario
        $this->emit('item-added','Se añadio una Denominación');//Cerramos el modal
    }

    public function Update(){
        $rules =[
            'type' => "required|not_in:Elegir",
            'value' => "required|unique:denominations,value,{$this->selected_id}"                      
        ];
        $this->validate($rules); //Ejecutamos las validaciones y los mensajes

        $coins = Denominarion::find($this->selected_id);
        $coins->Update([
            'type'=> $this->type,
            'value'=> $this->value
        ]); 
        $this->resetUI();//Limpamos las cajas de texto delformulario
        $this->emit('item-updated','Denominación Actualizada');//Cerramos el modal     
    }

    public function resetUI(){//Limpiamos los valores de las propiedades publicas
        $this->type = '';
        $this->value = '';
        $this->search = '';
        $this->selected_id = 0;

    }
    protected $listeners=[
        'deleteRow'=>'Destroy'
    ];    

    public function Destroy(Denomination $coins)
    {
     // $category = Category::find($id);
      //dd($category);//testear si estamos enviando la categorioa
      $coins ->delete(); 
      
      
      $this->resetUI();//Limpamos las cajas de texto delformulario
      $this->emit('item-deleted','Denominación Eliminada');//Cerramos el modal        

    }

}
