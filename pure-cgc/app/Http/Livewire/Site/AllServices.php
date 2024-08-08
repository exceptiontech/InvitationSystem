<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\ArtMin;

class AllServices extends Component
{
    public $services;

    public function render()
    {
        $this->services = ArtMin::where('type' , 'services')->get();
        return view('livewire.site.all-services');
    }
}
