<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\api\User;
use App\Models\Notification;
use App\Models\Question;
use App\Models\QuestionsSendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= Auth::user();
        $results=Question::orderBy('created_at', 'DESC')->get();//with('categories')->
        if($results)
        {
            $data_json['result']=true;
            $data_json['error_message']='';
            $data_json['error_message_en']='';
            $data_json['data']=$results;
            return response()->json( $data_json,200);
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_message']='لا توجد اسئله خاصه بك';
            $data_json['error_message_en']='sorry , No Questions for you';
            return response()->json( $data_json,200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id= Auth::id();
        $this->validate($request,[
            'car_id'     => 'required|integer',
            'manufacturing_year'     => 'integer',
            'description'   => 'string',
        ]);
        // $chk_ins=Question::where(['user_id'=>$user_id,
        //                             'car_id'=>$request->car_id ,
        //                             //'model_car_id'=>$request->model_car_id,
        //                             'manufacturing_year'=>$request->manufacturing_year,
        //                             'description'=>$request->description])->first();
        // if(is_null($chk_ins)==0)
        // {
        //     $data_json['result']=false;
        //     $data_json['error_message']='موجود من قبل';
        //     $data_json['error_message_en']='Sorry , was exist';
        //     $data_json['data']=0;
        //     return response()->json( $data_json,200);
        // }
        $destinationPath = public_path('/uploads/medias');

        $data= new Question();

        if ($request->hasFile('audio_file')) {
            $audio_file = $request->file('audio_file');
            $audio_file_name = date('Y_m_d_h_i_s_').'question4_'.$user_id.'.'.$audio_file->getClientOriginalExtension();
            $filePath = $destinationPath. "/".  $audio_file_name;
            $audio_file->move($destinationPath, $audio_file_name);
            $data->audio_file = $audio_file_name;
        }
        if ($request->hasFile('photos')) {
            $ord_img=1;
            $photos_array=array();
            foreach($request->file('photos') as $file_img)
            {
				// create an image manager instance with favored driver
                $file_name_img = date('Y_m_d_h_i_s_').'question4_'.$user_id.'-'.$ord_img.'.'.$file_img->getClientOriginalExtension();
                $file_sml_name_img = date('Y_m_d_h_i_s_').'question4_'.$user_id.'-'.$ord_img.'_thumbnail.'.$file_img->getClientOriginalExtension();
                $destinationPath = public_path('/uploads');
                $destinationPath_smll = public_path('/uploads/thumbnail');
                    //$manager = new ImageManager(array('driver' => 'gd'));
                // to finally create image instances
                //$image = $manager->make($destinationPath."/".$file_name);
                $image_data = Image::make($file_img->getRealPath());
                // now you are able to resize the instance
                $image_data->resize(768,1024);
                // and insert a watermark for example
                // $waterMarkUrl = public_path('uploads/watermark50opcty.png');
                //$image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
                // finally we save the image as a new file
                $img_name = $image_data->save($destinationPath."/".$file_name_img);
                ///small img
                $image_small_data = Image::make($file_img->getRealPath());
                // now you are able to resize the instance
                $image_small_data->resize(190,250);
                // and insert a watermark for example
                // $waterMarkUrl = public_path('uploads/watermark50opcty.png');
                // $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
                // finally we save the image as a new file
                $img_sml_name = $image_small_data->save($destinationPath_smll."/".$file_sml_name_img);
                // exit create img
               $photos_array[]=$file_name_img;
                $ord_img++;
            }
            $data->photos=json_encode($photos_array);
        }
        $data->user_id=$user_id;
        $data->car_id=$request->car_id;
        $data->status='open';
        $data->manufacturing_year=$request->manufacturing_year;
        $data->description=$request->description;
        $data->city_id=$request->city_id;
        $data->longitude=$request->longitude;
        $data->latitude=$request->latitude;
        $result=$data->save();
        if($result)
        {
            //data json
            $result_json=Question::find($data->id);
            //2 send requests 4 technicians
            $gt_technicions=User::select('users.id','name','mobile','onesignal_id','city_id')
            ->Join('users_details','user_id','=','users.id')
            ->where(['is_active'=>'Y','is_connect'=>'Y','city_id'=>$request->city_id])->where('role_id','>',1)->where('users.id','!=',$user_id)->get();
            if(count($gt_technicions))
            {
                foreach ($gt_technicions as $gt_technicion) {
                    //add request in table
                    $data_req_send=new QuestionsSendRequest();
                    $data_req_send->user_id=$gt_technicion->id;
                    $data_req_send->question_id=$data->id;
                    $data_req_send->status='new';
                    $req_send=$data_req_send->save();
                    $title="طلب الاجابه علي سؤال";
                    $message="عزيزي،".$gt_technicion->name." تم دعوتك للاجابه علي هذا السؤال.";
                    $title_en="Response for this question";
                    $message_en="Dear,".$gt_technicion->name." you are invited to reply for this question.";
                    $send_notifi=sendMessage_onesignal_2app(3,$title,$message,'',$title_en,$message_en,['question_id'=>$data->id,'request_id'=>$data_req_send->id],[$gt_technicion->onesignal_id]);
                    //insert notification in db
                    $data_notifi=new Notification();
                    $data_notifi->type=3;
                    $data_notifi->with_id=$data->id;
                    $data_notifi->onesignal_id=@$gt_technicion->onesignal_id;
                    $data_notifi->to_users=@$gt_technicion->id;
                    $data_notifi->title=$title;
                    $data_notifi->title_en=$title_en;
                    $data_notifi->details=$message;
                    $data_notifi->details_en=$message_en;
                    $data_notifi->response_notification=$send_notifi;
                    $object_added=$data_notifi->save();
                    //end insert notifi
                }
            }
            $data_json['result']=true;
            $data_json['error_message']='تم اضافه سؤالك بنجاح';
            $data_json['error_message_en']='Successfully added your Question';
            $data_json['data']=$result_json;
            return response()->json( $data_json,200);
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_message']='لم يتم الارسال من فضلك حاول مرة اخرى';
            $data_json['error_message_en']='sorry , not send. please try again';
            return response()->json( $data_json,200);
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
        //gt waiting requests 4 question
        $user_id=Auth::id();
        //,'user_id'=>$user_id
        $gt_question=Question::with('user:id,name,mobile,profile_photo_path','user_car.car:id,name,name_en','user_car.car_model:id,name,name_en','city:id,name,name_en')->where(['is_active'=>'Y'])->find($id);
        if(is_null($gt_question))
        {
            $data_json['result']=false;
            $data_json['error_message']='لا توجد اسئله خاصه بك';
            $data_json['error_message_en']='sorry , No Questions for you';
            return response()->json( $data_json,200);
        }
        else
        { //
            $results=QuestionsSendRequest::with('user','user.user_detail','user.rates_count','user.answer_count')
                                            ->where(['question_id'=>$id,'status'=>'accept'])->orderBy('created_at', 'DESC')->paginate(30);
            if(count($results)>0)
            {
                $data_json['result']=true;
                $data_json['error_message']='';
                $data_json['error_message_en']='';
                $data_json['data']['question']=$gt_question;
                $data_json['data']['requests']=$results;
                return response()->json( $data_json,200);
            }
            else
            {
                $data_json['result']=false;
                $data_json['error_message']='لا توجد طلبات خاصه بك';
                $data_json['error_message_en']='sorry , No Requests for you';
                return response()->json( $data_json,200);
            }
        }
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
        $user_id= Auth::id();
        $this->validate($request,[
            'car_id'     => 'required|integer',
            'manufacturing_year'     => 'integer',
            'description'   => 'string',
        ]);
        $data= Question::where('user_id',$user_id)->find($id);
        if(is_null($data)==1)
        {
            $data_json['result']=false;
            $data_json['error_message']='عفوا هذا السؤال ليس ملك لك، راجع الاداره';
            $data_json['error_message_en']='sorry , you have not owened this َQuestion ';
            return response()->json( $data_json,200);
        }
        $data->user_id=$user_id;
        $data->car_id=$request->car_id;
        //$data->model_car_id=$request->model_car_id;
        $data->manufacturing_year=$request->manufacturing_year;
        $data->description=$request->description;
        $data->address=$request->address;
        $data->longitude=$request->longitude;
        $data->latitude=$request->latitude;
        $result=$data->save();
        if($result)
        {
            $data_json['result']=true;
            $data_json['error_message']='تم تعديل سؤالك بنجاح';
            $data_json['error_message_en']='Successfully updated your Question';
            $data_json['data']=$data;
            return response()->json( $data_json,200);
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_message']='لم يتم الارسال من فضلك حاول مرة اخرى';
            $data_json['error_message_en']='sorry , not send. please try again';
            return response()->json( $data_json,200);
        }
    }

    public function accept($id)
    {
        $user_id=Auth::id();
        $result=QuestionsSendRequest::find($id);
        if($result == true)
        {
            //
            $result->update(['is_approved'=>'A']);
            $gt_request=QuestionsSendRequest::find($id);
            //$gt_question=Question::where('user_id',$user_id)->find($result->question_id);
            $title="تلبيه طلبك بالموافقه للاجابه علي سؤال";
            $message="عزيزي،".$result->user->name." تم تلبيه طلبك بالموافقه للاجابه علي هذا السؤال.";
            $title_en="Response for this question";
            $message_en="Dear,".$gt_request->user->name." you are invited to reply for this question.";
            $send_notifi=sendMessage_onesignal_2app(5,$title,$message,'',$title_en,$message_en,['question_id'=>$result->question_id,'request_id'=>$id],[$result->user->onesignal_id]);
            //insert notification in db
            $data_notifi=new Notification();
            $data_notifi->type=5;
            $data_notifi->with_id=$id;
            $data_notifi->onesignal_id=$result->user->onesignal_id;
            $data_notifi->to_users=$result->user->id;
            $data_notifi->title=$title;
            $data_notifi->title_en=$title_en;
            $data_notifi->details=$message;
            $data_notifi->details_en=$message_en;
            $data_notifi->response_notification=$send_notifi;
            $object_added=$data_notifi->save();
            //end insert notifi
            //change requests to another Technicions 2 with_another
            $date_another_req=QuestionsSendRequest::where(['question_id'=>$result->question_id,'is_approved'=>'N'])->update(['status'=>'with_another']);

            $data_json['result']=true;
            $data_json['error_message']='تم قبول الطلب بنجاح';
            $data_json['error_message_en']='Successfully Accepted request';
            $data_json['data']=$result;
            return response()->json( $data_json,200);
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_message']='لا يوجد طلب';
            $data_json['error_message_en']='sorry , No Request';
            return response()->json( $data_json,200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reject($id)
    {
        $user_id=Auth::id();
        $result=QuestionsSendRequest::find($id);
        if($result == true)
        {
            $result->update(['is_approved'=>'R']);
            $data_json['result']=true;
            $data_json['error_message']='تم رفض الطلب بنجاح';
            $data_json['error_message_en']='Successfully rejected request';
            $data_json['data']=$result;
            return response()->json( $data_json,200);
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_message']='لا يوجد طلب';
            $data_json['error_message_en']='sorry , No Request';
            return response()->json( $data_json,200);
        }
    }

    public function is_open($id)
    {
        $user_id=Auth::id();
        $data= Question::find($id);
        if($data->status == 'open')
        {
            $data->status='close';
            //change requests to another Technicions 2 with_another
            $date_another_req=QuestionsSendRequest::where(['question_id'=>$id])->update(['status'=>'close']);
            // if(count($date_another_req)>0)
            // {
            //     $date_another_req->;
            // }
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_message']='عفوا تم اغلاق السؤال من قبل';
            $data_json['error_message_en']='Already closed Question';
            $data_json['data']=null;
            return $data_json;
        }
        $upd =$data->save();
        if($upd == true)
        {
            $data_json['result']=true;
            $data_json['error_message']='تم تعديل الحاله بنجاح';
            $data_json['error_message_en']='succefully updated status';
            $data_json['data']=$data->status;
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

    public function if_open_question()
    {
        $user_id=Auth::id();
        $result= Question::where(['user_id'=>$user_id,'status'=>'open','deleted_at'=>null])->first();
        if(is_null($result)==0)
        {
            $data_json['result']=true;
            $data_json['error_message']='يوجد سؤال مفتوح';
            $data_json['error_message_en']='you have opened question';
            $data_json['data']=$result->id;
            return $data_json;
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_message']='لايوجد اسئله مفتوحه';
            $data_json['error_message_en']='No opened Questions';
            $data_json['data']=0;
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
        $user_id= Auth::id();
        $data=Question::select('id','deleted_at')->where('user_id',$user_id)->find($id);
        if(is_null($data)==1)
        {
            $data_json['result']=false;
            $data_json['error_message']='عفوا ليس لك الصلاحيه، راجع الاداره';
            $data_json['error_message_en']='sorry , you have not Access ';
            return response()->json( $data_json,200);
        }
        if($data->deleted_at == null)
        {
            $data->deleted_at=now();
        }
        else
        {
            $data->deleted_at =null;
        }
        $result=$data->save();
        if($result)
        {
            $data_json['result']=true;
            $data_json['error_message']='تم الحذف  بنجاح';
            $data_json['error_message_en']='Successfully deleted';
            $data_json['data']=$data;
            return response()->json( $data_json,200);
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_message']='لم يتم الحذف حاول مرة اخرى';
            $data_json['error_message_en']='sorry , not deleted. please try again';
            return response()->json( $data_json,200);
        }
    }
}
