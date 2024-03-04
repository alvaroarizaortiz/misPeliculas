<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'image', 'genre', 'release_year'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
