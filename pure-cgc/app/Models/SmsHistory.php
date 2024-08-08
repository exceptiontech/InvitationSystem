<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsHistory extends Model
{
    use HasFactory;
    public $timestamps=false;
    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->created_at=$model->freshTimeStamp();
        });
    }
    public function get_new()
    {
        $result = new SmsHistory();
        $result->type= 0;
        $result->user_id= 0;
        $result->mobile='';
        $result->sms='';
        $result->status='';
        return $result;
    }
}
