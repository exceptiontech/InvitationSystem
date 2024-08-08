<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\admin\User;
use App\Models\users_detail;
use App\Models\users_social;
use App\Models\gallary;
use App\Models\art_min;
use App\Models\eara;
use App\Models\registerd_yoga_teacher;
use App\Models\teaching_language;
use App\Models\teaching_style;
use App\Models\chat;
use App\Models\cat;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=0)
    {
        if($type==1){ $title=''; }elseif($type==4){ $title=''; }else{ $title='Members'; }
        $results=User::where('user_level',$type)->where('id','>',1)->get();
        return view('site_ms.users.index',compact('results','type','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = $request->input('type');
        $new_object = new User();
        $result=$new_object->get_new($type);
        return view('site_ms.users.edit',compact('result','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        //     'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);
        // $data= new User();
        // if ($request->hasFile('img')) {
        //     $file = $request->file('img');
        //     //$path = $request->img->path();    //$extension = $request->img->extension();
        //     $file_name = date('Y_m_d_h_i_s_').str_slug($request->name).'.'.$file->getClientOriginalExtension();
        //     $destinationPath = public_path('/uploads');
        //     $filePath = $destinationPath. "/".  $file_name;
        //     $file->move($destinationPath, $file_name);
        //     $data->img = $file_name;
        // }
        // $data->name=$request->name;
        // $data->mid_name=$request->mid_name;
        // $data->l_name=$request->l_name;
        // $data->email=$request->email;
        // $data->mobile=$request->mobile;
        // $data->user_level=$request->type;
        // $data->type=0;
        // $data->password = Hash::make($request['password']);
        // //$data->details=$request->details;
        // //$data->details_en=$request->details_en;
        // $data->save();
        // return redirect(url('members/t/'.$request->type))->with('flash_message','تمت الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id='profile'  )
    {
        if($id=='profile')
        {
            $id=Auth::User()->id;
        }
        elseif($id != '' )
        {
            $id;
        }
        else
        {
            $id = 0;
        }
        $teaching_lang=''; $wishlist_cou='';
        //get latest blogs
        $selct_blogs=array( 'art_mins.id','art_mins.type','art_mins.name', 'name_en', 'art_mins.img', 'details', 'details_en', 'num_views','art_mins.created_at','user_added',
                            'users.name as user_f_name','users.l_name');
        $wher_blog=['art_mins.type'=>4,'art_mins.is_active'=>1,'art_mins.is_deleted'=>'N'];
        $latest_blogs=art_min::select($selct_blogs)
                        ->leftjoin('users','users.id','=','user_added')
                        ->where($wher_blog)->where('user_added',$id)->orderBy('art_mins.created_at','DESC')->take(5)->get();
        if(count($latest_blogs)<1)
        {
            $latest_blogs=art_min::select($selct_blogs)
                        ->leftjoin('users','users.id','=','user_added')
                        ->where($wher_blog)->orderBy('art_mins.created_at','DESC')->take(5)->get();
            
        }
        
        $result=User::select('users.id', 'type', 'user_level as user_type', 'member_plan', 'name',  'l_name', 'email', 
                            'mobile',  'img', 'title', 'country', 'city', 'region', 'address', 'gender',  'date_birth',
                            'users_details.user_id', 'mem_pay_key', 'gender', 'nationality', 'country_of_residence', 
                            'city_of_residence', 'promo_code', 'desired_destination', 'teaching_style', 'registerd_yoga_teacher', 
                            'additional_qualification', 'teaching_language', 'experience_years', 'certificate_image', 
                            'teaching_video', 'studio_classes', 'private_clients', 'workshops', 'accommodation_exchange', 
                            'accommo_country', 'accommo_city', 'accommo_type', 'amenities_type', 'property_type', 
                            'accommo_image', 'is_anywhere_wishlist', 'wishlist_country', 'wishlist_city', 'wishlist_months', 
                            'allow_gallery_comment', 'allow_blog_comment', 'allow_board_search', 'allow_board_search_wishlist', 
                            'allow_tribe_search', 'allow_private_message', 'allow_email_notification', 'notify_swap_request', 'bio',
                            'users_socials.user_id', 'facebook', 'instagram', 'twitter', 'youtube', 'pinterest', 'linkedin')
                    ->leftJoin('users_details','users_details.user_id','=','users.id')
                    ->leftJoin('users_socials','users_socials.user_id','=','users.id')
                    ->where('users.id',$id)->first();
        if(is_null($result) == 0)
        {
            //gt country
            $result->nationality_name=@eara::select('name')->find(intval($result->nationality))->name;
            //gt country
            $result->country_of_residence_name=@eara::select('name')->find(intval($result->country_of_residence))->name;
            //gt city_of_residence
            $result->city_of_residence_name=@eara::select('name')->find(intval($result->city_of_residence))->name;
            //gt accommo_country_name 
            $result->accommo_country_name=@eara::select('name')->find(intval($result->accommo_country))->name;
            //gt accommo_city_name 
            $result->accommo_city_name=@eara::select('name')->find(intval($result->accommo_city))->name;
            //gt teaching languages
            // if(!empty($result->teaching_language))
            // {
            //     $teaching_languages=explode(',',$result->teaching_language);
            //     foreach($teaching_languages as $teaching_language)
            //     {
            //         $gt_teaching_language=teaching_language::select('name')->find($teaching_language);
            //         if(is_null($gt_teaching_language) == 0)
            //         {
            //             $teaching_lang.=$gt_teaching_language->name.' - ';
            //         }
            //     }
            //     $result->teaching_lang_names=substr($teaching_lang,0,-2);
            // }
            //gt teaching languages
            if(!empty($result->wishlist_country))
            {
                $wishlist_countries=explode(',',$result->wishlist_country);
                foreach($wishlist_countries as $wishlist_country)
                {
                    $gt_wishlist_country=eara::select('name')->find($wishlist_country);
                    if(is_null($gt_wishlist_country) == 0)
                    {
                        $wishlist_cou.=$gt_wishlist_country->name.' - ';
                    }
                }
                $result->wishlist_country_names=substr($wishlist_cou,0,-2);
            }
            

            if($result->user_type == 1)
            {
                //gt studio branches
                $gt_branches=User::select('users.id', 'users.name',  'l_name', 'img', 'title', 'country', 'users.city', 'region', 'address',
                                    'users_details.user_id',  'users_details.nationality', 'country_of_residence','city_of_residence', 'bio',
                                    'cou.name as country_name','ci.name as city_name')
                                ->leftJoin('users_details','users_details.user_id','=','users.id')
                                ->leftJoin('earas as cou','cou.id','=','country_of_residence')
                                ->leftJoin('earas as ci','ci.id','=','city_of_residence')
                                ->where('users.parent_id',$id)->get();
                
                return view('site_ms.users.profileco',compact('result','latest_blogs','gt_branches'));
            }
            else
            {
                return view('site_ms.users.profile',compact('result','latest_blogs'));
            } 
        }
        else
        {
            abort(404);
        } 
        
        
    }

    public function inbox($to_user='view' )
    {
        $id=Auth::User()->id;
        $users_arr=array();
        intval($to_user);
        // to get user chats
        $users_chats=chat::where('is_deleted',0)
                    ->where(function ($query) use ($id) {
                        $query->where('to_user',$id);
                        $query->orWhere('from_user',$id); 
                    })
                    ->groupBy('from_user')
                    ->groupBy('to_user')
                    ->orderBy('id','DESC')
                    ->get();
        if(count($users_chats))
        {
            foreach($users_chats as $users_chat)
            {
                if(in_array($users_chat->from_user ,$users_arr) || in_array($users_chat->to_user ,$users_arr))
                {
                    continue;
                }
                else
                {
                    if($users_chat->from_user == $id)
                    {
                        $users_arr[]=$users_chat->to_user;
                    }
                    elseif($users_chat->to_user == $id )
                    {
                        $users_arr[]=$users_chat->from_user;
                    }
                } 
            }
        }
        //to get users
        if(!empty($users_arr))
        {
            $users_ichats=user::select('id','name','l_name','img')
                            ->whereIn('id',$users_arr)
                            ->get();
            foreach($users_ichats as $users_ichat)
            {
                // to get last chat text
                $user_gt_id=$users_ichat->id;
                $user_last_chat=chat::where('is_deleted',0)
                            ->where(function ($query) use ($user_gt_id) {
                                $query->where('to_user',$user_gt_id);
                                $query->orWhere('from_user',$user_gt_id); 
                            })
                            ->orderBy('id','DESC')
                            ->first();
                $users_ichat->last_chat= @$user_last_chat->text;
            }
        }
        return view('site_ms.users.inbox',compact('users_ichats','to_user'));
    }

    public function success_register()
    {
        $title='Successfully Registered';
        return view('site_ms.users.success_register',compact('title'));
    }
    

    public function my_gallery($title_seo=''  )
    {
        
        $user_id=Auth::User()->id;
        $title="my gallary";
        $results=gallary::select('id',  'parent_id', 'ord', 'name', 'name_en', 'img','created_at','user_added')
                ->where(['is_active'=>1 , 'user_added'=>$user_id,'is_deleted'=>'N'])->orderBY('id','DESC')->paginate(8);
        return view('site_ms.users.my_gallery',compact('results','title'));
    }

    public function delete_gallery(Request $request  )
    {
        
        $user_id=Auth::User()->id;
        $id=$request->del_id;
        $data=gallary::where('user_added',$user_id)->find($id);
        $data->is_deleted='Y';
        $data->save();
        return '<div class="alert alert-success col-md-6 col-md-offset-3  alert-dismissable" style="text-align: center;margin: auto;">
        <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">×</button>
        <span class="glyphicon glyphicon-ok"></span>   <em> Successfully Deleted</em>';
    }

    public function my_blogs($title_seo=''  )
    {
        
        $user_id=Auth::User()->id;
        $title="my gallary";
        $results=art_min::select('id',   'ord', 'name', 'name_en','details','details_en','num_views', 'img','created_at','user_added')->where(['is_active'=>1 , 'user_added'=>$user_id,'is_deleted'=>'N'])->paginate(8);
        return view('site_ms.users.my_blogs',compact('results','title'));
    }

    public function delete_blog(Request $request  )
    {
        
        $user_id=Auth::User()->id;
        $id=$request->del_id;
        $data=art_min::where('user_added',$user_id)->find($id);
        $data->is_deleted='Y';
        $data->save();
        return '<div class="alert alert-success col-md-6 col-md-offset-3  alert-dismissable" style="text-align: center;margin: auto;">
        <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">×</button>
        <span class="glyphicon glyphicon-ok"></span>   <em> Successfully Deleted</em>';
    }
    public function dashboard($id='profile'  )
    {
        if($id=='profile')
        {
            $id=Auth::User()->id;
        }
            $result=User::where('id',$id)->first();
            return view('site_ms.users.dashboard',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id='profile')
    {
        $id=Auth::User()->id;
        $result=User::select('users.id', 'type', 'user_level as user_type', 'member_plan', 'name',  'l_name', 'email', 
                            'mobile',  'img', 'title', 'country', 'city', 'region', 'address', 'gender',  'date_birth',
                            'users_details.user_id', 'mem_pay_key', 'num_of_branches', 'nationality', 'country_of_residence', 
                            'city_of_residence', 'promo_code', 'desired_destination', 'teaching_style', 'registerd_yoga_teacher', 
                            'additional_qualification', 'teaching_language', 'experience_years', 'certificate_image', 
                            'teaching_video', 'studio_classes', 'private_clients', 'workshops', 'accommodation_exchange', 
                            'accommo_country', 'accommo_city', 'accommo_type', 'amenities_type', 'property_type', 
                            'accommo_image', 'is_anywhere_wishlist', 'wishlist_country', 'wishlist_city', 'wishlist_months', 
                            'allow_gallery_comment', 'allow_blog_comment', 'allow_board_search', 'allow_board_search_wishlist', 
                            'allow_tribe_search', 'allow_private_message', 'allow_email_notification', 'notify_swap_request', 'bio',
                            'users_socials.user_id', 'facebook', 'instagram', 'twitter', 'youtube', 'pinterest', 'linkedin')
                    ->leftJoin('users_details','users_details.user_id','=','users.id')
                    ->leftJoin('users_socials','users_socials.user_id','=','users.id')
                    ->where('users.id',$id)->first();
        $countries=eara::select('id','name')->where(['countries'=>0,'is_active'=>1])->get();
        $cities=eara::select('id','name')->where(['countries'=>$result->country_of_residence,'is_active'=>1])->get();
        $cities_accommo=eara::select('id','name')->where(['countries'=>$result->accommo_country,'is_active'=>1])->get();
        $teaching_styles=teaching_style::select('id','name')->where('is_active',1)->get();
        $regs_yoga_teachers=registerd_yoga_teacher::select('id','name')->where('is_active',1)->get();
        $teaching_languages=teaching_language::select('id','name')->where('is_active',1)->get();
        $available_amenities=cat::select('id','name','name_en')->where(['is_active'=>1,'type'=>2,'parent_id'=>0])->get();
        return view('site_ms.users.dashboard',compact('result','countries','cities','cities_accommo','teaching_styles','regs_yoga_teachers','teaching_languages','available_amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=0)
    {
        $user=Auth::user();
        $this->validate($request,[
            'name' => 'required|string|max:255',
            //'email' => 'required|string|max:255',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'certificate_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'teaching_video' => 'mimetypes:video/avi,video/mpeg,video/mp4,video/ogg,video/quicktime',
            'accommo_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        $destinationPath = public_path('/uploads');
        $data= User::find($user->id);
        // if(!empty($request['password']))
        // {
        //     $this->validate($request,[
        //         'password'=> 'required|string|min:6|max:25'
        //     ]);
        //     $data->password = Hash::make($request['password']);
        // }
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            //$path = $request->img->path();    //$extension = $request->img->extension();
            $file_name = date('Y_m_d_h_i_s_').str_slug($request->name).'.'.$file->getClientOriginalExtension();
            $filePath = $destinationPath. "/".  $file_name;
            $file->move($destinationPath, $file_name);
            @unlink("./uploads/".$data->img);
            $data->img = $file_name;
        }
        $data->name=$request->name;
        $data->mid_name=@$request->mid_name;
        $data->l_name=$request->l_name;
        //$data->email=$request->email;
        $data->mobile=@$request->mobile;
        $data->country=$request->country_of_residence;
        $data->city=$request->city_of_residence;
        $data->save();
        //update user details
        $data_user_upd= users_detail::where('user_id',$user->id)->first();
        if(is_null($data_user_upd) == 1)
        {
            $data_user_upd= new users_detail();
            $data_user_upd->user_id = $user->id;
        }
        // if($user->user_level == 0)
        // {
            if ($request->hasFile('teaching_video')) {
                $file_tv = $request->file('teaching_video');
                $file_name_tv = date('Y_m_d_h_i_s_').str_slug($request->name).'_tv.'.$file_tv->getClientOriginalExtension();
                $filePath = $destinationPath. "/".  $file_name_tv;
                $file_tv->move($destinationPath, $file_name_tv);
                @unlink("./uploads/".$data_user_upd->teaching_video);
                $data_user_upd->teaching_video = $file_name_tv;
            }
            if ($request->hasFile('certificate_image')) {
                $file_ci = $request->file('certificate_image');
                $file_name_ci = date('Y_m_d_h_i_s_').str_slug($request->name).'_ci.'.$file_ci->getClientOriginalExtension();
                $filePath = $destinationPath. "/".  $file_name_ci;
                $file_ci->move($destinationPath, $file_name_ci);
                @unlink("./uploads/".$data_user_upd->certificate_image);
                $data_user_upd->certificate_image = $file_name_ci;
            }
            if ($request->hasFile('accommo_image')) {
                $file_ai = $request->file('accommo_image');
                $file_name_ai = date('Y_m_d_h_i_s_').str_slug($request->name).'_ai.'.$file_ai->getClientOriginalExtension();
                $filePath = $destinationPath. "/".  $file_name_ai;
                $file_ai->move($destinationPath, $file_name_ai);
                @unlink("./uploads/".$data_user_upd->accommo_image);
                $data_user_upd->accommo_image = $file_name_ai;
            }
            $data_user_upd->gender = @$request->gender;
            $data_user_upd->date_birth = @$request->date_birth;
            $data_user_upd->nationality = @$request->nationality;
            $data_user_upd->num_of_branches = @$request->num_of_branches;
            $data_user_upd->bio = $request->bio;
            $data_user_upd->country_of_residence = $request->country_of_residence;
            $data_user_upd->city_of_residence = $request->city_of_residence;
            //experience
            $data_user_upd->teaching_style = @implode(',',$request->teaching_style);
            $data_user_upd->registerd_yoga_teacher = @implode(',',$request->registerd_yoga_teacher);
            $data_user_upd->additional_qualification = @$request->additional_qualification;
            $data_user_upd->experience_years = $request->experience_years;
            //teaching_style
            $data_user_upd->teaching_language = @implode(',',$request->teaching_language);
            $data_user_upd->studio_classes = @$request->studio_classes;
            $data_user_upd->private_clients = $request->private_clients;
            $data_user_upd->workshops = $request->workshops;
            //accommodation
            $data_user_upd->accommodation_exchange = $request->accommodation_exchange;
            $data_user_upd->accommo_country = $request->accommo_country;
            $data_user_upd->accommo_city = $request->accommo_city;
            $data_user_upd->accommo_type = $request->accommo_type;
            $data_user_upd->amenities_type = @implode(',',$request->amenities_type);
            $data_user_upd->property_type = $request->property_type;
            //wishlist
            $data_user_upd->is_anywhere_wishlist = $request->is_anywhere_wishlist;
            $data_user_upd->wishlist_country = @implode(',',$request->wishlist_country);
            $data_user_upd->wishlist_months = @implode(',',$request->wishlist_months);
            //Privacy
            $data_user_upd->allow_gallery_comment = $request->allow_gallery_comment;
            $data_user_upd->allow_blog_comment = $request->allow_blog_comment;
            $data_user_upd->allow_board_search = $request->allow_board_search;
            $data_user_upd->allow_board_search_wishlist = $request->allow_board_search_wishlist;
            $data_user_upd->allow_tribe_search = $request->allow_tribe_search;
            $data_user_upd->allow_private_message = $request->allow_private_message;
            $data_user_upd->allow_email_notification = $request->allow_email_notification;
            $data_user_upd->notify_swap_request = $request->notify_swap_request;
        // }else
        // {
        //     //$data_user_upd->notes=$request->notes;
        // }
        $user_details =$data_user_upd->save();
        if($user_details == true)
        {
            if($user->user_level == 1)
            {
                //update studio social media details
                $data_user_social_upd= users_social::where('user_id',$user->id)->first();
                if(is_null($data_user_social_upd) == 1)
                {
                    $data_user_social_upd= new users_social();
                    $data_user_social_upd->user_id = $user->id;
                }
                $data_user_social_upd->facebook = $request->facebook;
                $data_user_social_upd->instagram = $request->instagram;
                $data_user_social_upd->twitter = $request->twitter;
                $data_user_social_upd->youtube = $request->youtube;
                $user_socials =$data_user_social_upd->save();
            }

            return redirect(url('members/dashboard/view'))->with('flash_message','Successfully updated');
        }
        else{
            dd($user_details);
        }
        return redirect(url('members/t/'.$request->type))->with('flash_message','Successfully updated');
    }

    public function register_packge()
    {
        $user= Auth::user();
        if($user->user_level == 1)
        {
            $type_sel=3;
        }
        else
        {
            $type_sel=1;
        }
        $packges=cat::select('id','type','name','name_en','field_ms')->where(['is_active'=>1,'type'=>$type_sel,'parent_id'=>0])->get();
        if(count($packges))
        {
            foreach ($packges as $packge) {
                $features=cat::select('id','name','name_en')->where(['is_active'=>1,'type'=>$type_sel,'parent_id'=>$packge->id])->get();
                $packge->features=@$features;
            }
        }
        return view('auth.register_packge',compact('packges'));
    }

    public function register_complete( Request $request)
    {
        $packge_sel=$request->packge;
        $user= Auth::user();
        if($user->user_level == 1)
        {
            // studio
            $type_sel=3;
            $type_register='Studio';
        }
        else
        {
            // member level = 0
            $type_sel=1;
            $type_register='member';
        }
        $packges=cat::select('id','type','name','name_en','field_ms')->where(['is_active'=>1,'type'=>$type_sel,'parent_id'=>0])->get();
        if(count($packges))
        {
            foreach ($packges as $packge) {
                $features=cat::select('id','name','name_en')->where(['is_active'=>1,'type'=>$type_sel,'parent_id'=>$packge->id])->get();
                $packge->features=@$features;
            }
        }
        return view('auth.register_complete',compact('user','packges','type_register','packge_sel'));
    }

    public function register_complete_confirm(Request $request, $id=0)
    {
        $user=Auth::user();
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'member_plan' => 'required|string|max:55',
            
        ]);
        $data= User::find($user->id);
        $data->name=$request->name;
        $data->l_name=@$request->l_name;
        $data->member_plan=$request->member_plan;
        $data->mobile=@$request->mobile;
        $data->country=$request->country;
        $data->save();
        //update user details
        $data_user_upd= users_detail::where('user_id',$user->id)->first();
        if(is_null($data_user_upd) == 1)
        {
            $data_user_upd= new users_detail();
            $data_user_upd->user_id = $user->id;
        }
        $data_user_upd->promo_code=$request->promo_code;
        $data_user_upd->country_of_residence = $request->country;
        $user_details= $data_user_upd->save();
        if($user_details == true)
        {
            return redirect(url('members/dashboard/view'))->with('flash_message','Successfully completed Register , please complete your data to enjoy!');
        }
        return redirect(url('members/t/'.$request->type))->with('flash_message','Successfully updated');
    }
    public function confirm_account(Request $request, $id=0)
    {
        $user=Auth::user();
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'member_plan' => 'required|string|max:55',
            
        ]);
        $data= User::find($user->id);
        $data->name=$request->name;
        $data->l_name=@$request->l_name;
        $data->member_plan=$request->member_plan;
        $data->mobile=@$request->mobile;
        $data->country=$request->country;
        $data->save();
        //update user details
        $data_user_upd= users_detail::where('user_id',$user->id)->first();
        if(is_null($data_user_upd) == 1)
        {
            $data_user_upd= new users_detail();
            $data_user_upd->user_id = $user->id;
        }
        $data_user_upd->promo_code=$request->promo_code;
        $data_user_upd->country_of_residence = $request->country;
        $user_details= $data_user_upd->save();
        if($user_details == true)
        {
            return redirect(url('members/dashboard/view'))->with('flash_message','Successfully completed Register , please complete your data to enjoy!');
        }
        return redirect(url('members/t/'.$request->type))->with('flash_message','Successfully updated');
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
        $result=User::select('is_active')-> where('id',$id)->first();
        $data= User::find($id);
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
        // User::where('id',$id)->delete();
        // return redirect()->back();
    }

    public function showLoginForm()
    {
        return view('site_ms.users.login');
    }
}
