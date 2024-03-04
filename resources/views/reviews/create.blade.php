<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Reseña</title>
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
                <form action="{{ route('reviews.store') }}" method="POST" class="custom-form">
                    @csrf
                    <h1 class="text-center mb-4"><i class="fas fa-pen mr-2"></i>Agregar Reseña</h1>
                    <input type="hidden" name="movie_id" value="{{ request()->query('movie_id') }}">
                    <div class="form-group">
                        <label for="title"><i class="fas fa-heading mr-2"></i>Título:</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description"><i class="fas fa-file-alt mr-2"></i>Descripción:</label>
                        <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="rating"><i class="fas fa-star mr-2"></i>Valoración:</label>
                        <input type="number" id="rating" name="rating" class="form-control" min="1" max="5" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save mr-2"></i>Guardar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
