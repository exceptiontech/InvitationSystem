<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestsType;
use App\Models\RequestsField;
use App\Models\EmployeesRequest;
use App\Models\EmployeesRequestsField;
use App\Models\api\User;
use Auth;

class EmployeesRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dd($request);
        $user_id=Auth::id();
        $this->validate($request,[
            'request_type'      =>'required|numeric'
        ]);
        //create order number
        $request_number=EmployeesRequest::select('id')->count() +1000;
        //create new object
        $data= new EmployeesRequest();
        $data->user_id=$user_id;
        $data->request_number= $request_number;
        $data->request_type=$request->request_type;
        $data->user_ip=\Request::ip();
        $data->user_pc_info=$request->header('User-Agent');
        $result=$data->save();
        $order_id=$data->id;
        if($result==true)
        {
            if($request->fields != '')
            {
                foreach($request->fields as $field_id => $field)
                {
                    $request_field= @RequestsField::select('name','field_type')->find($field_id);
                    $data_f= new EmployeesRequestsField();
                    if($request_field->field_type == 'file')
                    {
                        if ($request->hasFile($field)) {
                            $file = $request->file($field);
                            $file_name = date('Y_m_d_h_i_s_').'.'.$file->getClientOriginalExtension();
                            $destinationPath = public_path('/uploads');
                            $filePath = $destinationPath. "/".  $file_name;
                            $file->move($destinationPath, $file_name);
                            $data_f->value= $file_name;
                        }
                        else
                        {
                            $data_f->value=null;
                        }
                    }
                    else
                    {
                        $data_f->value=$field;
                    }
                    $data_f->request_id=$order_id;
                    $data_f->field_id=$field_id;
                    $data_f->field_name=@$request_field->name;

                    $result_f=$data_f->save();
                }
            }
            if($result_f == true)
            {
                // $user = User::select('name','l_name','mobile','email')->find($user_id);
                // //send sms and insert in history smsm
                // $sms_send_message='تمت عملية الشراء طلبك رقم '.$order_num.'.متوقع توصيلها فى '.date_with_add_days(7) .', ولمعرفة المزيد عن طلبك الرجاء التواصل مع خدمة العملاء من خلال الايميل customer@dotra.com';
                // $send_sms='';// @send_sms_from_yamamah($mobile,$sms_send_message);
                // $data_history_sms= new sms_history();
                // $data_history_sms->type=0;
                // $data_history_sms->user_id=$user_id;
                // $data_history_sms->mobile=$user->mobile;
                // $data_history_sms->sms=$sms_send_message;
                // $data_history_sms->status=$send_sms;
                // $data_history_sms->save();
                // end sms
                 //to send email confirm
                 // get user data

                //  $send_mail_obj = new \stdClass();
                //  $send_mail_obj->sender = ' dotra team';
                //  $send_mail_obj->receiver = $user->name.' '.$user->l_name;
                //  $send_mail_obj->message = $sms_send_message;
                //  $send_mail_obj->order_num = $order_num;
                //  $send_mail_obj->products_2mail = $products_2mail;
                //  $send_mail_obj->data_other = $request;
                //  $send_mail=@Mail::to($user->email)->send(new UserOrderMail($send_mail_obj));
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
    public function show($id)
    {
        //
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
