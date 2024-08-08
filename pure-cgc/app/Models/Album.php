<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    public function get_new($type=0)
    {
        $result = new Album();
        $result->name='';
        $result->name_en='';
        $result->img='';
        $result->cover_photo='';
        $result->address='';
        $result->address_en='';
        $result->details='';
        $result->details_en='';
        $result->year= date('Y');
        $result->date= date('Y-m-d');
        $result->type= $type;
        return $result;
    }
}
