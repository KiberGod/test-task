<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test task</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<br>
<div class="container">
    <div class="row">
        <div class="col-1"><h5><a href="/" class="card-link">Home</a></h5></div>
        <div class="col-1"><h5><a href="/genres/view" class="card-link">Жанры</a></h5></div>
        <div class="col-1"><h5><a href="/movies/view" class="card-link">Фильмы</a></h5></div>
    </div>
    <br>
    @yield('content')
</div>

</body>
</html>
