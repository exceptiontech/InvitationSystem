<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['country_id']; // Add country_id to the fillable property

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->created_at = $model->freshTimeStamp();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(CountriesCity::class, 'city_id');
    }

    public function country()
    {
        return $this->belongsTo(CountriesCity::class, 'city_id');
    }
}
