<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['title', 'description', 'rating', 'movie_id'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
