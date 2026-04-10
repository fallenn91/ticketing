<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Pro</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
<body>

    <!-- Top Bar -->
    <nav class="top-bar d-flex justify-content-between border-bottom border-dark align-items-center px-3">
        <div class="d-flex align-items-center">
            <a  class="nav-link {{ request()->routeIs('diabolo.profile') ? 'active' : '' }}" href="{{ route('diabolo.profile') }}"><i class="fas fa-home me-1"></i>Diabolo</a>
            <a href="#" class="nav-link"><i class="fas fa-comment me-1"></i>0</a>
            <a href="#" class="nav-link"><i class="fas fa-plus me-1"></i>Nuevo</a>
        </div>
        <div class="d-flex align-items-center">
            <a href="#" class="nav-link">Hola, Admin <i class="fas fa-user-circle ms-1"></i></a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar border-end border-dark">
        <nav class="nav flex-column">
            <!--INICIO-->
            <a class="nav-link {{ request()->routeIs('diabolo.admin') ? 'active' : '' }}" href="{{ route('diabolo.admin') }}"><i class="fas fa-tachometer-alt"></i> <span>Inicio</span></a>
            <!--GESTIÓN DE USUARIOS-->
            <a class="nav-link {{ request()->routeIs('diabolo.users') ? 'active' : '' }}" href="{{ route('diabolo.users') }}">
                <i class="fas fa-users"></i> <span>Usuarios</span>
            </a>
            <!--SOCIAL-->
            <div class="sidebar-divider"></div>
            <a class="nav-link nav-link {{ request()->routeIs('diabolo.market') ? 'active' : '' }}" href="{{ route('diabolo.market') }}" href="#"><i class="fas fa-store"></i> <span>Marketplace</span></a>
            <a class="nav-link nav-link nav-link {{ request()->routeIs('diabolo.work') ? 'active' : '' }}" href="{{ route('diabolo.work') }}" href="#"><i class="fas fa-briefcase"></i> <span>Trabajo</span></a>
            <a class="nav-link {{ request()->routeIs('diabolo.posts') ? 'active' : '' }}" href="{{ route('diabolo.posts') }}"><i class="fas fa-newspaper"></i> <span>Posts</span></a>
            <a class="nav-link {{ request()->routeIs('diabolo.comments') ? 'active' : '' }}" href="{{ route('diabolo.comments') }}" href="#"><i class="fas fa-comment"></i> <span>Comentarios</span></a>
            <!--ANALÍTICAS-->
            <div class="sidebar-divider"></div>
            <a class=nav-link {{ request()->routeIs('diabolo.analiticas') ? 'active' : '' }}" href="{{ route('diabolo.analiticas') }}" href="#"><i class="fas fa-chart-bar"></i> <span>Analíticas</span></a>
            <div class="sidebar-divider"></div>
            <!--CONFIGURACIÓN-->
            <a class="nav-link" href="#"><i class="fa-door-open"></i> <span>Log Out</span></a>
        </nav>
    </div>
    <div class="main-content">

      <!-- Main Content -->
      @yield('content')

    </div>
    <!-- Script para CRUD (Lógica de ejemplo) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
    <script>
        document.querySelector('.btn-wp-primary').addEventListener('click', function() {
            const title = document.querySelector('input[type="text"]').value;
            const content = document.querySelector('textarea').value;
            
            if(title && content) {
                alert('¡Borrador guardado localmente!\n\nAquí conectarías con tu API de Laravel para:\n- POST /api/posts (Crear)\n- PUT /api/posts/1 (Modificar)\n- DELETE /api/posts/1 (Eliminar)');
            } else {
                alert('Por favor, rellena los campos.');
            }
        });
    </script>
</body>
</html>