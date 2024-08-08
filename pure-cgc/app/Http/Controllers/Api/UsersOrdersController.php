<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\users_order;
use App\Models\users_orders_detail;
use App\Models\users_orders_address;
use App\Models\payment_history;
use App\Models\product;
use App\Models\product_image;
use App\Models\sms_history;
use App\Models\product_attribute_value;
use App\Models\companies_detail;
use App\Models\countries_citie;
use App\Models\coupon_uses_user;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserOrderMail;
use Auth;
use App\Models\api\User;

class UsersOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang='ar',$user_id=0)
    {
        $selct=array('users_orders.id','order_num','payment_type','payment_order_id','moving_order_id','moving_pdf','order_total_price','price_move', 'status','deliver_date','reason_if_cancel'
                    ,'user_added', 'deliver_date', 'deliver_time', 'user_notes', 'users_orders.created_at'
                    );
        $selct_orders_details=array('users_orders_details.product_id','users_orders_details.quantity', 'total_price', 'users_orders_details.discount','attributes', 'user_notes','products.id as productId','products.name');
        $results= users_order::select($selct)->where('users_orders.user_id',$user_id)->orderBy('users_orders.created_at','DESC')->get();


        //$selct=array_merge( $selct,array('product_images.id as id_img','product_images.name as img'));
        $data_result=array();
        if(count($results))
        {
            foreach($results as $result)
            {
                // $result['coupon']=@coupon_uses_user::select('coupon_id', 'coupon_uses_users.user_id', 'order_id', 'amount_coupon_taken','name', 'name_en', 'coupon', 'img', 'amount')
                //                     ->join('coupons','coupons.id','=','coupon_id')
                //                     ->where(['order_id'=>$result->id,'coupon_uses_users.user_id'=>$user_id])->first();
                //$result['attributes']='['.$result->attributes.']';
                // get cat name , name_en
                $products_details=users_orders_detail::select($selct_orders_details)
                    ->join('products','products.id','=','product_id')
                    ->where('order_id',$result->id)->get();
                    foreach($products_details as $products_detail)
                    {
                        $product_image=product_image::select('img')->where('product_id','=',$products_detail->product_id)->first();
                        $products_detail['img']= @$product_image->img;
                        $products_detail->attributes= @json_decode($products_detail->attributes);
                    }
                $result['products']=$products_details;
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_added=Auth::id();
        $this->validate($request,[
            'user_id'      =>'required|numeric',
            'order_total_price'   => 'required'
        ]);
        if($request->payment_type == 1)
        {
            $data_payment= payment_history::where(['user_id'=>$request->user_id , 'paid'=>$request->order_total_price])->orderBy('created_at', 'desc')->first();
            //print_r($data_payment); exit();
            if(is_null($data_payment) == 0)
            {
                $data_res['result']=false;
                $data_res['error_message']=' عفوا لم يتم اضافة امر الدفع ';
                $data_res['error_message_en']='No payment inserted';
                $data_res['insert_id']='';
                return $data_res;
                exit();
            }
        }
        //create order number
        $order_num=users_order::select('id')->count() +1000;
        //create new object
        $data= new users_order();
        $data->user_id=$user_id=$request->user_id;
        $data->user_added=$user_id=$user_added;
        $data->store_id=0;
        $data->status=0;
        $data->order_num= $order_num;
        $data->payment_type=$request->payment_type;
        $data->order_total_price=$request->order_total_price;
        $data->user_notes=$request->user_notes;
        $data->user_ip=\Request::ip();
        $data->user_pc_info=$request->header('User-Agent');
        $result=$data->save();
        $order_id=$data->id;
        ///update payment_history if pay type is credit  payment_type=1
        if($request->payment_type == 1)
        {
            $data_payment->payment_order_number=@$request->payment_order_number;
            $data_payment->order_id=$order_id;
            $data_payment->status=1;
            $data_payment->save();
        }

        if($result==true)
        {
            if($request->products != '')
            {
                foreach($request->products as $key => $product)
                {
                    //to get products details to send email with it
                    $gt_prodct_det= @product::select('name')->find($product['product_id']);
                    $gt_prodct_img=@product_image::select('img')->where('product_id',$product['product_id'])->first();
                    $products_2mail[$key]=[
                                    'name'=>@$gt_prodct_det->name,
                                    'img'=>@$gt_prodct_img->img,
                                    'price'=>$product['total_price']
                                ];
                    // to insert order products
                    $data_product= new users_orders_detail();
                    $data_product->user_id=$user_id;
                    $data_product->order_id=$order_id;
                    $data_product->product_id=$product['product_id'];
                    $data_product->company_id=$product['company_id'];
                    $data_product->quantity=$product['total_quantity'];
                    $data_product->total_price=$product['total_price'];
                    //$data_product->discount=$product['discount'];
                    if($product['attributes'] != '')
                    {
                        $data_product->attributes=json_encode($product['attributes']);
                        foreach ($product['attributes'] as $attribute) {
                            $data_upd_quant= product_attribute_value::find($attribute['attribute_id']);
                            if(is_null($data_upd_quant)==0)
                            {
                                $data_upd_quant->quantity= $data_upd_quant->quantity - $attribute['quantity'];
                                $data_upd_quant->save();
                            }
                        }

                    }
                    $data_product->user_ip=\Request::ip();
                    $data_product->user_pc_info=$request->header('User-Agent');
                    $result_product=$data_product->save();
                }
            }
            if($result_product == true)
            {
                //insert coupon history
                if($request->coupon_id)
                {
                    $data_coupon= new coupon_uses_user();
                    $data_coupon->user_id=$user_id;
                    $data_coupon->coupon_id=$request->coupon_id;
                    $data_coupon->order_id=$order_id;
                    $data_coupon->amount_coupon_taken=$request->amount_coupon_taken;
                    $data_coupon->user_ip=\Request::ip();
                    $data_coupon->user_pc_info=$request->header('User-Agent');
                    $data_coupon->save();
                }
                $user = User::select('name','l_name','mobile','email')->find($user_id);
                //send sms and insert in history smsm
                $sms_send_message='تمت عملية الشراء طلبك رقم '.$order_num.'.متوقع توصيلها فى '.date_with_add_days(7) .', ولمعرفة المزيد عن طلبك الرجاء التواصل مع خدمة العملاء من خلال الايميل customer@dotra.com';
                $send_sms='';// @send_sms_from_yamamah($mobile,$sms_send_message);
                $data_history_sms= new sms_history();
                $data_history_sms->type=0;
                $data_history_sms->user_id=$user_id;
                $data_history_sms->mobile=$user->mobile;
                $data_history_sms->sms=$sms_send_message;
                $data_history_sms->status=$send_sms;
                $data_history_sms->save();
                // end sms
                 //to send email confirm
                 // get user data

                 $send_mail_obj = new \stdClass();
                 $send_mail_obj->sender = ' dotra team';
                 $send_mail_obj->receiver = $user->name.' '.$user->l_name;
                 $send_mail_obj->message = $sms_send_message;
                 $send_mail_obj->order_num = $order_num;
                 $send_mail_obj->products_2mail = $products_2mail;
                 $send_mail_obj->data_other = $request;
                 $send_mail=@Mail::to($user->email)->send(new UserOrderMail($send_mail_obj));
                 //end send mail
                $data_res['result']=true;
                $data_res['error_message']='تم الإضافة بنجاح';
                $data_res['error_message_en']='succesfully Added';
                $data_res['insert_id']=$data->id;
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
    public function show($id,Request $request)
    {
        if($request->input('lang'))
        {
            $lang= $request->input('lang');
        }
        else
        {
            $lang='ar';
        }
        if($request->input('user_id'))
        {
            $user_id= $request->input('user_id');
            $where_selct=['users_orders.user_id'=>$user_id,'users_orders.id'=>$id];
        }
        else
        {
            $where_selct=['users_orders.id'=>$id];
        }

        $selct=array('users_orders.id','order_num','payment_type','order_total_price', 'status','deliver_date','price_move', 'users_orders.created_at'
                    ,'adrs.city', 'adrs.region',  'adrs.street',  'adrs.building', 'adrs.floor_num', 'adrs.apartment', 'adrs.other_notes', 'adrs.mobile', 'adrs.telephone'
                );
        $selct_orders_details=array('users_orders_details.product_id', 'count', 'total_price', 'users_orders_details.discount','users_orders_details.attributes','users_orders_details.steps',
                            'products.id as productId','products.name','country_id','products.company_id');
        $selct_company_det=array('facility_name','logo');
        if($lang =='en')
        {
            $selct=array('users_orders.id','order_num','payment_type','order_total_price', 'status','deliver_date','price_move', 'users_orders.created_at'
                    ,'adrs.city', 'adrs.region',  'adrs.street',  'adrs.building', 'adrs.floor_num', 'adrs.apartment', 'adrs.other_notes', 'adrs.mobile', 'adrs.telephone'
                );
            $selct_orders_details=array('users_orders_details.product_id', 'count', 'total_price', 'users_orders_details.discount','users_orders_details.attributes', 'users_orders_details.steps',
                            'products.id as productId','products.name_en as name','country_id','products.company_id');
            $selct_company_det=array('facility_name_en as facility_name','logo');
        }
        $result= users_order::select($selct)
        ->join('users_orders_addresses as adrs','users_orders.id','=','adrs.order_id')
        ->where($where_selct)->first();
        //$selct=array_merge( $selct,array('product_images.id as id_img','product_images.name as img'));
        $data_result=array();
        if(!is_null($result))
        {
            // foreach($results as $result)
            // {
                // get cat name , name_en
                $products_details=users_orders_detail::select($selct_orders_details)
                    ->join('products','products.id','=','product_id')
                    ->where('order_id',$result->id)->get();
                foreach($products_details as $products_detail)
                {
                    $product_image=product_image::select('img','img_thumbnail')->where('product_id','=',$products_detail->product_id)->first();
                    $products_detail['img']= @$product_image->img;
                    $products_detail['img_thumbnail']= @$product_image->img_thumbnail;
                    $products_detail['attributes']= explode( ',', $products_detail->attributes);
                }
                $result['products']=$products_details;
                $result['coupon']=@coupon_uses_user::select('coupon_id', 'coupon_uses_users.user_id', 'order_id', 'amount_coupon_taken','name', 'name_en', 'coupon', 'img', 'amount')
                                    ->join('coupons','coupons.id','=','coupon_id')
                                    ->where(['order_id'=>$result->id,'coupon_uses_users.user_id'=>$user_id])->first();
                //$data_result[]=$result;
            //}
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
