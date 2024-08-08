<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersShipment;
use App\Models\payment_history;
use App\Models\sms_history;
use Auth;
use App\Models\api\User;

class UsersShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $selct=array('id', 'user_id', 'shipment_num', 'reciever_name', 'reciever_mobile', 'reciever_address',
                    'latitude', 'longitude', 'shipment_details', 'shipment_weight', 'shipment_type', 'payment_type',
                    'shipment_price', 'delivery_amount', 'shipment_id_num', 'created_at');
        $selct_orders_details=array('users_orders_details.product_id','users_orders_details.quantity', 'total_price', 'users_orders_details.discount','attributes', 'user_notes','products.id as productId','products.name');
        $results= UsersShipment::select($selct)->where('user_id',$user->id)->orderBy('created_at','DESC')->get();


        //$selct=array_merge( $selct,array('product_images.id as id_img','product_images.name as img'));
        $data_result=array();
        if(count($results))
        {
            // foreach($results as $result)
            // {
            //     // $result['coupon']=@coupon_uses_user::select('coupon_id', 'coupon_uses_users.user_id', 'order_id', 'amount_coupon_taken','name', 'name_en', 'coupon', 'img', 'amount')
            //     //                     ->join('coupons','coupons.id','=','coupon_id')
            //     //                     ->where(['order_id'=>$result->id,'coupon_uses_users.user_id'=>$user_id])->first();
            //     //$result['attributes']='['.$result->attributes.']';
            //     // get cat name , name_en
            //     $products_details=users_orders_detail::select($selct_orders_details)
            //         ->join('products','products.id','=','product_id')
            //         ->where('order_id',$result->id)->get();
            //         foreach($products_details as $products_detail)
            //         {
            //             $product_image=product_image::select('img')->where('product_id','=',$products_detail->product_id)->first();
            //             $products_detail['img']= @$product_image->img;
            //             $products_detail->attributes= @json_decode($products_detail->attributes);
            //         }
            //     $result['products']=$products_details;
            // }
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
        $user=Auth::user();
        $this->validate($request,[
            'reciever_name'   => 'required',
            'reciever_mobile'   => 'required',
            'reciever_address'   => 'required',
            'shipment_details'   => 'required'
        ]);
        // if($request->payment_type == 1)
        // {
        //     $data_payment= payment_history::where(['user_id'=>$user->id , 'paid'=>$request->order_total_price])->orderBy('created_at', 'desc')->first();
        //     //print_r($data_payment); exit();
        //     if(is_null($data_payment) == 0)
        //     {
        //         $data_res['result']=false;
        //         $data_res['error_message']=' عفوا لم يتم اضافة امر الدفع ';
        //         $data_res['error_message_en']='No payment inserted';
        //         $data_res['insert_id']='';
        //         return $data_res;
        //         exit();
        //     }
        // }
        //create order number
        $shipment_num=UsersShipment::select('id')->count() +1000;
        //create new object
        $data= new UsersShipment();
        $data->user_id=$user->id;
        $data->shipment_num=$shipment_num;
        $data->reciever_name=$request->reciever_name;
        $data->reciever_mobile=$request->reciever_mobile;
        $data->reciever_address=$request->reciever_address;
        $data->latitude=@(double)$request->latitude;
        $data->longitude=@(double)$request->longitude;
        $data->shipment_details=$request->shipment_details;
        $data->shipment_weight=$request->shipment_weight;
        $data->shipment_type=$request->shipment_type;
        $data->payment_type=$request->payment_type;
        $data->shipment_price=$request->shipment_price;
        $data->delivery_amount=$request->delivery_amount;
        $data->shipment_id_num=0;
        $data->user_ip=\Request::ip();
        $data->user_pc_info=$request->header('User-Agent');
        $result=$data->save();
        $order_id=$data->id;
        ///update payment_history if pay type is credit  payment_type=1
        if($request->payment_type == 'cash')
        {
            $data_payment= new payment_history();
            $data_payment->payment_order_number=@$request->payment_order_number;
            $data_payment->order_id=$order_id;
            $data_payment->status=1;
            $data_payment->save();
        }
        if($result==true)
        {
            //send sms and insert in history smsm
            $sms_send_message='تم استقبال شحنتك رقم '.$shipment_num.'.متوقع توصيلها فى '.date_with_add_days(7) .', ولمعرفة المزيد عن طلبك الرجاء التواصل مع خدمة العملاء من خلال الايميل customer@esh7n.net';
            $send_sms='';// @send_sms_from_yamamah($mobile,$sms_send_message);
            $data_history_sms= new sms_history();
            $data_history_sms->type=0;
            $data_history_sms->user_id=$user->id;
            $data_history_sms->mobile=$user->mobile;
            $data_history_sms->sms=$sms_send_message;
            $data_history_sms->status=$send_sms;
            $data_history_sms->save();
            // end sms
            //to send email confirm
            // $send_mail_obj = new \stdClass();
            // $send_mail_obj->sender = ' dotra team';
            // $send_mail_obj->receiver = $user->name.' '.$user->l_name;
            // $send_mail_obj->message = $sms_send_message;
            // $send_mail_obj->order_num = $order_num;
            // $send_mail_obj->products_2mail = $products_2mail;
            // $send_mail_obj->data_other = $request;
            // $send_mail=@Mail::to($user->email)->send(new UserOrderMail($send_mail_obj));
            //end send mail
            $data_res['result']=true;
            $data_res['error_message']='تم الإضافة بنجاح';
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=Auth::user();
        $selct=array('id', 'user_id', 'shipment_num', 'reciever_name', 'reciever_mobile', 'reciever_address',
                    'latitude', 'longitude', 'shipment_details', 'shipment_weight', 'shipment_type', 'payment_type',
                    'shipment_price', 'delivery_amount', 'shipment_id_num', 'created_at');
        $result= UsersShipment::select($selct)->where(['user_id'=>$user->id,'id'=>$id])->first();
        if(is_null($result) == 0)
        {
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
            $data['data']=(object)[];
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
