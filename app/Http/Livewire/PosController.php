<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tables;
use App\Models\Denomination;
use Livewire\WithPagination;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class PosController extends Component
{   

    use WithPagination;

    public $total, $items, $cash, $change, $efectivo, $status, $user_id, 
            $search, $selected_id, $selectTable_id, $pagetitle, $componentName, $itemsQuantity;
    private $pagination = 10;

    public function mount(){
        $this->pagetitle = 'Listados';
        $this->componentName = 'Ventas';
        $this->efectivo = 0;
        $this->change = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
    }
    
    public function paginationView(){ //Paginacion personalizada
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        $products = Product::all();
        $categories = Category::all();
        $tables = Tables::all();
        return view('livewire.pos.component', ['products'=>$products, 'categories'=>$categories, 'tables'=>$tables,
                                                'denominations'=>Denomination::orderBy('value','desc')->get(),
                                                'cart'=>Cart::getContent()->sortBy('name')
                                                ])
                                                ->extends('layouts.theme.app')
                                                ->section('content');
    }

    public function ACash($value){
        $this->efectivo += ($value == 0 ? $this->total : $value);
        $this->change = ($this->efectivo - $this->total);
    }

    public function addToCart(Product $producto){
        Cart::add([
            'id' => $producto->id,
            'name' => $producto->name,
            'price' => $producto->price,
            'quantity' => 1
        ]);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

        session()->flash('success', 'Product is Added to Cart Successfully !');
        return null;
    }

    protected $listeners = [
        'removeItem' => 'removeItem',
        'clearCart' => 'clearCart',
        'saveSale' => 'saveSale'
    ];

    public function selectTable(Tables $table){
        $this->selectTable_id = $table->id;
    }

    public function resetUI(){
        Cart::clear();
        $this->efectivo = 0;
        $this->change = 0;
        $this->total = 0;
        $this->itemsQuantity = 0;
    }



}
