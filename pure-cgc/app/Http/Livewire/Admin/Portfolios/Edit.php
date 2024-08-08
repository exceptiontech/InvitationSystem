<?php

namespace App\Http\Livewire\Admin\Portfolios;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\SeoPage;
use Livewire\Component;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $ord,$type,$category_id,$name,$name_en,$img,$img_thumbnail,$logo,$url_link,$details,$details_en;
    public $keywords,$keywords_en,$details_seo,$details_en_seo;
    public $edit_object;
    public $edit_id;
    protected $listeners=[
        'getObject' => 'get_object'
    ];
    public function mount()
    {
        if($this->edit_id > 0)
        {
            $this->edit_object= Portfolio::where('deleted_at',null)->find($this->edit_id);
        }
        else
        {
            $add_object=new Portfolio();
            $this->edit_object=$add_object->get_new($this->type,$this->category_id);
        }
    }
    public function render()
    {
        $categories=Category::where(['type'=>0])->get();
        return view('livewire.admin.portfolios.edit',[
            'edit_object'=>$this->edit_object,
            'categories'=>$categories
        ])->extends('admin.layouts.app');
    }
    public function get_object($edit_object)
    {
        $this->edit_object=$edit_object;
        $this->edit_id=$this->edit_object['id'];
        $this->type=$this->edit_object['type'];
        $this->category_id=$this->edit_object['category_id'];
        $this->ord=$this->edit_object['ord'];
        $this->name=$this->edit_object['name'];
        $this->name_en=$this->edit_object['name_en'];
        $this->img=$this->edit_object['img'];
        $this->logo=$this->edit_object['logo'];
        $this->url_link=$this->edit_object['url_link'];
        $this->details=$this->edit_object['details'];
        $this->details_en=$this->edit_object['details_en'];

        $edit_object_seo= SeoPage::where('deleted_at',null)->where(['table_id'=>$this->edit_id,'table_name'=>'portfolios'])->first();
        if ($edit_object_seo != null) {
            $this->keywords=$edit_object_seo->keywords;
            $this->keywords_en=$edit_object_seo->keywords_en;
            $this->details_seo=$edit_object_seo->description;
            $this->details_en_seo=$edit_object_seo->description_en;
        }
    }

    // to insert or update one
    public function store_update()
    {
        $this->validate([
            'name'      =>  'required|max:200',
            'name_en'   =>  'required|max:200',
            'url_link'   =>  'url',
        ]);
        if($this->edit_id > 0)
        {
            $data= Portfolio::find($this->edit_id);
            $data_seo= SeoPage::where(['table_id'=>$this->edit_id,'table_name'=>'portfolios'])->first();

        }
        else
        {
            $data=new Portfolio();
            $data_seo=new SeoPage();

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
            $image_data->resize(1024,768);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/watermark1.png');
            // $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
            // finally we save the image as a new file
            $img_name = $image_data->save($destinationPath."/".$file_name);
            ///small img
            $image_small_data = Image::make($img->getRealPath());
            // now you are able to resize the instance
            $image_small_data->resize(1000,400);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/watermark1.png');
            // $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
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
            $data->img_thumbnail = $file_sml_name_img;
        }
        if($data->logo != $this->logo)
        {
            $logo=$this->logo;
            $file_name_logo = date('Y_m_d_h_i_s_').Str::slug($this->name).'.'.$logo->getClientOriginalExtension();
            $file_sml_name_logo = 'thumbnail_'.$file_name_logo;
            $destinationPath = public_path('/uploads');
            $destinationPath_smll = public_path('/uploads/thumbnail');
            $image_data = Image::make($logo->getRealPath());
            $image_data->resize(768,1024);
            // $waterMarkUrl = public_path('uploads/logo.png');
            // $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
            $img_name = $image_data->save($destinationPath."/".$file_name_logo);
            ///small img
            $image_small_data = Image::make($logo->getRealPath());
            $image_small_data->resize(190,250);
            // $waterMarkUrl = public_path('uploads/logo.png');
            // $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
            $img_sml_name = $image_small_data->save($destinationPath_smll."/".$file_sml_name_logo);
            // exit create img
            $data['logo'] = $file_name_logo;

        }
        $data->ord=(int)$this->ord;
        $data->type=(int)$this->type;
        $data->category_id=(int)$this->category_id;
        $data->name=$this->name;
        $data->name_en=$this->name_en;
        $data->url_link=$this->url_link;
        $data->details=$this->details;
        $data->details_en=$this->details_en;

        $object_added=$data->save();
        if (isset($data->id) && $data_seo != null) {
            $data_seo->table_id=$data->id;
            $data_seo->table_name='portfolios';
            $data_seo->keywords=$this->keywords;
            $data_seo->keywords_en=$this->keywords_en;
            $data_seo->description=$this->details_seo;
            $data_seo->description_en=$this->details_en_seo;
            $data_seo->save();
        }else{
            $data_seo=new SeoPage();
            $data_seo->table_id=$data->id;
            $data_seo->table_name='portfolios';
            $data_seo->keywords=$this->keywords;
            $data_seo->keywords_en=$this->keywords_en;
            $data_seo->description=$this->details_seo;
            $data_seo->description_en=$this->details_en_seo;
            $data_seo->save();
        }
        $this->emit('objectEdit',$object_added);
    }

    // to reset inputs after insert
    public function reset_inputs()
    {
        $this->type= null;
        $this->edit_id= null;
        $this->ord= null;
        $this->category_id= null;
        $this->name= null;
        $this->name_en= null;
        $this->img= null;
        $this->img_icon= null;
        $this->img_type= null;
        $this->details= null;
        $this->details_en= null;
        $this->details_en_seo= null;
        $this->details_seo= null;
        $this->keywords= null;
        $this->keywords_en= null;

    }
}
