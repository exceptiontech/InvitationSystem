<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Article;
use App\Models\StaticPage;

class About extends Component
{
   public $results;
    public function render()
    {
        // $this->results=StaticPage::where('id',1)->get();
        // dd($this->results);
        return view('livewire.site.about')->extends('livewire.site.layouts.app');
    }
}

