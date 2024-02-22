@extends('layouts.layout')

@section('content')
    @if(count($genres))
        <div class="card">
            <div class="card-header">
                Список всех жанров
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        @foreach($genres as $genre)
                            <div class="col-md-6">
                                <a href="/genres/view/{{$genre->id}}" class="card-link">{{$genre->name}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else
        <div>Жанры отсутствуют</div>
    @endif

    <br>
    <div class="card">
        <div class="card-header">
            Действия
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <a href="/genres/create" class="btn btn-outline-primary" role="button">Добавить новый жанр</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
