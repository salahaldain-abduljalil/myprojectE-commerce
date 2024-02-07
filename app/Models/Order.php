<?php

namespace App\Models;
use App\Models\orderdetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function orderdetails(){
        return $this->hasMany(orderdetails::class);
    }
}
