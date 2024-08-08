<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function get_new($parent_id=0)
    {
        $result = new Attribute();
        $result->id=0;
        $result->name='';
        $result->name_en='';
        $result->ord= (Attribute::where(['parent_id'=>$parent_id])->count()) +1;
        $result->img='';
        $result->parent_id= $parent_id;
        return $result;
    }
}
