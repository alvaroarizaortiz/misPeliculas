<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <!-- Icono y título "PELICULITAS" -->
    <a class="navbar-brand d-flex align-items-center text-white" href="{{ route('movies.index') }}">
        <i class="fas fa-film"></i>
        PELICULITAS
    </a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('movies.index') }}">
                <i class="fas fa-home"></i> Inicio
            </a>
        </li>        
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('movies.create') }}">
                <i class="fas fa-plus-circle"></i> Añadir una película
            </a>            
        </li>
    </ul>
    <form class="form-inline" action="" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar una peliculita" aria-label="Buscar" name="search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</nav>
