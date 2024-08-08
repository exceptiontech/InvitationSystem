<?php

namespace App\Http\Livewire\Admin\Cgc;

use App\Models\Invitation;
use App\Models\UserCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Events extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $invitations = [];

    // public $events;
    public function mount()
    {
    //    $events=Invitations::paginate();
    $this->invitations = Invitation::with('user')
    ->orderBy('event_date', 'desc')
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
            'creator' => $invitation->users,
            'id' => $invitation->id,
        ];
    });

    }
    public function render()
    {
        $events=Invitation::paginate();
// dd(  $events);
        return view('livewire.admin.cgc.events',
        [
            'events'=>$events,
            'invitations'=>$this->invitations,
        ]
        )->extends('admin.layouts.app',['script_editor'=>true,'script_datatables'=>true]);
    }
}
