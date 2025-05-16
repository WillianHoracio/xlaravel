<nav class="navbar navbar-expand-lg bg-body-primary bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand text-light fs-3 fw-bold" href="{{ url('/') }}">XISTEMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 20px;">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-6 fw-bold text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        INGREDIENTES
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('ingredients.index') }}">Consultar</a></li>
                        <li><a class="dropdown-item" href="{{ route('ingredients.create') }}">Cadastrar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-6 fw-bold text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ESTOQUE
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('stock.index') }}">Consultar</a></li>
                        <li><a class="dropdown-item" href="{{ route('stock.create') }}">Cadastrar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>