<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Setting extends Model
{
     protected $fillable = 
    [
    	'site_name','logo',
    	'phone','loaction',
    	'email','facebook_url',
    	'twitter_url','instagram_url',
    	'about_us','stock_threshold'
    ];
}
