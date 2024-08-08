<?php

namespace App\Http\Livewire;

use App\Models\ArtMin;
use App\Models\StaticPage;
use Livewire\Component;

class About extends Component
{
    public $results;
    public function render()
    {
       $this->results=StaticPage::where('id',1)->find(1);
        // $how_it_works=ArtMin::whereType(1)->whereIsActive('Y')->take(4)->get();
        // $results=StaticPage::whereIn('id',[4,5,6])->get();
        // $why_we=StaticPage::where('id',3)->first();
        // $about=StaticPage::where('id',7)->first();
        // dd( $this->results);
        return view('livewire.site.about')->extends('livewire.site.layouts.app');
    }
}
