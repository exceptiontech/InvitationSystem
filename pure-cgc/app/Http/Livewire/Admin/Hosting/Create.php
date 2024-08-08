<?php

namespace App\Http\Livewire\Admin\Hosting;

use Livewire\Component;
use App\Models\Host;
use App\Models\SeoPage;

class Create extends Component
{
    public $name,$price,$discount,$color,$feature,$time;
    public $keywords,$keywords_en,$details_seo,$details_en_seo;

    public function render()
    {
        return view('livewire.admin.hosting.create');
    }
    public function store()
    {
        $this->validate([
            'name'  =>  'required|max:200',
            'price'  =>  'required|integer',
            'time'  =>  'required',
            'feature'  =>  'required',
            'discount'  =>  'required|integer',
            'color'  =>  'required|max:200',
           ]);

       $data= Host::create([
            'name'=>$this->name,
            'price'=>$this->price,
            'time'=>$this->time,
            'discount'=>$this->discount,
            'feature'=>$this->feature ,
            'color'=>$this->color,
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
        $this->price= null;
        $this->time= null;
        $this->discount= null;
        $this->color= null;
        $this->feature= null;
    }
}
