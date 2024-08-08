<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;
    public function get_new($type=null)
    {
        $result = new Advertising();
        $result->id=0;
        $result->type= $type;
        $result->ord= (Advertising::where('type',$type)->count()) +1;
        $result->name='';
        $result->name_en='';
        $result->img='';
        $result->img_thumbnail='';
        $result->url_l='';
        $result->with_id= 0;
        $result->google_adv='';
        $result->v_in_home='Y';
        $result->v_in_slide='Y';
        $result->v_in_app='Y';
        return $result;
    }
}
