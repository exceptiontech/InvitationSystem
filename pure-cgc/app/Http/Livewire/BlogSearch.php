<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class BlogSearch extends Component
{
    public $key,$blogs_articles;

    public function mount($key)
    {
       $this->key = $key;
    }
    public function render()
    {
          
       $this->blogs_articles = Article::where('name' , 'LIKE' ,'%'.$this->key.'%')->orWhere('name_en' , 'LIKE' ,'%'.$this->key.'%')->take(4)->get();     
    //    dd($this->blogs_articles);
        return view('livewire.blog-search')->extends('livewire.site.layouts.app');
    }
}
