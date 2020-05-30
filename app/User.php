<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $login
 * @property int|null $role_id
 * @property int|null $blocked
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Auto[] $auto
 * @property-read int|null $auto_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\History[] $history
 * @property-read int|null $history_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $order
 * @property-read int|null $order_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[] $post
 * @property-read int|null $post_count
 * @property-read \App\Role|null $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBlocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
