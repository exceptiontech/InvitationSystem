<?php

namespace App\Http\Livewire\Admin\PaymentsPlans;

use Livewire\Component;
use App\Models\PaymentPlan;
use App\Models\SeoPage;
use App\Models\Category;

class Create extends Component
{
    public $name,$price,$discount,$category_id,$color,$details,$time,$name_en;
    public $keywords,$keywords_en,$details_seo,$details_en_seo;

    public function render()
    {
        $categories=Category::where(['type'=>0,'parent_id'=>0])->get();
        return view('livewire.admin.payments_plans.create' , compact('categories'));
    }
    public function store()
    {
        $this->validate([
            'name'  =>  'required|max:200',
            'name_en' => 'required|max:200',
            'price'  =>  'nullable|string',
            'time'  =>  'nullable',
            'details'  =>  'required',
            'discount'  =>  'nullable|integer',
            'color'  =>  'nullable|max:200',
           ]);
       $data= PaymentPlan::create([
            'name'=>$this->name,
            'name_en' => $this->name_en,
            'price'=>$this->price,
            // 'time'=>$this->time,
            'category_id'=>$this->category_id,
            // 'discount'=>$this->discount,
            'details'=>$this->details ,
            // 'color'=>$this->color,
        ]);

        if(isset($data->id))
        {
            $data_seo=new SeoPage();
            $data_seo->table_id=$data->id;
            $data_seo->table_name='hosts';
            $data_seo->keywords=$this->keywords;
            $data_seo->keywords_en=$this->keywords_en;
            $data_seo->description=$this->details_seo;
            $data_seo->description_en=$this->details_en_seo;
            $data_seo->save();
        }

        $this->reset_inputs();
        session()->flash('success_message',"added success");
        return back();
    }

    public function reset_inputs()
    {
        $this->name= null;
        $this->name_en= null;
        $this->price= null;
        $this->time= null;
        $this->discount= null;
        $this->color= null;
        $this->details= null;
        $this->category_id = null;
    }
}
