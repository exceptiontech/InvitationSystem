<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\StaticPage;
use App\Models\Category;
use App\Models\RequestOffer as Offer;
class RequestOffer extends Component
{
    public $name,$email,$phone,$category_id,$message;
    public function render()
    {
        $results=StaticPage::where('id',7)->first();
        $categories=Category::where('type',0)->get();
        return view('livewire.site.request-offer',compact('results','categories'));
    }
    public function store_offer()
    {
        $this->validate([
            'name'=>'required|max:200',
            'email'=>'required|email',
            'category_id'=>'required',
        ]);
        Offer::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'category_id'=>$this->category_id,
            'phone'=>$this->phone,
            'message'=>$this->message,
        ]);
        $this->resetInput();
        return back()->with('success','your offer is send..');
    }
    public function resetInput()
    {
        $this->name=null;
        $this->email=null;
        $this->category_id=null;
        $this->phone=null;
        $this->message=null;
    }
}
