<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_title',
        'organization',
        'event_date',
        'event_time',
        'event_type',
        'location_link',
        'send_date',
        'send_time',
        'resend_date',
        'resend_time',
        'send_to',
        'schedule_invitation',
        'send_now',
        'send_by_email',
        'send_by_whatsapp',
        'img',
        'subject'
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}
