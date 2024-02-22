<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;

class GenresController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(GenreRequest $request)
    {
        Genre::create($request->validated());
        return redirect('/genres/view');
    }

    public function show(Genre $genre)
    {
        $movies = $genre->movies()->paginate(10);
        return view('genres.show', compact('genre', 'movies'));
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect('/genres/view');
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function update(Genre $genre, GenreRequest $request)
    {
        $validatedData = $request->validated();
        $genre->update(['name' => $validatedData['name']]);
        return redirect('/genres/view');
    }


    public function getAllGenres()
    {
        return response()->json(['genres' => Genre::all()], 200);
    }

    public function getMoviesByGenre($genreId)
    {
        $movies = Genre::findOrFail($genreId)->movies()->paginate(10);
        return response()->json(['movies' => $movies], 200);
    }
}
