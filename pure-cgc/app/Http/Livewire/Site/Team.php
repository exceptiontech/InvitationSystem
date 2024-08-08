<?php

namespace App\Http\Livewire\Site;

use App\Models\PureTeam;
use Livewire\Component;

class Team extends Component
{
    public $pure_team;
    public function render()
    {
         $this->pure_team=PureTeam::Active()->take(10)->get();



        return view('livewire.site.team')->extends('livewire.site.layouts.app');
    }

}
