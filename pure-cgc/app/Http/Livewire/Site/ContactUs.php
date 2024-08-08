<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Category;
use App\Models\SettingMs;
use App\Models\StaticPage;
use App\Models\RelatedLinks;

use Illuminate\Http\Request;
use App\Models\ContactUs as ModelsContactUs;

class ContactUs extends Component
{

    public $categories,$name,$mobile,$success,$subject_details,$subject,$calling,$email,$contact_det, $email_address,$email_address2,$calling2 ,$message,$address;
    public function render()
    {

        $this->address=RelatedLinks::where('type','address')->first();
        $this->email_address=RelatedLinks::where('type','email')->first();
        $this->email_address2=RelatedLinks::where('type','email2')->get();
        $this->calling=RelatedLinks::where('type','calling')->first();
        $this->calling2=RelatedLinks::where('type','calling2')->get();

        $about_cont=StaticPage::find(3);
        $this->contact_det=SettingMs::find(1);
        $this->categories = Category::all();
        // dd($this->address);
        return view('livewire.site.contact',compact('about_cont'))->extends('livewire.site.layouts.app');
    }

    public function store_message(request $request )
    {

        $this->validate([
            'name'=>'required|max:200',
            'email'=>'required|email',
            'phone' => 'required',
            'subject'=>'required|max:200',
            'message'=>'required',
        ]);

        $data = [
            'name' => $this->name,
            'subject' => $this->subject,
            'message' => $this->message,
            'email' => $this->email
            ];
            $sendms=ModelsContactUs::create($data);
if ($sendms) {
    $request->session()->flash('alert-success', 'message was successful sented!');

    $this->emit('You have been successfully sent your message.');
    // dd($this->emit('You have been successfully sent your message.'));

}

            session()->flash('message', 'You have been successfully sent your message.');

        $this->resetInput();
        return back();
    }
    public function resetInput()
    {
        $this->name=null;
        $this->email=null;
        $this->subject=null;
        $this->message=null;
    }

    public function contact()
    {
       $this->validate([
        'name' =>'required|string|max:255',
        'email' =>'required|email',
        'mobile' =>'required|min:7|max:25',
        'subject' =>'required',
        'subject_details' => 'nullable',
        'message' =>'required|string',
       ],[
        'name.required' => __('ms_lang.name is required'),
        'name.string' => __('ms_lang.name must be text'),
        'name.max' => __('ms_lang.name must be less than 225'),
        'email.required' => __('ms_lang.email is required'),
        'email.email' => __('ms_lang.email must be valid'),
        'mobile.required' => __('ms_lang.phone is required'),
        'mobile.min' => __("ms_lang.phone mustn't be less than 7"),
        'mobile.max' => __('ms_lang.phone must be less than 25'),
        'message.required' => __('ms_lang.message is required'),
        'message.string' => __('ms_lang.message must be text'),
        'subject.required' => __('ms_lang.subject is required'),
       ]);

       $msg = ModelsContactUs::create([
        'name' => $this->name,
        'email' => $this->email,
        'mobile' => $this->mobile,
        'subject' => $this->subject_details != 'null' && !empty($this->subject_details)  ? $this->subject_details : $this->subject,
        'message' => $this->message,
       ]);
if($msg){
    $this->dispatchBrowserEvent('swal:modal' , [
        'type' => 'success',
        'title' => __('ms_lang.Subscribed Successfully') ,
        'text' => ''
      ]);
  }else{
      $this->dispatchBrowserEvent('swal:modal' , [
          'type' => 'danger',
          'title' => 'Subscribed Failed',
          'text' => ''
        ]);
}



$this->reset([
        'name' , 'email' , 'mobile' , 'message','subject','subject_details'
       ]);
    }


}

