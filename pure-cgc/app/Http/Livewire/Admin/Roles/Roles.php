<?php

namespace App\Http\Livewire\Admin\Roles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Component;

class Roles extends Component
{
    public $title_page,$showForm,$showFormPremissions,$showDeleted,$btn_kwrd;
    public $edit_object, $premissions_results;
    protected $listeners=[
        'objectEdit'=>'refresh_edited'
    ];
    public function mount()
    {
        $this->title_page=__('ms_lang.view').' '.trans('roles_permissions.roles');
        $this->showForm=false;
        $this->showFormPremissions=false;
        $this->showDeleted=false;
        $this->btn_kwrd = trans('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';

    }
    public function render()
    {
        $results= Role::get()->sortByDesc('id');
        return view('livewire.admin.roles.roles',
                    [
                        'results'=>$results,
                    ])->extends('admin.layouts.app',['script_editor'=>true,'script_select2_js'=>true,'script_datatables'=>true]);
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
                $this->title_page=__('ms_lang.view').' '.trans('roles_permissions.roles');
                $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
            }
            $edit_object= Role::find($id);
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
                $this->title_page=__('ms_lang.view').' '.trans('roles_permissions.roles');
                $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
            }
            $add_object=new Role();
            $edit_object=$add_object->get_new();
        }
        if($edit_object)
        {
            $this->emit('getObject',$edit_object);
        }
    }

    public function add_permissions_2role($id=0)
    {
        $this->showFormPremissions=!$this->showFormPremissions;
        if($id > 0)
        {
            if($this->showForm == true)
            {
                $this->title_page=__('ms_lang.btn_edit');
                $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
            }
            else
            {
                $this->title_page=__('ms_lang.view').' '.trans('roles_permissions.roles');
                $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
            }
            $edit_object= Role::find($id);
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
                $this->title_page=__('ms_lang.view').' '.trans('roles_permissions.roles');
                $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
            }
            $add_object=new Role();
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
            $this->title_page=__('ms_lang.view').' '.trans('roles_permissions.roles');
            $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        }
    }
    public function refresh_edited()
    {
        session()->flash('success_message','successfully updated');
        $this->title_page=__('ms_lang.view').' '.trans('roles_permissions.roles');
        $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        $this->showForm=false;
    }

    public function active_ms($id=0)
    {
        $data= Role::select('id','is_active')->find($id);
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
        $data= Role::select('id','deleted_at')->find($id);
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
