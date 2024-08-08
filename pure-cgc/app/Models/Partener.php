<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partener extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $fillable = ['name' , 'img' , 'link' , 'description'];


    public function get_new()
    {
        $result = new Partener();
        $result->id='';
        $result->name='';
        $result->img='';
        $result->link= '';
        $result->description= '';
        return $result;
    }
}
