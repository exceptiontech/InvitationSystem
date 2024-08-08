<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\users_request;
use Auth;
use App\Models\Api\User;

class UsersRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= Auth::user();
        $results=users_request::select('users_requests.id', 'user_id', 'users_requests.type','request_type' ,'num_days', 'users_requests.details', 'files', 'company_id', 'is_approved', 'department_id', 'admin_view', 'is_deleted', 'users_requests.created_at',
                                'users.name as user_name', 'mid_name', 'l_name', 'mobile','cats.name as request_type_name')
                                ->leftJoin('users','users.id','=','user_id')
                                ->leftJoin('cats','cats.id','=','request_type')
                                ->orderBy('users_requests.created_at', 'DESC')->paginate();
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
            $data_json['error_message']='لا توجد طلبات خاصه بك';
            $data_json['error_message_en']='sorry , No requests for you';
            return response()->json( $data_json,200);
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
        $user= Auth::user();
        $this->validate($request,[
            'request_type'     => 'required',
            'num_days'     => 'required',
            //'address'     => 'required',
            //'city'   => 'required'
        ]);
        $chk_ins=users_request::where(['user_id'=>$user->id,
                                    'request_type'=>$request->request_type ,
                                    'num_days'=>$request->num_days,
                                    'details'=>$request->details])->first();
        if(is_null($chk_ins)==0)
        {
            $data_json['result']=false;
            $data_json['error_message']='موجود من قبل';
            $data_json['error_message_en']='Sorry , was exist';
            $data_json['data']=0;
            return response()->json( $data_json,200);
            exit();
        }
        $destinationPath = public_path('/uploads');
        $data= new users_request();
        if ($request->hasFile('files')) {
            $file_logo = $request->file('files');
            //$path = $request->img->path();    //$extension = $request->img->extension();
            $file_name = date('Y_m_d_h_i_s_').str_slug($request->request_type).'.'.$file_logo->getClientOriginalExtension();
            $filePath = $destinationPath. "/".  $file_name;
            $file_logo->move($destinationPath, $file_name);
            $data->files = $file_name;
        }
        $data->user_id=$user->id;
        $data->request_type=$request->request_type;
        $data->num_days=$request->date_from;
        $data->date_from=$request->date_from;
        $data->date_to=$request->date_to;
        $data->details=$request->details;
        $data->company_id=@$request->company_id;
        $data->user_ip=\Request::ip();
        $data->user_pc_info=$request->header('User-Agent');
        $result=$data->save();
        if($result)
        {
            $data_json['result']=true;
            $data_json['error_message']='تم ارسال طلبك بنجاح , سيتم الرد عليك قريبا';
            $data_json['error_message_en']='Successfully sent your message';
            $data_json['data']=$data->id;
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
