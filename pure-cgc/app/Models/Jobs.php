<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = [
      'name' ,
     'field_id' ,
     'experience_years' ,
     'description' ,
     'requirement' ,
     'gender' ,
     'date' ,
     'expire_date'
    ];

    public function get_new()
    {
        $result = new Jobs();
        $result->name = '';
        $result->field_id = '';
        $result->experience_years = 0;
        $result->description = '';
        $result->requirement = '';
        $result->gender = '';
        $result->date = '';
        $result->expire_date = '';
    }


    public function field()
    {
        return $this->belongsTo(Field::class , 'field_id');
    }

}
