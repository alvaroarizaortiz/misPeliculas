<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Película</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        @include('includes.navbar')
    </header>
    <div class="container mt-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1><i class="fas fa-info-circle mr-2"></i>Detalles de la Película</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <h5 class="card-title"><i class="fas fa-heading mr-2"></i><strong>Título:</strong> {{ $movie->title }}</h5>
                                <p><i class="fas fa-tags mr-2"></i><strong>Género:</strong> {{ $movie->genre }}</p>
                                <p><i class="fas fa-calendar-alt mr-2"></i><strong>Año de Publicación:</strong> {{ $movie->release_year }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            @if($movie->reviews->isNotEmpty())
                                <ul class="list-group">
                                    @foreach($movie->reviews as $review)
                                        <li class="list-group-item">
                                            <h5 class="card-title"><i class="fas fa-star mr-2"></i>{{ $review->title }}</h5>
                                            <p class="card-text"><i class="fas fa-align-left mr-2"></i><strong>Reseña:</strong> {{ $review->description }}</p>
                                            <p class="card-text"><i class="fas fa-thumbs-up mr-2"></i><strong>Valoración: </strong> {{ $review->rating }}/5 <i class="fas fa-star"></i></p>

                                            <div class="btn-group" role="group" aria-label="Acciones">
                                                <form action="{{ route('reviews.edit', $review->id) }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit mr-1"></i>Editar reseña</button>
                                                </form>
                                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Eliminar reseña</button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No hay reseñas disponibles.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h1><i class="fas fa-image mr-2"></i>Imagen de la Película</h1>
                    </div>
                    <div class="card-body">
                        @if($movie->image)
                            <img src="{{ asset('storage/images/'.$movie->image) }}" alt="{{ $movie->title }}" style="max-width: 25vw; height: auto;">
                        @else
                            <p>No hay imagen disponible</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
