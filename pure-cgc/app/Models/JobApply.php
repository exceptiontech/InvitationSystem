<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,
       'cv' ,
       'job_id' ,
       'email' ,
       'phone' ,
       'address' ,
       'national_id' ,
       'birth_date' ,
       'expected_sal' ,
       'experience_years' ,
       'marital_status'
      ];
}
