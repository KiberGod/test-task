@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            Действия
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="/movies/create" class="btn btn-outline-primary" role="button">Добавить новый фильм</a>
                    </div>

                    <div class="col-md-9">
                        <a href="/movies/unpublished" class="btn btn-outline-primary" role="button">К списку неопубликованных фильмов</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($movies->lastPage() > 1)
        <br>
        <nav>
            <ul class="pagination">
                @foreach ($movies->getUrlRange(1, $movies->lastPage()) as $page => $url)
                    <li class="page-item {{ ($movies->currentPage() == $page) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
    @endif

    @if(count($movies))
        <br>
        <div class="card">
            <div class="card-header">
                Список опубликованных фильмов
            </div>

            @foreach($movies as $movie)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-2">
                            <img width="150" src="../src/img/default_movie_poster.png">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><a href="/movies/view/{{$movie->id}}" class="card-link">{{$movie->title}}</a></h5>
                                <p class="card-text">Описание фильма описание фильма описание фильма описание фильма описание фильма описание фильма описание фильма.</p>
                                <p class="card-text"><small class="text-muted">Жанры:</small></p>
                                @if(count($movie->genres))
                                    @foreach($movie->genres as $genre)
                                        <a href="/genres/view/{{$genre->id}}" class="card-link">{{$genre->name}}</a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div>Фильмы отсутствуют</div>
    @endif

@endsection
