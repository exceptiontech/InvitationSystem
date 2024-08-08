<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\gallary;
use App\Models\static_page;
use App\Models\User;
use Auth;

class GallaryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title= 'Gallary';
        $results=gallary::select('id',  'parent_id', 'ord', 'name', 'name_en', 'img','created_at','user_added')
                        ->where(['is_active'=>1,'is_deleted'=>'N'])->orderBY('id','DESC')->paginate(8);
        if(count($results)):
            foreach($results as $result):
                $gt_user=User::select('name','l_name')->find($result->user_added);
                if(is_null($gt_user)==0)
                {
                    $result['user_name']=$gt_user->name.' '.$gt_user->l_name;
                }
                else
                {
                    $result['user_name']='Yogi Swap';
                }
            endforeach;
        endif;
        $text_res=@static_page::select('name','name_en','details','details_en')->find(4);

        return view('site_ms.gallary.index',compact('results','title','text_res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $new_object = new gallary();
        $result=$new_object->get_new();
        return view('site_ms.users.insert_gallery',compact('result'));
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
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data= new gallary();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            //$path = $request->img->path();    //$extension = $request->img->extension();
            $file_name = date('Y_m_d_h_i_s_').str_slug($request->name).'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $filePath = $destinationPath. "/".  $file_name;
            $file->move($destinationPath, $file_name);
            $data->img = $file_name;
        }
        $data->name=$request->name;
        $data->name_en=$request->name;
        $data->user_ip=\Request::ip();
        $data->user_pc_info=$request->header('User-Agent');
        $data->user_added = Auth::User()->id;
        $data->save();
        return redirect(route('members.my-gallery','view'))->with('flash_message','Successfully Added');
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
        $result=gallary::where('id',$id)->first();
        return view('admin.gallary.edit',compact('result'));
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
        $this->validate($request,[
            'name'      =>'required|max:20',
            'name_en'   => 'required'
        ]);
        $data= gallary::find($id);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            //$path = $request->img->path();    //$extension = $request->img->extension();
            $file_name = date('Y_m_d_h_i_s_').str_slug($request->name).'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $filePath = $destinationPath. "/".  $file_name;
            $file->move($destinationPath, $file_name);
            $data->img = $file_name;
            $gt_old_file=gallary::where('id',$id)->first();
            if(count($gt_old_file))
            {
                @unlink("./uploads/".$gt_old_file->img);
            }
        }
        $data->name=$request->name;
        $data->name_en=$request->name_en;
        $data->ord=$request->ord;
        $data->save();
        return redirect(route('gallary.index'));
    }
    /**
     * active & diactive the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active_ms($id)
    {
        //return $request->all();
        $result=gallary::select('is_active')-> where('id',$id)->first();
        $data= gallary::find($id);
        if($result->is_active == 1)
        {
            $data->is_active=0;
        }
        else
        {
            $data->is_active =1;
        }
        $data->save();
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        gallary::where('id',$id)->delete();
        return redirect()->back();
    }
}
