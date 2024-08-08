<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use App\Models\SeoPage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $ord,$type,$category_id,$name,$name_en,$auther,$img,$img_icon,$img_type,$file,$details,$details_en;
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
            $this->edit_object= Article::where('deleted_at',null)->find($this->edit_id);
        }
        else
        {
            $add_object=new Article();
            $this->edit_object=$add_object->get_new($this->type,$this->category_id);
        }
        //dd($this->edit_object);
    }
    public function render()
    {
        $categories=Category::get();
        return view('livewire.admin.articles.edit',[
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
        $this->auther=$this->edit_object['auther'];
        $this->img=$this->edit_object['img'];
        $this->file=$this->edit_object['file'];
        $this->img_icon=$this->edit_object['img'];
        $this->img_type= $this->type ==1 ? 'icon':'';
        $this->details=$this->edit_object['details'];
        $this->details_en=$this->edit_object['details_en'];
        $edit_object_seo= SeoPage::where('deleted_at',null)->where(['table_id'=> $this->edit_id,'table_name'=>'articles'])->first();
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
        ]);
        if($this->edit_id > 0)
        {
            $data= Article::find($this->edit_id);
            $data_seo= SeoPage::where(['table_id'=>$this->edit_id,'table_name'=>'articles'])->first();
        }
        else
        {
            $data=new Article();
            $data_seo=new SeoPage();
        }
        if($this->img_type == 'icon')
        {
            $data->img=$this->img_icon;

        }
        elseif($data->img != $this->img)
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
            //$waterMarkUrl = public_path('uploads/logo.png');
            //$image_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
            // finally we save the image as a new file
            $img_name = $image_data->save($destinationPath."/".$file_name);
            ///small img
            $image_small_data = Image::make($img->getRealPath());
            // now you are able to resize the instance
            $image_small_data->resize(250,190);
            // and insert a watermark for example
            //$waterMarkUrl = public_path('uploads/logo.png');
            //$image_small_data->insert($waterMarkUrl, 'bottom-right', 2, 2);
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
        if($data->file != $this->file)
        {
            $file=$this->file;
            $file_name = date('Y_m_d_h_i_s_').Str::slug($this->name).'.'.$file->getClientOriginalExtension();
            // $file_sml_name_file = 'thumbnail_'.$file_name;
            $destinationPath = public_path('/uploads');
            // $destinationPath_smll = public_path('/uploads/thumbnail');
            // to finally create image instances
            //$image = $manager->make($destinationPath."/".$file_name);
            $image_data = Image::make($file->getRealPath());
            // now you are able to resize the instance
            // $image_data->resize(768,1024);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/logo.png');
            // $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
            // finally we save the image as a new file
            $file_name = $image_data->save($destinationPath."/".$file_name);
            ///small file
            // $image_small_data = Image::make($file->getRealPath());
            // now you are able to resize the instance
            // $image_small_data->resize(190,250);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/logo.png');
            // $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
            // finally we save the image as a new file
            // $file_sml_name = $image_small_data->save($destinationPath_smll."/".$file_sml_name_file);
            // exit create file
            if(is_null($data->file)==0)
            {
                @unlink("./uploads/".$data->file);
            }
            // if(is_null($data->file_thumbnail)==0)
            // {
            //     @unlink("./uploads/thumbnail/".$data->file_thumbnail);
            // }
            $data->file = $file_name;
        }
        $data->ord=(int)$this->ord;
        $data->type=$this->type;
        $data->category_id=(int)$this->category_id;
        $data->name=$this->name;
        $data->name_en=$this->name_en;
        $data->auther=$this->auther;
        $data->details=$this->details;
        $data->details_en=$this->details_en;
        $object_added=$data->save();
        if (isset($data->id) && $data_seo !=null) {

            $data_seo->table_id=$data->id;
            $data_seo->table_name='articles';
            $data_seo->keywords=$this->keywords;
            $data_seo->keywords_en=$this->keywords_en;
            $data_seo->description=$this->details_seo;
            $data_seo->description_en=$this->details_en_seo;
            $data_seo->save();
        }else{
            $data_seo=new SeoPage();
            $data_seo->table_id=$data->id;
            $data_seo->table_name='articles';
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

    }
}
