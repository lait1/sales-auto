<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Picture;

/**
 * App\Post
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $title
 * @property string|null $image
 * @property string $content
 * @property int $draft
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereDraft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUserId($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    protected $fillable = ['title', 'content'];
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setImage($file)
    {
        if ($file == null){
            return;
        }
        $path = public_path() . '/upload/post/';
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();

        $img = Picture::make($file);
        $img->resize(700, 430, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($path . $filename);
        $this->image = $filename;
        $this->save();
    }

    public function setUser($id)
    {
        $this->user_id = $id;
        $this->save();
    }

    public function setDraft($value)
    {
        if ($value === "true"){
            return $this->inDraft();
        }
        return $this->outDraft();
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
}
