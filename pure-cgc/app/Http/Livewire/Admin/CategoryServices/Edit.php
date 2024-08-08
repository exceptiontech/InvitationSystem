<?php

namespace App\Http\Livewire\Admin\CategoryServices;

use Livewire\Component;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Livewire\WithFileUploads;
use App\Models\CategoryServs;
class Edit extends Component
{
    use WithFileUploads;
    public $name,$name_en,$category_id,$img,$logo;
    public $edit_object;
    public $edit_id;
    protected $listeners=[
        'getObject' => 'get_object'

    ];
    public function mount()
    {
        $this->edit_object= CategoryServs::whereId($this->edit_id)->first();
    }
    public function render()
    {
        return view('livewire.admin.category-services.edit',['edit_object'=>$this->edit_object]);
    }
    public function get_object($edit_object)
    {
        $this->edit_object=$edit_object;
        $this->edit_id=$this->edit_object['id'];
        $this->name=$this->edit_object['name'];
        $this->name_en=$this->edit_object['name_en'];
        $this->url=$this->edit_object['url'];
        $this->profile_photo_path=$this->edit_object['img'];
        $this->logo=$this->edit_object['logo'];

    }
    public function update()
    {
        $this->validate([
            'name'      =>  'required|max:200',
            'url' => 'required|string|url',
        ]);
        $data= CategoryServs::find($this->edit_id);
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
            // $waterMarkUrl = public_path('uploads/logo.png');
            // $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
            // finally we save the image as a new file
            $img_name = $image_data->save($destinationPath."/".$file_name);
            ///small img
            $image_small_data = Image::make($img->getRealPath());
            // now you are able to resize the instance
            $image_small_data->resize(190,250);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/logo.png');
            // $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
            // finally we save the image as a new file
            $img_sml_name = $image_small_data->save($destinationPath_smll."/".$file_sml_name_img);
            // exit create img
            $data['img'] = $file_name;

        }
        if($data->logo != $this->logo)
        {
            $logo=$this->logo;
            $file_name_logo = date('Y_m_d_h_i_s_').Str::slug($this->name).'.'.$logo->getClientOriginalExtension();
            $file_sml_name_logo = 'thumbnail_'.$file_name_logo;
            $destinationPath = public_path('/uploads');
            $destinationPath_smll = public_path('/uploads/thumbnail');
            // to finally create image instances
            //$image = $manager->make($destinationPath."/".$file_name);
            $image_data = Image::make($logo->getRealPath());
            // now you are able to resize the instance
            $image_data->resize(768,1024);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/logo.png');
            // $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
            // finally we save the image as a new file
            $img_name = $image_data->save($destinationPath."/".$file_name_logo);
            ///small img
            $image_small_data = Image::make($logo->getRealPath());
            // now you are able to resize the instance
            $image_small_data->resize(190,250);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/logo.png');
            // $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
            // finally we save the image as a new file
            $img_sml_name = $image_small_data->save($destinationPath_smll."/".$file_sml_name_logo);
            // exit create img
            $data['logo'] = $file_name_logo;

        }
        $data['name']=$this->name;
        $data['name_en']=$this->name_en;
        $data['category_id']=$this->category_id;
        $data['url']=$this->url;
        $object_added=$data->save();
        $this->reset_inputs();
        $this->emit('objectEdit',$object_added);
    }

    public function reset_inputs()
    {
        $this->type= null;
        $this->edit_id= null;
        $this->ord= null;
        $this->name= null;
        $this->name_en= null;
        $this->img= null;
        $this->logo= null;
        $this->img_type= null;
        $this->details= null;
        $this->details_en= null;
    }
}
