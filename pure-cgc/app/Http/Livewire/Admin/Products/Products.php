<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Admin\User;
use App\Models\Product;
use App\Models\ProductsImage;
use App\Models\ProductStock;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Products extends Component
{

    public $title_page,$company_id,$category_id,$showForm,$showDeleted,$btn_kwrd;
    public $object_id,$name,$name_en,$quantity,$price,$discount,$plus_or_minus;
    public $edit_object;
    public $result_one=null;
    protected $listeners=[
        'objectEdit'=>'refresh_edited'
    ];
    public function mount($company_id=0,$category_id=0)
    {
        $this->company_id=$company_id;
        $this->category_id=$category_id;
        $this->title_page='Products';
        $this->showForm=false;
        $this->showDeleted=false;
        $this->btn_kwrd = trans('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';

    }
    public function render()
    {
        $query=Product::where('id','>',0);
        if(in_array('Company', User::find(Auth::id())->getRoleNames()->toArray()))
        {
            $query->whereCompanyId(Auth::id());
            $this->company_id=Auth::id();
        }else
        {
            if($this->company_id > 0)
            {
                $query->whereCompanyId($this->company_id);
            }
        }
        if($this->category_id > 0)
        {
            $query->whereCategoryId($this->category_id);
        }
        if($this->category_id > 0)
        {
            $query->whereCategoryId($this->category_id);
        }
        $results= $query->get()->sortByDesc('id');
        return view('livewire.admin.products.products',
                    [
                        'results'=>$results,
                    ])->extends('admin.layouts.app',['script_editor'=>true,'script_datatables'=>true]);
    }

    public function edit_form($id=0)
    {
        $this->showForm=!$this->showForm;
        if($id > 0)
        {
            if($this->showForm == true)
            {
                $this->title_page=__('ms_lang.btn_edit');
                $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
            }
            else
            {
                $this->title_page=__('ms_lang.view');
                $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
            }
            $edit_object= Product::where('deleted_at',null)->whereId($id)->first();
        }
        else
        {
            if($this->showForm == true)
            {
                $this->title_page=__('ms_lang.btn_add_new');
                $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
            }
            else
            {
                $this->title_page=__('ms_lang.view');
                $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
            }
            $add_object=new Product();
            $edit_object=$add_object->get_new($this->company_id, $this->category_id) ;
        }
        if($edit_object)
        {
            $this->emit('getObject',$edit_object);
        }
    }

    public function refresh_edited()
    {
        session()->flash('success_message','successfully updated');
        $this->showForm=false;
        $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
    }
    public function show($id)
    {
        $this->object_id=$id;
        $this->result_one=Product::with('stocks')->find($id);
         //dd($this->result_one);
        $this->emit('openRecordsModal');
    }


    public function add_model_stock_store()
    {
        $validatedData = $this->validate([
            'name'=> 'required|unique:product_stocks,product_id,'.$this->object_id,
            'name_en'=> 'required',
            'quantity'=> 'required|numeric',
            'price'=> 'required|numeric',
            'discount'=> 'required|numeric'
        ]);
        //insert user or update exist
        // $user_tweet_data=ProductStock::where(['product_id'=>$this->object_id,])->first();
        // if(is_null($user_tweet_data) == 1)
        // {
            $stock_data=new ProductStock();
        // }
        $stock_data->product_id=$this->object_id;
        $stock_data->name=$this->name;
        $stock_data->name_en=$this->name_en;
        $stock_data->quantity=$this->quantity;
        $stock_data->price=$this->price;
        $stock_data->discount=$this->discount;
        $stock_data->plus_or_minus='=';//$this->plus_or_minus;
        $stock_data->save();
        session()->flash('success_message',trans('ms_lang.successfully_done'));
        $this->reset_values();
        $this->emit('closeRecordsModal',$stock_data->id);
    }
    public function reset_values()
    {
        $this->object_id=0;
        $this->name='';
        $this->name_en='';
        $this->quantity=0;
        $this->price=0;
        $this->discount=0;
        $this->plus_or_minus='';
    }

    public function deleted()
    {
        $this->showDeleted=!$this->showDeleted;
        $this->showForm=false;
        $this->showFormEdit=false;
        if($this->showDeleted == true)
        {
            $this->title_page='Deleted Categories';
            $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
        }
        else
        {
            $this->title_page='View Categories';
            $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        }
    }
    public function active_ms_stock($id=0)
    {
        $data=ProductStock::select('id','product_id','is_active')->find($id);
        if($data->is_active == 'Y')
        {
            $data->is_active='N';
        }
        else
        {
            $data->is_active ='Y';
        }
        $data->save();
        $this->result_one=Product::with('stocks')->find($data->product_id);
        $this->emit('openRecordsModal',$this->result_one);
    }

    public function delete_ms_stock($id=0)
    {
        ProductStock::where('product_id',$this->object_id)->find($id)->delete();
        $this->result_one=Product::with('stocks')->find($this->object_id);
    }

    public function active_ms($id=0)
    {
        $data=Product::select('id','is_active')->find($id);
        if($data->is_active == 'Y')
        {
            $data->is_active='N';
        }
        else
        {
            $data->is_active ='Y';
        }
        $data->save();
    }

    public function delete_ms($id=0)
    {
        ProductsImage::where('product_id',$id)->delete();
        Product::find($id)->delete();
    }
}
