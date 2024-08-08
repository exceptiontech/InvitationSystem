<?php

namespace App\Http\Livewire\Admin\CategoryServices;



use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\CategoryServs;
class Create extends Component
{ 
    use WithFileUploads;
    public  $showForm,$showFormEdit,$showDeleted,$btn_kwrd,$name,$name_en,
    $url,$logo,$img,$profile_photo_path,$profile_logo_path;
    public function render()
    {
        return view('livewire.admin.category-services.create');
    }
    public function store()
    {
        $this->validate([
            'name'  =>  'required|max:200',
            'url'  =>  'required|max:200',
           ]);

        $data['name']=$this->name;
        $data['name_en']=$this->name_en;
        $data['url']=$this->url;

        if($profile_photo_path = $this->profile_photo_path)
        {
            $file_name = date('Y_m_d_h_i_s_').Str::slug($this->name).'.'.$profile_photo_path->getClientOriginalExtension();
            // $file_sml_name_img = 'thumbnail_'.$file_name;
            $destinationPath = public_path('/uploads');
            // $destinationPath_smll = public_path('/uploads/thumbnail');
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
            // $img_sml_name = $image_small_data->save($destinationPath_smll."/".$file_sml_name_img);
            // exit create img
            $this->profile_photo_path = $file_name;
        }
        if($profile_logo_path = $this->logo)
        {
            $file_name = date('Y_m_d_h_i_s_').Str::slug($this->name).'.'.$profile_logo_path->getClientOriginalExtension();
            // $file_sml_name_img = 'thumbnail_'.$file_name;
            $destinationPath = public_path('/uploads');
            // $destinationPath_smll = public_path('/uploads/thumbnail');
            // to finally create image instances
            //$image = $manager->make($destinationPath."/".$file_name);
            $image_data = Image::make($profile_logo_path->getRealPath());
            // now you are able to resize the instance
            $image_data->resize(768,1024);
            // and insert a watermark for example
            $waterMarkUrl = public_path('uploads/logo.png');
            $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
            // finally we save the image as a new file
            $img_name = $image_data->save($destinationPath."/".$file_name);
            ///small img
            // $image_small_data = Image::make($profile_logo_path->getRealPath());
            // now you are able to resize the instance
            // $image_small_data->resize(190,250);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/logo.png');
            // $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
            // finally we save the image as a new file
            // $img_sml_name = $image_small_data->save($destinationPath_smll."/".$file_sml_name_img);
            // exit create img
            $this->profile_logo_path = $file_name;

        }
        CategoryServs::create([
            'name'=>$data['name'],
            'name_en'=>$data['name_en'],
            'url'=>$data['url'],
            'img'=>$this->profile_photo_path ,
            'logo'=>$this->profile_logo_path,
        ]);
        
        $this->reset_inputs();
        session()->flash('success_message',"added success");
        return back();
    }

    public function reset_inputs()
    {
        $this->name= null;
        $this->name_en= null;
        $this->logo= null;
        $this->url= null;
        $this->profile_photo_path= null;
    }
}
