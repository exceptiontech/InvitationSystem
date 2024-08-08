<?php

namespace App\Http\Livewire\Admin\Cgc;

use Livewire\Component;
use App\Models\Invitation;
use Carbon\Carbon;

class Calendar extends Component
{
    public $startOfWeek;
    public $endOfWeek;
    public $events;
    public $hours = ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'];
    public $daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    public $weekDates = [];

    public function mount()
    {
        $this->startOfWeek = Carbon::now()->startOfWeek(Carbon::SUNDAY)->format('Y-m-d');
        $this->endOfWeek = Carbon::now()->endOfWeek(Carbon::SATURDAY)->format('Y-m-d');
        $this->setWeekDates();
        $this->loadEvents();
    }

    public function previousWeek()
    {
        $this->startOfWeek = Carbon::parse($this->startOfWeek)->subWeek()->format('Y-m-d');
        $this->endOfWeek = Carbon::parse($this->endOfWeek)->subWeek()->format('Y-m-d');
        $this->setWeekDates();
        $this->loadEvents();
    }

    public function nextWeek()
    {
        $this->startOfWeek = Carbon::parse($this->startOfWeek)->addWeek()->format('Y-m-d');
        $this->endOfWeek = Carbon::parse($this->endOfWeek)->addWeek()->format('Y-m-d');
        $this->setWeekDates();
        $this->loadEvents();
    }

    public function setWeekDates()
    {
        $this->weekDates = [];
        $current = Carbon::parse($this->startOfWeek);
        for ($i = 0; $i < 7; $i++) {
            $this->weekDates[] = $current->format('Y-m-d');
            $current->addDay();
        }
    }

    public function loadEvents()
    {
        $this->events = Invitation::whereBetween('event_date', [$this->startOfWeek, $this->endOfWeek])
                                  ->get();

    }

    public function render()
    {
        return view('livewire.admin.cgc.calendar', [
            'events' => $this->events,
            'startOfWeek' => $this->startOfWeek,
            'endOfWeek' => $this->endOfWeek,
            'weekDates' => $this->weekDates,
            'daysOfWeek' => $this->daysOfWeek,
            'hours' => $this->hours,
        ])->extends('admin.layouts.app', ['script_editor' => true, 'script_datatables' => true]);
    }
}
