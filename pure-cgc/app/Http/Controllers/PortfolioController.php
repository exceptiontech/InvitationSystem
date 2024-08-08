<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\cat;
use App\Models\image;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Portfolio';
        $main_services=  cat::select('id','name','name_en','img')->where(['type'=>1,'is_active'=>1,'parent_id'=>0])->orderBy('ord','ASC')->get();
        if(count($main_services))
        {
            
            foreach ($main_services as $main_service ) {
                $gt_portfolios=Portfolio::select('id','name','name_en','img','details','details_en')->where(['type'=>1,'is_active'=>1,'cat_id'=>$main_service->id,'deleted_at'=>null])->orderBy('ord','ASC')->get();
                $main_service['portfolios']=@$gt_portfolios;
            }
        }
        //dd($main_services);
        return view('site_ms.portfolio.index',compact('title','main_services'));
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
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
        $portfolio=Portfolio::select( 'portfolios.id','portfolios.name', 'portfolios.name_en','portfolios.img', 'portfolios.details', 'portfolios.details_en', 'portfolios.img', 'cat_id','cats.name as cat_name', 'cats.name_en as cat_name_en')
                    ->leftJoin('cats','cats.id','=','cat_id')
                    ->where(['portfolios.type'=>1,'portfolios.is_active'=>1])
                    ->orderBy('portfolios.created_at', 'DESC')->find($id);
        if(is_null($portfolio) == 0)
        {
            $imgs= image::where(['prod_id'=>$portfolio->id , 'deleted_at'=>null])->get();
            $portfolio['imgs']=@$imgs;
        }
        $title='Portfolio > '.@$portfolio->name;
        //dd($portfolio);
        return view('site_ms.portfolio.show',compact('title','portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}
