<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Count;

class Counts extends Component
{
    public function render()
    {
        $counts=Count::all();
        return view('livewire.site.counts',compact('counts')); 
    }
}
