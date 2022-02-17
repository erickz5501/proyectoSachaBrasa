<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tables;
use App\Models\Denomination;
use Livewire\WithPagination;

class PosController extends Component
{   

    use WithPagination;

    public $total, $items, $cash, $change, $efectivo, $status, $user_id, $search, $selected_id, $selectTable_id, $pagetitle, $componentName, $cart=[], $denominations=[], $itemsQuantity;
    private $pagination = 10;

    
    
    public function paginationView(){ //Paginacion personalizada
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        $products = Product::all();
        $categories = Category::all();
        $tables = Tables::all();
        $this->denominations = Denomination::all();
        return view('livewire.pos.component', ['products'=>$products, 'categories'=>$categories, 'tables'=>$tables])->extends('layouts.theme.app')->section('content');
    }

    public function mount(){
        $this->pagetitle = 'Listados';
        $this->componentName = 'Ventas';
    }

    public function selectTable(Tables $table){
        $this->selectTable_id = $table->id;
    }

    public function resetUI(){

    }

}
