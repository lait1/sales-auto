<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
