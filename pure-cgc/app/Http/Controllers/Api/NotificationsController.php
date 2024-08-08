<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\NotificationUsersStatus;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $lang='ar',$type=0,$user_id=0, $with_id=0)
    {
        $selct=array(); $where=array();
        if($lang =='ar')
        {
            $selct=array('id','type',  'with_id', 'title','details', 'url_link','to_users', 'img','created_at');
        }else
        {
            $selct=array('id',  'type', 'with_id', 'title_en as title','details_en as details', 'url_link', 'img','created_at');
        }
        if($user_id > 0)
        {
            $where['to_users']=$user_id;
        }
        // else
        // {
        //     $where['to_users']=null;
        // }

        if($with_id ==1)
        {
            $where[]=['with_id','>',1];
        }
        elseif($with_id > 1)
        {
            $where['with_id']=$with_id;
        }

        if($request->input('user_id'))
        {
            $get_del_notifations= NotificationUsersStatus::where('user_id',(int)$request->input('user_id'))->pluck('notification_id')->all();
            //print_r($get_del_notifations); exit();
            $results= Notification::whereNotIn('id',$get_del_notifations)->select($selct)->where($where)->get();
        }
        else{
            $results= Notification::select($selct)->where($where)->paginate();
        }
        if(count($results))
        {
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

    public function get_notifications_from_onesignal($limit=25,$offset=0,$kind=1)
    {
        return sendedMessage_onesignal_get($limit,$offset);
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
        //create viewed notifications
        $notifications_ids=$request->input('notifications_ids');
        $user_id=$request->input('user_id');
        foreach($notifications_ids as $notification_id)
        {
            $data= new NotificationUsersStatus();
            $data->type=0;
            $data->user_id=$user_id;
            $data->notification_id= $notification_id;
            $data->user_ip=\Request::ip();
            $data->user_pc_info=$request->header('User-Agent');
            $results=$data->save();
        }
        if($results)
        {
            $data_res['result']=true;
            $data_res['error_message']='تم الحذف بنجاح';
            $data_res['error_message_en']='successfuly deleted';
            $data_res['data']=$results;
            return $data_res;
        }
        else
        {
            $data_res['result']=false;
            $data_res['error_message']='لايوجد بيانات';
            $data_res['error_message_en']='No Results';
            $data_res['data']=array();
            return $data_res;
        }
    }
    public function delete_notification(Request $request)
    {
        //dd($request);
        //create viewed notifications
        $notifications_ids=explode(',',$request->input('notifications_ids'));
        $user_id=Auth::id();
        foreach($notifications_ids as $notification_id)
        {
            $data= new NotificationUsersStatus();
            $data->user_id=$user_id;
            $data->notification_id= $notification_id;
            $data->status="deleted";
            // $data->user_ip=\Request::ip();
            // $data->user_pc_info=$request->header('User-Agent');
            $results=$data->save();
        }
        if($results)
        {
            $data_res['result']=true;
            $data_res['error_message']='تم الحذف بنجاح';
            $data_res['error_message_en']='successfuly deleted';
            $data_res['data']=$results;
            return $data_res;
        }
        else
        {
            $data_res['result']=false;
            $data_res['error_message']='لايوجد بيانات';
            $data_res['error_message_en']='No Results';
            $data_res['data']=array();
            return $data_res;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $lang =$request->input('lang');
        $selct=array();
        if($lang =='ar')
        {
            $selct=array('id',  'with_id', 'name','details', 'url_link', 'img');
        }else
        {
            $selct=array('id',   'with_id', 'name_en as name','details_en as details', 'url_link', 'img');
        }
        $result= Notification::select($selct)->find($id);
        if(count($result))
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
