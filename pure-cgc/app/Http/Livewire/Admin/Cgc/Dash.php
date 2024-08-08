<?php

namespace App\Http\Livewire\Admin\Cgc;

use App\Models\Category;
use App\Models\Invitation;
use App\Models\UserCategory;
use Livewire\Component;
use Carbon\Carbon;


class Dash extends Component
{
    public $nextEvent,$datefilter,$selectedDate;
    public $invitations = [];

    public function mount()
    {
        $this->loadInvitations();
    }
    public function loadInvitations()
    {
        $query = Invitation::with('user');

        if ($this->selectedDate) {
            $query->whereDate('event_date', $this->selectedDate);
        }

        $this->invitations = $query
            ->orderBy('event_date', 'desc')
            ->take(5)
            ->get()
            ->map(function ($invitation) {
                $groupIds = explode(',', $invitation->send_to);
                $contactCount = UserCategory::whereIn('category_id', $groupIds)->count();

                return [
                    'event_id' => $invitation->event_id,
                    'event_title' => $invitation->event_title,
                    'organization' => $invitation->organization,
                    'status' => $invitation->status,
                    'event_date' => $invitation->event_date,
                    'contact_count' => $contactCount,
                    'creator_avatar' => 'images/pic1.jpg',
                    'creator' => $invitation->user,
                    'id' => $invitation->id
                ];
            });
        //    dd($this->invitations) ;
    }
//     public function filter()
//     {
// dd('');
//     }
public function setDate($date)
{
    $this->selectedDate = Carbon::parse($date)->addDay()->format('Y-m-d');
    // dd($this->selectedDate);
}

public function resetDate()
{
    $this->selectedDate = null;
}
    public function render()
    {
        $this->loadInvitations();

// dd($this->selectedDate);
        $events=Invitation::with('user')->paginate(4);
        $this->nextEvent = Invitation::with('user')->where('event_date', '>', Carbon::now())
        ->orderBy('event_date', 'asc')
        ->first();
        // dd( $this->nextEvent);

        return view('livewire.admin.cgc.dash',
        [
            'events'=>$events,
        ])->extends('admin.layouts.app',['script_editor'=>true,'script_datatables'=>true]);
    }
}
