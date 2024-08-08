<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\cat;
use App\Models\product_image;
use App\Models\attribute;
use App\Models\product_attribute_value;
use App\Models\countries_citie;
use App\Models\companies_detail;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang='ar',$user_id=0 ,$onesignal_id='')
    {
        if($user_id > 0 && $onesignal_id <> '')
        {
            //to set user id to empty rows
            $set_user_ids=cart::select('id','product_id','size_id','color_id','quantity')->where(['onesignal_id'=> $onesignal_id, 'user_id' =>0])->get();
            foreach ($set_user_ids as $key => $set_user_id) {
                // to chk if data reapeted
                $gt_reapeted=cart::where([
                                        'user_id' => $user_id,
                                        'product_id' => $set_user_id->product_id,
                                        'size_id' => $set_user_id->size_id,
                                        'color_id' => $set_user_id->color_id,
                                    ])->first();
                if(count($gt_reapeted))
                {
                    $set_user_id->quantity=$gt_reapeted->quantity + $set_user_id->quantity;
                    $this->destroy($gt_reapeted->id);
                }
                // end chk reapeted
                $set_user_id->user_id=$user_id;
                $set_user_id->save();
            }
        }
        $selct=array('carts.id','carts.user_id','carts.onesignal_id','carts.product_id','carts.size_id','carts.color_id','carts.quantity','carts.created_at',
                    'products.id as product_id', 'cat_id',  'name','tags','country_id','company_id', 'description', 'price', 'discount', 'products.quantity as product_quantity');
        $selct_attribute_v_c=array('product_attribute_values.value','attribute_values.id as attribute_value_id','attribute_values.name as attribute_name','attribute_values.value as attribute_value');
        $selct_attribute_v_s=array('product_attribute_values.attribute_master_value','attribute_values.id as attribute_value_id','attribute_values.name as attribute_name');
        $selct_attribute_v_ss=array('product_attribute_values.id as prodAttrVluID','attribute_values.id as attribute_value_id','attribute_values.name as attribute_name','product_attribute_values.quantity as attribute_quantity','product_attribute_values.plus_price','product_attribute_values.plus_or_minus','attribute_values.value as attribute_value');
        $selct_company_det=array('facility_name','logo');
        if($lang =='en')
        {
            $selct=array('carts.id','carts.user_id','carts.product_id','carts.size_id','carts.color_id','carts.quantity','carts.created_at',
                        'products.id as product_id', 'cat_id',  'name_en as name','tags_en as tags','country_id','company_id', 'description_en as description',  'price', 'discount', 'products.quantity as product_quantity');
            $selct_attribute_v_c=array('product_attribute_values.value','attribute_values.id as attribute_value_id','attribute_values.name_en as attribute_name','attribute_values.value as attribute_value');
            $selct_attribute_v_s=array('product_attribute_values.attribute_master_value','attribute_values.id as attribute_value_id','attribute_values.name_en as attribute_name');
            $selct_attribute_v_ss=array('product_attribute_values.id as prodAttrVluID','attribute_values.id as attribute_value_id','attribute_values.name_en as attribute_name','product_attribute_values.quantity as attribute_quantity','product_attribute_values.plus_price','product_attribute_values.plus_or_minus','attribute_values.value as attribute_value');
            $selct_company_det=array('facility_name_en as facility_name','logo');
        }

        if ($user_id > 0) {
            $wher['carts.user_id'] = $user_id;
        }elseif(!empty($onesignal_id))
        {
            $wher['carts.onesignal_id'] = $onesignal_id;
            $wher['carts.user_id'] = 0;
        }
        $results= cart::select($selct)
                        ->join('products','products.id','=','carts.product_id')
                        ->where($wher)->get();
        $data_result=array();
        if(count($results))
        {
            foreach($results as $result)
            {
                //set parameter price after discount
                $result['price_with_discount']=discount_get_value($result->price,$result->discount);
                // get cat name , name_en
                $cat_details=cat::select('name','name_en')->find($result->cat_id);
                $result['cat_name']=$cat_details->name;
                $result['cat_name_en']=$cat_details->name_en;
                // get company name , name_en
                $company_details=companies_detail::select($selct_company_det)->where('user_id',$result->company_id)->first();
                $result['company_name']=@$company_details;
                // get country name , name_en
                $country_details=countries_citie::find($result->country_id);
                $result['country_data']=@$country_details;

                //get imgs
                $result_imgs=product_image::select('id as id_img','img','img_thumbnail')->where('product_id','=',$result->product_id)->get();
                if(count($result_imgs))
                {
                    foreach ($result_imgs as $result_img)
                    {
                        //echo url('uploads/'.$result_img->img); exit();
                        $data_img = @getimagesize('public/uploads/'.$result_img->img);
                        $result_img['width'] = @$data_img[0];
                        $result_img['height'] = @$data_img[1];

                    }
                    $result['imgs']=$result_imgs;
                }
                else
                {
                    $result['imgs']=[];
                }
                //get main attributes
                $attrubutes=attribute::select('id as id_attribute','name as attribute_name','name_en as attribute_name_en')->get();
                if(!is_null($attrubutes))
                {
                    foreach($attrubutes as $attrubute)
                    {
                        if($attrubute->id_attribute == 1)
                        {
                            //get colors for product
                            $get_attributes_c1=product_attribute_value::select($selct_attribute_v_c)
                                        ->join('attribute_values','attribute_values.id','=','product_attribute_values.value')
                                        ->where(['product_attribute_values.product_id'=>$result->product_id ])
                                        ->distinct('product_attribute_values.value')
                                        ->get();
                            $result[$attrubute->attribute_name_en]= $get_attributes_c1;
                        }
                        elseif($attrubute->id_attribute == 2)
                        {
                            //get attribute to product
                            $get_attributes_s2=product_attribute_value::select($selct_attribute_v_s)
                                ->join('attribute_values','attribute_values.id','=','product_attribute_values.attribute_master_value')
                                ->where(['product_attribute_values.product_id'=>$result->product_id ])
                                ->distinct('product_attribute_values.valueM')
                                ->get();
                            if(!is_null($get_attributes_s2))
                            {
                                foreach ($get_attributes_s2 as  $get_attributes_sv) {
                                    $get_attributes_sub=product_attribute_value::select($selct_attribute_v_ss)
                                    ->join('attribute_values','attribute_values.id','=','product_attribute_values.value')
                                    ->where(['product_attribute_values.attribute_master_value'=>$get_attributes_sv->attribute_master_value,'product_attribute_values.product_id'=>$result->product_id ])
                                    ->get();
                                    $get_attributes_sv['quantity_price']=$get_attributes_sub;
                                }
                            }
                            $result[$attrubute->attribute_name_en]= $get_attributes_s2;
                        }
                    }
                }
                $data_result[]=$result;
            }
            $data['result']=true;
            $data['error_message']='';
            $data['error_message_en']='';
            $data['data']=$results;
            return $data;
        }
        else
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            $data['data']=array();
            return $data;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            //'user_id'      =>'required|numeric',
            'product_id'   => 'required|numeric'
        ]);
        if(empty($request->onesignal_id) && $request->user_id == 0)
        {
            $data_res['result']=false;
            $data_res['error_message']='لابد من ارسال البيانات الاساسية';
            $data_res['error_message_en']='you must send primary data';
            $data_res['insert_id']='';
            return $data_res;
        }
        $wher['product_id']=$request->product_id;
        $wher['size_id']=$request->size_id;
        $wher['color_id']=$request->color_id;
        if($request->user_id > 0)
        {
            $wher['user_id'] = $request->user_id;
        }
        if(!empty($request->onesignal_id) && $request->onesignal_id <> 0 )
        {
            $wher['onesignal_id'] = $request->onesignal_id;
            $wher['user_id'] = 0;
        }

        $chk_exist=cart::where($wher)->first();
        if(count($chk_exist)>0)
        {
            $data_res['result']=false;
            $data_res['error_message']='تمت الإضافة من قبل';
            $data_res['error_message_en']='sorry was exist';
            $data_res['insert_id']='';
            return $data_res;
        }
        $data= new cart();
        $data->user_id=$request->user_id;
        $data->onesignal_id=$request->onesignal_id;
        $data->product_id=$request->product_id;
        $data->size_id=$request->size_id;
        $data->color_id=$request->color_id;
        $data->quantity=$request->quantity;
        $data->user_ip= \Request::ip();
        $data->user_pc_info=$request->header('User-Agent');
        $result=$data->save();
        if($result==true)
        {
            $data_res['result']=true;
            $data_res['error_message']='تمت الاضافة بنجاح';
            $data_res['error_message_en']='succesfully Added';
            $data_res['insert_id']=$data->id;
            return $data_res;
        }
        else
        {
            $data_res['result']=false;
            $data_res['error_message']='لايوجد بيانات';
            $data_res['error_message_en']='No Results';
            $data_res['insert_id']='';
            return $data_res;
        }

    }

    /**
     * Store all a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_all(Request $request)
    {
        // $this->validate($request,[
        //     'user_id'      =>'required|numeric',
        //     'product_id'   => 'required|numeric'
        // ]);
        //dd($request);
        if(count($request->cart))
        {
            if(!empty($request->user_id))
            {
                $this->destroy_all($request->user_id,'');
            }
            elseif(!empty($request->onesignal_id))
            {
                $this->destroy_all(0,$request->onesignal_id);
            }

            $insert_id=array();
            foreach($request->cart as $key => $request_one)
            {
                //settype($request_one,'object');
                $data= new cart();
                $data->user_id=$request->user_id;
                $data->onesignal_id=$request->onesignal_id;
                $data->product_id=$request_one['product_id'];
                $data->size_id=$request_one['size_id'];
                $data->color_id=$request_one['color_id'];
                $data->quantity=$request_one['quantity'];
                $data->user_ip= \Request::ip();
                $data->user_pc_info=$request->header('User-Agent');
                $result=$data->save();
                $insert_id[]=$data->id;
            }
            if($result==true)
            {
                $data_res['result']=true;
                $data_res['error_message']='تمت الاضافة بنجاح';
                $data_res['error_message_en']='succesfully Added';
                $data_res['insert_id']=$insert_id;
                return $data_res;
            }
            else
            {
                $data_res['result']=false;
                $data_res['error_message']='لايوجد بيانات';
                $data_res['error_message_en']='No Results';
                $data_res['insert_id']='';
                return $data_res;
            }
        }
        else
        {
            $data_res['result']=false;
            $data_res['error_message']='لايوجد بيانات';
            $data_res['error_message_en']='No Results';
            $data_res['insert_id']='';
            return $data_res;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , Request $request)
    {
        $lang =$request->input('lang');
        $selct=array('carts.id','carts.user_id','carts.product_id','carts.size_id','carts.color_id','carts.quantity','carts.created_at',
                    'products.id as product_id', 'cat_id',  'name', 'description', 'price', 'discount', 'products.quantity as product_quantity');
        $selct_attribute_v_c=array('product_attribute_values.value','attribute_values.id as attribute_value_id','attribute_values.name as attribute_name','attribute_values.value as attribute_value');
        $selct_attribute_v_s=array('product_attribute_values.attribute_master_value','attribute_values.id as attribute_value_id','attribute_values.name as attribute_name');
        $selct_attribute_v_ss=array('product_attribute_values.id as prodAttrVluID','attribute_values.id as attribute_value_id','attribute_values.name as attribute_name','product_attribute_values.quantity as attribute_quantity','product_attribute_values.plus_price','product_attribute_values.plus_or_minus','attribute_values.value as attribute_value');

        if($lang =='en')
        {
            $selct=array('carts.id','carts.user_id','carts.product_id','carts.size_id','carts.color_id','carts.quantity','carts.created_at',
                        'products.id as product_id', 'cat_id',  'name_en as name', 'description_en as description',  'price', 'discount', 'products.quantity as product_quantity');
            $selct_attribute_v_c=array('product_attribute_values.value','attribute_values.id as attribute_value_id','attribute_values.name_en as attribute_name','attribute_values.value as attribute_value');
            $selct_attribute_v_s=array('product_attribute_values.attribute_master_value','attribute_values.id as attribute_value_id','attribute_values.name_en as attribute_name');
            $selct_attribute_v_ss=array('product_attribute_values.id as prodAttrVluID','attribute_values.id as attribute_value_id','attribute_values.name_en as attribute_name','product_attribute_values.quantity as attribute_quantity','product_attribute_values.plus_price','product_attribute_values.plus_or_minus','attribute_values.value as attribute_value');
        }
        $result= cart::select($selct)
        ->join('products','products.id','=','carts.id')
        ->where('carts.id',$id)->first();
        //$selct=array_merge( $selct,array('product_images.id as id_img','product_images.name as img'));
        $data_result=array();
        if(count($result))
        {
            //set parameter price after discount
            $result['price_with_discount']=discount_get_value($result->price,$result->discount);
            // get cat name , name_en
            $cat_details=cat::select('name','name_en')->find($result->cat_id);
            $result['cat_name']=$cat_details->name;
            $result['cat_name_en']=$cat_details->name_en;
            //get imgs
            $result_imgs=product_image::select('id as id_img','img','img_thumbnail')->where('product_id','=',$result->product_id)->get();
            if(count($result_imgs))
            {
                foreach ($result_imgs as $result_img)
                {
                    //echo url('uploads/'.$result_img->img); exit();
                    $data_img = @getimagesize('public/uploads/'.$result_img->img);
                    $result_img['width'] = @$data_img[0];
                    $result_img['height'] = @$data_img[1];

                }
                $result['imgs']=$result_imgs;
            }
            else
            {
                $result['imgs']=[];
            }
            //get main attributes
            $attrubutes=attribute::select('id as id_attribute','name as attribute_name','name_en as attribute_name_en')->get();
            if(!is_null($attrubutes))
            {
                foreach($attrubutes as $attrubute)
                {
                    if($attrubute->id_attribute == 1)
                    {
                        //get colors for product
                        $get_attributes_c1=product_attribute_value::select($selct_attribute_v_c)
                                    ->join('attribute_values','attribute_values.id','=','product_attribute_values.value')
                                    ->where(['product_attribute_values.product_id'=>$result->product_id ])
                                    ->distinct('product_attribute_values.value')
                                    ->get();
                        $result[$attrubute->attribute_name_en]= $get_attributes_c1;
                    }
                    elseif($attrubute->id_attribute == 2)
                    {
                        //get attribute to product
                        $get_attributes_s2=product_attribute_value::select($selct_attribute_v_s)
                            ->join('attribute_values','attribute_values.id','=','product_attribute_values.attribute_master_value')
                            ->where(['product_attribute_values.product_id'=>$result->product_id ])
                            ->distinct('product_attribute_values.valueM')
                            ->get();
                        if(!is_null($get_attributes_s2))
                        {
                            foreach ($get_attributes_s2 as  $get_attributes_sv) {
                                $get_attributes_sub=product_attribute_value::select($selct_attribute_v_ss)
                                ->join('attribute_values','attribute_values.id','=','product_attribute_values.value')
                                ->where(['product_attribute_values.attribute_master_value'=>$get_attributes_sv->attribute_master_value,'product_attribute_values.product_id'=>$result->product_id ])
                                ->get();
                                $get_attributes_sv['quantity_price']=$get_attributes_sub;
                            }
                        }
                        $result[$attrubute->attribute_name_en]= $get_attributes_s2;
                    }
                }
            }
            $data['result']=true;
            $data['error_message']='';
            $data['error_message_en']='';
            $data['data']=$result;
            return $data;
        }
        else
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            $data['data']=array();
            return $data;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            //'user_id'      =>'required|numeric',
            'product_id'   => 'required|numeric'
        ]);
        $chk_exist=cart::where([ ['id','!=',$id],
                                'user_id'=> $request->user_id,
                                'product_id'=>$request->product_id,
                                'size_id'=>$request->size_id,
                                'color_id'=>$request->color_id])->first();
        if(count($chk_exist)>0)
        {
            $data_res['result']=false;
            $data_res['error_message']=' موجود من قبل';
            $data_res['error_message_en']='sorry was exist';
            $data_res['insert_id']='';
            return $data_res;
        }
        $data= cart::find($id);
        $data->user_id=$request->user_id;
        $data->onesignal_id=$request->onesignal_id;
        $data->product_id=$request->product_id;
        $data->size_id=$request->size_id;
        $data->color_id=$request->color_id;
        $data->quantity=$request->quantity;
        $data->user_ip= \Request::ip();
        $data->user_pc_info=$request->header('User-Agent');
        $result=$data->save();
        if($result==true)
        {
            $data_res['result']=true;
            $data_res['error_message']='تم التعديل بنجاح';
            $data_res['error_message_en']='succesfully Updated';
            $data_res['insert_id']=$data->id;
            return $data_res;
        }
        else
        {
            $data_res['result']=false;
            $data_res['error_message']='لايوجد بيانات';
            $data_res['error_message_en']='No Results';
            $data_res['insert_id']='';
            return $data_res;
        }
    }

    /**
     * Remove all 2 user the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_all($user_id=0,$onesignal_id='')
    {
        $wher=array();
        if($user_id != 0)
        {
            $wher=['user_id'=> $user_id];
        }elseif($onesignal_id != '')
        {
            $wher['onesignal_id'] = $onesignal_id;
            $wher['user_id'] = 0;
        }
        $result=cart::where($wher)->delete();
        if($result==true)
        {
            $data['result']=true;
            $data['error_message']='تم الحذف بنجاح';
            $data['error_message_en']='succesfully deleted';
            return $data;
        }
        else
        {
            $data['result']=false;
            $data['error_message']='تم الحذف من قبل';
            $data['error_message_en']='sorry was deleted';
            return $data;
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=cart::where('id',$id)->delete();
        if($result==true)
        {
            $data['result']=true;
            $data['error_message']='تم الحذف بنجاح';
            $data['error_message_en']='succesfully deleted';
            return $data;
        }
        else
        {
            $data['result']=false;
            $data_res['error_message']='تم الحذف من قبل';
            $data_res['error_message_en']='sorry was deleted';
            return $data;
        }
    }
}
