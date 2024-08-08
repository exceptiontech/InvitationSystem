<?php

namespace App\Http\Livewire;

use App\Models\ContactUs as ModelsContactUs;
use App\Models\RelatedLinks;
use App\Models\SettingMs;
use App\Models\StaticPage;
use Livewire\Component;

class ContactUs extends Component
{
    public $name, $subject ,$calling,$email, $email_address ,$message,$address;
    public function render()
    {
        // dd('');
        $this->address=RelatedLinks::where('type','address')->get();
        $this->email_address=RelatedLinks::where('type','email')->get();
        $this->calling=RelatedLinks::where('type','calling')->get();

        $about_cont=StaticPage::find(3);
        $contact_det=SettingMs::find(1);
        return view('livewire.contact-us',compact('about_cont','contact_det'))->extends('livewire.site.layouts.app');
    }

    public function store_message()
    {

        $this->validate([
            'name'=>'required|max:200',
            'email'=>'required|email',
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
}
