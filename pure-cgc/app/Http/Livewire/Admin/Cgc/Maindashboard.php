<?php

namespace App\Http\Livewire\Admin\CGC;

use Livewire\Component;

class Maindashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.c-g-c.maindashboard')->extends('admin.layouts.app',['script_editor'=>true,'script_datatables'=>true]);

    }
}
