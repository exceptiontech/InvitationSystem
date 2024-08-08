<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Portfolio;
use App\Models\StaticPage;
class Gallaries extends Component
{
    public function render()
    {
        $staticPage=StaticPage::where('id',8)->first();
        $gallaries=Portfolio::select('category_id','name','name_en','img','logo','url_link')->orderBy('ord','ASC')->get();
        return view('livewire.site.gallaries',compact('gallaries','staticPage'));
    }
}
