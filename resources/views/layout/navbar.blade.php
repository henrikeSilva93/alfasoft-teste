
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Alfasoft test</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            @if(Auth::check())
                <li class="nav-item">
                    <span class="nav-link">{{ Auth::user()->name }}</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="HEAD" style="display: none;">

                    @csrf
                </form>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.page') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>