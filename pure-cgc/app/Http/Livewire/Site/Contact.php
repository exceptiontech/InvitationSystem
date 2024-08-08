<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\StaticPage;
use App\Models\SettingMs;
use App\Models\ContactUs;
class Contact extends Component
{
    public $name,$email,$subject,$message;
    public function render()
    {
        $staticPage=StaticPage::where('id',9)->first();
        $setting=SettingMs::where('id',1)->first();
        return view('livewire.site.contact',compact('staticPage','setting'));
    }
    public function store_message()
    {

        $this->validate([
            'name'=>'required|max:255',
            'email'=>'required|email',
            'subject'=>'required|string',
            'message'=>'required|string',
        ],[
        'name.required' => __('ms_lang.name is required'),
        'name.string' => __('ms_lang.name must be text'),
        'name.max' => __('ms_lang.name must be less than 225'),
        'email.required' => __('ms_lang.email is required'),
        'email.email' => __('ms_lang.email must be valid'),
        'subject.required' => __('ms_lang.subject is required'),
        'subject.string' => __('ms_lang.subject must be text'),
        'message.required' => __('ms_lang.message is required'),
        'message.string' => __('ms_lang.message must be text'),
        ]);
        ContactUs::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'subject'=>$this->subject,
            'message'=>$this->message,
        ]);
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
}
