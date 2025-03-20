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
            <img src="<?php echo e(Storage::disk('s3')->url('img/elleffe_V2_r.png')); ?>" alt="Logo" width="70" height="38"
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
                    <a class="nav-link" href="<?php echo e(url('/')); ?>">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/about')); ?>">ABOUT</a>
                </li>
            </ul>

            <!-- Login e Register per gli ospiti (utenti non autenticati) -->
            <?php if(auth()->guard()->guest()): ?>

                <ul class="navbar-nav mb-lg-0 ms-auto">
                    <!-- TOOL Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarToolDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            TOOL
                        </a>
                        <ul class="dropdown-menu custom-dropdown" aria-labelledby="navbarToolDropdown">
                            <li><a class="dropdown-item" href="<?php echo e(url('/testconn')); ?>">Test Connessione</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(url('/log-accessi')); ?>">Log Accessi</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/register')); ?>">REGISTER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/login')); ?>">LOGIN</a>
                    </li>
                </ul>
            <?php endif; ?>


            <?php if(auth()->guard()->check()): ?>
                <ul class="navbar-nav mb-lg-0 mb-2 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/user')); ?>">USER</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            DASHBOARD
                        </a>
                        <ul class="dropdown-menu custom-dropdown" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-white" href="<?php echo e(url('/products/create')); ?>">CREATE</a></li>
                            <li><a class="dropdown-item text-white" href="<?php echo e(url('/products')); ?>">ALL PRODUCT</a></li>
                        </ul>
                    </li>
                    <!-- Logout per gli utenti autenticati -->
                    <li class="nav-item">
                        <form id="logout-form" action="<?php echo e(route('logoutUser')); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <a href="#" class="nav-link text-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                LOGOUT
                            </a>
                        </form>
                    </li>
                </ul>
            <?php endif; ?>

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
<?php /**PATH C:\PRJ\Laravel\aws-s3\resources\views/partials/menu.blade.php ENDPATH**/ ?>