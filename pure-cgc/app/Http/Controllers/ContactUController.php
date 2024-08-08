<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting_m;
use App\Models\social_media;
use App\Models\contact_u;

class ContactUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_details=setting_m::where('id',1)->first();
        $socil_medias=social_media::where('is_active',1)->get();
        $title='contact us';
        return view('site_ms.contact_us',compact('contact_details','socil_medias','title'));
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
            'name'      =>'required|max:200',
            //'mobile'     => 'required',
            'email'     => 'required',
            'message'   => 'required'
        ]);
        $chk_ins=contact_u::where(['name'=>$request->name,
                                    'cat_id'=>$request->cat_id ,
                                    'email'=>$request->email,
                                    'message'=>$request->message])->first();
        if(is_null($chk_ins)==0)
        {
            // $data_json['result']=false;
            // $data_json['error_mesage']='';
            // $data_json['error_mesage_en']='Sorry , was exist';
            // $data_json['data']=null;
            return response()->json( ' sorry was sent ',200);
            exit();
        }
        $data= new contact_u();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->mobile=@$request->mobile;
        $data->subject=$request->subject;
        $data->message=$request->message;
        $data->cat_id=$request->cat_id;
        $data->company=$request->company;
        $result=$data->save();
        if($result)
        {
            // $data_json['result']=true;
            // $data_json['error_mesage']='تم ارسال رسالتك بنجاح , سيتم الرد عليك قريبا';
            // $data_json['error_mesage_en']=;
            // $data_json['data']=$data->id;
            return response()->json( 'Successfully sent your message',200);
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_mesage']='لم يتم الارسال من فضلك حاول مرة اخرى';
            $data_json['error_mesage_en']='sorry , not send. please try again';
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
