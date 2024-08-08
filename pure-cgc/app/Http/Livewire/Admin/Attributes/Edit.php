<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Attribute;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Edit extends Component
{

    use WithFileUploads;
    public $ord,$parent_id,$name,$name_en,$img;
    public $edit_object;
    public $edit_id;
    protected $listeners=[
        'getObject' => 'get_object'
    ];

    public function mount()
    {
        $this->edit_object= Attribute::where('deleted_at',null)->find($this->edit_id);
    }
    public function render()
    {
        return view('livewire.admin.attributes.edit',[
            'edit_object'=>$this->edit_object
        ])->extends('admin.layouts.app',['script_editor'=>true]);
    }

    public function get_object($edit_object)
    {
        $this->edit_object=$edit_object;
        $this->edit_id=$this->edit_object['id'];
        $this->ord=$this->edit_object['ord'];
        $this->parent_id=$this->edit_object['parent_id'];
        $this->name=$this->edit_object['name'];
        $this->name_en=$this->edit_object['name_en'];
        $this->img=$this->edit_object['img'];
    }

    public function store_update()
    {
        $this->validate([
            'name'      =>  'required|max:200',
            'name_en'   =>  'required|max:200',
        ]);
        if($this->edit_id > 0)
        {
            $data= Attribute::find($this->edit_id);
        }
        else
        {
            $data=new Attribute();
        }
        if($data->img != $this->img)
        {
            $img=$this->img;
            $file_name = date('Y_m_d_h_i_s_').Str::slug($this->name).'.'.$img->getClientOriginalExtension();
            $file_sml_name_img = 'thumbnail_'.$file_name;
            $destinationPath = public_path('/uploads');
            $destinationPath_smll = public_path('/uploads/thumbnail');
            // to finally create image instances
            //$image = $manager->make($destinationPath."/".$file_name);
            $image_data = Image::make($img->getRealPath());
            // now you are able to resize the instance
            $image_data->resize(768,1024);
            // and insert a watermark for example
            $waterMarkUrl = public_path('uploads/logo.png');
            $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
            // finally we save the image as a new file
            $img_name = $image_data->save($destinationPath."/".$file_name);
            ///small img
            $image_small_data = Image::make($img->getRealPath());
            // now you are able to resize the instance
            $image_small_data->resize(190,250);
            // and insert a watermark for example
            $waterMarkUrl = public_path('uploads/logo.png');
            $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
            // finally we save the image as a new file
            $img_sml_name = $image_small_data->save($destinationPath_smll."/".$file_sml_name_img);
            // exit create img
            if(is_null($data->img)==0)
            {
                @unlink("./uploads/".$data->img);
            }
            if(is_null($data->img_thumbnail)==0)
            {
                @unlink("./uploads/thumbnail/".$data->img_thumbnail);
            }
            $data->img = $file_name;
        }
        $data->ord=(int)$this->ord;
        $data->parent_id=(int)$this->parent_id;
        $data->name=$this->name;
        $data->name_en=$this->name_en;
        $object_added=$data->save();
        $this->reset_inputs();
        $this->emit('objectEdit',$object_added);
    }

    // to reset inputs after insert
    public function reset_inputs()
    {
        $this->parent_id= null;
        $this->edit_id= null;
        $this->ord= null;
        $this->name= null;
        $this->name_en= null;
        $this->img= null;
    }
}
