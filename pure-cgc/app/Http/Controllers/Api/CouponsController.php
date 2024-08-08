<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\coupon;
use App\Models\coupon_uses_user;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang='ar',$country_id=0, $type=0)
    {
        $selct=array('coupons.id','coupons.user_id','type','cat_id','name', 'coupon','img','amount', 'min_total_price', 'max_discount', 'date_expire',
                    'companies_details.user_id as userID','country_id','facility_name','logo');
        if($lang =='en')
        {
            $selct=array('coupons.id','coupons.user_id','type','cat_id','name_en as name', 'coupon','img','amount', 'min_total_price','max_discount',  'date_expire',
                    'companies_details.user_id as userID','country_id','facility_name_en as facility_name','logo');
        }

        $wher['type']=$type;
        $wher['is_active']=1;
        if($country_id > 0)
        {
            $wher['country_id']=$country_id;
        }
        $data=array();
        $data_res=array();
        $results= coupon::select($selct)
                ->join('companies_details','companies_details.user_id','=','coupons.user_id')
                ->where($wher)->orderby('id','DESC')->get();
        if(count($results))
        {
            $data['result']=true;
            $data['error_message']='';
            $data['error_message_en']='';
            $data['data']=$results;
            return response()->json($data, 200);
        }
        else
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            $data['data']=array();
            return response()->json($data, 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , Request $request)
    {
        $lang=$request->input('lang');
        $selct=array('coupons.id','coupons.user_id','type','cat_id','name', 'coupon','img','amount', 'min_total_price','max_discount', 'date_expire',
                    'companies_details.user_id as userID','country_id','facility_name','logo');
        if($lang =='en')
        {
            $selct=array('coupons.id','coupons.user_id','type','cat_id','name_en as name', 'coupon','img','amount', 'min_total_price', 'max_discount', 'date_expire',
                    'companies_details.user_id as userID','country_id','facility_name_en as facility_name','logo');
        }

        $wher['is_active']=1;
        if($request->input('coupon'))
        {
            $wher['coupon']=$coupon=$request->input('coupon');
        }
        else
        {
            $wher['coupons.id']=$id;
        }
        $data=array();
        $results= coupon::select($selct)
                ->join('companies_details','companies_details.user_id','=','coupons.user_id')
                ->where($wher)->first();
        if(is_null($results) ==0)
        {
            $data['result']=true;
            $data['error_message']='';
            $data['error_message_en']='';

            if($request->input('user_id'))
            {
                $user_id= $request->input('user_id');
                $chk_usr=coupon_uses_user::select('user_id')->where(['user_id'=>$user_id,'coupon_id'=>@(int)$coupon])->count();
                if($chk_usr > 0)
                {
                    $data['result']=false;
                    $data['error_message']='عفوا تم استخدامه من قبل';
                    $data['error_message_en']='sorry, used from you';

                }
            }
            $data['data']=$results;
            return response()->json($data, 200);
        }
        else
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            $data['data']=array();
            return response()->json($data, 200);
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
