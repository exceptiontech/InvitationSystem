<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class Paymentplan extends Component
{
    public    $payment;

    public function render()
    {
        $this->payment=Paymentplan::where('id',request('category_id'));
        return view('livewire.site.paymentplan')->extends('livewire.site.layouts.app');
    }
}
