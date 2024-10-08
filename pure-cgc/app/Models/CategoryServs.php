<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryServs extends Model
{
    use HasFactory;
    protected $fillable = [
          'name', 'name_en', 'url',
        'logo', 'img', 'ord', 'is_active'
    ];
}
