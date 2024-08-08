<?php

namespace App\Http\Livewire\Host\Layout;

use App\Models\Gallery;
use Livewire\Component;
use App\Models\Host;
class Main extends Component
{
    public function render()
    {
        $hostings= Host::all();
        $photo=Gallery::where(['type'=>1,'is_active'=>'Y'])->inRandomOrder()->first();
        return view('livewire.host.layout.main',compact('hostings','photo'));
    }
}
