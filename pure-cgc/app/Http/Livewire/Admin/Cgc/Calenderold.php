<?php

namespace App\Http\Livewire\Admin\CGC;

use App\Models\Invitation;
use Livewire\Component;

class Calender extends Component
{
    public $month;
    public $year, $selectedDate, $markedDates, $fromTime, $type
    , $toTime
    , $discountPercent, $unit_id;
    public $discount_value, $discount_valuev;

    public $events;
    public $price, $price2, $weekly_price,
    $weekly_pricev,
    $end_week_price,
        $end_week_pricev;
    public $active_daily_discount;

    public function mount()
    {

        // $this->events = Discount::whereDate('from_time', $date)->get();
        $this->month = date('m');
        $this->year = date('Y');
        $this->listeners = [
            'addDiscount' => 'addDiscount',
        ];

    }

    public function previousMonth()
    {
        $this->month--;
        if ($this->month < 1) {
            $this->month = 12;
            $this->year--;
        }
    }

    public function nextMonth()
    {
        $this->month++;
        if ($this->month > 12) {
            $this->month = 1;
            $this->year++;
        }
    }

    public function getEventsForDate($date)
    {
        $this->selectedDate = $date;
        $this->events = Invitation::get();
    }
    public function selectDate($date)
    {
        $this->selectedDate[] = $date;
        // Any other logic you want to perform when a date is selected
    }
    public function toggleDate($date)
    {
        if ($this->selectedDate === $date) {
            $this->selectedDate = null;
        } else {
            $markedDates = [];
            if (!is_null($this->selectedDate)) {
                $startDate = strtotime($this->selectedDate);
                $endDate = strtotime($date);

                while ($startDate <= $endDate) {
                    $markedDates[] = date('Y-m-d', $startDate);
                    $startDate = strtotime('+1 day', $startDate);
                }
            }
            $this->selectedDate = $date;
            $this->markedDates = $markedDates;
        }
    }

    public function render()
    {
        return view('livewire.admin.cgc2.calender')->extends('admin.layouts.app', ['script_editor' => true, 'script_datatables' => true]);
    }
}
