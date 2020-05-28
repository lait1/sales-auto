<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Picture;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

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
        $img->resize(800, 600, function ($constraint) {
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
