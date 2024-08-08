<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserResetPassword;
use App\Mail\UserActivateAccount;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Validator;
use App\Models\api\User;
use App\Models\UsersDetail;
use App\Models\SmsHistory;
use App\Mail\UserRegisterAccount;
use App\Mail\UserResendActiviationCode;
use App\Models\Role;
use App\Models\UsersCar;
use Vzool\Malath\Malath_SMS;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['mobile' => request('mobile'), 'password' => request('password')])){
            $user_id = Auth::id();
            $user = User::find($user_id);
            $data['id']=$user->id;
            //$data['identifier_num']=$user->identifier_num;
            $data['name']=$user->name;
            //$data['l_name']=$user->l_name;
            //$data['email']=$user->email;
            $data['mobile']=$user->mobile;
            $data['latitude']=$user->latitude;
            $data['longitude']=$user->longitude;
            //$data['national_id']=$user->national_id;
            //$data['img']=$user->img;
            $data['is_confirmed']=$user->is_confirmed;
            //$data['is_connect']=$user->is_connect;
            $data['user_type']=(int)$user->user_level;
            $data_upd= User::find($user->id);
            $data_upd['onesignal_id']=request('onesignal_id');
            $iii= $data_upd->save();
            if($iii == true)
            {
                $success['token'] =  $user->createToken('sureFanni')->accessToken;
                //get another data
                $user_details=UsersDetail::where('user_id', $user->id)->first();
                $data['facility_name']=@$user_details->facility_name;
                $data['address']=@$user_details->address;
                $data['commercial_num_file']=@$user_details->commercial_num_file;
                $data['latitude']=@$user_details->latitude;
                $data['longitude']=@$user_details->longitude;
                //
                $data_json['result']=true;
                $data_json['error_message']='';
                $data_json['error_message_en']='';
                $data_json['success']=$success;
                $data_json['data']=$data;
                return response()->json($data_json, $this->successStatus);
            }
            else
            {
                $data_json['result']=false;
                $data_json['error_message']='Unupdated one signal';
                $data_json['error_message_en']='Unupdated one signal';
                $data_json['data']=array();
                return response()->json($data_json, $this->successStatus);
            }

        }
        else{
            $chk_mail=User::select('id')->where('mobile',request('mobile'))->first();
            if(is_null($chk_mail) == 0 && $chk_mail->password != Hash::make(request('password')) )
            {
                $data_json['result']=false;
                $data_json['error_message']='عفوا كلمة المرور غير صحيحة';
                $data_json['error_message_en']='Sorry , Wrong  password';
                $data_json['data']=array();
                return response()->json($data_json, $this->successStatus);
            }
            else {
                $data_json['result']=false;
                $data_json['error_message']='عفوا الهاتف غير صحيح';
                $data_json['error_message_en']='Sorry , Wrong  mobile';
                $data_json['data']=array();
                return response()->json($data_json, $this->successStatus);
            }
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        if(isset($request->lang) && $request->lang == 'en')
        {
            \App::setLocale('en');
        }
        else
        {
            \App::setLocale('ar');
        }
        //dd($request);
        //\App::setLocale('ar');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            //'l_name' => 'required',
            //'email' => 'required|string|email|max:191|unique:users',
            'mobile' => 'required|string|max:25|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            $errors=$validator->errors();
            $error_mg='';
            foreach ($errors->all() as $error) {
                $error_mg.=$error.' . ';
            }
            $data_json['result']=false;
            $data_json['error_message']=$error_mg;
            $data_json['error_message_en']=$error_mg;
            return response()->json($data_json, 200);
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['activitation_code'] =$activitation_code= randomNumber(4);
        $input['user_level'] =1;
        $input['is_confirmed'] =1;
        $user = User::create($input);
        $success['token'] =  $user->createToken('sureFanni')->accessToken;
        $data['id']=$user->id;
        $data['name']=$user->name;
        //$data['l_name']=$user->l_name;
        //$data['email']=$user->email;
        $data['mobile']=$user->mobile;
        $data['activitation_code']=$activitation_code;
        // to insert row in table UsersDetails
        $data_details=new UsersDetail();
        if ($request->hasFile('commercial_num_file')) {
            $com_file = $request->file('commercial_num_file');
            //$path = $request->img->path();    //$extension = $request->img->extension();
            $com_file_name = date('Y_m_d_h_i_s_').str_slug($request->name).'.'.$com_file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $filePath = $destinationPath. "/".  $com_file_name;
            $com_file->move($destinationPath, $com_file_name);
            $data_details->commercial_num_file = $com_file_name;
        }
        $data_details->user_id = $user->id;
        $data_details->facility_name =  $request->facility_name;
        $data_details->address =  $request->address;
        $data_details->latitude=@$request->latitude;
        $data_details->longitude=@$request->longitude;
        $data_details->user_ip=\Request::ip();
        $data_details->user_pc_info=$request->header('User-Agent');
        $data_details->save();
        //get another data
        $data['facility_name']=$request->facility_name;
        $data['address']=$request->address;
        $data['commercial_num_file']=@$com_file_name;
        $data['latitude']=@$request->latitude;
        $data['longitude']=@$request->longitude;
        // to send sms
        //to send email confirm
        // $send_mail_obj = new \stdClass();
        // $send_mail_obj->activitation_code = $activitation_code;
        // $send_mail_obj->sender = ' sureFanni team';
        // $send_mail_obj->receiver = $user->name;
        // $send_mail=Mail::to($user->email)->send(new UserRegisterAccount($send_mail_obj));
        //end send mail
        $data_json['result']=true;
        $data_json['error_message']=(object)[];
        $data_json['error_message_en']=(object)[];
        $data_json['success']=$success;
        $data_json['data']=$data;
        return response()->json($data_json, $this->successStatus);
        //return response()->json(['success'=>$success, 'data'=> $data], );
    }

    public function register_login(Request $request)
    {
        if(isset($request->lang) && $request->lang == 'en')
        {
            \App::setLocale('en');
        }
        else
        {
            \App::setLocale('ar');
        }
        $user=User::where(['mobile' => $request->mobile])->withTrashed()->first();
        if(is_null($user)==0){
            $activitation_code= randomNumber(4);
            $data['id']=$user->id;
            $data['name']=$user->name;
            $data['mobile']=$user->mobile;
            $data['profile_photo_path']=$user->profile_photo_path;
            $data['email_verified_at']=$user->email_verified_at;
            $data['is_connect']=$user->is_connect;
            $data['user_type']=(int)$user->user_level;
            $data_upd= User::withTrashed()->find($user->id);
            $data_upd->activitation_code =$activitation_code;
            $data_upd->onesignal_id=$request->onesignal_id;
            $data_upd->is_connect='N';
            if($data_upd->deleted_at != null)
            {
                $data_upd->deleted_at=null;
            }
            $iii= $data_upd->save();
            $data['activitation_code']=$activitation_code;
            if($iii == true)
            {
                //send sms
                $sms_send_message="Dear, SureFanni customer.Your code is: ".$activitation_code;
                $send_sms=send_sms_from_malath($user->mobile,$sms_send_message,'U');
                $data_history_sms= new SmsHistory();
                $data_history_sms->type=0;
                $data_history_sms->user_id=$user->id;
                $data_history_sms->mobile=$user->mobile;
                $data_history_sms->sms=$sms_send_message;
                $data_history_sms->status=json_encode($send_sms);
                $data_history_sms->user_ip = \Request::ip();
                $data_history_sms->user_pc_info = $request->header('User-Agent');
                $upd=$data_history_sms->save();
                // end sms
                $success_token =  $user->createToken(config('app.name'))->accessToken;
                //get another data
                $user_details=UsersDetail::where('user_id', $user->id)->first();
                $data['years_of_experience']=@$user_details->years_of_experience;
                $data['notes']=@$user_details->notes;
                $data['have_workshop']=@$user_details->have_workshop;
                $data['notes_of_workshop']=@$user_details->notes_of_workshop;
                $data['latitude']=@$user_details->latitude;
                $data['longitude']=@$user_details->longitude;
                //
                $data_json['result']=true;
                $data_json['error_message']='';
                $data_json['error_message_en']='';
                $data_json['token']=$success_token;
                $data_json['data']=$data;
                return response()->json($data_json, $this->successStatus);
            }
            else
            {
                $data_json['result']=false;
                $data_json['error_message']='Unupdated one signal';
                $data_json['error_message_en']='Unupdated one signal';
                $data_json['data']=array();
                return response()->json($data_json, $this->successStatus);
            }
        }
        else
        {
            //to register
            $validator = Validator::make($request->all(), [
                'mobile' => 'required|string|max:25|unique:users',
            ]);
            if ($validator->fails()) {
                $errors=$validator->errors();
                $error_mg='';
                foreach ($errors->all() as $error) {
                    $error_mg.=$error.' . ';
                }
                $data_json['result']=false;
                $data_json['error_message']=$error_mg;
                $data_json['error_message_en']=$error_mg;
                return response()->json($data_json, 200);
            }
            $input = $request->all();
            $input['activitation_code'] =$activitation_code= randomNumber(4);
            $input['role_id'] =1;
            $input['is_connect'] ='N';
            //return $input;
            $user = User::create($input);
            $success['token'] =  $user->createToken('sureFanni')->accessToken;
            $data['id']=$user->id;
            $data['name']=$user->name;
            $data['mobile']=$user->mobile;
            $data['activitation_code']=$activitation_code;
            $data['email_verified_at']=$user->email_verified_at;
            $data['onesignal_id']=$user->onesignal_id;
            $data['is_connect']=$user->is_connect;
            if($user == true)
            {
                //send sms
                $sms_send_message="Dear, SureFanni customer.Your code is: ".$activitation_code;
                $send_sms=send_sms_from_malath($user->mobile,$sms_send_message,'U');
                $data_history_sms= new SmsHistory();
                $data_history_sms->type=0;
                $data_history_sms->user_id=$user->id;
                $data_history_sms->mobile=$user->mobile;
                $data_history_sms->sms=$sms_send_message;
                $data_history_sms->status=json_encode($send_sms);
                $data_history_sms->user_ip = \Request::ip();
                $data_history_sms->user_pc_info = $request->header('User-Agent');
                $upd=$data_history_sms->save();
                // end sms
                //add another data
                $data_details=new UsersDetail();
                $data_details->user_id = $user->id;
                $data_details->is_open_notifications='Y';
                //$data_details->years_of_experience=0;
                $data_details->save();

                $success_token =  $user->createToken(config('app.name'))->accessToken;
                $data_json['result']=true;
                $data_json['error_message']='';
                $data_json['error_message_en']='';
                $data_json['token']=$success_token;
                $data_json['data']=$data;
                return response()->json($data_json, $this->successStatus);
            }
            else
            {
                $data_json['result']=false;
                $data_json['error_message']='Unupdated one signal';
                $data_json['error_message_en']='Unupdated one signal';
                $data_json['data']=array();
                return response()->json($data_json, $this->successStatus);
            }
        }
    }

    //reset password
    public function reset_pass(Request $request)
    {
        $validator = $this->validate($request,[
            'mobile' => 'required|string|max:19'
        ]);
        // if ($validator->fails()) {
        //     return response()->json(['error'=>$validator->errors()], 401);
        // }
        $chk_user= User::where(['mobile'=>$request->mobile])->first();
        if(is_null($chk_user))
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات لهذا المستخدم';
            $data['error_message_en']='No Results to this user';
            //$data['data']=array();
            return response()->json($data, $this-> successStatus);
        }
        else
        {
            $new_pass=randomString(8);
            $data_upd= User::find($chk_user->id);
            $success['token'] =$new_token=  $chk_user->createToken('sureFanni')->accessToken;
            $data_upd['password'] = Hash::make($new_pass);
            $upd =$data_upd->save();
            if( $upd == true)
            {
                // $send_mail_obj = new \stdClass();
                // $send_mail_obj->new_password = $new_pass;
                // $send_mail_obj->sender = 'sureFanni team';
                // $send_mail_obj->receiver = $chk_user->name.' '.$chk_user->l_name;
                // $send_mail=Mail::to($chk_user->email)
                //         //->cc($moreUsers)
                //         //->bcc($evenMoreUsers)
                //         ->send(new UserResetPassword($send_mail_obj));
                //send sms and insert in history smsm
                // $sms_send_message='عميل ايت يو: كلمة السر الجديدة لك هى : ('.$new_pass.')';
                // $send_sms= send_sms_from_yamamah($chk_user->mobile,$sms_send_message);
                // $data_history_sms= new SmsHistory();
                // $data_history_sms->type=0;
                // $data_history_sms->user_id=$chk_user->id;
                // $data_history_sms->mobile=$chk_user->mobile;
                // $data_history_sms->sms=$sms_send_message;
                // $data_history_sms->status=$send_sms;
                // $upd=$data_history_sms->save();
                // end sms

                $data_user['password']=$new_pass;
                $data_user['token']=$new_token;
                $data['result']=true;
                $data['error_message']='تم ارسال الرسالة إلى بريدك الالكتروني ';
                $data['error_message_en']='succefully sent a message to your email';
                $data['data']=$data_user;
                return response()->json($data, $this-> successStatus);
            }
            else
            {
                $data['result']=false;
                $data['error_message']='لايوجد بيانات';
                $data['error_message_en']='No Results';
               // $data['data']=array();
                return response()->json($data, $this-> successStatus);
            }
        }
    }

    //reset password
    public function resend_activation_code(Request $request)
    {
        $user_id=Auth::id();
        $data_upd= User::find($user_id);
        if(is_null($data_upd))
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات لهذا المستخدم';
            $data['error_message_en']='No Results to this user';
            $data['data']=array();
            return response()->json($data, $this-> successStatus);
        }
        else
        {
            if($data_upd->email_verified_at == null)
            {
                $data_upd= User::find($user_id);
                $data_upd['activitation_code'] =$activitation_code= randomNumber(4);
                $data_upd['onesignal_id']=request('onesignal_id');
                $data_upd['is_connect']='N';
                $upd= $data_upd->save();
                //send mail
                // $send_mail_obj = new \stdClass();
                // $send_mail_obj->activitation_code = $chk_user->activitation_code;
                // $send_mail_obj->sender = 'sureFanni team';
                // $send_mail_obj->receiver = $chk_user->name.' '.$chk_user->l_name;
                // $send_mail=Mail::to($chk_user->email)
                //         //->cc($moreUsers)
                //         //->bcc($evenMoreUsers)
                //         ->send(new UserResendActiviationCode($send_mail_obj));
                //dd(Mail::failures());
                // send sms and insert in history sms
                $sms_send_message="Dear, SureFanni customer.Your code is: ".$activitation_code;
                $send_sms= send_sms_from_malath($data_upd->mobile,$sms_send_message,'U');
                $data_history_sms= new SmsHistory();
                $data_history_sms->type=0;
                $data_history_sms->user_id=$data_upd->id;
                $data_history_sms->mobile=$data_upd->mobile;
                $data_history_sms->sms=$sms_send_message;
                $data_history_sms->status=json_encode($send_sms);
                $data_history_sms->user_ip = \Request::ip();
                $data_history_sms->user_pc_info = $request->header('User-Agent');
                $upd=$data_history_sms->save();
                // end sms
                if( $upd == true)
                {
                    $data_user['activitation_code']=$data_upd->activitation_code;
                    $data['result']=true;
                    $data['error_message']='تم ارسال الرسالة إلى بريدك الالكتروني ';
                    $data['error_message_en']='succefully sent a message to your email';
                    $data['data']=$data_user;
                    return response()->json($data, $this-> successStatus);
                }
                else
                {
                    $data['result']=false;
                    $data['error_message']='لايوجد بيانات';
                    $data['error_message_en']='No Results';
                    $data['data']=array();
                    return response()->json($data, $this-> successStatus);
                }
            }
            else
            {
                $data['result']=false;
                $data['error_message']='عفوا تم تفعيل حسابك الخاص من قبل';
                $data['error_message_en']='Sorry, Your account was activated';
                $data['data']=array();
                return response()->json($data, $this-> successStatus);
            }
        }
    }

    //activate account
    public function activate_account(Request $request)
    {
        $user_id=Auth::id();
        $chk_user= User::select('id','name','mobile','profile_photo_path','activitation_code','is_connect','columns_need_approve')->find($user_id);
        if(is_null($chk_user))
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات لهذا المستخدم';
            $data['error_message_en']='No Results to this user';
            $data['data']=array();
            return response()->json($data, $this-> successStatus);
        }
        else
        {
            if($chk_user->activitation_code == $request->activitation_code)
            {
                $data_upd= User::find($chk_user->id);
                $success['token'] =$new_token=  $chk_user->createToken('sureFanni')->accessToken;
                if(!empty($chk_user->columns_need_approve))
                {
                    $columns_need_approve=json_decode($chk_user->columns_need_approve);
                    foreach ($columns_need_approve as $key => $value) {
                        $data_upd->$key=$value;
                    }
                }
                $data_upd->activitation_code ='';
                $data_upd->is_connect = 'Y';
                $data_upd->columns_need_approve='';
                $data_upd->email_verified_at=now();
                //dd($data_upd);
                $upd =$data_upd->save();
                if( $upd == true)
                {
                    //get another data
                    $json_data=User::find($chk_user->id);
                    $user_details=UsersDetail::where('user_id', $json_data->id)->first();
                    $json_data['years_of_experience']=@$user_details->years_of_experience;
                    $json_data['notes']=@$user_details->notes;
                    $json_data['have_workshop']=@$user_details->have_workshop;
                    $json_data['notes_of_workshop']=@$user_details->notes_of_workshop;
                    $json_data['latitude']=@$user_details->latitude;
                    $json_data['longitude']=@$user_details->longitude;
                    $json_data['activitation_code']='';
                    $json_data['is_connect']='Y';
                    //
                    $data['result']=true;
                    $data['error_message']='تم تفعيل الحساب بنجاح';
                    $data['error_message_en']='succefully activate your account';
                    $data['data']=$json_data;
                    return response()->json($data, $this-> successStatus);
                }
                else
                {
                    $data['result']=false;
                    $data['error_message']='لايوجد بيانات';
                    $data['error_message_en']='No Results';
                    $data['data']=array();
                    return response()->json($data, $this-> successStatus);
                }
            }
            else
            {
                $data['result']=false;
                $data['error_message']='رمز التفعيل خطأ';
                $data['error_message_en']='Wrong Activitation Code ';
                $data['data']=array();
                return response()->json($data, $this-> successStatus);
            }

        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=0,Request $request)
    {
        $select=array('users.id', 'type', 'user_level', 'name', 'mid_name', 'l_name', 'email', 'mobile',
                'password', 'img', 'nationality', 'country', 'city', 'region', 'address',
                'gender', 'user_name', 'date_birth','user_balance');
        if($type == 0)
        {
            $sel_tbl2 = array('cv_file','education_level','work_at','account_bank_num','account_bank_name');
            $select = array_merge($select,$sel_tbl2);
        }
        else
        {
            $sel_tbl2 = array('notes','notes_en');
            $select = array_merge($select,$sel_tbl2);
        }
        $wher['user_level']=$type;
        $wher['is_active']=1;
        $wher['is_confirmed']=1;

        if($request->gender && $request->gender != '')
        {
            $wher['gender']=$request->gender;
        }
        $results=User::select($select)
                        ->join('users_details','users.id','=','user_id')
                        ->where($wher)->paginate();
        if(count($results))
        {
            $data['result']=true;
            $data['error_message']='';
            $data['error_message_en']='';
            $data['data']=$results;
            return response()->json($data, $this->successStatus );
        }
        else
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            $data['data']=array();
            return response()->json( $data,$this->successStatus);
        }

    }

    // public function search(Request $request,$type=0, $distance=0)
    // {
    //     $latitude=0;
    //     $longitude=0;
    //     $data_result=array();
    //     $wher= array();
    //     if($request->volunteer_job_id)
    //     {
    //         $volunteer_job_id=$request->volunteer_job_id;
    //         $gt_volunteer_job=volunteer_job::find((int)$volunteer_job_id);
    //         if(is_null($gt_volunteer_job) == 1)
    //         {
    //             $wher['users.id']=0;
    //         }
    //         else
    //         {
    //             $latitude=$gt_volunteer_job->latitude;
    //             $longitude=$gt_volunteer_job->longitude;
    //             $wher['volunteers_job_confirmed_users.volunteer_job_id']=$volunteer_job_id;
    //             //echo $volunteer_job_id; exit();
    //         }

    //     }
    //     else
    //     {
    //       $user=Auth::user();
    //       $latitude= $user->latitude;
    //       $longitude= $user->longitude;
    //       $wher['volunteer_jobs.company_id']=$user->id;
    //     }

    //     $selct="`volunteers_job_confirmed_users`.`id` as `vol_job_confrm_usr_id`, `volunteers_job_confirmed_users`.`volunteer_job_id`, `volunteers_job_confirmed_users`.`user_id`, `volunteers_job_confirmed_users`.`is_confirmed` as `is_confirmed_job`,".
    //         "`volunteer_jobs`.`id` as volunteerId,`volunteer_jobs`.`company_id`,`volunteer_jobs`.`name` as `volunteer_job_name`,`volunteer_jobs`.`name_en` as `volunteer_job_name_en`, ".
    //         "`users`.`id`, `users`.`type`, `user_level`, `users`.`name`,  `email`, `mobile`, `img`, `nationality`,".
    //         "`country`, `city`, `region`, `users`.`address`, `gender`, `user_name`, `date_birth`, `users`.`is_active`, `users`.`is_confirmed`,".
    //         " `onesignal_id`, `is_connect` ,`users`.`latitude`,`users`.`longitude`,".
    //         "( 6371 * acos( cos( radians({$latitude}) ) * cos( radians( `users`.`latitude` ) ) * cos( radians( `users`.`longitude` ) - radians({$longitude}) ) + sin( radians({$latitude}) ) * sin( radians( `users`.`latitude` ) ) ) ) AS `distance` ";
    //     if($distance ==0 )
    //     {
    //         $distance = 400000;
    //     }

    //     if($request->gender)
    //     {
    //         $wher['gender']=$request->gender;
    //     }
    //     $wher['users.user_level']=$type;
    //     $wher['users.is_active']=1;
    //     $query= User::select(DB::raw($selct))
    //                     ->join('volunteers_job_confirmed_users','volunteers_job_confirmed_users.user_id','=','users.id')
    //                     ->join('volunteer_jobs','volunteer_jobs.id','=','volunteer_job_id')
    //                     ->having('distance', '<', $distance)
    //                     ->where($wher);
    //     if($request->input('min_age') && $request->input('max_age'))
    //     {
    //         // explode the range and set as follows
    //         $min_age = $request->input('min_age');
    //         $max_age = $request->input('max_age');

    //         // prepare dates for comparison
    //         $minDate = Carbon::today()->subYears($min_age); //$max make sure to use Carbon\Carbon in the class
    //         $maxDate = Carbon::today()->subYears($max_age)->endOfDay(); // $min
    //         // then add to the query
    //         $query->whereBetween('date_birth', [$minDate, $maxDate]);
    //     }
    //     $results= $query->orderBy('distance')
    //                     ->get();
    //                   //->paginate();

    //     if(count($results))
    //     {
    //         foreach($results as $result)
    //         {
    //             // get company_name
    //             /*$company_details=User::select('name')->find((int)$result->company_id);
    //             $result['company_name']=@$company_details->name;
    //             // get education_level name , name_en
    //             $cat_details=cat::select('name','name_en')->find((int)$result->education_level);
    //             $result['education_level_name']=@$cat_details->name;
    //             $result['education_level_name_en']=@$cat_details->name_en;
    //             // get volunteer_category name , name_en
    //             $cat_details2=cat::select('name','name_en')->find((int)$result->volunteer_category);
    //             $result['volunteer_category_name']=@$cat_details2->name;
    //             $result['volunteer_category_name_en']=@$cat_details2->name_en;
    //             //if favorite
    //             if($request->input('user_id'))
    //             {
    //                 $user_id=$request->input('user_id');
    //                 $is_follow=user_follow::select('id as id_follow')->where(['follow_id'=>$result->id , 'user_id'=>$user_id])->first();
    //                 $result['is_follow']=@$is_follow['id_follow'];
    //                 //2 view confirm to job
    //                 $user_id=$request->input('user_id');
    //                 $is_confirmed=volunteers_job_confirmed_user::select('id as id_confirmed','is_confirmed')->where(['volunteer_job_id'=>$result->id , 'user_id'=>$user_id])->first();
    //                 $result['id_confirmed']=@$is_confirmed['id_confirmed'];
    //                 $result['confirmed_status']=@$is_confirmed['is_confirmed'];

    //             }
    //             $data_result[]=$result;
    //             */
    //         }
    //         $data['result']=true;
    //         $data['error_message']='';
    //         $data['error_message_en']='';
    //         $data['data']=$results;
    //         return response()->json( $data,200);
    //     }
    //     else
    //     {
    //         $data['result']=false;
    //         $data['error_message']='لايوجد بيانات';
    //         $data['error_message_en']='No Results';
    //         $data['data']=[];
    //         return response()->json( $data,200);
    //     }
    // }

    public function send_email()
    {
        // $subject='تفعيل العضوية';
        // $body='عزيزى محمد تم تفعيل عضويتك';
        // $email='mohamedsaeed.mso11@hotmail.com';
        // $from_email='info@sureFanni.com';
        // $headers = 'From:'.$from_email."\r\n";
        // $headers .= "MIME-Version: 1.0 ";
        // $headers .= "htm dir=ltr ";
        // $headers .= "X-Mailer: PHP\n";
        // $headers .= "Content-type: text/html;charset=utf-8 \r\n";
        // $headers .= "(anti-spam-content-type: text/html;) charset=utf-8\r\n";
        // echo $m = mail($email,$subject,$body,$headers);
        // send mail
        $send_mail_obj = new \stdClass();
        $send_mail_obj->activitation_code = 'tr544f';
        $send_mail_obj->sender = 'sureFanni team';
        $send_mail_obj->receiver = 'mohamed saeed';
        echo $send_mail=Mail::to('mohamedsaeed_mso11@yahoo.com')
                //->cc($moreUsers)
                //->bcc($evenMoreUsers)
                ->send(new UserResendActiviationCode($send_mail_obj));
    }

    public function send_sms()
    {
        $sms_send_message='عميل شورفني لتواصل com';
        $mobile='';
        // $UserName=config('malath_sms.user_name');
        // $Password=config('malath_sms.password');
        // $Originator=config('malath_sms.originator');
        // $DTT_SMS    = new Malath_SMS($UserName, $Password, 'UTF-8');
        // $SenderName =$DTT_SMS->GetSenders();
        // $Send = $DTT_SMS->Send_SMS("966504898156", $SenderName[0], $sms_send_message);
        $Send=send_sms_from_malath("966504898156",$sms_send_message,'U');
        dd($Send);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=0)
    {
        $user_id = Auth::id();
        $user=User::with(array('user_cars' => function($query) {
            $query->select('users_cars.id', 'user_id', 'car_id', 'model_car_id', 'manufacturing_year', 'is_default_car','users_cars.created_at',
                                    'cr.name','cr.name_en','crm.name as car_model_name','crm.name_en as car_model_name_en')
                                    ->join('categories as cr','car_id','=','cr.id')
                                    ->join('categories as crm','model_car_id','=','crm.id')
                                    ->orderBy('created_at', 'DESC');
        }))->find($user_id);
        if(is_null($user) == 1)
        {
            $data['result']=false;
            $data['error_message']='عفوا لا يوجد مستخدم بهذه البيانات';
            $data['error_message_en']='Sorry , Wrong data ';
            $data['data']=[];
            return response()->json($data, 200);
        }
        $gt_other_data=UsersDetail::select('is_open_notifications','years_of_experience','notes','have_workshop','notes_of_workshop','longitude','latitude')->where(['user_id'=> $user->id])->first();
        if(is_null($gt_other_data)==0)
        {
            $user['is_open_notifications']=@$gt_other_data->is_open_notifications;
            $user['years_of_experience']=@$gt_other_data->years_of_experience;
            $user['notes']=@$gt_other_data->notes;
            $user['have_workshop']=@$gt_other_data->have_workshop;
            $user['notes_of_workshop']=@$gt_other_data->notes_of_workshop;
            $user['latitude']=@$gt_other_data->latitude;
            $user['longitude']=@$gt_other_data->longitude;
        }
        $user['user_cars_count']=count($user->user_cars);
        $user['requests_count']=$user->new_questions_send_request_count();
        $user['user_questions']=count($user->questions);
        $user['mem_type']=['ar'=>$user->role->name,'en'=>$user->role->name_en ];

        $data['result']=true;
        $data['error_message']='';
        $data['error_message_en']='';
        $data['data']=$user;//->only(['id', 'name', 'mobile', 'email','is_confirmed','facility_name','address','commercial_num_file','latitude','longitude']);
        return response()->json($data, $this->successStatus);
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
        //dd($request);
        $user_id=Auth::id();
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'mobile' => 'required|string|max:25',
            // 'email' => 'required|string|email|max:191',
            // 'c_password' => 'same:password',
        ]);
        $json_dt=array();
        if ($validator->fails()) {
            $errors=$validator->errors();
            $error_mg='';
            foreach ($errors->all() as $error) {
                $error_mg.=$error.' . ';
            }
            $data_json['result']=false;
            $data_json['error_message']=$error_mg;
            $data_json['error_message_en']=$error_mg;
            return response()->json($data_json, 200);
        }
        $chk_mobile_exist=User::select('mobile')->where(['mobile'=>$request->mobile,['id','!=',$user_id]])->first();
        if(is_null($chk_mobile_exist)==0)
        {
            $data['result']=false;
            $data['error_message']='عفوا الهاتف مسجل من قبل';
            $data['error_message_en']='Sorry , Mobile was exist';
            $data['data']=array();
            return response()->json($data, $this-> successStatus);
        }
        $data_upd= User::find($user_id);
        $json_dt=['name'=>$request->name,'mobile'=>$request->mobile];

        if ($request->hasFile('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $file_name = date('Y_m_d_h_i_s_').Str::slug($request->name).'.'.$file->getClientOriginalExtension();
            $file_sml_name_img = 'thumbnail_'.$file_name;
            $destinationPath = public_path('/uploads');
            $destinationPath_smll = public_path('/uploads/thumbnail');
            // to finally create image instances
            //$image = $manager->make($destinationPath."/".$file_name);
            $image_data = Image::make($file->getRealPath());
            // now you are able to resize the instance
            $image_data->resize(1024,768);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/logo.png');
            // $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
            // finally we save the image as a new file
            $img_name = $image_data->save($destinationPath."/".$file_name);
            ///small img
            $image_small_data = Image::make($file->getRealPath());
            // now you are able to resize the instance
            $image_small_data->resize(250,190);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/logo.png');
            // $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
            // finally we save the image as a new file
            $img_sml_name = $image_small_data->save($destinationPath_smll."/".$file_sml_name_img);
            // exit create img
            $json_dt['profile_photo_path']=$file_name;
        }
        $data_upd->columns_need_approve = json_encode($json_dt);
        $data_upd->activitation_code =$activitation_code= randomNumber(4);
        $data_upd->is_connect='N';
        $user_up = $data_upd->save();
        if( $user_up == true)
        {
            //send sms
            $sms_send_message="Dear, SureFanni customer.Your code is: ".$activitation_code;
            $send_sms=send_sms_from_malath($data_upd->mobile,$sms_send_message,'U');
            $data_history_sms= new SmsHistory();
            $data_history_sms->type=0;
            $data_history_sms->user_id=$user_id;
            $data_history_sms->mobile=$data_upd->mobile;
            $data_history_sms->sms=$sms_send_message;
            $data_history_sms->status=json_encode($send_sms);
            $data_history_sms->user_ip = \Request::ip();
            $data_history_sms->user_pc_info = $request->header('User-Agent');
            $upd=$data_history_sms->save();
            // end sms
            $json_dt['id']=$user_id;
            $json_dt['activitation_code']=$activitation_code;
            $data['result']=true;
            $data['error_message']='تم التعديل بنجاح';
            $data['error_message_en']='succefully updated';
            $data['data']=$json_dt;
            return response()->json($data, $this-> successStatus);
        }
        else
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            $data['data']=array();
            return response()->json($data, $this-> successStatus);
        }
    }

    //update name
    public function update_name(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            $errors=$validator->errors();
            $error_mg='';
            foreach ($errors->all() as $error) {
                $error_mg.=$error.' . ';
            }
            $data_json['result']=false;
            $data_json['error_message']=$error_mg;
            $data_json['error_message_en']=$error_mg;
            return response()->json($data_json, 200);
        }
        $user_id=Auth::id();
        $chk_user= User::select('id','name','mobile','profile_photo_path','activitation_code','is_connect')->find($user_id);
        if(is_null($chk_user))
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات لهذا المستخدم';
            $data['error_message_en']='No Results to this user';
            $data['data']=array();
            return response()->json($data, $this-> successStatus);
        }
        else
        {

            $data_upd= User::find($chk_user->id);
            $data_upd->name =$request->name;
            $upd =$data_upd->save();
            if( $upd == true)
            {
                //get another data
                $user_details=UsersDetail::where('user_id', $chk_user->id)->first();
                $chk_user['years_of_experience']=@$user_details->years_of_experience;
                $chk_user['notes']=@$user_details->notes;
                $chk_user['have_workshop']=@$user_details->have_workshop;
                $chk_user['notes_of_workshop']=@$user_details->notes_of_workshop;
                $chk_user['latitude']=@$user_details->latitude;
                $chk_user['longitude']=@$user_details->longitude;
                $chk_user['activitation_code']='';
                $chk_user['is_connect']='Y';
                $chk_user['name']=$request->name;
                //
                $data['result']=true;
                $data['error_message']='تم تعديل الاسم بنجاح';
                $data['error_message_en']='succefully update name ';
                $data['data']=$chk_user;
                return response()->json($data, $this-> successStatus);
            }
            else
            {
                $data['result']=false;
                $data['error_message']='لايوجد بيانات';
                $data['error_message_en']='No Results';
                $data['data']=array();
                return response()->json($data, $this-> successStatus);
            }
        }
    }

    public function update_other(Request $request)
    {
        //2 change member role and update other data
        $user_id=Auth::id();
        $validator = Validator::make($request->all(),[
            'years_of_experience' => 'required',
            'have_workshop' => 'required',
        ]);
        if ($validator->fails()) {
            $errors=$validator->errors();
            $error_mg='';
            foreach ($errors->all() as $error) {
                $error_mg.=$error.' . ';
            }
            $data_json['result']=false;
            $data_json['error_message']=$error_mg;
            $data_json['error_message_en']=$error_mg;
            return response()->json($data_json, 200);
        }
        $data_upd= User::find($user_id);
        $data_upd->change_user_type =$request->role_id;
        $data_upd->is_connect='N';
        $user_up = $data_upd->save();
        // to insert / update in table UsersDetails
        $data_details= UsersDetail::where('user_id',$user_id)->first();
        if(is_null($data_details) == 1)
        {
            $data_details= new UsersDetail();
            $data_details->user_id=$user_id;
        }
        $data_details->years_of_experience =  $request->years_of_experience;
        $data_details->notes =  $request->notes;
        $data_details->have_workshop =  $request->have_workshop;
        $data_details->notes_of_workshop =  $request->notes_of_workshop;
        $data_details->latitude=@$request->latitude;
        $data_details->longitude=@$request->longitude;
        $data_details->city_id=@$request->city_id;
        //$data_details->is_open_notifications=@$request->is_open_notifications;
        $data_details->save();
        if( $user_up == true)
        {
            $data_user=$data_upd->only(['id','role_id','name','mobile','profile_photo_path','profile_photo_url']);
            $data_user['years_of_experience']=$data_details->years_of_experience;
            $data_user['notes']=$data_details->notes;
            $data_user['have_workshop']=$data_details->have_workshop;
            $data_user['notes_of_workshop']=$data_details->notes_of_workshop;
            $data_user['latitude']=@$data_details->latitude;
            $data_user['longitude']=@$data_details->longitude;
            $data_user['city_id']=@$data_details->city_id;
            $data_user['city_name']=@$data_details->city->name;
            $data_user['city_name_en']=@$data_details->city->name_en;
            //
            $data['result']=true;
            $data['error_message']='تم التعديل بنجاح ، انتظر الموافقه من الادارة';
            $data['error_message_en']='succefully updated, mangament will approve updates';
            $data['data']=$data_user;
            return response()->json($data, $this-> successStatus);
        }
        else
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            $data['data']=array();
            return response()->json($data, $this-> successStatus);
        }
    }


    public function is_connect_ms()
    {
        $user_id=Auth::id();
        $data= User::find($user_id);
        if($data->is_connect == 'Y')
        {
            $data->is_connect='N';
        }
        else
        {
            $data->is_connect ='Y';
        }
        $upd =$data->save();
        if($upd == true)
        {
            $data_json['result']=true;
            $data_json['error_message']='تم تعديل الحاله بنجاح';
            $data_json['error_message_en']='succefully updated status';
            $data_json['data']=$data->is_connect;
            return $data_json;
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_message']='لايوجد بيانات';
            $data_json['error_message_en']='No Results';
            $data_json['data']=null;
            return $data_json;
        }
    }

    public function is_accept_notifications()
    {
        $user_id=Auth::id();
        $data= UsersDetail::where('user_id',$user_id)->first();
        if($data->is_open_notifications == 'Y')
        {
            $data->is_open_notifications='N';
        }
        else
        {
            $data->is_open_notifications ='Y';
        }
        $upd =$data->save();
        if($upd == true)
        {
            $data_json['result']=true;
            $data_json['error_message']='تم تعديل الحاله بنجاح';
            $data_json['error_message_en']='succefully updated status';
            $data_json['data']=$data->is_open_notifications;
            return $data_json;
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_message']='لايوجد بيانات';
            $data_json['error_message_en']='No Results';
            $data_json['data']=null;
            return $data_json;
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
        //
    }
}
