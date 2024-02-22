@extends('layouts.layout')

@section('content')
    <script>
        window.onload = function () {
            @foreach($genres as $genre)
                setGenres('{{$genre->name}}', '{{$genre->id}}');
            @endforeach
        }
    </script>
    <script type="text/javascript" src="/src/js/movieCore.js"></script>

    <div class="card">
        <div class="card-header">
            Создание нового фильма
        </div>
        <div class="card-body">
            <form action="/movies/create" method="post" enctype='multipart/form-data'>

                {{csrf_field()}}
                <div class="form-group">
                    <label for="title"><h6>Название:</h6></label>
                    <input class="form-control cat-name-input" type="text" name="title" id="title" value="{{old('title')}}">
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
                    <button class="btn btn-outline-primary" type="submit">Создать</button>
                </div>
                @include('layouts.error')

            </form>
        </div>
    </div>
@endsection
