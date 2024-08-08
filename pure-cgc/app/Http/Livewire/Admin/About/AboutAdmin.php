<?php

namespace App\Http\Livewire\Admin\About;

use Livewire\Component;
use App\Models\Article;
class AboutAdmin extends Component
{
    public $type , $showForm,$showFormEdit,$showDeleted,$btn_kwrd,$title,$details,$details_en;
    
    public function store()
    {
        dd('dd');
        $this->validate([
            'name'      =>  'required|max:200',
            'mobile' => 'required|string|max:25|unique:users',
            'details' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data['name']=$this->name;
        $data['name_en']=$this->name_en;
        $data['details']=$this->details;
        $data['details_en']=$this->details_en;
        $data['role_id']=(int)$this->role_id;
        $data['member_plan']=$this->member_plan;

        if($profile_photo_path = $this->profile_photo_path)
        {
            $file_name = date('Y_m_d_h_i_s_').Str::slug($this->name).'.'.$profile_photo_path->getClientOriginalExtension();
            $file_sml_name_img = 'thumbnail_'.$file_name;
            $destinationPath = public_path('/uploads');
            $destinationPath_smll = public_path('/uploads/thumbnail');
            // to finally create image instances
            //$image = $manager->make($destinationPath."/".$file_name);
            $image_data = Image::make($profile_photo_path->getRealPath());
            // now you are able to resize the instance
            $image_data->resize(768,1024);
            // and insert a watermark for example
            $waterMarkUrl = public_path('uploads/logo.png');
            $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
            // finally we save the image as a new file
            $img_name = $image_data->save($destinationPath."/".$file_name);
            ///small img
            $image_small_data = Image::make($profile_photo_path->getRealPath());
            // now you are able to resize the instance
            $image_small_data->resize(190,250);
            // and insert a watermark for example
            $waterMarkUrl = public_path('uploads/logo.png');
            $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
            // finally we save the image as a new file
            $img_sml_name = $image_small_data->save($destinationPath_smll."/".$file_sml_name_img);
            // exit create img
            $data['profile_photo_path'] = $file_name;

        }
        Articale::create($data);
        //
        $this->reset_inputs();
        $this->emit('objectAdded',$object_added);
    }
    public function create_form()
    {
        $this->showForm=!$this->showForm;
        $this->showFormEdit=false;
        if($this->btn_kwrd == __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>')
        {
            $this->title_page='Add Employees';
            $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
        }
        else
        {
            $this->title_page='View Employees';
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
            $this->title_page='Deleted Employees';
            $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
        }
        else
        {
            $this->title_page='View Employees';
            $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        }
    }
    public function edit_form($id=0)
    {
        //dd($id);
        $this->showFormEdit=!$this->showFormEdit;
        $this->showForm=false;
        $edit_object = User::find($id);
        if($edit_object)
        {
            $this->emit('getObject',$edit_object);
        }

        //dd($this->edit_object);
        if($this->showFormEdit == true)
        {
            $this->title_page='Edit Employee';
            $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
        }
        else
        {
            $this->title_page='View Employees';
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
    public function mount($type=5)
    {
        $this->type=$type;
        $this->showForm=false;
        $this->showFormEdit=false;
        $this->showDeleted=false;
        $this->btn_kwrd = trans('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';

    }
    public function render()
    {
        $results=Article::where('type',5)->first();
        return view('livewire.admin.about-admin',compact('results'))->extends('admin.layouts.app');
    }
}
