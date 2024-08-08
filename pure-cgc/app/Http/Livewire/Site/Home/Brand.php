<?php

namespace App\Http\Livewire\Site\Home;

use App\Models\Partener;
use Livewire\Component;

class Brand extends Component
{
    public $parteners;
    public function render()
    {
        $this->parteners = Partener::select('id','name','img','link','description')->where(['is_active'=>'Y'])->inRandomOrder('id')->take(20)->get();
        return view('livewire.site.home.brand');
    }
}
