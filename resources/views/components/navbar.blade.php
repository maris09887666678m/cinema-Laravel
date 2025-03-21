<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}" style="color: white;">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarColor01"> 
      <ul class="navbar-nav ms-auto"> 
        @if (Route::has('login'))
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true" style="color: white;">
              @auth
                {{ auth()->user()->username }}
              @else
              <i class="bi bi-list fs-1"></i>
              @endauth
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @auth
                <li>
                  <a class="dropdown-item" href="{{ route('profile') }}" >
                    Profile
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('bookings.index') }}">
                    Bookings
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    Balance: Rp {{ number_format(auth()->user()->balance) }}
                  </a>
                </li>
                <li>
                  <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="dropdown-item">Log out</button>
                  </form>
                </li>
              @else
                <li>
                  <a class="dropdown-item" href="{{ route('login') }}">Log in</a>
                </li>
                @if (Route::has('register'))
                  <li>
                    <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                  </li>
                @endif
              @endauth
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
