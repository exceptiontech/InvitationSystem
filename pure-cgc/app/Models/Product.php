<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function get_new($company_id=0 ,$category_id=0)
    {
        $result = new Product();
        $result->id=0;
        $result->ord= (Product::where(['company_id'=>$company_id, 'category_id'=>$category_id])->count()) +1;
        $result->company_id= $company_id;
        $result->category_id= $category_id;
        $result->name='';
        $result->name_en='';
        $result->img='';
        $result->details='';
        $result->details_en='';
        $result->url='';
        $result->label='';
        $result->label_en='';
        $result->product_code=randomNumber(9);
        $result->hash_number='';
        $result->barcode='';
        $result->barcode_number='';
        return $result;
    }

    public function images()
    {
        return $this->hasMany(ProductsImage::class);
    }
    public function attributes()
    {
        return $this->hasMany(ProductsAttribute::class);
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }
}
