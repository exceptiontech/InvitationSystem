<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\api\User;
use App\Models\products_report;


class ProductsReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id=0 ,$reported_id=0)
    {
        $selct=array('id','user_id','reported_id', 'report', 'created_at');
        if($user_id > 0)
        {
            $wher=array('user_id' => $user_id);
        }
        else
        {
            $wher=array('reported_id' => $reported_id);
        }
        $results= products_report::select($selct)->where($wher)->get();
        $data_result=array();
        if(!is_null($results))
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
        $this->validate($request,[
            'reported_id'   => 'required',
            'report'        => 'required'
        ]);
        $user= Auth::user();

        $chk_exist=products_report:: where(['user_id'=> $user->id , 'reported_id'=>$request->reported_id])->first();
        if(count($chk_exist)>0)
        {
            $data_res['result']=false;
            $data_res['error_message']='تم التبليغ  من قبل';
            $data_res['error_message_en']='sorry was reported';
            $data_res['insert_id']='';
            return $data_res;
        }
        $data= new products_report();
        $data->user_id=$user->id;
        $data->reported_id=$request->reported_id;
        $data->report=$request->report;
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
        $user= Auth::user();

        $result=user_favorite::where(['id'=>$id , 'user_id'=>$user->id])->delete();
        if($result==true)
        {
            $data['result']=true;
            $data['error_message']='تم الحذف';
            $data['error_message_en']='succesfully deleted';
            return $data;
        }
        else
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            return $data;
        }
    }
}
