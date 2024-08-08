<?php

namespace App\Http\Livewire\Site\Home;

use App\Models\ArtMin;
use Livewire\Component;

class Animation extends Component
{
    public $setps;
    public function render()
    {
        $this->setps = ArtMin::where(['type'=>'steps','is_active' => 'Y'])->take(4)->get();
        return view('livewire.site.home.animation');
    }
}
