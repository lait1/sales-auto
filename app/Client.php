<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Client
 *
 * @property int $id
 * @property string $fio
 * @property int|null $city_id
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $password
 * @property int|null $blocked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Favorite[] $favorite
 * @property-read int|null $favorite_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $order
 * @property-read int|null $order_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereBlocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereFio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $remember_token
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereRememberToken($value)
 */
class Client extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['fio', 'phone', 'email'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function room()
    {
        return $this->hasMany(Room::class);
    }
    public function generatePassword($password)
    {
        if ($password != null) {
            $this->password = bcrypt($password);
            $this->save();
        }
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
    public function blocked()
    {
        $this->blocked = 1;
        $this->save();
    }

    public function unlocked()
    {
        $this->blocked = 0;
        $this->save();
    }
    public function setCity($city)
    {
        $this->city_id = $city;
        $this->save();
    }
}
