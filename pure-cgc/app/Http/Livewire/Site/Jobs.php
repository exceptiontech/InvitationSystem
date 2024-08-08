<?php

namespace App\Http\Livewire\Site;

use App\Models\Jobs as ModelsJobs;
use App\Models\Article;
use Livewire\Component;

class Jobs extends Component
{
    public $jobs,$articles ;
    public function render()
    {
        $this->jobs = ModelsJobs::all();
        $this->articles = Article::where('type','blog_article')->Newest()->take(3)->get();
        return view('livewire.site.jobs')->extends('livewire.site.layouts.app');
    }
}
