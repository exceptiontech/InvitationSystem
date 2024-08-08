<?php

namespace App\Http\Livewire\Site\Home;


use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use App\Models\PaymentPlan;
use App\Models\Portfolio as ModelsPortfolio;



class Home extends Component
{
    public $articles,$categories,$success,$payment,$portfolios,$services;
    // public $feautures, $counts,$result_briefs,$result_services,$result_why_us,$portfolios ,$home_photo,$home_sliders,$our_services, $work_samples;
    // public $result_services_colors = ['icon-box-pink', 'icon-box-cyan', 'icon-box-blue', 'icon-box-green'];

    public function render()
    {


        return view('livewire.site.home.home')->extends('livewire.site.layouts.app');
    }


}
