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
        <div class="card-body">
            <form action="/movies/edit/{{$movie->id}}" method="post">

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
                <div class="form-group">
                    <button class="btn btn-outline-primary" type="submit">Сохранить</button>
                </div>
                @include('layouts.error')

            </form>
        </div>
    </div>
@endsection
