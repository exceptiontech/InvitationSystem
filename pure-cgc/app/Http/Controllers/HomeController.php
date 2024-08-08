<?php

namespace App\Http\Controllers;

use App\Models\ArtMin;
use App\Models\Gallery;
use App\Models\StaticPage;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $about=StaticPage::find(1);
        $slider=ArtMin::whereType(0)->whereIsActive('Y')->take(14)->get();
        $vote_referrals=StaticPage::find(2);
        return view('site_ms.home',compact('about','slider','vote_referrals'))->with(['with_slider'=>true]);
    }
    public function home()
    {
        // $section_tools =  cat::select('cats.id','cats.name as cat_name','cats.name_en as cat_name_en' ,'cats.img','cats.datails','cats.datails_en','related_links.name', 'related_links.name_en', 'related_links.related_img', 'url_link')
        //                     ->leftJoin('related_links','related_links.id','=','cat_id')
        // ->where(['cats.type'=>4,'cats.is_active'=>1 ,'related_links.is_active'=>1])->orderBy('cats.ord','ASC')->get();


        return view('site_ms.home',);
    }
}
