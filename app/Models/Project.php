<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static where(string $string, int|string|null $id)
 * @method static findOrFail(mixed $project_id)
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getImagePathAttribute()
    {
        if (is_null($this->image)) {
            return null;
        }

        return asset('storage/' . $this->image);
    }
}
