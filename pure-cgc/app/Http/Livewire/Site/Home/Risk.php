<?php

namespace App\Http\Livewire\Site\Home;
use App\Models\ArtMin;
use Livewire\Component;

class Risk extends Component
{
    public $risk1 , $risk2 , $risk3 , $risk4 , $risk5;
    public function render()
    {
        $this->risk1 = Artmin::where(['type'=>'robot'])->find(28);
        $this->risk2 = Artmin::where(['type'=>'robot'])->find(29);
        $this->risk3 = Artmin::where(['type'=>'robot'])->find(30);
        $this->risk4 = Artmin::where(['type'=>'robot'])->find(31);
        $this->risk5 = Artmin::where(['type'=>'robot'])->find(32);
        return view('livewire.site.home.risk');
    }
}
