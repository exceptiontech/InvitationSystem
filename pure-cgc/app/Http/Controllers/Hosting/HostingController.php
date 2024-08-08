<?php

namespace App\Http\Controllers\Hosting;

use App\Http\Controllers\Controller;
use App\Models\host;
use Illuminate\Http\Request;

class HostingController extends Controller
{
    public function index()
    {
        // $photo=Gallery::find(1);
        // $photo=Gallery::where('type',1)->random(1)->first();
        $hosts=host::all();
        return view('host.app',compact('hosts'));
    }
}
