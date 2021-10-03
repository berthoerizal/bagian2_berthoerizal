<nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Bagian 2</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('employees') ? 'active' : '' }}"
                        href="/employees">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('companies') ? 'active' : '' }}"
                        href="/companies">Companies</a>
                </li>
            </ul>

            @guest
                <a href="{{route('login')}}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{route('register')}}" class="btn btn-warning me-2">Sign-up</a>
                @else
                <a href="#" class="btn btn-outline-light me-2 mr-2">{{Auth::user()->name}}</a>
                <a href="{{route('logout')}}" class="btn btn-outline-light me-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form action="{{route('logout')}}" id="logout-form" method="post">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</nav>