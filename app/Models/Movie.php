<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'publication_status', 'poster'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movie','movie_id', 'genre_id');
    }
}
