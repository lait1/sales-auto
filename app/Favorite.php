<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
