<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\History
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $auto_id
 * @property string $action
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Auto $auto
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereAutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereUserId($value)
 * @mixin \Eloquent
 */
class History extends Model
{
    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
