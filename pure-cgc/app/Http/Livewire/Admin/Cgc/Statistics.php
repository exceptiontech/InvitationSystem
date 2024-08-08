<?php

namespace App\Http\Livewire\Admin\Cgc;

use Livewire\Component;
use App\Models\Category;
use App\Models\User;
use App\Models\Invitation;


class Statistics extends Component
{
    public $categories = [];
    public $monthLabels,$typeLabels
    ,$typeData
    ,$typePercentages,
     $contactCounts ,$contactsByMonth = [];
     public $statusData = [];
     public $statusLabels = [];
     public $statusPercentages = [];


    public function mount()
    {
        $this->categories = Category::where('type',11)->withCount('users')->get();
        $this->contactsByMonth = User::where('role_id',1)->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->get();
        $contacts = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->get();
        $this->monthLabels = $contacts->pluck('month')->map(function ($month) {
            return date("F", mktime(0, 0, 0, $month, 10));
        })->toArray();

        $this->contactCounts = $contacts->pluck('count')->toArray();
        $statuses = Invitation::select('status', \DB::raw('count(*) as total'))
        ->groupBy('status')
        ->get();
        $types = Invitation::select('status', \DB::raw('count(*) as total'))
        ->groupBy('status')
        ->get();

    $totalInvitations = $statuses->sum('total');

    $this->statusLabels = $statuses->pluck('status')->toArray();
    $this->statusData = $statuses->pluck('total')->toArray();
    $this->statusPercentages = $statuses->map(function ($item) use ($totalInvitations) {
        return round(($item->total / $totalInvitations) * 100, 2);
    })->toArray();
    $types = Invitation::select('event_type', \DB::raw('count(*) as total'))
    ->groupBy('event_type')
    ->get();
    $this->typeLabels = $types->pluck('event_type')->toArray();
$this->typeData = $types->pluck('total')->toArray();
$this->typePercentages = $types->map(function ($item) use ($totalInvitations) {
    return round(($item->total / $totalInvitations) * 100, 2);
})->toArray();

    }
    public function render()
    {
        return view('livewire.admin.cgc.statistics')->extends('admin.layouts.app', ['script_editor' => true, 'script_datatables' => true]);
    }
}
