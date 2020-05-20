<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function modelcar()
    {
        return $this->hasMany(ModelCar::class);
    }
}
