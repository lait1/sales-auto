<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function modelcar()
    {
        return $this->hasMany(ModelCar::class);
    }
}
