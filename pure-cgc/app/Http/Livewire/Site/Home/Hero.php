<?php

namespace App\Http\Livewire\Site\Home;

use App\Models\ArtMin;
use Livewire\Component;

class Hero extends Component
{
    public $home_hero, $current_uri, $title_ar, $title_en;
    public function mount()
    {
        $this->current_uri = request()->segments();
    }
    public function render()
    {
        if(count($this->current_uri) == 0){
            $this->home_hero=ArtMin::Active()->OrderDesc()->where('type','home-hero')->take(10)->first();
        }else{
            if($this->current_uri[0] == 'services'){
                $this->title_ar = 'خدماتنا';
                $this->title_en = 'Our Services';
            }
            if($this->current_uri[0] == 'service'){
                $this->title_ar = 'خدماتنا';
                $this->title_en = 'Our Services';
            }elseif($this->current_uri[0] == 'portofilos'){
                $this->title_ar = 'أعمالنا';
                $this->title_en = 'Work Samples';
            }
            elseif($this->current_uri[0] == 'blog'){
                $this->title_ar = 'المدونة';
                $this->title_en = 'Blog';
            }
            elseif($this->current_uri[0] == 'about'){
                $this->title_ar = 'من نحن';
                $this->title_en = 'About Us';
            }
            elseif($this->current_uri[0] == 'contact-us'){
                $this->title_ar = 'تواصل معنا';
                $this->title_en = 'Contact Us';
            }
        }

        $heros = ArtMin::with('category')->where(['type'=>'slider','is_active'=>'Y'])->take(3)->get();
        return view('livewire.site.home.hero', compact('heros'));
    }
}
