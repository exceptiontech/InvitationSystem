<?php

namespace App\Http\Livewire\Site\Blogs;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public   $all_categories,$mini_newest_blog,$count_art,$category_id;
    function mount($category_id=0)
    {
        $this->category_id=(int)$category_id;
    }
    public function render()
    {
        $wher['type']='blog_article';
        $wher['is_active']='Y';
        if($this->category_id>0)
        {
            $wher['category_id']=$this->category_id;
        }
        $blogs_articles=Article::where($wher)->paginate(6);
        // dd($blogs_article);
        $this->mini_newest_blog=Article::where(['type'=>'blog_article','is_active'=>'Y'])->Newest()->take(3)->get();


        $this->all_categories=Category::where(['type'=>0,'is_active'=>'Y'])->select('id','name','name_en')->with('article')->get();
                //  dd($this->all_categories->article);

        $this->count_art=Article::where(['type'=>0,'is_active'=>'Y'])->where('category_id',2)->count();
        // dd($this->count_art);

        // dd($this->mini_blog);
        return view('livewire.site.blogs.blogs',compact('blogs_articles'))->extends('livewire.site.layouts.app');
    }

}
