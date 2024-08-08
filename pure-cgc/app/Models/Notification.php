<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function get_new($type=0 ,$with_id=0)
    {
        $result = new Notification();
        $result->id=0;
        $result->title='';
        $result->title_en='';
        $result->img='';
        $result->to_users='';
        $result->onesignal_id='';
        $result->details='';
        $result->details_en='';
        $result->url_link='';
        $result->with_id= $with_id;
        $result->type= $type;
        return $result;
    }
    public function notification_status()
    {
        return $this->belongsToMany(NotificationUsersStatus::class);
    }
}
