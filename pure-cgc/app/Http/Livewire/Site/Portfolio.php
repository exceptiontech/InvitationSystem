<?php

namespace App\Http\Livewire\Site;

use App\Models\Category;
use App\Models\Portfolio as ModelsPortfolio;
use Livewire\Component;

class Portfolio extends Component
{
    public $categories,$portfolios;

    public function render()
    {
        $this->categories=Category::get();
        $this->portfolios=ModelsPortfolio::Active()->With('category')->OrderDesc()->get();
        return view('livewire.site.portfolio')->extends('livewire.site.layouts.app');
    }
}
