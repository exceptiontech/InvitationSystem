<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\art_min;
use App\Models\gallery;
use App\Models\cat;

class ArtMinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($title_url='', Request $request)
    {
        $title='about';
        $results=art_min::where(['type'=>1 , 'is_active'=>1])->orderBy('ord','ASC')->get();
        $partners=gallery::where(['type'=>3 , 'is_active'=>1])->orderBy('ord','ASC')->get();
        $clients=gallery::where(['type'=>1 , 'is_active'=>1])->orderBy('ord','ASC')->get();
        return view('site_ms.art_min.index',compact('results','title','partners','clients'));
    }

    public function services($title_url='', Request $request)
    {
        $title='about';
        $services_form=  cat::select('id','name','name_en','img','details','details_en')->where(['type'=>3,'is_active'=>1])->orderBy('ord','ASC')->get();
        $main_services=  cat::select('id','name','name_en','img','field_ms')->where(['type'=>2,'is_active'=>1,'parent_id'=>0])->orderBy('ord','ASC')->get();
        if(count($main_services))
        {
            
            foreach ($main_services as $main_service ) {
                $gt_sub_services=art_min::select('id','name','name_en','img','details','details_en')->where(['type'=>2,'is_active'=>1,'cat_id'=>$main_service->id])->orderBy('ord','ASC')->get();
                $main_service['sub_services']=@$gt_sub_services;
            }
        }
        $sliders=gallery::where(['type'=>4 , 'is_active'=>1])->orderBy('ord','ASC')->get();
        //dd($main_services);
        return view('site_ms.art_min.index_services',compact('services_form','sliders','title','main_services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $wher=['art_mins.type'=>4,'art_mins.is_active'=>1,'art_mins.is_deleted'=>'N'];
        if($request->step && $request->step== "next")
        {
            $wher[]=['id','>',$id];
        }elseif($request->step && $request->step== "back")
        {
            $wher[]=['id','<',$id];
        }else
        {
            $wher['id']=$id;
        }
        $result=art_min::where($wher)->first();
        if(is_null($result)==0)
        {
            $gt_user=User::select('users.id', 'users.name',  'l_name', 'img', 'title', 'country', 'users.city', 'region', 'address',
                                    'users_details.user_id',  'users_details.nationality', 'country_of_residence','city_of_residence', 'bio',
                                    'cou.name as country_name','ci.name as city_name')
                                ->leftJoin('users_details','users_details.user_id','=','users.id')
                                ->leftJoin('earas as cou','cou.id','=','country_of_residence')
                                ->leftJoin('earas as ci','ci.id','=','city_of_residence')
                                ->find($result->user_added);
            if(is_null($gt_user) == 0)
            {
                $result->user_nms=$gt_user;
            }
            else
            {
                $result->user_nms='admin';
            }
            //to get similar blogs
            $selct_blogs=array( 'art_mins.id','art_mins.type','art_mins.name', 'name_en', 'art_mins.img', 'details', 'details_en', 'num_views','art_mins.created_at','user_added',
            'users.name as user_f_name','users.l_name');
            $wher_blog=['art_mins.type'=>4,'art_mins.is_active'=>1,'art_mins.is_deleted'=>'N'];
            $similar_blogs=art_min::select($selct_blogs)
                ->leftjoin('users','users.id','=','user_added')
                ->where($wher_blog)->where([['art_mins.id','!=',$result->id],['art_mins.name','like','%'.$result->name.'%']])->orderBy('art_mins.created_at','DESC')->take(5)->get();
            if(count($similar_blogs)<1)
            {
            $similar_blogs=art_min::select($selct_blogs)
                ->leftjoin('users','users.id','=','user_added')
                ->where($wher_blog)->orderBy('art_mins.created_at','DESC')->take(5)->get();

            }
            $type=$result->type;
            if($type==1){ $title=''; }elseif($type==2){ $title=''; }
            elseif($type==3){ $title=''; }elseif($type==4){ $title='Yogiswap Blog'; }else{ $title=''; }
            $title.=' | '.$result->name;
            return view('site_ms.art_min.show',compact('result','type','title','similar_blogs'));
        }
        else
        {
            abort(404);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
