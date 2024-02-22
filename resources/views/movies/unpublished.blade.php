@extends('layouts.layout')

@section('content')

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
                Список не опубликованных фильмов
            </div>

            @foreach($movies as $movie)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-2">
                            @if($movie->poster)
                                <img width="150" src="{{asset($movie->poster)}}">
                            @else
                                <img width="150" src="../src/img/default_movie_poster.png">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><a href="/movies/view/{{$movie->id}}" class="card-link text-danger">{{$movie->title}}</a></h5>
                                <p class="card-text">Описание фильма описание фильма описание фильма описание фильма описание фильма описание фильма описание фильма.</p>
                                <p class="card-text"><small class="text-muted">Жанры:</small></p>
                                @if(count($movie->genres))
                                    @foreach($movie->genres as $genre)
                                        <a href="/genres/view/{{$genre->id}}" class="card-link">{{$genre->name}}</a>
                                    @endforeach
                                @endif

                                <br>
                                <br>
                                <form action="/movies/posting/{{$movie->id}}" method="post">
                                    {{csrf_field()}}
                                    {!! method_field('patch') !!}
                                    <button type="submit" class="btn btn-outline-success">Опубликовать!</button>
                                </form>
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
