<?php

namespace App\Models\api;

use App\Models\Question;
use App\Models\QuestionsSendRequest;
use App\Models\Rate;
use App\Models\Role;
use App\Models\UsersCar;
use App\Models\UsersDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasProfilePhoto , SoftDeletes,TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','role_id','is_connect', 'mobile','email', 'password','onesignal_id','user_level','is_confirmed','activitation_code'
                ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function user_detail()
    {
        return $this->hasOne(UsersDetail::class);
    }

    public function user_cars()
    {
        // $results=UsersCar::select('users_cars.id', 'user_id', 'car_id', 'model_car_id', 'manufacturing_year', 'is_default_car','users_cars.created_at',
        //                         'cr.name','cr.name_en','crm.name as car_model_name','crm.name_en as car_model_name_en')
        //                         ->join('categories as cr','car_id','=','cr.id')
        //                         ->join('categories as crm','model_car_id','=','crm.id')
        //                         ->where('user_id',$this->id)
        //                         ->orderBy('created_at', 'DESC')
        //                         ->get();
        return $this->hasMany(UsersCar::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function questions_send_request()
    {
        return $this->hasMany(QuestionsSendRequest::class);
    }

    public function new_questions_send_request_count()
    {
        return $this->hasMany(QuestionsSendRequest::class)->where('status','new')->count();
    }

    public function rates()
    {
        return $this->hasMany(Rate::class,'rated_id');
    }

    public function rates_count()
    {
        return $this->hasMany(Rate::class,'rated_id');
    }

    public function getStarAttribute()
    {
        $ratingAvg = Rate::where('user_id',$this->id)->avg('rate');
        return ceil($ratingAvg);
    }

    public function answer_count()
    {
        return  $this->hasMany(QuestionsSendRequest::class)->where(['is_approved'=>'Y']);
    }

}
