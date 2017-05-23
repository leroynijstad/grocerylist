<?php

namespace App;

use App\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Lijst extends Model
{
    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
