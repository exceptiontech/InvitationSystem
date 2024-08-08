<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsAttribute extends Model
{
    use HasFactory  , SoftDeletes;
    public $timestamps=false;
    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->created_at=$model->freshTimeStamp();
        });
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
