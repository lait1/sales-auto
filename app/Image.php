<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Picture;

/**
 * App\Image
 *
 * @property int $id
 * @property string $name
 * @property int $auto_id
 * @property int|null $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Auto $auto
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereAutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
