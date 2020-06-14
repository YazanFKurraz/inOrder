<?php

namespace App\Models;
use App\Models\Product;
use App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
        public $table = 'comments';
        
        protected $fillable = ['comment','admin_id','user_id','product_id'];

        public function product()
        {
            return $this->belongsTo(Product::class , 'product_id');
        }

        public function admin()
        {
            return $this->belongsTo(Admin::class , 'admin_id');
        }

        public function user()
        {
            return $this->belongsTo(User::class , 'user_id');
        }
}
