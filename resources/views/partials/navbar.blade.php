<!-- make navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Tickets Station</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="container-fluid navbar-nav">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                @auth
                <a class="nav-link active" aria-current="page" href="/dashboard/tickets">Dashboard</a>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tables
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/tickets">Tickets</a></li>
                        <li><a class="dropdown-item" href="/penumpangs">Penumpang</a></li>
                    </ul>
                </li>
                <div class="ml-auto">
                    @guest
                    <a class="nav-link active" aria-current="page" href="/login" style="float:right">Login</a>
                    @endguest
                    @auth
                    <a class="nav-link active" aria-current="page" href="/logout" style="float:right">Logout</a>
                    @endauth
                </div>
                
            </div>
        </div>
    </div>
</nav>