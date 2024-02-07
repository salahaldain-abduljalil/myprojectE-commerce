<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function productphotos(){
        return $this->hasMany(ProductPhoto::class,'product_id');
    }
}
