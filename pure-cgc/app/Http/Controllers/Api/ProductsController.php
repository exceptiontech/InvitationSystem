<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use App\Models\product_image;
use App\Models\attribute;
use App\Models\product_attribute_value;
use App\Models\cat;
use App\Models\attribute_value;
use App\Models\user_favorite;
use App\Models\countries_citie;
use App\Models\api\User;
use App\Models\companies_detail;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$lang='ar', $type=0,$cat_id=0)
    {
        $selct=array('id', 'cat_id',  'name','tags','country_id','company_id', 'description', 'price', 'discount', 'quantity');
        $selct_company_det=array('facility_name','logo');
        if($lang =='en')
        {
            $selct=array('id', 'cat_id',  'name_en as name','tags_en as tags','country_id','company_id', 'description_en as description',  'price', 'discount', 'quantity');
            $selct_company_det=array('facility_name_en as facility_name','logo');
        }

        //$selct=array_merge( $selct,array('product_images.id as id_img','product_images.name as img'));
        $data_result=array(); $wher= array();
        if($cat_id >0)
        {
            $wher['cat_id']=$cat_id;
        }
        if($request->input('is_special'))
        {
            $wher['is_special']=1;
        }
        if($request->input('country_id'))
        {
            $wher['country_id']=(int)$request->input('country_id');
        }
        $wher['is_active']=1;
        $results= product::select($selct)
                        ->where($wher)
                        ->paginate(15);
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
                //if favorite
                if($request->input('user_id'))
                {
                    $user_id=$request->input('user_id');
                    $is_favorite=user_favorite::select('id as id_favorite')->where(['favo_id'=>$result->id , 'user_id'=>$user_id])->first();
                    $result['is_favorite']=$is_favorite['id_favorite'];

                }

                //get imgs
                $result_imgs=product_image::select('id as id_img','img','img_thumbnail')->where('product_id','=',$result->id)->get();
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
                // get attributes
                $get_attributes_c=product_attribute_value::select('id as id_attribute','name as attribute_name','name_en as attribute_name_en','quantity','price','discount')
                            ->where(['product_id'=>$result->id ])
                            ->get();
                $result['attributes']= @$get_attributes_c;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request )
    {

        $lang =$request->input('lang');

        $selct=array('id', 'cat_id',  'name','tags','country_id','company_id', 'description', 'price', 'discount', 'quantity');
        $selct_attribute_v_c=array('product_attribute_values.value','attribute_values.id as attribute_value_id','attribute_values.name as attribute_name','attribute_values.value as attribute_value');
        $selct_attribute_v_s=array('product_attribute_values.attribute_master_value','attribute_values.id as attribute_value_id','attribute_values.name as attribute_name');
        $selct_attribute_v_ss=array('product_attribute_values.id as prodAttrVluID','attribute_values.id as attribute_value_id','attribute_values.name as attribute_name','product_attribute_values.quantity as attribute_quantity','product_attribute_values.plus_price','product_attribute_values.plus_or_minus','attribute_values.value as attribute_value');
        $selct_company_det=array('facility_name','logo');
        if($lang =='en')
        {
            $selct=array('id', 'cat_id',  'name_en as name','tags_en as tags','country_id','company_id', 'description_en as description',  'price', 'discount', 'quantity');
            $selct_attribute_v_c=array('product_attribute_values.value','attribute_values.id as attribute_value_id','attribute_values.name_en as attribute_name','attribute_values.value as attribute_value');
            $selct_attribute_v_s=array('product_attribute_values.attribute_master_value','attribute_values.id as attribute_value_id','attribute_values.name_en as attribute_name');
            $selct_attribute_v_ss=array('product_attribute_values.id as prodAttrVluID','attribute_values.id as attribute_value_id','attribute_values.name_en as attribute_name','product_attribute_values.quantity as attribute_quantity','product_attribute_values.plus_price','product_attribute_values.plus_or_minus','attribute_values.value as attribute_value');
            $selct_company_det=array('facility_name_en as facility_name','logo');
        }
        $data_result=array();
        $result= product::select($selct)
                        ->find($id);
        if(is_null($result)==0)
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

                //if favorite
                if($request->input('user_id'))
                {
                    $user_id=$request->input('user_id');
                    $is_favorite=user_favorite::select('id as id_favorite')->where(['favo_id'=>$result->id , 'user_id'=>$user_id])->first();
                    $result['is_favorite']=$is_favorite['id_favorite'];

                }
                //get imgs
                $result_imgs=product_image::select('id as id_img','img','img_thumbnail')->where('product_id','=',$result->id)->get();
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
                $get_attributes_c=product_attribute_value::select('id as id_attribute','name as attribute_name','name_en as attribute_name_en','quantity','price')
                            ->where(['product_id'=>$result->id ])
                            ->get();
                $result['attributes']= $get_attributes_c;

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

    ///search function
    public function search(Request $request,$lang='ar', $type=0)
    {
        $selct=array('id', 'cat_id',  'name','tags', 'description', 'price', 'discount', 'quantity','is_active');
        $selct_attribute_v_c=array('product_attribute_values.value','attribute_values.id as attribute_value_id','attribute_values.name as attribute_name','attribute_values.value as attribute_value');
        $selct_attribute_v_s=array('product_attribute_values.attribute_master_value','attribute_values.id as attribute_value_id','attribute_values.name as attribute_name');
        $selct_attribute_v_ss=array('product_attribute_values.id as prodAttrVluID','attribute_values.id as attribute_value_id','attribute_values.name as attribute_name','product_attribute_values.quantity as attribute_quantity','product_attribute_values.plus_price','product_attribute_values.plus_or_minus','attribute_values.value as attribute_value');
        $selct_company_det=array('facility_name','logo');
        if($lang =='en')
        {
            $selct=array('id', 'cat_id',  'name_en as name','tags_en as tags', 'description_en as description',  'price', 'discount', 'quantity','is_active');
            $selct_attribute_v_c=array('product_attribute_values.value','attribute_values.id as attribute_value_id','attribute_values.name_en as attribute_name','attribute_values.value as attribute_value');
            $selct_attribute_v_s=array('product_attribute_values.attribute_master_value','attribute_values.id as attribute_value_id','attribute_values.name_en as attribute_name');
            $selct_attribute_v_ss=array('product_attribute_values.id as prodAttrVluID','attribute_values.id as attribute_value_id','attribute_values.name_en as attribute_name','product_attribute_values.quantity as attribute_quantity','product_attribute_values.plus_price','product_attribute_values.plus_or_minus','attribute_values.value as attribute_value');
            $selct_company_det=array('facility_name_en as facility_name','logo');
        }
        //$selct=array_merge( $selct,array('product_images.id as id_img','product_images.name as img'));
        $data_result=array(); $wher= array();
        if(  $request->input('kw_search') == null )
        {
            $data['result']=false;
            $data['error_message']=' لابد من ارسال بيانات';
            $data['error_message_en']='must send data ';
            $data['data']=array();
            return $data;
            exit();
        }
        else
        {
            $kw_search=$request->input('kw_search');
            $results= product::select($selct)
                        ->where('name','like','%'.$kw_search.'%')
                        ->orWhere('name_en','like','%'.$kw_search.'%')
                        ->orWhere('description','like','%'.$kw_search.'%')
                        ->orWhere('description_en','like','%'.$kw_search.'%')
                        ->where('is_active','=',1)
                        ->paginate();
        }
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

                //if favorite
                if($request->input('user_id'))
                {
                    $user_id=$request->input('user_id');
                    $is_favorite=user_favorite::select('id as id_favorite')->where(['favo_id'=>$result->id , 'user_id'=>$user_id])->first();
                    $result['is_favorite']=$is_favorite['id_favorite'];

                }

                //get imgs
                $result_imgs=product_image::select('id as id_img','img','img_thumbnail')->where('product_id','=',$result->id)->get();
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
                                        ->where(['product_attribute_values.product_id'=>$result->id ])
                                        ->distinct('product_attribute_values.value')
                                        ->get();
                            $result[$attrubute->attribute_name_en]= $get_attributes_c1;
                        }
                        elseif($attrubute->id_attribute == 2)
                        {
                            //get attribute to product
                            $get_attributes_s2=product_attribute_value::select($selct_attribute_v_s)
                                ->join('attribute_values','attribute_values.id','=','product_attribute_values.attribute_master_value')
                                ->where(['product_attribute_values.product_id'=>$result->id ])
                                ->distinct('product_attribute_values.valueM')
                                ->get();
                            if(!is_null($get_attributes_s2))
                            {
                                foreach ($get_attributes_s2 as  $get_attributes_sv) {
                                    $get_attributes_sub=product_attribute_value::select($selct_attribute_v_ss)
                                    ->join('attribute_values','attribute_values.id','=','product_attribute_values.value')
                                    ->where(['product_attribute_values.attribute_master_value'=>$get_attributes_sv->attribute_master_value,'product_attribute_values.product_id'=>$result->id ])
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
