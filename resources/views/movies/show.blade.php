@extends('layouts.layout')

@section('content')

    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-2">
                @if($movie->poster)
                    <img width="150" src="{{asset($movie->poster)}}">
                @else
                    <img width="150" src="../../src/img/default_movie_poster.png">
                @endif
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

                    <br>
                    <br>
                    @if($movie->publication_status)
                        <p class="card-text"><small class="text-muted">Статус: <span class="text-primary">Опубликовано</span></small></p>
                    @else
                        <p class="card-text"><small class="text-muted">Статус: <span class="text-danger">Не опубликовано</span></small></p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Действия с фильмом {{$movie->title}}
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <a href="/movies/edit/{{$movie->id}}" class="btn btn-outline-primary" role="button">Редактировать</a>
                    </div>
                    <div class="col-md-8">
                        <form action="/movies/edit/{{$movie->id}}" method="post">
                            {{csrf_field()}}
                            {!! method_field('delete') !!}
                            <button type="submit" class="btn btn-outline-danger">Удалить</button>
                        </form>
                    </div>
                    @if(!$movie->publication_status)
                        <div class="col-md-2">
                            <form action="/movies/posting/{{$movie->id}}" method="post">
                                {{csrf_field()}}
                                {!! method_field('patch') !!}
                                <button type="submit" class="btn btn-outline-success">Опубликовать!</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
