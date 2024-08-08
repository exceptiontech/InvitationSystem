<?php

namespace App\Http\Livewire\Admin\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{

    public $title_page,$showForm,$showDeleted,$btn_kwrd;
    public $edit_object;
    protected $listeners=[
        'objectEdit'=>'refresh_edited'
    ];
    public function mount()
    {
        $this->title_page=__('ms_lang.view').' '.trans('roles_permissions.permissions');
        $this->showForm=false;
        $this->showFormEdit=false;
        $this->showDeleted=false;
        $this->btn_kwrd = trans('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';

    }
    public function render()
    {
        $results= Permission::with('get_sub')->where('parent_id',0)->orderBy('ord','ASC')->get();
        //dd($results);
        return view('livewire.admin.permissions.permissions',
                    [
                        'results'=>$results,
                    ])->extends('admin.layouts.app',['script_editor'=>true,'script_datatables'=>true]);
    }

    public function edit_form($id=0)
    {
        $this->showForm=!$this->showForm;
        if($id > 0)
        {
            if($this->showForm == true)
            {
                $this->title_page=__('ms_lang.btn_edit');
                $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
            }
            else
            {
                $this->title_page=__('ms_lang.view').' '.trans('roles_permissions.permissions');
                $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
            }
            $edit_object= Permission::where('deleted_at',null)->whereId($id)->first();
        }
        else
        {
            if($this->showForm == true)
            {
                $this->title_page=__('ms_lang.btn_add_new');
                $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
            }
            else
            {
                $this->title_page=__('ms_lang.view').' '.trans('roles_permissions.permissions');
                $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
            }
            $add_object=new Permission();
            $edit_object=$add_object->get_new();
        }
        if($edit_object)
        {
            $this->emit('getObject',$edit_object);
        }
    }
    public function deleted()
    {
        $this->showDeleted=!$this->showDeleted;
        $this->showForm=false;
        $this->showFormEdit=false;
        if($this->showDeleted == true)
        {
            $this->title_page='Deleted';
            $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
        }
        else
        {
            $this->title_page=__('ms_lang.view').' '.trans('roles_permissions.permissions');
            $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        }
    }
    public function refresh_edited()
    {
        session()->flash('success_message','successfully updated');
        $this->title_page=__('ms_lang.view').' '.trans('roles_permissions.permissions');
        $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        $this->showForm=false;
    }

    public function active_ms($id=0)
    {
        $data= Permission::select('id','is_active')->find($id);
        if($data->is_active == 'Y')
        {
            $data->is_active='N';
        }
        else
        {
            $data->is_active ='Y';
        }
        $data->save();
    }

    public function delete_ms($id=0)
    {
        $data= Permission::select('id','deleted_at')->find($id);
        if($data->deleted_at == null)
        {
            $data->deleted_at=now();
        }
        else
        {
            $data->is_active =null;
        }
        $data->save();
    }
}
