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

    public static function addPhoto($files, $id)
    {
        $arrayImage = [];

        foreach ($files as $file)
        {
            $arrayImage[] = Image::createPhoto($file, $id);
        }
        return $arrayImage;
    }

    public static function createPhoto($file, $id)
    {
        $path = public_path() . '/upload/';
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();

        $photo = new static;
        $photo->name = $filename;
        $photo->auto_id = $id;
        $photo->save();

        $img = Picture::make($file);
        $img->resize(800, 600, function ($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($path. $filename);
        $img->resize(170, 130, function ($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($path. '/thumbnail/' . $filename);

        return $photo;
    }
}
