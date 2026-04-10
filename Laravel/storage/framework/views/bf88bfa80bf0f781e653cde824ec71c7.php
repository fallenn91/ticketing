<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php echo app('Illuminate\Foundation\Vite')(['resources/css/profile.css', 'resources/js/app.js']); ?>
</head>
<body style="font-family: 'Inter', sans-serif;">

<main class="container-fluid d-flex flex-column min-vh-100 p-0">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: var(--verde); border-bottom: 1px solid rgba(0,0,0,0.1);z-index: 1030;">
    <div class="container d-flex justify-content-between align-items-center">

    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center justify-content-center" href="#" style="height:50px;">
        <img src="<?php echo e(asset('images/DB logo.svg')); ?>" style="width:50px;" class="img-fluid m-0" id="diaboloLogo"/>
    </a>

    <!-- Buscador (ocupa espacio pero se adapta) -->
    <form class="d-none d-lg-flex mx-3 flex-grow-1" role="search" onsubmit="event.preventDefault(); /* Aquí tu código de búsqueda */">
        <input type="search" class="form-control" placeholder="Buscar" aria-label="Buscar" style="max-width: 350px;">
        <button type="submit" class="btn btn-outline-dark ms-2">Buscar</button>
    </form>

    <!-- Botón hamburguesa para móviles -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menú -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto d-flex align-items-center">

            <li class="nav-item"><a class="nav-link" href="#servicios">Inicio</a></li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="comunidadDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Comunidad
                </a>
                <ul class="dropdown-menu" aria-labelledby="comunidadDropdown">
                    <li><a class="dropdown-item" href="#comunidad">Social</a></li>
                    <li><a class="dropdown-item" href="#comunidad">Empleo</a></li>
                    <li><a class="dropdown-item" href="#comunidad">Mensaje</a></li>
                    <li><a class="dropdown-item" href="#comunidad">Notificaciones</a></li>
                </ul>
            </li>

            <li class="nav-item d-flex align-items-center">
                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Log Out
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display:none;">
                    <?php echo csrf_field(); ?>
                </form>
            </li>

        </ul>
    </div>

    </div>
</nav>

<!-- CONTENIDO PRINCIPAL -->
<div class="container mt-4 flex-grow-1">
    <div class="row g-3">

        <!-- SIDEBAR IZQUIERDA -->
        <aside class="col-lg-3">
            <?php echo $__env->yieldContent('leftSidebar'); ?>
        </aside>

        <!-- FEED CENTRAL -->
        <section class="col-lg-6">
            <?php echo $__env->yieldContent('content'); ?>
        </section>

        <!-- SIDEBAR DERECHA -->
        <aside class="col-lg-3">
            <?php echo $__env->yieldContent('rightSidebar'); ?>
        </aside>

    </div>
</div>

<!-- FOOTER -->
<footer class="bg-white border-top text-center py-3 mt-auto">
    <small>© <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Diabolo')); ?></small>
</footer>


</main>

</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/profile.blade.php ENDPATH**/ ?>