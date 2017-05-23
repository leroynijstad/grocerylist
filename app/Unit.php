<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
	public function product()
	{
		return $this->belongsToMany(Product::class);
	}
}
