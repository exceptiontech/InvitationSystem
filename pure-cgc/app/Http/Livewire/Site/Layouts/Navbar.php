<?php

namespace App\Http\Livewire\Site\Layouts;

use App\Models\Category;
use App\Models\SettingMs;
use App\Models\SocialMedia;
use Livewire\Component;

class Navbar extends Component
{
    public $categories,$socials_nav,$setting_nav,$facebook,$twitter,$youtube,$linkedin,$whatsapp,$key,$results;
    public function render()
    {
        $this->categories = Category::all();
        $this->facebook = SocialMedia::where('name' , 'facebook')->first();
        $this->twitter = SocialMedia::where('name' , 'twitter')->first();
        $this->youtube = SocialMedia::where('name' , 'youtube')->first();
        $this->linkedin = SocialMedia::where('name' , 'linkedin')->first();
        $this->whatsapp = SocialMedia::where('name' , 'whatsapp')->first();
        $this->setting_nav = SettingMs::where('id', 1)->first();
        $this->socials_nav = SocialMedia::where(['is_active'=>'Y'])->get();
        return view('livewire.site.layouts.navbar');
    }

    public function search()
    {
       $this->validate(['key' => 'required|string']);
        return redirect()->route('search' , $this->key);

    }
}
