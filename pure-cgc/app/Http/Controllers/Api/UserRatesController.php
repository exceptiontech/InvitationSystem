<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Support\Facades\Auth;

class UserRatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id=0 ,$rated_id=0)
    {
        $selct=array('user_rates.id','user_id','rated_id', 'rating',  'comment', 'user_rates.created_at',
                        'users.id','users.name');
        if($user_id > 0)
        {
            $gt_count=null;
            $wher=array('user_id' => $user_id);
        }
        else
        {
            //to get counts
            $gt_count['one']=Rate::where(['rated_id'=> $rated_id,'rating'=>1])->count();
            $gt_count['two']=Rate::where(['rated_id'=> $rated_id,'rating'=>2])->count();
            $gt_count['three']=Rate::where(['rated_id'=> $rated_id,'rating'=>3])->count();
            $gt_count['four']=Rate::where(['rated_id'=> $rated_id,'rating'=>4])->count();
            $gt_count['five']=Rate::where(['rated_id'=> $rated_id,'rating'=>5])->count();
            $wher=array('rated_id' => $rated_id);
        }
        $results= Rate::select($selct)
                            ->join('users','users.id','=','user_id')
                            ->where($wher)->get();
        $data_result=array();
        if(!is_null($results))
        {
            $data['result']=true;
            $data['error_message']='';
            $data['error_message_en']='';
            $data['counts']=$gt_count;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=Auth::id();
        $this->validate($request,[
            'rated_id'   => 'required',
            'rate'      =>  'required'
        ]);
        $data=Rate:: where(['user_id'=> $user_id , 'rated_id'=>$request->rated_id])->first();
        if(is_null($data) ==1)
        {
            $data= new Rate();
            $data->user_id=$user_id;
            $data->rated_id=$request->rated_id;
        }
        $data->rate=$request->rate;
        $data->rate_app=$request->rate_app;
        $data->notes=$request->notes;
        $data->user_ip=\Request::ip();
        $data->user_pc_info=$request->header('User-Agent');
        $result=$data->save();
        if($result==true)
        {
            $data_res['result']=true;
            $data_res['error_message']='تم الاضافة بنجاح';
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
