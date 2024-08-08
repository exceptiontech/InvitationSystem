<?php

namespace App\Http\Livewire\Site\Services;

use App\Models\ArtMin;
use Livewire\Component;
use App\Models\StaticPage;
use App\Models\Category;
use App\Models\Host;

class Services extends Component
{
    public $segments, $result_services,$result_why_us,$our_care,$our_plan,$result_briefs,$our_vision,$our_mission,$hosting;
    public function render()
    {

        // $results=StaticPage::where('id',2)->first();
        // $services =Category::where('type',0)->get();
        $this->result_services=ArtMin::Active()->OrderDesc()->where('type','briefs')->take(4)->get();
        $this->result_why_us=ArtMin::Active()->OrderDesc()->where('type','why-us')->take(10)->get();
        $this->our_care=ArtMin::Active()->where('type','care')->get();
        $this->our_plan=ArtMin::Active()->where('type','plan')->get();
        $this->our_vision=ArtMin::Active()->where('type','vision')->get();
        $this->hosting=Host::get();
        // dd($this->hosting);
        $this->result_briefs=Category::Active()->where('type','0')->take(10)->get();

        $this->our_mission=ArtMin::Active()->OrderDesc()->where('type','mission')->take(4)->get();

// dd($this->our_plan);

        return view('livewire.site.services.services')->extends('livewire.site.layouts.app');
    }
}
