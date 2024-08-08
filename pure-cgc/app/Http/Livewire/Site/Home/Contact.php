<?php

namespace App\Http\Livewire\Site\Home;

use App\Models\Category;
use App\Models\ContactUs;
use Livewire\Component;

class Contact extends Component
{
    public $categories,$name,$email,$phone,$subject,$message,$success;
    public function render()
    {
        $this->categories  = Category::select('id','name','name_en','img','details','details_en')->where(['type'=>0,'is_active'=>'Y'])->get();
        return view('livewire.site.home.contact');
    }

    public function contact()
    {
       $this->validate([
        'name' =>'required|string|max:155',
        // 'email' =>'email',
        'phone' =>'required',
        // 'subject' =>'string',
        // 'message' =>'string',
       ],[
        'name.required' => __('ms_lang.name is required'),
        'name.string' => __('ms_lang.name must be text'),
        'name.max' => __('ms_lang.name must be less than 125'),
        // 'email.required' => __('ms_lang.email is required'),
        // 'email.email' => __('ms_lang.email must be valid'),
        'phone.required' => __('ms_lang.phone is required'),
        'phone.min' => __("ms_lang.phone mustn't be less than 7"),
        'phone.max' => __('ms_lang.phone must be less than 25'),
        'phone.regex' => __('ms_lang.phone_must_be_number'),
        // 'subject.required' => __('ms_lang.subject is required'),
        'subject.string' => __('ms_lang.subject must be text'),
        // 'message.required' => __('ms_lang.message is required'),
        // 'message.string' => __('ms_lang.message must be text'),
       ]);

       ContactUs::create([
        'name' => $this->name,
        'email' => $this->email,
        'phone' => $this->phone,
        'subject' => $this->subject,
        'message' => $this->message,
       ]);
$this->success = __('ms_lang.successfully_added');
       $this->reset([
        'name' , 'email' , 'phone' , 'subject' , 'message'
       ]);
    }
}
