<style>
    .custom-dropdown {
        background-color: transparent;
        /* o il colore desiderato */
        border: true;
        /* rimuove il bordo se non vuoi che appaia */
    }

    .custom-dropdown .dropdown-item {
        color: #7eed7efb;
        /* mantiene il colore del testo come nel menu principale */
    }

    .custom-dropdown .dropdown-item:hover {
        background-color: rgba(94, 83, 40, 0.1) !important;
        /* colore di sfondo al passaggio del mouse */
        color: #2806e6fb !important;
        /* Colore lime per il testo */
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Immagine a sinistra -->
        <a class="navbar-brand" href="#">
            <img src="{{ Storage::disk('s3')->url('img/elleffe_V2_r.png') }}" alt="Logo" width="70" height="38"
                class="d-inline-block align-text-top">
        </a>

        <!-- Bottone di toggle per i dispositivi mobili -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collegamenti del menu -->
        <div class="navbar-collapse collapse" id="navbarNav">
            <ul class="navbar-nav mb-lg-0 mb-2 me-auto">
                <!-- Home e About -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">ABOUT</a>
                </li>
            </ul>

            <!-- Login e Register per gli ospiti (utenti non autenticati) -->
            @guest

                <ul class="navbar-nav mb-lg-0 ms-auto">
                    <!-- TOOL Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarToolDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            TOOL
                        </a>
                        <ul class="dropdown-menu custom-dropdown" aria-labelledby="navbarToolDropdown">
                            <li><a class="dropdown-item" href="{{ url('/testconn') }}">Test Connessione</a></li>
                            <li><a class="dropdown-item" href="{{ url('/log-accessi') }}">Log Accessi</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">REGISTER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">LOGIN</a>
                    </li>
                </ul>
            @endguest


            @auth
                <ul class="navbar-nav mb-lg-0 mb-2 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user') }}">USER</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            DASHBOARD
                        </a>
                        <ul class="dropdown-menu custom-dropdown" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-white" href="{{ url('/products/create') }}">CREATE</a></li>
                            <li><a class="dropdown-item text-white" href="{{ url('/products') }}">ALL PRODUCT</a></li>
                        </ul>
                    </li>
                    <!-- Logout per gli utenti autenticati -->
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logoutUser') }}" method="POST" class="d-inline">
                            @csrf
                            <a href="#" class="nav-link text-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                LOGOUT
                            </a>
                        </form>
                    </li>
                </ul>
            @endauth

        </div>
    </div>
</nav>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var navbarToggler = document.querySelector(".navbar-toggler");
        var navbarCollapse = document.querySelector("#navbarNav");

        navbarToggler.addEventListener("click", function() {
            if (navbarCollapse.classList.contains("show")) {
                navbarCollapse.classList.remove("show");
            } else {
                navbarCollapse.classList.add("show");
            }
        });
    });
</script>
