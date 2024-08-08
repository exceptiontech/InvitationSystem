<?php

namespace App\Http\Livewire\Site;
use App\Models\Category;
use App\Models\Portfolio as ModelsPortfolio;
use Livewire\Component;

class Projects extends Component
{
    public $portfolios;
    public function render()
    {
        $this->portfolios=ModelsPortfolio::with('category')->Active()->OrderDesc()->get();
        return view('livewire.site.projects')->extends('livewire.site.layouts.app');
    }
}
