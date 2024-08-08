<?php

namespace App\Http\Livewire\Site\Home;

use Livewire\Component;
use App\Models\Category;

class Service extends Component
{
    public $services;
    public function render()
    {
        $this->services = Category::select('id','name','name_en','img','details','details_en')->where(['type'=>0,'is_active'=>'Y'])->inRandomOrder('id')->take(4)->get();
        return view('livewire.site.home.service');
    }
}
