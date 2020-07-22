<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Room extends Model
{
    protected $fillable = ['client_id', 'auto_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }
    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function lastDateMessage()
    {
        $time = $this->message()->orderBy('created_at', 'desc')->first();
        if ($time) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $time['created_at'])->format('d.m.Y H:i:s');
        }
        return 'Нет данных';
    }
}
