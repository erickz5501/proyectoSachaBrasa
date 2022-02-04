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

    public function Store()
    {
        $rules= [
            'name' => 'required|unique:products|min:3',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'alerts' => 'required',
            'category_id' => 'required|not_in:Elegir'

        ];
        $this->validate($rules);

        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'alerts' => $this->alerts,
            'category_id' => $this->category_id
        ]);
        $product->save();
        $this-> resetUI(); 
        $this-> emit('product-added', 'Producto Reguistrado');
    }

    public function Edit(Product $product){
        
        $this->selected_id = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->alerts = $product->alerts;
        $this->category_id = $product->category_id;
        //dd($product);
        $this->emit('modal-show' , 'Show modal');

    }

    public function Update(){
        
        $rules= [
            'name' => "required|min:3",
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'alerts' => 'required',
            'category_id' => 'required|not_in:Elegir'

        ];
        $this->validate($rules);

        $product = Product::find($this->selected_id);
        $product -> update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'alerts' => $this->alerts,
            'category_id' => $this->category_id
        ]);

        $product->save();
        $this-> resetUI(); 
        $this-> emit('product-updated', 'Producto Actualizado');

    }

    public function resetUI(){//Limpiamos los valores de las propiedades publicas
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->stock = '';
        $this->alerts = '';
        $this->category_id = '';
        $this->search = '';
        $this->selected_id = 0;

    }

}
