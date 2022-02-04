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
        $this->category_id = 'Elegir';
    }

    public function paginationView(){ //Paginacion personalizada
        return 'vendor.livewire.bootstrap';
    }

    public function render(){
        //$data = Product::all();

        if (strlen($this->search) > 0) {
            $products = Product::join('categories as c','c.id','products.category_id') 
                        ->select('products.*','c.name as category')
                        ->where('products.name','like','%'. $this->search .'%')
                        ->orwhere('c.name','like','%'. $this->search .'%')
                        ->orderby('products.name','asc')
                        ->paginate($this->pagination);


            //$data = Product::where('name', 'like', '%'.$this->search.'%')->paginate($this->pagination);
        }else{
            $products = Product::join('categories as c','c.id','products.category_id') 
            ->select('products.*','c.name as category')
            ->orderby('products.name','asc')
            ->paginate($this->pagination);
        }
        //dd($data);
        return view('livewire.product.products',[
            'data' => $products,
            'categories' => Category::orderBy('name', 'asc')->get()
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

}
