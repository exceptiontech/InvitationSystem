<?php
namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\SeoPage;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $ord,$type,$parent_id,$name,$name_en,$img,$img_icon,$img_type,$details,$details_en;
    public $keywords,$keywords_en,$details_seo,$details_en_seo;
    public $edit_object;
    public $edit_id;
    protected $listeners=[
        'getObject' => 'get_object'
    ];

    public function mount()
    {
        $this->edit_object= Category::where('deleted_at',null)->find($this->edit_id);
    }
    public function render()
    {
        return view('livewire.admin.categories.edit',[
            'edit_object'=>$this->edit_object
        ])->extends('admin.layouts.app',['script_editor'=>true]);
    }

    public function get_object($edit_object)
    {
        $this->edit_object=$edit_object;
        $this->edit_id=$this->edit_object['id'];
        $this->ord=$this->edit_object['ord'];
        $this->type=$this->edit_object['type'];
        $this->parent_id=$this->edit_object['parent_id'];
        $this->name=$this->edit_object['name'];
        $this->name_en=$this->edit_object['name_en'];
        $this->img=$this->edit_object['img'];
        $this->img_icon=$this->edit_object['img'];
        $this->img_type= $this->type ==0 ? 'img':'icon';
        $this->details=$this->edit_object['details'];
        $this->details_en=$this->edit_object['details_en'];
        $edit_object_seo= SeoPage::where('deleted_at',null)->where(['table_id'=> $this->edit_id,'table_name'=>'categories'])->first();
        if ($edit_object_seo != null) {
            $this->keywords=$edit_object_seo->keywords;
            $this->keywords_en=$edit_object_seo->keywords_en;
            $this->details_seo=$edit_object_seo->description;
            $this->details_en_seo=$edit_object_seo->description_en;
        }

    }

    public function store_update()
    {
        $this->validate([
            'name'      =>  'required|max:200',
            'name_en'   =>  'required|max:200',
        ]);
        if($this->edit_id > 0)
        {
            $data= Category::find($this->edit_id);
            $data_seo= SeoPage::where(['table_id'=>$this->edit_id,'table_name'=>'categories'])->first();
        }
        else
        {
            $data=new Category();
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
        $data->ord=(int)$this->ord;
        $data->type=$this->type;
        $data->parent_id=(int)$this->parent_id;
        $data->name=$this->name;
        $data->name_en=$this->name_en;
        $data->details=$this->details;
        $data->details_en=$this->details_en;
        $object_added=$data->save();
        if (isset($data->id) && $data_seo !=null) {
            $data_seo->table_id=$data->id;
            $data_seo->table_name='categories';
            $data_seo->keywords=$this->keywords;
            $data_seo->keywords_en=$this->keywords_en;
            $data_seo->description=$this->details_seo;
            $data_seo->description_en=$this->details_en_seo;
            $data_seo->save();
        }else{
            $data_seo=new SeoPage();
            $data_seo->table_id=$data->id;
            $data_seo->table_name='categories';
            $data_seo->keywords=$this->keywords;
            $data_seo->keywords_en=$this->keywords_en;
            $data_seo->description=$this->details_seo;
            $data_seo->description_en=$this->details_en_seo;
            $data_seo->save();
        }
        $this->reset_inputs();
        $this->emit('objectEdit',$object_added);
    }

    // to reset inputs after insert
    public function reset_inputs()
    {
        $this->type= null;
        $this->edit_id= null;
        $this->ord= null;
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
