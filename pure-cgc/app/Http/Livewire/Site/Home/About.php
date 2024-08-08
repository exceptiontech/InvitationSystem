<?php

namespace App\Http\Livewire\Site\Home;

use App\Models\SettingMs;
use App\Models\StaticPage;
use Livewire\Component;

class About extends Component
{
    public $settings,$result;
    public function render()
    {
        $this->settings=SettingMs::select('mobile','email','mobile2')->find(1);
        $this->result=StaticPage::select('id','name','name_en','img','details','details_en')->find(1);
        return view('livewire.site.home.about');
    }
}
