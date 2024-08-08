<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UsersCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersCarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id= Auth::id();
        $results=UsersCar::select('users_cars.id', 'user_id', 'car_id', 'model_car_id', 'manufacturing_year', 'is_default_car','users_cars.created_at',
                                'cr.name','cr.name_en','crm.name as car_model_name','crm.name_en as car_model_name_en')
                                ->join('categories as cr','car_id','=','cr.id')
                                ->join('categories as crm','model_car_id','=','crm.id')
                                ->where('user_id',$user_id)
                                ->orderBy('created_at', 'DESC')
                                ->get();
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
            $data_json['error_message']='لا توجد سيارات خاصه بك';
            $data_json['error_message_en']='sorry , No Cars for you';
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
            'model_car_id'     => 'integer',
            'manufacturing_year'   => 'integer'
        ]);
        $chk_ins=UsersCar::where(['user_id'=>$user_id,
                                    'car_id'=>$request->car_id ,
                                    'model_car_id'=>$request->model_car_id,
                                    'manufacturing_year'=>$request->manufacturing_year])->first();
        if(is_null($chk_ins)==0)
        {
            $data_json['result']=false;
            $data_json['error_message']='موجود من قبل';
            $data_json['error_message_en']='Sorry , was exist';
            $data_json['data']=0;
            return response()->json( $data_json,200);
        }
        if($request->is_default_car == 'Y')
        {
            UsersCar::select('is_default_car')->where('is_default_car','Y')->update(['is_default_car'=>'N']);
        }
        $data= new UsersCar();
        $data->user_id=$user_id;
        $data->car_id=$request->car_id;
        $data->model_car_id=$request->model_car_id;
        $data->manufacturing_year=$request->manufacturing_year;
        $data->is_default_car=$request->is_default_car;
        // $data->user_ip=\Request::ip();
        // $data->user_pc_info=$request->header('User-Agent');
        $result=$data->save();
        if($result)
        {
            $data_json['result']=true;
            $data_json['error_message']='تم اضافه سيارتك بنجاح';
            $data_json['error_message_en']='Successfully added your Car';
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

    public function store_multi(Request $request)
    {
        $user_id= Auth::id();
        $result=null;


        if(!empty($request->car_id))
        {
            // dd($request->car_id);
            foreach ($request->car_id as  $car_id) {
                $chk_ins=UsersCar::where(['user_id'=>$user_id,
                                    'car_id'=>$request->car_id ])->first();
                if(is_null($chk_ins)==1)
                {
                    $data= new UsersCar();
                    $data->user_id=$user_id;
                    $data->car_id=$car_id;
                    $result=$data->save();
                }
            }
        }
        if($result != null)
        {
            $data_json['result']=true;
            $data_json['error_message']='تم اضافه سيارتك بنجاح';
            $data_json['error_message_en']='Successfully added your Car';
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
            'model_car_id'     => 'integer',
            'manufacturing_year'   => 'integer'
        ]);
        $data=UsersCar::where('user_id',$user_id)->find($id);
        if(is_null($data)==1)
        {
            $data_json['result']=false;
            $data_json['error_message']='عفوا هذه السياره ليست ملك لك، راجع الاداره';
            $data_json['error_message_en']='sorry , you have not owened this car ';
            return response()->json( $data_json,200);
        }
        if($request->is_default_car == 'Y')
        {
            UsersCar::select('is_default_car')->where('is_default_car','Y')->update(['is_default_car'=>'N']);
        }
        $data->user_id=$user_id;
        $data->car_id=$request->car_id;
        $data->model_car_id=$request->model_car_id;
        $data->manufacturing_year=$request->manufacturing_year;
        $data->is_default_car=$request->is_default_car;
        $result=$data->save();
        if($result)
        {
            $data_json['result']=true;
            $data_json['error_message']='تم تعديل سيارتك بنجاح';
            $data_json['error_message_en']='Successfully updated your Car';
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id= Auth::id();
        $data=UsersCar::select('id','deleted_at')->where('user_id',$user_id)->find($id);
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
