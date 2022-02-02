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
        //$this->search='a';
    }

    public function render()
    {   
        $data = Category::all();
        return view('livewire.category.categories', ['categories'=>$data])
                ->extends('layouts.theme.app')
                ->section('content');
    }
}
