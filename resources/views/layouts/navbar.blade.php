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
                    <a class="nav-link {{ Request::routeIs('employees') ? 'active' : '' }}"
                        href="/companies">Companies</a>
                </li>
            </ul>
        </div>
    </div>
</nav>