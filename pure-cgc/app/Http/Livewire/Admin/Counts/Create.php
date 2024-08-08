<?php

namespace App\Http\Livewire\Admin\Counts;

use Livewire\Component;
use App\Models\Count;
class Create extends Component
{
    public  $showForm,$showFormEdit,$showDeleted,$btn_kwrd,$name,$name_en,
    $count,$icon    ;
    public function render()
    {
        return view('livewire.admin.counts.create');
    } 
    public function store()
    {
        $this->validate([
            'name'  =>  'required|max:200',
            'count'  =>  'required',
            'icon'  =>  'required',
           ]);

        $data['name']=$this->name;
        $data['name_en']=$this->name_en;
        $data['count']=$this->count;
        $data['icon']=$this->icon;

        Count::create([
            'name'=>$data['name'],
            'name_en'=>$data['name_en'],
            'count'=>$data['count'],
            'icon'=>$data['icon'],
        ]);
        
        $this->reset_inputs();
        session()->flash('success_message',"added success");
        return back();
    }

    public function reset_inputs()
    {
        $this->name= null;
        $this->name_en= null;
        $this->count= null;
        $this->icon= null;
    }
}
