<?php

namespace App\Http\Livewire\Admin\Roles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Component;

class PremissionsForRole extends Component
{
    public $ord,$name,$name_ar,$premissions;
    public $edit_object,$premissions_results;
    public $edit_id;
    protected $listeners=[
        'getObject' => 'get_object'

    ];

    public function mount()
    {
        $this->edit_object= Role::where('deleted_at',null)->whereId($this->edit_id)->first();
    }
    public function render()
    {
        $this->premissions_results=Permission::all();
        return view('livewire.admin.roles.premissions-for-role',[
            'edit_object'=>$this->edit_object
        ])->extends('admin.layouts.app');
    }

    public function get_object($edit_object)
    {
        $this->edit_object=$edit_object;
        $this->edit_id=$this->edit_object['id'];
        $this->ord=$this->edit_object['ord'];
        $this->name=$this->edit_object['name'];
        $this->name_ar=$this->edit_object['name_ar'];

    }
    public function store_update()
    {
        dd($this->premissions);
        $this->validate([
            'name'      =>  'required|max:200',
            'name_ar'   =>  'required|max:200',
        ]);
        if($this->edit_id > 0)
        {
            $data= Role::find($this->edit_id);
        }
        else
        {
            $data=new Role();
        }
        $data->ord=(int)$this->ord;
        $data->name=$this->name;
        $data->name_ar=$this->name_ar;
        $object_added=$data->save();
        $this->reset_inputs();
        $this->emit('objectEdit',$object_added);
    }
    // to reset inputs after insert
    public function reset_inputs()
    {
        $this->edit_id= null;
        $this->ord= null;
        $this->name= null;
        $this->name_ar= null;
    }

}
