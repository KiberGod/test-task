@extends('layouts.layout')

@section('content')
    <script>
        window.onload = function () {
            @foreach($genres as $genre)
                setGenres('{{$genre->name}}', '{{$genre->id}}');
            @endforeach

            @foreach($movie->genres as $genre)
                setOldGenresInput('{{$genre->id}}');
            @endforeach
        }
    </script>
    <script type="text/javascript" src="/src/js/movieCore.js"></script>

    <div class="card">
        <div class="card-header">
            Редактирование фильма {{$movie->title}}
        </div>

        <div class="row">
            <div class="col-3">
                @if($movie->poster)
                    <img width="150" src="{{asset($movie->poster)}}">
                @else
                    <img width="150" src="../../src/img/default_movie_poster.png">
                @endif
            </div>
            @if($movie->poster)
                <div class="col-9">
                    <br>
                    <form action="/movies/deletePoster/{{$movie->id}}" method="post">
                        {{csrf_field()}}
                        {!! method_field('patch') !!}
                        <button type="submit" class="btn btn-outline-danger">Удалить постер</button>
                    </form>
                </div>
            @endif
        </div>


        <div class="card-body">
            <form action="/movies/edit/{{$movie->id}}" method="post" enctype='multipart/form-data'>

                {{csrf_field()}}
                {!! method_field('patch') !!}

                <div class="form-group">
                    <label for="title"><h6>Название:</h6></label>
                    <input class="form-control cat-name-input" type="text" name="title" id="title" value="{{$movie->title}}">
                </div>

                <div>
                    <div id="insertInputPlace"></div>
                    <div class="d-inline">
                        <button type="button" class="btn btn-primary" onclick="createGenresInput()">+ Жанр</button>
                    </div>
                </div>

                <br>
                <input name="poster" type="file" id="poster">

                <br>
                <br>
                <div class="form-group">
                    <button class="btn btn-outline-primary" type="submit">Сохранить</button>
                </div>
                @include('layouts.error')

            </form>
        </div>
    </div>
@endsection
