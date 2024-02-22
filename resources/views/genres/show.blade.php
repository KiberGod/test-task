@extends('layouts.layout')

@section('content')

    <div class="card">
        <div class="card-header">
            Действия с жанром {{$genre->name}}
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <a href="/genres/edit/{{$genre->id}}" class="btn btn-outline-primary" role="button">Редактировать</a>
                    </div>
                    <div class="col">
                        <form action="/genres/edit/{{$genre->id}}" method="post">
                            {{csrf_field()}}
                            {!! method_field('delete') !!}
                            <button type="submit" class="btn btn-outline-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="card">
        <div class="card-header">
            Фильмы жанра
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    @if(count($movies))
                        @foreach($movies as $movie)
                            <div class="col-md-12">
                                <a href="/movies/view/{{$movie->id}}" class="card-link">{{$movie->title}}</a>
                            </div>
                        @endforeach
                    @else
                        <div>Фильмы отсутствуют</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <br>
    @if ($movies->lastPage() > 1)
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
@endsection
