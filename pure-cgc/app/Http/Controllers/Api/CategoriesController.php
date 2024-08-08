<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang='ar', $type=0,$p_id=0)
    {
        $selct=array('id', 'ord', 'type', 'parent_id', 'name','img', 'details');
        if($lang =='en')
        {
            $selct=array('id', 'ord', 'type', 'parent_id', 'name_en as name', 'img', 'details_en as details');
        }elseif($lang =='all')
        {
            $selct=array('id', 'ord', 'type', 'parent_id', 'name','name_en','img', 'details' , 'details_en');
        }

        $wher['type']=$type;
        $wher['parent_id']=$p_id;
        $wher['is_active']='Y';
        $data=array();
        $data_res=array();
        $results= Category::select($selct)->where($wher)->orderby('ord','ASC')->get();
        if(count($results)>0)
        {
            $data['result']=true;
            $data['error_message']='';
            $data['error_message_en']='';
            $data['data']=$results;
            return response()->json($data, 200);
        }
        else
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            $data['data']=array();
            return response()->json($data, 200);
        }
    }

    public function get_with_sub($lang='ar', $type=0,$p_id=0)
    {
        $selct=array('id', 'ord', 'type', 'parent_id', 'name','img', 'details');
        if($lang =='en')
        {
            $selct=array('id', 'ord', 'type', 'parent_id', 'name_en as name', 'img', 'details_en as details');
        }elseif($lang =='all')
        {
            $selct=array('id', 'ord', 'type', 'parent_id', 'name','name_en','img', 'details' , 'details_en');
        }
        $wher['type']=$type;
        $wher['parent_id']=$p_id;
        $wher['is_active']=1;
        $data=array();
        $data_res=array();
        $results= Category::select($selct)->where($wher)->orderby('ord','ASC')->get();
        if(count($results)>0)
        {
            foreach($results as $key_r => $result)
            {
                $result['sub_cat']= Category::select($selct)->where(['type'=>$type, 'parent_id'=>$result->id])->orderby('ord','ASC')->get();
            }
            $data['result']=true;
            $data['error_message']='';
            $data['error_message_en']='';
            $data['data']=$results;
            return response()->json($data, 200);
        }
        else
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            $data['data']=array();
            return response()->json($data, 200);
        }
    }
}
