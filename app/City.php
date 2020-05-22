<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\City
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Auto[] $auto
 * @property-read int|null $auto_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Client[] $client
 * @property-read int|null $client_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class City extends Model
{
    protected $fillable = ['name'];

    public function auto()
    {
        return $this->hasMany(Auto::class);
    }
    public function client()
    {
        return $this->hasMany(Client::class);
    }
}
