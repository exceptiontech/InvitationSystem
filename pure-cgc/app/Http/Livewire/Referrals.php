<?php

namespace App\Http\Livewire;

use App\Mail\ReferralsMails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Referrals extends Component
{
    public $email;
    public function render()
    {
        return view('livewire.referrals')->extends('site_ms.layouts.app');
    }

    public function send_mail()
    {
        $this->validate([
            'email'   =>  'required|email|max:200',
        ]);
        //to send email confirm
        $send_mail_obj = new \stdClass();
        $send_mail_obj->sender = ' Coinump user:'.Auth::user()->name;
        $send_mail_obj->receiver = 'My friend';
        $send_mail=Mail::to($this->email)->send(new ReferralsMails($send_mail_obj));
        //end send mail
        session()->flash('success_message','successfully sent');
    }
}
