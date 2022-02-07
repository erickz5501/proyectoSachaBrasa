<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;
use Livewire\WithPagination;

class PosController extends Component
{   

    use WithPagination;

    public $total, $items, $cash, $change, $status, $user_id, $search, $selected_id, $pagetitle, $componentName;
    private $pagination = 5;

    public function render()
    {
        return view('livewire.pos.component')->extends('layouts.theme.app')->section('content');
    }

    public function mount(){
        $this->pagetitle = 'Listados';
        $this->componentName = 'Ventas';
    }

}
