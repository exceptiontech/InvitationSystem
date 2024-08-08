<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\RequestOffer;
class Offer extends Component
{
    public function render()
    {
        $results=RequestOffer::with('category')->get();
        return view('livewire.admin.offer',compact('results'))->extends('admin.layouts.app');
    }
}
