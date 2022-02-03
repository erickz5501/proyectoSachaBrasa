<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithFileUploads; //Se usa para subir imagenes - Trait
use Livewire\WithPagination;

class ProductsController extends Component
{
    use WithFileUploads; //Se usa para subir imagenes
    use WithPagination;

    public $name, $description, $price, $stock, $alerts, $category_id, $search, $selected_id, $pagetitle, $componentName;
    private $pagination = 5;

    public function mount(){
        $this->pagetitle = 'Listado';
        $this->componentName = 'Productos';
    }

    public function paginationView(){ //Paginacion personalizada
        return 'vendor.livewire.bootstrap';
    }

    public function render(){
        //$data = Product::all();

        if (strlen($this->search) >0) {
            $data = Product::where('name', 'like', '%'.$this->search.'%')->paginate($this->pagination);
        }else{
            $data = Product::orderBy('id', 'asc')->paginate($this->pagination);
        }
        //dd($data);
        return view('livewire.product.products', ['products'=>$data])
        ->extends('layouts.theme.app')
        ->section('content');
    }
}
