<?php

namespace App\Http\Livewire\Admin\PaymentsPlans;

use App\Models\Category;
use Livewire\Component;
use App\Models\PaymentPlan;
use App\Models\SeoPage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $name,$name_en,$category_id,$img,$img_icon,$img_type,$price,$price_ryial,$price_dolar,$discount,$color,$details,$details_en,$time;
    public $keywords,$keywords_en,$details_seo,$details_en_seo;
    public $edit_object;
    public $edit_id;
    protected $listeners=[
        'getObject' => 'get_object'

    ];
    public function mount()
    {
        $this->edit_object= PaymentPlan::whereId($this->edit_id)->first();
    }
    public function render()
    {
        $categories=Category::where(['type'=>0,'parent_id'=>0])->get();

        return view('livewire.admin.payments_plans.edit',compact('categories'));
    }
    public function get_object($edit_object)
    {
        $this->edit_object=$edit_object;
        $this->edit_id=$this->edit_object['id'];
        $this->name=$this->edit_object['name'];
        $this->name_en=$this->edit_object['name_en'];
        $this->category_id=$this->edit_object['category_id'];
        $this->img=$this->edit_object['img'];
        $this->img_icon=$this->edit_object['img'];
        $this->img_type= $this->img_type ==0 ? 'img':'icon';
        $this->price=$this->edit_object['price'];
        $this->price_ryial=$this->edit_object['price_ryial'];
        $this->price_dolar=$this->edit_object['price_dolar'];
        $this->discount=$this->edit_object['discount'];
        $this->details=$this->edit_object['details'];
        $this->details_en=$this->edit_object['details_en'];
        $this->color=$this->edit_object['color'];
        $this->time=$this->edit_object['time'];

        $edit_object_seo= SeoPage::where('deleted_at',null)->where(['table_id'=>$this->edit_id,'table_name'=>'hosts'])->first();
        if ($edit_object_seo != null) {
            $this->keywords=$edit_object_seo->keywords;
            $this->keywords_en=$edit_object_seo->keywords_en;
            $this->details_seo=$edit_object_seo->description;
            $this->details_en_seo=$edit_object_seo->description_en;
        }

    }
    public function update()
    {
        $this->validate([
            'name'  =>  'required|max:200',
            'price'  =>  'required|integer',
            'details_en'  =>  'required',
            'discount'  =>  'nullable|integer',
            'color'  =>  'nullable|max:200',
           ]);
        $data= PaymentPlan::find($this->edit_id);
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
        $data['name']=$this->name;
        $data['name_en']=$this->name_en;
        $data['category_id']= $this->category_id;
        $data['price']=$this->price;
        $data['price_ryial']=$this->price_ryial;
        $data['price_dolar']=$this->price_dolar;
        $data['discount']=$this->discount;
        $data['details']= $this->details;
        $data['details_en']= $this->details_en;
        $data['color']= $this->color;
        $data['time']= $this->time;
        $object_added=$data->save();

        $data_seo=SeoPage::where('deleted_at',null)->where(['table_id'=>$this->edit_id,'table_name'=>'hosts'])->first();
        if(isset($data_seo)){
            $data_seo->keywords=$this->keywords;
            $data_seo->keywords_en=$this->keywords_en;
            $data_seo->description=$this->details_seo;
            $data_seo->description_en=$this->details_en_seo;
            $data_seo->save();
        }else{
            $data_seo=new SeoPage();
            $data_seo->table_id=$data->id;
            $data_seo->table_name='hosts';
            $data_seo->keywords=$this->keywords;
            $data_seo->keywords_en=$this->keywords_en;
            $data_seo->description=$this->details_seo;
            $data_seo->description_en=$this->details_en_seo;
            $data_seo->save();
        }

        $this->reset(['name','name_en','category_id','price','price_ryial','price_dolar','discount','color','details','details_en','time']);
        $this->emit('objectEdit',$object_added);
    }
}
