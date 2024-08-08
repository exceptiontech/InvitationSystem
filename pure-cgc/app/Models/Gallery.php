<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory;
    use SoftDeletes;
    //protected $table = 'gallaries';
    public function get_new($type="0")
    {
        $result = new Gallery();
        $result->name='';
        $result->name_en='';
        $result->ord= Gallery::where(['type'=>$type])->count()+1;
        $result->img='';
        $result->type= $type;
        return $result;
    }
    public function scopeActive()
    {
        return $this->where('is_active','Y');
    }
    public function scopeOrderDesc()
    {
        return $this->orderBy('ord','DESC');
    }
}
