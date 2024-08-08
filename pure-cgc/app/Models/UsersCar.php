<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersCar extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps=false;
    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->created_at=$model->freshTimeStamp();
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function car()
    {
        return $this->belongsTo(Category::class,'car_id');
    }
    public function car_model()
    {
        return $this->belongsTo(Category::class,'model_car_id');
    }
}
