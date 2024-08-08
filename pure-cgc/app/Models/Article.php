<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','type','name_en','details','details_en','img','img_thumbnail'];
    public function get_new($type=0,$category_id=0)
    {
        $result = new Article();
        $result->id=0;
        $result->name='';
        $result->name_en='';
        $result->ord= (Article::where(['type'=>$type, 'category_id'=>$category_id])->count()) +1;
        $result->img='';
        $result->details='';
        $result->details_en='';
        $result->auther='بيورسوفت';
        $result->video='';
        $result->file='';
        $result->parent_id= 0;
        $result->category_id= $category_id;
        $result->type= $type;
        return $result;
    }
    public function scopeNewest()
    {
        return $this->orderBy('created_at','DESC');
    }
}
