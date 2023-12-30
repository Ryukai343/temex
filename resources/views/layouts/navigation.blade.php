@php use App\Http\Controllers\ProfileController; @endphp
<nav class="navbar navbar-expand-xl navbar-dark bg-dark position-fixed z-3 px-1">
    <div class="container-fluid">
        <a href="{{ url('/') }}"
           class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none logo">
            <img src="{{ asset('image/Logo.png') }}" class="logo" alt="logo">
            <h1 class="logo">Temex</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Domov</a></li>
                <li class="nav-item"><a href="{{ url('/onas') }}" class="nav-link">O nás</a></li>
                <li class="nav-item"><a href="{{ url('/items') }}" class="nav-link">Obchod</a></li>
                <li class="nav-item"><a href="{{ url('/cennik') }}" class="nav-link">Cenník</a></li>
                <li class="nav-item"><a href="{{ url('/kontakt') }}" class="nav-link">Kontakt</a></li>
                <li class="nav-item"><form role="search" method="GET" action="{{ route('items.index') }}">
                    <div class="input-group">
                        <input class="form-control" name="input" id="input" type="search" placeholder="Search">
                        <button type="submit" class="btn btn-sm btn-outline-secondary "><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form></li>
            </ul>

            <ul class="navbar-nav nav-pills nav-fill d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start px-2">
                @if (Route::has('login'))
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle nav_button" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-user"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a>
                                <a class="dropdown-item" href="{{ route('order.index') }}">Objednávky</a>
                                @if(ProfileController::roleCheck(auth()->user()->role) )
                                    <a class="dropdown-item" href="{{ route('profile.usersShow') }}">Spravovať
                                        uživateľov</a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Odhlásenie</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <li class="nav-item m-2"><a href="{{ route('login') }}" class="btn btn-outline-light ">Prihlásenie</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item mr-2"><a href="{{ route('register') }}" class="btn btn-primary">Registrácia</a>
                            </li>
                        @endif
                    @endauth
                @endif
                <li class="nav-item"><a href="{{ url('/košík') }}" class="btn btn-dark nav_button"><i
                            class="fa-solid fa-cart-shopping"></i>
                        @if(count((array) session('cart')) != 0)
                            {{count((array) session('cart'))}}
                        @endif
                    </a></li>
            </ul>
        </div>
    </div>
</nav>
