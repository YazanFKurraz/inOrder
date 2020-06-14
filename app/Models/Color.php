<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Color extends Model
{
    protected $fillable = ['color','color_name'];

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_colors'); 
    }
}
