<?php

namespace App\Http\Livewire\Admin\Counts;

use Livewire\Component;
use App\Models\Count;
class Edit extends Component
{
    public $name;
    public $name_en;
    public $count;
    public $icon;
    public $edit_object;
    public $edit_id;
    protected $listeners=[
        'getObject' => 'get_object'

    ];
    public function mount()
    {
        $this->edit_object= Count::whereId($this->edit_id)->first();
    }
    public function render()
    {
        return view('livewire.admin.counts.edit');
    }
    public function get_object($edit_object)
    {
        $this->edit_object=$edit_object;
        $this->edit_id=$this->edit_object['id'];
        $this->name=$this->edit_object['name'];
        $this->name_en=$this->edit_object['name_en'];
        $this->count=$this->edit_object['count'];
        $this->icon=$this->edit_object['icon'];

    }
    public function update()
    {
        $this->validate([
            'name'      =>  'required|max:200',
            'count' => 'required|integer|max:200',
            'icon' => 'required',
        ]);
        $data= Count::find($this->edit_id);
     
        $data['name']=$this->name;
        $data['name_en']=$this->name_en;
        $data['count']=$this->count;
        $data['icon']= $this->icon;
        $object_added=$data->save();
        session()->flash('success_message',"edit success");
        return back();
    }
}
