<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function history()
    {
        return $this->hasMany(History::class);
    }
    public function auto()
    {
        return $this->hasMany(Auto::class);
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function toggleStatus()
    {
        if ($this->blocked) {
            return $this->unlocked();
        } else {
            return $this->blocked();
        }
    }
    public function setBlock($value)
    {
        $this->blocked = $value;
        $this->save();
    }
    private function blocked()
    {
        $this->blocked = 1;
        $this->save();
    }

    private function unlocked()
    {
        $this->blocked = 0;
        $this->save();
    }
    public function setRole($role)
    {
        $this->role_id = $role;
        $this->save();
    }
}
