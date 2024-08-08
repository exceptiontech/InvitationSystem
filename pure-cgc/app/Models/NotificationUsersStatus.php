<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationUsersStatus extends Model
{
    use HasFactory;
    public $timestamps=false;
    // public static function boot()
    // {
    //     parent::boot();
    //     static::creating(function($model){
    //         $model->created_at=$model->freshTimeStamp();
    //     });
    // }
    public function get_new()
    {
        $result = new NotificationUsersStatus();
        $result->notification_id=0;
        $result->user_id=0;
        $result->status=0;
        return $result;
    }
}
