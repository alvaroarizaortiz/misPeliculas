<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Película</title>
</head>

<body>
    <h1>{{ $movie->title }}</h1>
    <p>{{ $movie->description }}</p>
    <p>Año de Publicación: {{ $movie->release_year }}</p>
    <img src="{{ asset('storage/app/public/images/' . $movie->image) }}" alt="{{ $movie->title }}" style="max-width: 200px;">

    <h2>Reseñas</h2>
    @if ($movie->reviews->isNotEmpty())
    <ul>
        @foreach ($movie->reviews as $review)
        <li>
            <p><strong>Valoración:</strong> {{ $review->rating }}</p>
            @if (!empty($review->comment))
            <p><strong>Comentario:</strong> {{ $review->description }}</p>
            @endif
            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar Reseña</button>
            </form>
        </li>
        @endforeach
    </ul>
    @else
    <p>No hay reseñas disponibles.</p>
    @endif

    <a href="{{ route('reviews.create') }}">Agregar Reseña</a>
</body>

</html>
