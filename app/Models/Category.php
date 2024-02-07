<?php

namespace App\Models;
use APP\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Category extends Model
{
    //public function rela(){
    //return $this->hasone('products','category_id');

    use HasFactory;
   // protected $fillable=[ 'name', 'description', 'imagepath'];

}
