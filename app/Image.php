<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Picture;

class Image extends Model
{
    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }

    public static function createPhoto($file, $UUID = null)
    {
        $path = public_path() . '/upload/';
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();

        $img = Picture::make($file);
        $img->resize(800, 600, function ($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($path. '/thumbnail/' . $filename);
        return $img;
    }
}
