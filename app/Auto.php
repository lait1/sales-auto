<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

/**
 * App\Auto
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $type_id
 * @property int|null $model_car_id
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
 * @property int|null $user_id
 * @property string|null $mileage
 * @property string|null $fuel
 * @property string|null $keywords
 * @property string|null $title
 * @property string|null $seo_desc
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereFuel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereSeoDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereUserId($value)
 * @property string|null $slug
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto draft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereSlug($value)
 */
class Auto extends Model
{
    use Sluggable;
    protected $fillable = [
        'type_id',
        'model_car_id',
        'status_id',
        'city_id',
        'user_id',
        'name',
        'draft',
        'year',
        'mileage',
        'transmission',
        'fuel',
        'drive',
        'price',
        'description',
        'keywords',
        'title',
        'seo_desc'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

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

    public function getType()
    {
        if ($this->type != null) {
            return $this->type->name;
        }
        return 'Нет данных';
    }

    public function getCity()
    {
        if ($this->city != null) {
            return $this->city->name;
        }
        return 'Нет данных';
    }

    public function getStatus()
    {
        if ($this->status != null) {
            return $this->status->name;
        }
        return 'Нет данных';
    }

    public function getMileage()
    {
        if ($this->mileage != null) {
            return $this->mileage;
        }
        return 'Нет данных';
    }

    public function getTransmission()
    {
        if ($this->transmission != null) {
            return $this->transmission;
        }
        return 'Нет данных';
    }

    public function getDrive()
    {
        if ($this->drive != null) {
            return $this->drive;
        }
        return 'Нет данных';
    }

    public function getFuel()
    {
        if ($this->fuel != null) {
            return $this->fuel;
        }
        return 'Нет данных';
    }

    public function getYear()
    {
        if ($this->year != null) {
            return $this->year;
        }
        return 'Нет данных';
    }

    public function getPrice()
    {
        if ($this->price != null) {
            return number_format($this->price, 0, ',', ' ');
        }
        return 'Нет данных';
    }

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d.m.Y H:i:s');
    }
    public function getFirstImage()
    {
        if($this->image->first() != null)
        {
            $image = $this->image->first();
            return $image->name;
        }
        return 'no-image.png';
    }
    public function scopeDraft($query, $value)
    {
        return $query->where('draft', $value);
    }

    public function scopeCity($query, $value)
    {
        if ($value) {
            return $query->Where('city_id', $value);
        }
        return $query;
    }

    public function scopeCategory($query, $value)
    {
        if ($value != null) {
            return $query->WhereIn('type_id', $value);
        }
        return $query;
    }

    public function scopeType($query, $value)
    {
        if ($value != null) {
            return $query->Where('type_id', $value);
        }
        return $query;
    }

    public function scopeBrand($query, $value)
    {
        if ($value != null) {
            return $query->WhereIn('model_car_id', $value);
        }
        return $query;
    }
    public function scopeModel($query, $value)
    {
        if ($value != null) {
            return $query->Where('model_car_id', $value);
        }
        return $query;
    }
    public function scopeTextSearch($query, $value)
    {
        if ($value) {
            return $query->where('name', 'like', "%{$value}%")
                ->orWhere('slug', 'like', "%{$value}%");
        }
        return $query;
    }

    public function scopeDrive($query, $value)
    {
        if ($value) {
            return $query->where('drive', $value);
        }
        return $query;
    }

    public function scopeTransmission($query, $value)
    {
        if ($value) {
            return $query->where('transmission', $value);
        }
        return $query;
    }

    public function scopeFuel($query, $value)
    {
        if ($value) {
            return $query->where('fuel', $value);
        }
        return $query;
    }

    public function scopeStatus($query, $value)
    {
        if ($value) {
            return $query->where('status_id', $value);
        }
        return $query;
    }

    public function scopeYear($query, $from, $to)
    {
        if ($from || $to) {
            return $query->whereBetween('year', [$from, $to]);
        }
        return $query;
    }

    public function scopePrice($query, $from,  $to)
    {
        if ($from && $to) {
            return $query->whereBetween('price', [(int)$from, (int)$to]);
        }
        if ($from){
            return $query->where('price', '>', (int)$from);
        }
        if ($to){
            return $query->where('price', '<', (int)$to);
        }
        return $query;
    }


}

