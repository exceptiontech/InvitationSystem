<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsImage extends Model
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
}
