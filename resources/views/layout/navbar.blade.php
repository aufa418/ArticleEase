<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">ArticleEase</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('') ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('content') ? 'active' : '' }}" href="/content">Content</a>
                </li>
            </ul>
            @guest
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ms-auto">
                        <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login">Login</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/account">Account</a></li>
                            <li><a class="dropdown-item" href="/mycontent">My Content</a></li>
                            <hr>
                            <form action="/logout" method="post">
                                @csrf
                                <li><button class="dropdown-item">Logout</button></li>
                            </form>
                        </ul>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>
