<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Maillist;
use App\Models\ContactUs as ModelsContactUs;
use App\Models\Category;
class Subscribe extends Component
{
    public $categories,$name,$mobile,$subject,$message,$subject_details,$email;
    public function render()
    {
        $this->categories = Category::all();

        return view('livewire.site.subscribe')->extends('livewire.site.layouts.app');
    }

    // public function subscribe()
    // {
    //     // dd('xx');
    //     $this->validate([
    //         'email' => 'required|email',
    //     ],[
    //         'email.required' =>  $this->dispatchBrowserEvent('swal:modal' , [
    //             'type' => 'error',
    //             'title' =>  __('ms_lang.email is required'),
    //             'text' => ''
    //         ]),
           
    //         'email.email' =>   $this->dispatchBrowserEvent('swal:modal' , [
    //             'type' => 'error',
    //             'title' =>  __('ms_lang.email must be valid'),
    //             'text' => ''
    //         ]),
           
        
           
    //     ]);

    //     $mail =  Maillist::create(['email' => $this->email]);
    //     if($mail)
    //     {
    //         // dd('xxxxxxxxxxxxxx');
    //         $this->dispatchBrowserEvent('swal:modal' , [
    //           'type' => 'success',
    //           'title' => __('ms_lang.Subscribed Successfully') ,
    //           'text' => ''
    //         ]);
    //     }else{
    //         $this->dispatchBrowserEvent('swal:modal' , [
    //             'type' => 'error',
    //             'title' => 'Subscribed Failed',
    //             'text' => ''
    //           ]);
    //     //  $this->error = 'There is an error';
    //     }
    //      $this->reset('email');
    // }


    public function contact()
    {
       $this->validate([
        'name' =>'required|string|max:255',
        // 'email' =>'required|email',
        'mobile' =>'required|min:7|max:25',
        'subject' =>'required',
        'subject_details' => 'nullable',
        // 'message' =>'required|string',
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
