<?php

namespace App\Http\Livewire\Admin\Hosting;

use Livewire\Component;
use App\Models\Host;
use App\Models\SeoPage;

class Edit extends Component
{
    public $name,$price,$discount,$color,$feature,$time;
    public $keywords,$keywords_en,$details_seo,$details_en_seo;
    public $edit_object;
    public $edit_id;
    protected $listeners=[
        'getObject' => 'get_object'

    ];
    public function mount()
    {
        $this->edit_object= Host::whereId($this->edit_id)->first();
    }
    public function render()
    {
        return view('livewire.admin.hosting.edit');
    }
    public function get_object($edit_object)
    {
        $this->edit_object=$edit_object;
        $this->edit_id=$this->edit_object['id'];
        $this->name=$this->edit_object['name'];
        $this->price=$this->edit_object['price'];
        $this->discount=$this->edit_object['discount'];
        $this->feature=$this->edit_object['feature'];
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
            'feature'  =>  'required',
            'discount'  =>  'required|integer',
            'color'  =>  'required|max:200',
           ]);
        $data= Host::find($this->edit_id);

        $data['name']=$this->name;
        $data['price']=$this->price;
        $data['discount']=$this->discount;
        $data['feature']= $this->feature;
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

        session()->flash('success_message',"edit success");
        return back();
    }
}
