<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Auto
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $type_id
 * @property int|null $modelcar_id
 * @property int|null $status_id
 * @property int|null $city_id
 * @property string|null $year
 * @property string|null $drive
 * @property string|null $transmission
 * @property string|null $price
 * @property string|null $description
 * @property int $draft
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Favorite[] $favorite
 * @property-read int|null $favorite_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\History[] $history
 * @property-read int|null $history_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $image
 * @property-read int|null $image_count
 * @property-read \App\ModelCar|null $modelcar
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $order
 * @property-read int|null $order_count
 * @property-read \App\Status|null $status
 * @property-read \App\Type|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereDraft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereDrive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereModelcarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereTransmission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereYear($value)
 * @mixin \Eloquent
 */
class Auto extends Model
{
    protected $fillable = [
        'type_id', 'modelcar_id', 'status_id', 'city_id', 'user_id',
       'name', 'draft', 'year', 'mileage', 'transmission',
        'fuel', 'drive', 'price', 'description',
        'keywords', 'title', 'seo_desc'
        ];

    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function modelcar()
    {
        return $this->belongsTo(ModelCar::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toggleDraft()
    {
        if ($this->draft) {
            return $this->outDraft();
        } else {
            return $this->inDraft();
        }
    }

    private function inDraft()
    {
        $this->draft = 1;
        $this->save();
    }

    private function outDraft()
    {
        $this->draft = 0;
        $this->save();
    }
    public function setUser($user)
    {
        $this->user_id = $user;
        $this->save();
    }
}
