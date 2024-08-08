<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\users_orders_address;
use GoogleStaticMap;

class UsersOrdersAddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id=0)
    {
        $selct=array('city', 'region', 'street',  'building', 'floor_num', 'apartment', 'other_notes', 'latitude', 'longitude', 'mobile', 'telephone', 'is_deliverd_in', 'users_orders_addresses.created_at',
                    'contryCty.price_move');
        $results= users_orders_address::select($selct)
            ->join('countries_cities as contryCty','city','=','contryCty.name_en')
            ->where(['user_id'=>$user_id, 'is_deliverd_in' => 0])->get();
        if(!is_null($results))
        {
            foreach($results as $result)
            {
                if(empty($result->latitude) || empty($result->latitude))
                {
                    $result['static_map']='';
                }
                else {
                    $result['static_map']= GoogleStaticMap::make($result->latitude, $result->longitude)->getUrl();
                }

            }
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
        //
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
