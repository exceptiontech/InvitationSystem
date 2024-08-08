<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\video;
use App\Models\cat;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=0)
    {
        if($type==1){ $title='Home Video'; }elseif($type==2){ $title='المركز الاعلامي'; }
        elseif($type==3){ $title='كلنا مسؤول'; }elseif($type==4){ $title=''; }else{ $title=''; }
        $results=video::where('type',$type)->where('is_active',1)->get();
        $wher['type']=$type;
        $cats =  cat::select('id','name','name_en')->where($wher)->get();
        
        return view('site_ms.videos.index',compact('results','type','title','cats'));
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
        $result=video::where('id',$id)->first();
        return view('site_ms.videos.one',compact('result'));
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
