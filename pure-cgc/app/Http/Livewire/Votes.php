<?php

namespace App\Http\Livewire;

use App\Models\UsersVote;
use App\Models\Vote;
use App\Models\VotesPoint;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Votes extends Component
{
    public $vote_point_id,$vote_id;
    public $gt_vote;
    public $is_voted=0;
    public function mount()
    {

        if(Auth::user()->shift_id == 1)
        {
            $type_vote=1;
        }
        else
        {
            $type_vote=0;
        }
        $this->gt_vote=Vote::where(['type'=>$type_vote,'is_active'=>'Y'])->orderBy('id', 'DESC')->first();
        $this->vote_id=(int)@$this->gt_vote->id;

        $chk_voted=UsersVote::where(['user_id'=>Auth::id(), 'vote_id'=>$this->vote_id])->first();
        if(is_null($chk_voted)==0)
        {
            $this->is_voted=$chk_voted->vote_point_id;
        }
    }
    public function render()
    {
        $gt_vote_points=VotesPoint::where(['vote_id'=>$this->vote_id , 'is_active'=>'Y'])->get();
        return view('livewire.votes',compact('gt_vote_points'))->extends('site_ms.layouts.app');
    }

    public function selected_vote($select)
    {
        $this->vote_point_id=$select;
    }

    public function save_vote()
    {
        if($this->vote_id > 0 && $this->vote_point_id > 0)
        {
            //check if is votenig exist
            $chk=UsersVote::where(['user_id'=>Auth::id(), 'vote_point_id'=>$this->vote_point_id])->first();
            if(is_null($chk)== 0)
            {
                session()->flash('error_message','you was voted');
            }
            else
            {
                $data_v=new UsersVote();
                $data_v->user_id=Auth::id();
                $data_v->vote_id=$this->vote_id;
                $data_v->vote_point_id=$this->vote_point_id;
                $data_v->save();
                session()->flash('success_message','successfully voted');
            }
        }
        else
        {
            session()->flash('error_message','you must select one vote');
        }
    }

    public function reset_inputs()
    {
        $this->vote_id= null;
        $this->vote_point_id= null;

    }
}
