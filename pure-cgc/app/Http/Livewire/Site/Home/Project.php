<?php

namespace App\Http\Livewire\Site\Home;

use Livewire\Component;
use App\Models\Portfolio;
class Project extends Component
{
    public $portfolios;

    public function render()
    {
        $this->portfolios=Portfolio::with('category:id,name,name_en')->Active()->inRandomOrder()->take(10)->get();

        return view('livewire.site.home.project');
    }
}
