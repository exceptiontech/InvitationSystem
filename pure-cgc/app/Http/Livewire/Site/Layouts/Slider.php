<?php

namespace App\Http\Livewire\Site\Layouts;

use App\Models\ArtMin;
use Livewire\Component;

class Slider extends Component
{
    public $home_sliders;
    public function render()
    {
        $this->home_sliders=ArtMin::Active()->OrderDesc()->where('type','slider')->take(10)->get();
        return view('livewire.site.layouts.slider');
    }
}
