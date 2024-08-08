<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\api\User;
use App\Models\SettingMs;
use App\Models\SocialMedia;

class SettingAppController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $socials=SocialMedia::select('id', 'name', 'img', 'url_link' )->where('is_active',1)->get();
        $settings=SettingMs::select('id', 'name', 'name_en', 'country', 'img', 'file', 'tel', 'mobile', 'email', 'google_map', 'latitude', 'longitude', 'email_server', 'address', 'address_en' )->find(1);
        //$result=SettingApp::select('id','delivery_price')->where('id',$id)->first();
        if(is_null($settings) == 0)
        {
            // to chk if user have a free aads
            // if($request->user_id && (int)$request->user_id >0)
            // {
            //     $user=user::select('user_free_ads')->find((int)$request->user_id);
            //     $result->user_free_ads=@$user->user_free_ads;
            // }
            $data['result']=true;
            $data['error_message']='';
            $data['error_message_en']='';
            $data['social_media']=$socials;
            $data['settings']=$settings;
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
}
