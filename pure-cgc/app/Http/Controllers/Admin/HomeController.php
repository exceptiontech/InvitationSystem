<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Role;
use App\Models\VotesPoint;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title_page='Home';
        $admins=User::where('member_plan','Hi-Admin')->count();
        $members=User::where(['role_id'=>1])->count();
        $technision=User::where(['role_id'=>2])->count();
        $workshops=User::where(['role_id'=>3])->count();
        $roles=Role::count();
        $cars=Category::where(['type'=>1,'parent_id'=>0])->count();
        $cars_models=Category::whereType(1)->where('parent_id','>',0)->count();
        $inbox_messages=ContactUs::count();
        return view('admin.home',compact('title_page','admins','members','technision','workshops','roles','cars','cars_models','inbox_messages'));
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
