<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];

    public function get_new($type=0, $parent_id=0)
    {
        $result = new Category();
        $result->id=0;
        $result->name='';
        $result->name_en='';
        $result->ord= (Category::where(['type'=>$type , 'parent_id' => $parent_id])->count()) +1;
        $result->img='';
        $result->details='';
        $result->details_en='';
        $result->video='';
        $result->parent_id= $parent_id;
        $result->type= $type;
        return $result;
    }
    public function categories()
{
    return $this->belongsToMany(Category::class, 'user_categories');
}
public function users()
{
    return $this->hasMany(UserCategory::class)->with('user');
}
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    public function offer()
    {
        return $this->hasMany(RequestOffer::class);
    }
    public function article()
    {
        return $this->hasMany(Article::class);
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
