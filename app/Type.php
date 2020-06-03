<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Type
 *
 * @property int $id
 * @property string $name
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Auto[] $auto
 * @property-read int|null $auto_count
 * @property-read \App\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

    /**
     * @param $value
     * @return \Illuminate\Support\Collection|int|array|null
     */
    public static function getCategoryTypes($value)
    {
        if ($value) {
            $category = Category::where('slug', $value)->firstOrFail();
            if ($category->id ===1) {
                return (array)$category->id;
            }
            return Type::where('category_id', $category->id)->pluck('id');
        }
        return null;
    }

    public static function getCurrentType()
    {
        $category = Category::getCurrentCategory();
        return Type::where('category_id', $category->id)->get();



    }
}
