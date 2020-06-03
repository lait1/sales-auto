<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property int $id
 * @property int|null $client_id
 * @property int $auto_id
 * @property int|null $user_id
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Auto $auto
 * @property-read \App\Client|null $client
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereAutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    protected $fillable = ['auto_id', 'client_id'];

    public static function add($auto, $user)
    {
        $order = new static;
        $order->client_id = $user;
        $order->auto_id = $auto;
        $order->save();
        return $order;

    }

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

    public function setUser($value)
    {
        if ($value && $this->user_id==null) {
            $this->user_id = $value;
            $this->save();
        }
    }

    public function setComment($value)
    {
        if ($value) {
            $this->comment = $value;
            $this->save();
        }
    }
}
