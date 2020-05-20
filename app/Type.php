<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];

    public function auto()
    {
        return $this->hasMany(Auto::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function setCategory($id)
    {
        $this->category_id = $id;
        $this->save();
    }
}
