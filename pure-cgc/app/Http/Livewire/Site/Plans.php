<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\PaymentPlan;
use App\Models\Portfolio;
use Livewire\WithPagination;

class Plans extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $payments , $work_samples;
    public function render()
    {
        $this->payments=Paymentplan::get();
        $this->work_samples = Portfolio::Active()->where('type','0')->with('category')->where('Category_id', 1)->take(6)->get();

        return view('livewire.site.plans')->extends('livewire.site.layouts.app');
    }
}
