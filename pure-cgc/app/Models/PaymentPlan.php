<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentPlan extends Model
{
    protected $fillable =
    [
    'name',
    'name_en',
    'price',
    'img',
    'price_ryial',
    'price_dolar',
    'category_id',
    'details' ,
    'details_en',
    'color',
    'time',
];
    use HasFactory ;
    public function get_new()
    {
        $result = new PaymentPlan();
        $result->id=0;
        $result->name='';
        $result->name_en='';
        $result->img='';
        $result->price='';
        $result->price_ryial='';
        $result->price_dolar='';
        $result->details='';
        $result->details_en='';
        $result->color='';
        $result->time='';
        return $result;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
