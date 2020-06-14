<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	protected $guard = 'admin';
	
    protected $fillable = ['name','brand_image'];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
