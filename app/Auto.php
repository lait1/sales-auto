<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $fillable = ['name'];

    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function modelcar()
    {
        return $this->belongsTo(ModelCar::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
