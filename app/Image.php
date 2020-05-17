<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }
}
