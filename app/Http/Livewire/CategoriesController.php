<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads; //Se usa para subir imagenes - Trait
use Livewire\WithPagination;

class CategoriesController extends Component
{

    use WithFileUploads; //Se usa para subir imagenes
    use WithPagination;

    public $name, $search, $selected_id, $pagetitle, $componentName;
    private $pagination = 5; //La cantidad de registros por paginación

    public function mount(){ //Este metodo se usa para iniciar propiedades
        $this->pagetitle='Listado';
        $this->componentName='Categoria';
        $this->selected_id= 0;
        //$this->search='a';
    }

    public function paginationView(){ //Paginacion personalizada
        return 'vendor.livewire.bootstrap';
    }

    
    public function render(){   
        if (strlen($this->search) > 0) {
            $data = Category::where('name', 'like', '%'.$this->search.'%' )->paginate($this->pagination);
        }else{
            $data = Category::orderBy('id', 'asc')->paginate($this->pagination);
        }
        // $data = Category::all();
        return view('livewire.category.categories', ['categories'=>$data])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function Edit($id){
        $record = Category::find($id, ['id', 'name']);
        $this -> name = $record->name;
        $this -> selected_id = $record->id;
    
        $this-> emit('show-modal', 'show modal!');
    }

    public function Store(){//MEtodo para crear categorias
        $rules = [
            'name' => 'required|unique:categories|min:3'
        ];

        $this->validate($rules); //Ejecutamos las validaciones y los mensajes

        $category = Category::create([ //Creamos la categoria
            'name' => $this->name
        ]);

        $category->save();//Actualizamos el registro
        $this->resetUI();//Limpamos las cajas de texto delformulario
        $this->emit('category-added','Se añadio una categoria');//Cerramos el modal
    }

    public function Update(){
        $rules =[
            'name' => "required|unique:categories|min:3:categories,name{$this->selected_id}"                      
        ];
        $this->validate($rules); //Ejecutamos las validaciones y los mensajes

        $category = Category::find($this->selected_id);
        $category->Update([
            'name'=> $this->name
        ]); 
        $this->resetUI();//Limpamos las cajas de texto delformulario
        $this->emit('category-updated','Categoría Actualizada');//Cerramos el modal     
    }

    public function resetUI(){//Limpiamos los valores de las propiedades publicas
        $this->name = '';
        $this->search = '';
        $this->selected_id = 0;

    }
    protected $listeners=[
        'deleteRow'=>'Destroy'
    ];    

    public function Destroy(Category $category)
    {
     // $category = Category::find($id);
      //dd($category);//testear si estamos enviando la categorioa
      $category ->delete(); 
      
      
      $this->resetUI();//Limpamos las cajas de texto delformulario
      $this->emit('category-deleted','Categoría Eliminada');//Cerramos el modal        

    }

}
