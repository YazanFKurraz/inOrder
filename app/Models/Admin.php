<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Product;

class Admin extends Authenticatable
{
	use Notifiable;
	
	// protected $guard = 'admin';

    protected $fillable = ['name','email','image','password','phone'];

	 protected $hidden = [
        'password', 'remember_token',
    ];

	public function product()
    {
        return $this->hasMany(Product::class);
    }

    
}
