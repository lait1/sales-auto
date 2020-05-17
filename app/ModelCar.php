<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelCar extends Model
{
    public function auto()
    {
        return $this->hasMany(Auto::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
