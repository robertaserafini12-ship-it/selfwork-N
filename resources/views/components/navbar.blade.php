<nav class="navbar navbar-expand-lg navbar-dark nav-vivace shadow">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="{{ route('homepage') }}">🎨 Atelier Arte</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="{{ route('articles.index') }}">Tutti i Disegni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="{{ route('contact') }}">✉️ Contattaci</a>
                </li>

                @guest
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link text-white fw-semibold" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light text-dark fw-bold btn-sm px-3" href="{{ route('register') }}">Registrati</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="btn btn-warning text-dark fw-bold btn-sm px-3" href="{{ route('articles.create') }}">+ Pubblica Disegno</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <span class="nav-link text-white fw-semibold">Ciao, {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm fw-semibold">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>