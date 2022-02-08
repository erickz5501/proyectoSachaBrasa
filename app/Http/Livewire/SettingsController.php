<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SettingsController extends Component
{
    public function render()
    {
        return view('livewire.settings.settings')->extends('layouts.theme.app')
        ->section('content');;
    }
}
