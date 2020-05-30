<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ModelCar
 *
 * @property int $id
 * @property string $name
 * @property int|null $brand_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Auto[] $auto
 * @property-read int|null $auto_count
 * @property-read \App\Brand|null $brand
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModelCar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModelCar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModelCar query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModelCar whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModelCar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModelCar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModelCar whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModelCar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ModelCar extends Model
{
    protected $fillable = ['name'];

    public function auto()
    {
        return $this->hasMany(Auto::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function setBrand($id)
    {
        $this->brand_id = $id;
        $this->save();
    }
}
