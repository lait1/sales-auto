<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
