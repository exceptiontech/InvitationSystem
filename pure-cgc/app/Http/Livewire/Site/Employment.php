<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class Employment extends Component
{
    public function render()
    {
        return view('livewire.site.employment')->extends('livewire.site.layouts.app');
    }
}
