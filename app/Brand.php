<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Brand
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ModelCar[] $modelcar
 * @property-read int|null $modelcar_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Brand extends Model
{
    protected $fillable = ['name'];

    public function modelcar()
    {
        return $this->hasMany(ModelCar::class);
    }

    public function countAuto()
    {
        $summ = 0;
        $modelcars = $this->modelcar;
        foreach ($modelcars as $model) {
            $summ += $model->auto()->count();
        }
        return $summ;
    }
}
