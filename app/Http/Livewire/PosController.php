<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;

class PosController extends Component
{   

    use WithPagination;

    public $total, $items, $cash, $change, $status, $user_id, $search, $selected_id, $pagetitle, $componentName, $cart=[], $itemsQuantity;
    private $pagination = 10;

    
    
    public function paginationView(){ //Paginacion personalizada
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('livewire.pos.component', ['products'=>$products, 'categories'=>$categories])->extends('layouts.theme.app')->section('content');
    }

    public function mount(){
        $this->pagetitle = 'Listados';
        $this->componentName = 'Ventas';
    }

}
