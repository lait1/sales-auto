<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function auto()
    {
        return $this->hasMany(Auto::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
