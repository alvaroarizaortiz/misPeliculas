<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Películas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">    
</head>

<body>
    <header>
        @include('includes.navbar')
    </header>

    <div class="container">
        <div class="row row-equal-height">
            @foreach($movies as $movie)
            <div class="col-md-4 col-equal-height">
                <div class="card movie-box">
                    @if($movie->image)
                    <img src="{{ asset('storage/images/'.$movie->image) }}" alt="{{ $movie->title }}"
                        class="card-img-top">
                    @else
                    <p class="card-text">No hay imagen disponible</p>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text"><strong>Género:</strong> {{ $movie->genre }}</p>
                        <p class="card-text"><strong>Año de Publicación:</strong> {{ $movie->release_year }}</p>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">Ver detalles</a>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Estás seguro de que quieres eliminar esta película?')">Eliminar</button>
                        </form>
                        <div class="text-center mt-2">
                            <a href="{{ route('reviews.create', ['movie_id' => $movie->id]) }}"
                                class="btn btn-success">Añadir reseña</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-12 ">
                {{ $movies->links() }}
            </div>
        </div>
    </div>
</body>

</html>