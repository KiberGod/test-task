@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            Создание нового жанра
        </div>
        <div class="card-body">
            <form action="/genres/create" method="post">

                {{csrf_field()}}
                <div class="form-group">
                    <label for="name"><h6>Название:</h6></label>
                    <input class="form-control cat-name-input" type="text" name="name" id="name" value="{{old('name')}}">
                </div>

                <br>
                <div class="form-group">
                    <button class="btn btn-outline-primary" type="submit">Создать</button>
                </div>

                @include('layouts.error')

            </form>
        </div>
    </div>
@endsection
