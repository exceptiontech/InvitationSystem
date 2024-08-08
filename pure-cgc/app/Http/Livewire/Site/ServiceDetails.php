<?php

namespace App\Http\Livewire\Site;

use App\Models\ArtMin;
use Livewire\Component;

class ServiceDetails extends Component
{
    public $id;
    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        $service = ArtMin::where('type' , 'services')->where('category_id' , $this->id)->get();
        return view('livewire.site.service-details');
    }
}
