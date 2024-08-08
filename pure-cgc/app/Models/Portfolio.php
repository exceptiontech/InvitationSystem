<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Portfolio extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name', 'name_en', 'url',
      'logo', 'img', 'ord', 'is_active'
  ];
    public function get_new($type=0 ,$category_id=0)
    {
        $result = new Portfolio();
        $result->id=0;
        $result->ord= (Portfolio::where(['type'=>$type, 'category_id'=>$category_id])->count()) +1;
        $result->type= $type;
        $result->category_id= $category_id;
        $result->name='';
        $result->name_en='';
        $result->img='';
        $result->logo='';
        $result->details='';
        $result->details_en='';
        $result->url_link='';
        return $result;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
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
