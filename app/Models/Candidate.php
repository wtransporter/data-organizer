<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'birth_date'
    ];

    public function technologies()
    {
        return $this->belongsToMany(Technology::class)->withTimestamps();
    }

    public function assignTechnology($technologies)
    {
        if (is_null($technologies)) {
            return $this->technologies()->detach();
        }

        return $this->technologies()->sync($technologies);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function addTag($title)
    {
        return $this->tags()->create(['title' => $title]);
    }
}
