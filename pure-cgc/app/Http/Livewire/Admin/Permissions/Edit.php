<?php

namespace App\Http\Livewire\Admin\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{

    public $ord,$name,$name_ar,$page_url,$img;
    public $edit_object;
    public $edit_id;
    protected $listeners=[
        'getObject' => 'get_object'

    ];

    public function mount()
    {
        $this->edit_object= Permission::where('deleted_at',null)->whereId($this->edit_id)->first();
    }
    public function render()
    {
        return view('livewire.admin.permissions.edit',[
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
        $this->page_url=$this->edit_object['page_url'];
        $this->img=$this->edit_object['img'];

    }
    public function store_update()
    {
        $this->validate([
            'name'      =>  'required|max:200',
            'name_ar'   =>  'required|max:200',
        ]);
        if($this->edit_id > 0)
        {
            $data= Permission::find($this->edit_id);
        }
        else
        {
            $data=new Permission();
        }
        $data->ord=(int)$this->ord;
        $data->name=$this->name;
        $data->name_ar=$this->name_ar;
        $data->page_url=$this->page_url;
        $data->img=$this->img;
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
        $this->page_url= null;
        $this->img= null;
    }
}
