<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];

    public function auto()
    {
        return $this->hasMany(Auto::class);
    }
    public function client()
    {
        return $this->hasMany(Client::class);
    }
}
