@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            Редактирование жанра {{$genre->name}}
        </div>
        <div class="card-body">
            <form action="/genres/edit/{{$genre->id}}" method="post">

                {{csrf_field()}}
                {!! method_field('patch') !!}
                <div class="form-group">
                    <label for="name"><h6>Название:</h6></label>
                    <input class="form-control cat-name-input" type="text" name="name" id="name" value="{{$genre->name}}">
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
