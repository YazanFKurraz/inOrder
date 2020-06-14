<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Admin;

class Category extends Model
{
       protected $fillable = ['name','image'];

	    public function product()
	    {
	    	return $this->hasMany(Product::class , 'category_id','id');
	    }
	    
}
