<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function get_new()
    {
      
        $result = new Field();
        $result->id = 0;
        $result->name = '';

    }
}
