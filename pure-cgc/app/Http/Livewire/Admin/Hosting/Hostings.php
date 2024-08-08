<?php

namespace App\Http\Livewire\Admin\Hosting;

use Livewire\Component;
use App\Models\Host;
class Hostings extends Component
{
    public $showForm;
    public $showFormEdit;
    public $showDeleted;
    public $btn_kwrd;
    public $edit_object;
    public function render()
    {
        $results=Host::all();
        return view('livewire.admin.hosting.hostings',compact('results'))->extends('admin.layouts.app');
    }
    public function mount()
    {
        $this->title_page=__('ms_lang.show').' : ';
        $this->showForm=false;
        $this->showFormEdit=false;
        $this->showDeleted=false;
        $this->btn_kwrd = trans('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';

    }
    public function create_form() 
    {
        $this->showForm=!$this->showForm;
        $this->showFormEdit=false;
        if($this->btn_kwrd == __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>')
        {
            $this->title_page='Add host';
            $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
        }
        else
        {
            $this->title_page='View host';
            $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        }
    }
    public function deleted()
    {
        $this->showDeleted=!$this->showDeleted;
        $this->showForm=false;
        $this->showFormEdit=false;
        if($this->showDeleted == true)
        {
            $this->title_page='Deleted host';
            $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
        }
        else
        {
            $this->title_page='View host';
            $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        }
    }
    public function delete_ms($id=0)
    {
        $data= Host::find($id);
        $data->delete();
        return back();
    }
    public function edit_form($id=0)
    {
        // dd($id);
        $this->showFormEdit=!$this->showFormEdit;
        $this->showForm=false;
        $edit_object = Host::find($id);
        
        if($edit_object)
        {
            $this->emit('getObject',$edit_object);
        }

        // dd($this->edit_object);
        if($this->showFormEdit == true)
        {
            $this->title_page='Edit services';
            $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
        }
        else
        {
            $this->title_page='View services';
            $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        }
    }

    public function refresh_results($obj)
    {
        session()->flash('success_message','successfully doing');
        $this->showForm=false;

    }

    public function refresh_edited() 
    {
        session()->flash('success_message','successfully updated');
        $this->showForm=false;
        $this->showFormEdit=false;
    }

    public function active_ms($id=0)
    {
        $data= Host::select('id','is_active')->find($id);
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

}
