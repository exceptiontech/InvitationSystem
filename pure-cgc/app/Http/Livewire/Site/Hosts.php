<?php

namespace App\Http\Livewire\Site;

use App\Models\Category;
use App\Models\Host;
use App\Models\RequestOffer;
use App\Models\StaticPage;
use Illuminate\Http\Request;
use Livewire\Component;

class Hosts extends Component
{
    public $h,$categories,$results,$name,$email,$phone,$category_id,$message,$hostes;
    public function mount()
    {
        $this->hostes=Host::where('id',request('id'))->first();
    }
    public function render()
    {
        // dd(request('id'));

        $this->results=StaticPage::where('id',7)->first();
        $this->categories=Category::where('type',0)->get();
        $this->hostes=Host::where('id',request('id'))->get();
// dd($this->hosting);
        return view('livewire.site.hosts')->extends('livewire.site.layouts.app');
    }
    public function store_offer(Request $request)
    {
        $v=$this->validate([
            'name'=>'required|max:200',
            'email'=>'required|email',
            // 'category_id'=>'required',
        ]);



            RequestOffer::create([
                'name'=>$this->name,
                'email'=>$this->email,
                // 'category_id'=>$this->category_id,
                'phone'=>$this->phone,
                'message'=>$this->message,


            ]);




        $request->session()->flash('alert-success', 'User was successful added!');

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
