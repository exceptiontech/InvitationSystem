<?php

namespace App\Http\Livewire\Admin\Notifications;

use App\Models\Notification;
use Livewire\Component;

class Notifications extends Component
{

    public $title_page,$type,$with_id,$showForm,$showDeleted,$btn_kwrd;
    public $edit_object;
    protected $listeners=[
        'objectEdit'=>'refresh_edited'
    ];
    public function mount($type=0,$with_id=0)
    {
        $this->type=$type;
        $this->with_id=$with_id;
        $this->title_page='الاشعارات';
        if($this->type == 0)
        {
            $this->title_page='الاشعارات العامة';
        }

        $this->showForm=false;
        $this->showDeleted=false;
        $this->btn_kwrd = trans('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';

    }
    public function render()
    {

        $categories= Notification::whereType($this->type)->whereWithId($this->with_id)->get()->sortByDesc('id');
        return view('livewire.admin.notifications.notifications',
                    [
                        'results'=>$categories,
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
                $this->title_page=__('ms_lang.view');
                $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
            }
            $edit_object= Notification::where('deleted_at',null)->whereId($id)->first();
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
                $this->title_page=__('ms_lang.view');
                $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
            }
            $add_object=new Notification();
            $edit_object=$add_object->get_new($this->type,$this->with_id);
        }
        if($edit_object)
        {
            $this->emit('getObject',$edit_object);
        }
    }

    public function refresh_edited()
    {
        session()->flash('success_message','successfully updated');
        $this->showForm=false;
        $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
    }

    public function deleted()
    {
        $this->showDeleted=!$this->showDeleted;
        $this->showForm=false;
        $this->showFormEdit=false;
        if($this->showDeleted == true)
        {
            $this->title_page='Deleted Categories';
            $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
        }
        else
        {
            $this->title_page='View Categories';
            $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        }
    }
    public function active_ms($id=0)
    {
        $data=Notification::select('id','is_active')->find($id);
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
        $data=Notification::select('id','deleted_at')->find($id);
        if($data->deleted_at == null)
        {
            $data->deleted_at=now();
        }
        else
        {
            $data->deleted_at =null;
        }
        $data->save();
    }
}
