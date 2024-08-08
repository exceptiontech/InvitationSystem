<?php

namespace App\Http\Livewire\Admin\Partener;

use App\Models\Gallery;
use App\Models\Category;
use App\Models\Partener;
use Livewire\Component;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $ord,$type,$category_id,$name,$description,$img,$link,$img_type,$details,$details_en;
    public $edit_object;
    public $edit_id;
    protected $listeners=[
        'getObject' => 'get_object'
    ];
    public function mount()
    {
        if($this->edit_id > 0)
        {
            $this->edit_object= Partener::where('deleted_at',null)->find($this->edit_id);
        }
        else
        {
            $add_object=new Partener();
            $this->edit_object=$add_object->get_new();
        }
        //dd($this->edit_object);
    }
    public function render()
    {
        return view('livewire.admin.partener.edit',[
            'edit_object'=>$this->edit_object,
        ])->extends('admin.layouts.app');
    }
    public function get_object($edit_object)
    {
        $this->edit_object=$edit_object;
        $this->edit_id=$this->edit_object['id'];
        // $this->category_id=$this->edit_object['category_id'];
        $this->link=$this->edit_object['link'];
        $this->name=$this->edit_object['name'];
        $this->description=$this->edit_object['description'];
        $this->img=$this->edit_object['img'];
        // $this->details=$this->edit_object['details'];
        // $this->details_en=$this->edit_object['details_en'];
    }

    // to insert or update one
    public function store_update()
    {
        $this->validate([
            'name'      =>  'required|max:200',
            'description'   =>  'required',
        ]);
        if($this->edit_id > 0)
        {
            $data= Partener::find($this->edit_id);
        }
        else
        {
            $data=new Partener();
        }
        if($data->img != $this->img)
        {
            $img=$this->img;
            $file_name = date('Y_m_d_h_i_s_').Str::slug($this->name).'.'.$img->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            // to finally create image instances
            //$image = $manager->make($destinationPath."/".$file_name);
            $image_data = Image::make($img->getRealPath());
            // now you are able to resize the instance
            //$image_data->resize(1024,768);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/watermark1.png');
            // $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
            // finally we save the image as a new file
            $img_name = $image_data->save($destinationPath."/".$file_name);
            ///small img
            // now you are able to resize the instance

            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/watermark1.png');
            // $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
            // finally we save the image as a new file
            // exit create img
            if(is_null($data->img)==0)
            {
                @unlink("./uploads/".$data->img);
            }

            $data->img = $file_name;
        }


        // $data->category_id=(int)$this->category_id;
        $data->name=$this->name;
        $data->description=$this->description;
        $data->link=$this->link;
        // $data->details=$this->details;
        // $data->details_en=$this->details_en;
        $object_added=$data->save();
        $this->emit('objectEdit',$object_added);
    }

    // to reset inputs after insert
    public function reset_inputs()
    {
        $this->edit_id= null;
        $this->name= null;
        $this->img= null;
        $this->description= null;
        $this->link= null;

    }
}
