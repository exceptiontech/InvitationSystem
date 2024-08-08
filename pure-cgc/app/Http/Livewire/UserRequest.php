<?php

namespace App\Http\Livewire;

use App\Models\UsersRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserRequest extends Component
{
    public function render()
    {
        if(Auth::user()->user_detail->user_points >= 10)
        {
            if(is_null( UsersRequest::where(['user_id'=>Auth::id()])->first() ) == 1)
            {
                $data=new UsersRequest();
                $data->user_id=Auth::id();
                $data->details='Request Gold MemberShip';
                $data->save();
                session()->flash('success_message','successfully sent Request');
            }
            else
            {
                session()->flash('error_message','Request was sent');
            }

        }
        return view('livewire.user-request')->extends('site_ms.layouts.app');
    }
}
