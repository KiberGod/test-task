<?php

namespace App\Models;

use App\Http\Requests\MovieRequest;
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

    public function setGenresByMovie($request)
    {
        $genreAttributes = array_filter($request->all(), function($key) {
            return strpos($key, 'genre_') !== false;
        }, ARRAY_FILTER_USE_KEY);

        $uniqueGenres = array_unique($genreAttributes);

        $this->genres()->sync($uniqueGenres);
    }

    public static function getRequestWithFilePath(MovieRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('poster')) {
            $fileName = time().$request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('images', $fileName, 'public');
            $validatedData['poster'] = '/storage/'.$path;
        }

        return $validatedData;
    }
}
