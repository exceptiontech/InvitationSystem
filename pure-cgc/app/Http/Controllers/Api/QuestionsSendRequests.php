<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\api\User;
use App\Models\Notification;
use App\Models\Question;
use App\Models\QuestionsSendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionsSendRequests extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::id();
        $results=QuestionsSendRequest::with('question',
                                            'question.user:id,name,profile_photo_path',
                                            'question.user_car',
                                            'question.user_car.car:id,name,name_en',
                                            'question.user_car.car_model:id,name,name_en',
                                            'question.city:id,name,name_en')
                                            ->where(['user_id'=>$user_id])->whereIN('status',['new','accept'])->orderBy('created_at', 'DESC')->paginate(30);
        if($results->count()>0)
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
            $data_json['error_message']='لا توجد طلبات خاصه بك';
            $data_json['error_message_en']='sorry , No Requests for you';
            return response()->json( $data_json,200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accept($id)
    {
        $user_id=Auth::id();
        //check if user accepted another request
        $chk_another=QuestionsSendRequest::where(['user_id'=>$user_id,'status'=>'accept'])->first();
        if(is_null($chk_another)==0)
        {
            $data_json['result']=false;
            $data_json['error_message']='عفوا يوجد سؤال مفتوح لديك';
            $data_json['error_message_en']='sorry , You have opened question';
            return response()->json( $data_json,200);
        }
        $result=QuestionsSendRequest::where('user_id',$user_id)->find($id);
        if($result == true)
        {
            //
            $result->update(['status'=>'accept','is_viewed'=>'Y']);
            $gt_request=QuestionsSendRequest::where('user_id',$user_id)->find($id);
            $gt_question=Question::find($gt_request->question_id);
            $title="تلبيه طلب الاجابه علي سؤال";
            $message="عزيزي،".$gt_question->user->name." تم تلبيه طلبك  للاجابه علي هذا السؤال.";
            $title_en="Response for this question";
            $message_en="Dear,".$gt_question->user->name." you are invited to reply for this question.";
            $send_notifi=sendMessage_onesignal_2app(4,$title,$message,'',$title_en,$message_en,['question_id'=>$gt_question->id,'request_id'=>$id],[$gt_question->user->onesignal_id]);
            //insert notification in db
            $data_notifi=new Notification();
            $data_notifi->type=4;
            $data_notifi->with_id=$id;
            $data_notifi->onesignal_id=$gt_question->user->onesignal_id;
            $data_notifi->to_users=$gt_question->user->id;
            $data_notifi->title=$title;
            $data_notifi->title_en=$title_en;
            $data_notifi->details=$message;
            $data_notifi->details_en=$message_en;
            $data_notifi->response_notification=$send_notifi;
            $object_added=$data_notifi->save();
            //end insert notifi
            $data_json['result']=true;
            $data_json['error_message']='تم قبول الطلب بنجاح';
            $data_json['error_message_en']='Successfully Accepted request';
            $data_json['data']=$gt_request;
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
        $result=QuestionsSendRequest::where('user_id',$user_id)->find($id);
        if($result == true)
        {
            $result->update(['status'=>'reject']);
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
