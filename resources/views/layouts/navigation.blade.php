<nav class="navbar navbar-expand-xl navbar-dark bg-dark position-fixed z-3" >
    <div class="container-fluid">
        <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none logo">
            <img src="{{ asset('image/Logo.png') }}" class="logo"  alt="logo">
            <h1 class="logo">Temex</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link active">Domov</a></li>
                <li class="nav-item"><a href="{{ url('/onas') }}" class="nav-link">O nás</a></li>
                <li class="nav-item"><a href="{{ url('/items') }}" class="nav-link">Obchod</a></li>
                <li class="nav-item"><a href="{{ url('/cennik') }}" class="nav-link">Cenník</a></li>
                <li class="nav-item"><a href="{{ url('/objednavka') }}" class="nav-link">Objednávka</a></li>
                <li class="nav-item"><a href="{{ url('/kontakt') }}" class="nav-link">Kontakt</a></li>
            </ul>
            <form role="search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            </form>
            <ul class="navbar-nav mr-3  nav-pills nav-fill d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item m-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light" >Odhlásenie</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item m-2"><a href="{{ route('login') }}" class="btn btn-outline-light ">Prihlásenie</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item mr-2"><a href="{{ route('register') }}" class="btn btn-primary">Registrácia</a></li>
                        @endif
                    @endauth
                @endif
                    <li class="nav-item m-2 cart"><a href="#" class="btn btn-dark"><i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </div>
    </div>
</nav>
