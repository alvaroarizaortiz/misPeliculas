<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Película</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        @include('includes.navbar')
    </header>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data" class="custom-form">
                    @csrf
                    @method('PUT')
                    <h1 class="text-center mb-4"><i class="fas fa-edit mr-2"></i>Editar Película</h1>
                    <div class="form-group">
                        <label for="title"><i class="fas fa-heading mr-2"></i>Título:</label>
                        <input type="text" id="title" name="title" value="{{ $movie->title }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="genre"><i class="fas fa-tags mr-2"></i>Género:</label>
                        <input type="text" id="genre" name="genre" value="{{ $movie->genre }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="release_year"><i class="fas fa-calendar-alt mr-2"></i>Año de publicación:</label>
                        <input type="number" id="release_year" name="release_year" value="{{ $movie->release_year }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="image"><i class="fas fa-image mr-2"></i>Imagen:</label>
                        <input type="file" id="image" name="image" class="form-control-file" accept="image/*">
                    </div>

                    @if ($movie->image)
                    <div class="form-group">
                        <p><strong>Imagen actual:</strong></p>
                        <img src="{{ asset('storage/images/' . $movie->image) }}" alt="{{ $movie->title }}" style="max-width: 200px;">
                    </div>
                    @endif

                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save mr-2"></i>Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
