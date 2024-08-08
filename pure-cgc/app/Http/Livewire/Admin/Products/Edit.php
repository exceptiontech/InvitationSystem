<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Admin\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsImage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Edit extends Component
{

    use WithFileUploads;
    public $ord,$type,$company_id,$category_id,$name,$name_en,$url,$label,$label_en,$product_code,$hash_number,$barcode,$barcode_number,$img,$img_icon,$img_type,$details,$details_en;
    public $images = [];
    public $edit_object;
    public $edit_id;
    protected $listeners=[
        'getObject' => 'get_object'
    ];
    public function mount()
    {
        if($this->edit_id > 0)
        {
            $this->edit_object= Product::where('deleted_at',null)->find($this->edit_id);
        }
        else
        {
            $add_object=new Product();
            $this->edit_object=$add_object->get_new($this->company_id,$this->category_id);
        }
        //dd($this->edit_object);
    }
    public function render()
    {
        $categories=Category::get();
        $companies=User::role('Company')->get();
        //dd($companies);
        return view('livewire.admin.products.edit',[
            'edit_object'=>$this->edit_object,
            'categories'=>$categories,
            'companies'=>$companies
        ])->extends('admin.layouts.app');
    }
    public function get_object($edit_object)
    {
        $this->edit_object=$edit_object;
        $this->edit_id=$this->edit_object['id'];
        $this->category_id=$this->edit_object['category_id'];
        $this->company_id=$this->edit_object['company_id'];
        $this->ord=$this->edit_object['ord'];
        $this->name=$this->edit_object['name'];
        $this->name_en=$this->edit_object['name_en'];
        $this->label=$this->edit_object['label'];
        $this->label_en=$this->edit_object['label_en'];
        $this->product_code=$this->edit_object['product_code'];
        $this->url=$this->edit_object['url'];
        $this->img=$this->edit_object['img'];
        $this->img_icon=$this->edit_object['img'];
        $this->img_type= $this->type ==1 ? 'icon':'';
        $this->details=$this->edit_object['details'];
        $this->details_en=$this->edit_object['details_en'];
    }

    // to insert or update one
    public function store_update()
    {
        $this->validate([
            'name'      =>  'required|max:200',
            'name_en'   =>  'required|max:200',
            'images.*'  => 'image|max:2048', // 1MB Max
        ]);
        if($this->edit_id > 0)
        {
            $data= Product::find($this->edit_id);
        }
        else
        {
            $data=new Product();
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
            //$image_data->resize(1024,768);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/watermark1.png');
            // $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
            // finally we save the image as a new file
            $img_name = $image_data->save($destinationPath."/".$file_name);
            ///small img
            $image_small_data = Image::make($img->getRealPath());
            // now you are able to resize the instance
            $image_small_data->resize(250,190);
            // and insert a watermark for example
            $waterMarkUrl = public_path('uploads/watermark1.png');
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
        if(in_array('Company', User::find(Auth::id())->getRoleNames()->toArray()))
        {
            $data->company_id=Auth::id();
        }
        else
        {
            $data->company_id=(int)$this->company_id;
        }

        $data->category_id=(int)$this->category_id;
        $data->name=$this->name;
        $data->name_en=$this->name_en;
        $data->url=$this->url;
        $data->label=$this->label;
        $data->label_en=$this->label_en;
        $data->product_code=$this->product_code;
        $data->details=$this->details;
        $data->details_en=$this->details_en;
        $object_added=$data->save();
        //add images
        if(!empty($this->images))
        {
            foreach ($this->images as $key => $image) {
                $file_name = date('Y_m_d_h_i_s_').Str::slug($this->name).'.'.$image->getClientOriginalExtension();
                $file_sml_name_img = 'thumbnail_'.$file_name;
                $image_data = Image::make($image->getRealPath());
                //$image_data->resize(1024,768); // now you are able to resize the instance
                // and insert a watermark for example
                // $waterMarkUrl = public_path('uploads/watermark1.png');
                // $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
                // finally we save the image as a new file
                $img_name = $image_data->save(config('ms_config.destination_path')."/".$file_name);
                ///small img
                $image_small_data = Image::make($image->getRealPath());
                // now you are able to resize the instance
                $image_small_data->resize(250,190);
                // and insert a watermark for example
                $waterMarkUrl = public_path('uploads/watermark1.png');
                $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
                // finally we save the image as a new file
                $img_sml_name = $image_small_data->save(config('ms_config.destination_path_small')."/".$file_sml_name_img);
                // exit create img
                $data_produt_img=new ProductsImage();
                $data_produt_img->product_id=$data->id;
                $data_produt_img->img=$file_name;
                $data_produt_img->img_thumbnail=$file_sml_name_img;
                $data_produt_img->save();
            }

        }
        $this->emit('objectEdit',$object_added);
    }

    // to reset inputs after insert
    public function reset_inputs()
    {
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
