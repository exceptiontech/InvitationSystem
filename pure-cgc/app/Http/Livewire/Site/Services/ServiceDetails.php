<?php

namespace App\Http\Livewire\Site\Services;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\PaymentPlan;
use App\Models\SettingMs;
use App\Models\Portfolio as ModelsPortfolio;
use Livewire\Component;

class ServiceDetails extends Component
{
    public $payments,$features,$category_id,$whatsapp, $categories,$work_samples,$our_services,$category;
    function mount($category_id=0,$name='')
    {
        $this->category_id=(int)$category_id;
    }
    public function render()
    {
        $this->whatsapp=SettingMs::select('whatsapp')->where('id',1)->first()->pluck('whatsapp');
        $this->payments=PaymentPlan::where('category_id',$this->category_id)->get();
        $this->category=Category::findOrFail($this->category_id);
        $this->our_services=Category::findOrFail($this->category_id);
         $this->features = Gallery::whereIn('id' , [4,5,6,7,8,9,10,11,12,13,14,15,16])->get();
        // $this->work_samples = ArtMin::Active()->OrderDesc()->where('type', 'work_sample')->get();
        $this->work_samples = ModelsPortfolio::Active()->where('type','0')->where('category_id',$this->category_id)->with('category')->take(9)->get();
        // dd($this->work_samples);
        return view('livewire.site.services.service-details')->extends('livewire.site.layouts.app');
    }
}
