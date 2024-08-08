<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id'];
    protected $table = 'user_category';

    public function user()
    {
        return $this->belongsTo(User::class)->with('user_detail');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }}
