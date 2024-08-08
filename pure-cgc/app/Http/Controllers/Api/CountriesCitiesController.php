<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CountriesCity;

class CountriesCitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang='ar',$p_id=0)
    {
        $type=0;
        $selct=array();
        if($p_id == 0 && $lang =='ar')
        {
            $selct=array('id',  'parent_id', 'name','currency_code', 'dail_code', 'img');
        }elseif($p_id == 0 && $lang =='en')
        {
            $selct=array('id',   'parent_id', 'name_en as name','currency_code_en as currency_code', 'dail_code', 'img');
        }elseif($p_id == 0 && $lang =='all')
        {
            $selct=array('id',   'parent_id', 'name','name_en','currency_code', 'currency_code_en', 'dail_code', 'img');
        }elseif($p_id > 0 && $lang =='ar')
        {
            $selct=array('id', 'parent_id', 'name','name_en');
        }elseif($p_id > 0 && $lang =='en')
        {
            $selct=array('id', 'parent_id', 'name_en as name','name as name_ar');
        }elseif($p_id > 0 && $lang =='all')
        {
            $selct=array('id', 'parent_id','name', 'name_en','name_en');
        }
        $wher['type']=$type;
        $wher['parent_id']=$p_id;
        $wher['is_active']=1;
        $results= CountriesCity::select($selct)->where($wher)->get();
        if(count($results))
        {
            $data['result']=true;
            $data['error_message']='';
            $data['error_message_en']='';
            $data['data']=$results;
            return $data;
        }
        else
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            $data['data']=array();
            return $data;
        }
    }
}
