<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function getUser()
    {
        if($this->user == null)
            return 'Без менеджера';
        return $this->user;
    }

    public function setComment($value)
    {
        $this->comment = $value;
        $this->save();
    }
}
