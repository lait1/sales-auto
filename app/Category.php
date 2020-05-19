<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];

    public function type()
    {
        return $this->hasMany(Type::class);
    }
}
