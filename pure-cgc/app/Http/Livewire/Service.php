<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\StaticPage;
use App\Models\Category;
class Service extends Component
{
    public function render()
    {
        $results=StaticPage::where('id',2)->first();
        $services =Category::where('type',0)->get();
        return view('livewire.site.about',compact('results','services'));
    }
}
