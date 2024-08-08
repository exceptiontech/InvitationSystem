<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\social_media;
use App\Models\ContactUs;

class ContactUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results=ContactUs::get();
        if($results)
        {
            $data_json['result']=true;
            $data_json['error_message']=null;
            $data_json['error_message_en']=null;
            $data_json['data']=$results;

            return response()->json( $data_json,200);
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_message']='لم يتم الارسال';
            $data_json['error_message_en']='sorry , not send';
            $data_json['data']=null;
            return response()->json( $data_json,401);
        }
        //$socil_medias=social_media::where('is_active',1)->get();
        //$title='اتصل بنا';
        //return view('site_ms.contact_us',compact('contact_details','socil_medias','title'));
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
        $this->validate($request,[
            'name'      =>'required|max:200',
            'email'     => 'required|email',
            'message'   => 'required'
        ]);
        $chk_ins=ContactUs::where(['name'=>$request->name,
                                    'email'=>$request->email ,
                                    'subject'=>$request->subject,
                                    'message'=>$request->message])->first();
        if(is_null($chk_ins) == 0)
        {
            $data_json['result']=false;
            $data_json['error_message']='موجود من قبل';
            $data_json['error_message_en']='Sorry , was exist';
            $data_json['data']=null;
            return response()->json( $data_json,208);
            exit();
        }
        $data= new ContactUs();
        $data->name=$request->name;
        $data->email=$request->email;
        //$data->mobile=$request->mobile;
        $data->subject=$request->subject;
        $data->message=$request->message;
        $data->user_ip=\Request::ip();
        $data->user_pc_info=$request->header('User-Agent');
        $result=$data->save();
        if($result)
        {
            $data_json['result']=true;
            $data_json['error_message']='تم ارسال رسالتك بنجاح , سيتم الرد عليك قريبا';
            $data_json['error_message_en']='Successfully sent your message';
            return response()->json( $data_json,200);
        }
        else
        {
            $data_json['result']=false;
            $data_json['error_message']='لم يتم الارسال من فضلك حاول مرة اخرى';
            $data_json['error_message_en']='sorry , not send. please try again';
            $data_json['data']=null;
            return response()->json( $data_json,419);
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
