<?php

namespace App;

use App\Lijst;
use App\Unit;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function lijst()
    {
    	return $this->belongsToMany(Lijst::class);
    }

    public function unit()
    {
    	return $this->belongsToMany(Unit::class);
    }
}
