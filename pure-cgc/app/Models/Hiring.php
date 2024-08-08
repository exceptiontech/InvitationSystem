<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiring extends Model
{

    use HasFactory;
    protected $fillable = [
        'type' ,
         'name' ,
         'email' ,
         'phone' ,
         'field_id' ,
         'cv' ,
         'address' ,
         'birth_date' ,
         'expected_sal' ,
         'gender' ,
         'experience_years' ,
         'summary'
        ];

        public function get_new()
        {
           $result = new Hiring();
           $result->id = 0;
           $result -> type = 0 ;
           $result -> name =  '' ;
           $result -> email = '' ;
           $result -> phone = '' ;
           $result -> field_id = '' ;
           $result -> cv  = '' ;
           $result -> address = '' ;
           $result -> birth_date = '' ;
           $result -> expected_sal = 0 ;
           $result -> gender = 0 ;
           $result -> experience_years = 0 ;
           $result -> summary = '';
        }
}
