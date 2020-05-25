<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Favorite
 *
 * @property int $id
 * @property int|null $client_id
 * @property int|null $auto_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Auto|null $auto
 * @property-read \App\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favorite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favorite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favorite query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favorite whereAutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favorite whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favorite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favorite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Favorite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
