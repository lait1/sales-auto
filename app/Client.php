<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
