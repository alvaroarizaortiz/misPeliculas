<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <header>
        @include('includes.navbar')
    </header>
<!-- Intento de vista para el buscador, pero no logré hacer funcionar la barra de búsqueda-->
    <div class="container">
        <h1>Resultados de Búsqueda</h1>
        <div class="row">
            @foreach($movies as $movie)
            <div class="col-md-4">
                <div class="card movie-box">
                    @if($movie->image)
                    <img src="{{ asset('storage/images/'.$movie->image) }}" alt="{{ $movie->title }}" class="card-img-top">
                    @else
                    <p class="card-text">No hay imagen disponible</p>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text"><strong>Género:</strong> {{ $movie->genre }}</p>
                        <p class="card-text"><strong>Año de Publicación:</strong> {{ $movie->release_year }}</p>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">Ver detalles</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>

</html>
