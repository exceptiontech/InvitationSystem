<?php

namespace App\Http\Livewire;

use Livewire\Component;

class User extends Component
{
    public function render()
    {
        return view('livewire.user')->extends('site_ms.layouts.app');
    }
}
