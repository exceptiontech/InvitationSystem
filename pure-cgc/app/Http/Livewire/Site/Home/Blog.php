<?php

namespace App\Http\Livewire\Site\Home;

use App\Models\Article;
use Livewire\Component;

class Blog extends Component
{
    public $articles;
    public function render()
    {
        $this->articles = Article::select('id','name','name_en','img','details','details_en')->where(['type'=>'blog_article','is_active'=>'Y'])->inRandomOrder('id')->take(10)->get();
        return view('livewire.site.home.blog');
    }
}
