<?php

namespace App\Http\Livewire\Notifications;

use App\Models\Notification;
use Livewire\Component;

class Notifications extends Component
{
    public function render()
    {
        $results=Notification::get();
        return view('livewire.notifications.notifications',compact('results'))->extends('site_ms.layouts.app');
    }
}
