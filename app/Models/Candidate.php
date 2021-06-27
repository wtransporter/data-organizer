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
}
