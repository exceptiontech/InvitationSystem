<?php

namespace App\Http\Livewire\Site\Blogs;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Models\SocialMedia;

class BlogDetails extends Component
{
    public $facebook,$twitter,$linkedin,$instagram,$blogId,$blogs_article,$all_categories,$mini_newest_blog,$count_art,$key;

    public function mount($id)
    {
        $this->blogId = $id;
    }
    public function render()
    {
        // $this->blogs_article=Article::where('id',request('id'))->first();
                $this->blogs_article=Article::where('id', $this->blogId)->first();

        // dd($this->blogs_article);
        // dd($this->blogs_article);

        $this->facebook = SocialMedia::where('name' , 'facebook')->first();
        $this->twitter = SocialMedia::where('name' , 'twitter')->first();
        $this->linkedin = SocialMedia::where('name' , 'linkedin')->first();
        $this->instagram = SocialMedia::where('name' , 'instagram')->first();

        // $this->blogs_article=Article::where('type','blog_article')->where('id',request('id'))->take(4)->get();
 
      //   if($this->key != null)
 //{
    // $this->mini_newest_blog = Article::where('name' , 'LIKE' ,'%'.$this->key.'%')->orWhere('name_en' , 'LIKE' ,'%'.$this->key.'%')->get(); 
    //   dd($this->mini_newest_blog);
 //}else{
    $this->mini_newest_blog=Article::where(['type'=>'blog_article','is_active'=>'Y'])->orderBy('num_views','DESC')->take(3)->get();

 //}

          
       

        $this->all_categories=Category::where(['type'=>0,'is_active'=>'Y'])->select('id','name','name_en')->with('article')->get();
                //  dd($this->all_categories);

        $this->count_art=Article::where(['type'=>0,'is_active'=>'Y'])->where('category_id',1)->count();
        return view('livewire.site.blogs.blog-details')->extends('livewire.site.layouts.app');
    }

    public function search()
    {
        $this->validate(['key' => 'required']);
        if($this->key != null){
        return redirect()->route('blogsearch' , $this->key);
        }
    //    $this->validate(['key' => 'required']);
            //   if($this->key != null)
        // {
    //    $this->mini_newest_blog = Article::where('name' , 'LIKE' ,'%'.$this->key.'%')->orWhere('name_en' , 'LIKE' ,'%'.$this->key.'%')->get(); 
        //    dd($this->mini_newest_blog);
        // }
    }
}
