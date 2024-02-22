<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Genre;
use App\Models\Movie;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::where('publication_status', true)->paginate(20);
        return view('movies.index', compact('movies'));
    }

    public function showUnpublished()
    {
        $movies = Movie::where('publication_status', false)->paginate(20);
        return view('movies.unpublished', compact('movies'));
    }

    public function posting(Movie $movie)
    {
        $movie->update(['publication_status' => true]);
        return redirect()->back()->with('success');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect('/movies/view');
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(MovieRequest $request)
    {
        $movie = Movie::create(Movie::getRequestWithFilePath($request));
        $movie->setGenresByMovie($request);
        return redirect('/movies/view');
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Movie $movie, MovieRequest $request)
    {
        $movie->setGenresByMovie($request);
        $movie->update(Movie::getRequestWithFilePath($request));
        return redirect('/movies/view');
    }

    public function deletePoster(Movie $movie)
    {
        $movie->update(['poster' => null]);
        return redirect()->back()->with('success');
    }


    public function getAllMovies()
    {
        return response()->json(['movies' => Movie::paginate(20)], 200);
    }

    public function getMovie($id)
    {
        return response()->json(['movies' => Movie::findOrFail($id)], 200);
    }
}
