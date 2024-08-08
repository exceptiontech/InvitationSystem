<?php

namespace App\Http\Livewire\Admin\Cgc;

use App\Models\Category;
use App\Models\Invitation;
use App\Models\User;
use App\Models\UserCategory;
use Livewire\Component;
use Carbon\Carbon;


class InvitationDetail extends Component
{
    public $eventId,$invitees,$groups,$user,$filter_category;
    public $invitation,$contactCount,$daysLeft,$isPast;

    public function mount($id)
    {
        $this->eventId = $id;
        $this->loadInvitation();
    }
    public function showDetails($userId)
    {
        // Fetch user details based on $userId
        $this->user = User::findOrFail($userId); // Adjust this based on your User model setup
    }

    public function loadInvitation()
    {
        $this->invitation = Invitation::with('user')->find($this->eventId);
        $groupIds =explode(',',  $this->invitation->send_to);

        // dd( $this->invitation);
        $this->contactCount = 0;

        $this->contactCount = UserCategory::whereIn('category_id', $groupIds)->count();

$eventDate = Carbon::parse( $this->invitation->event_date);
$this->daysLeft = $eventDate->diffInDays(Carbon::now());
$this->isPast = $eventDate->isPast();
// dd($this->isPast);

        // dd($this->invitation);

        // dd( $this->invitation );
        $this->invitees=Category::with('users')->whereIn('id', explode(',', $this->invitation->send_to))->get();

        $this->groups=Category::whereIn('id', explode(',', $this->invitation->send_to))->get();
                // dd($this->invitees );

    }


    public function render()
    {
        if($this->filter_category)
        {
            // dd($this->filter_category);
            $this->invitees=Category::where('id',$this->filter_category)->with('users')->whereIn('id', explode(',', $this->invitation->send_to))->get();

        }

        return view('livewire.admin.cgc.invitation-detail')->extends('admin.layouts.app',['script_editor'=>true,'script_datatables'=>true]);
    }
}
