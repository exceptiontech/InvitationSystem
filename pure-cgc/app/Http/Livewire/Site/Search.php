<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Category;
class Search extends Component
{
    public $key,$services;

    public function mount($key)
    {
        $this->key = $key;
    }
    public function render()
    {
        if(! is_null($this->key)){
        $this->services = Category::where('name' , 'like' , '%'.$this->key.'%')->orWhere('name_en' , 'like' , '%'.$this->key.'%')->get();
    }
    return view('livewire.site.search')->extends('livewire.site.layouts.app');

}
}
