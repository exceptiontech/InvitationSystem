<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PureTeam extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table='pure_team';
    protected $fillable = ['name' , 'name_en' , 'details' , 'details_en' , 'Specialization' , 'Specialization_en' , 'img' , 'twitter' , 'facebook' , 'linkedin' , 'instagram'];

    public function scopeActive()
    {
        return $this->where('is_active','Y');
    }
    public function scopeOrderDesc()
    {
        return $this->orderBy('ord','DESC');
    }
    public function get_new()
    {
        $result = new PureTeam();
        $result->id='';
        $result->name='';
        $result->name_en='';
        $result->Specialization='';
        $result->Specialization_en='';
        $result->details='';
        $result->details_en='';
        $result->img='';
        $result->is_active= 'Y';
        $result->twitter= '';
        $result->facebook= '';
        $result->linkedin= '';
        $result->instagram= '';
        $result->description= '';
        return $result;
    }
}
