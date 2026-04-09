<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cirquera - Conecta talento</title>
    <link rel="icon" type="image/svg+xml" href="<?php echo e(asset('storage/img/cirquera-c-logo.png')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
<style>

  @import 'tailwindcss';

/* Rutas que Tailwind debe escanear para detectar clases usadas */
@source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';
@source '../../storage/framework/views/*.php';
@source '../**/*.blade.php';
@source '../**/*.js';

:root {
    /* Colores */
    --primary: #e53131;
    --bordeaux: #37101c;
    --dark: #211111;
    --beige: #f6ecc9;

    /* Layout general */
    --header-height: 80px;

    /* Hero */
    --hero-max-width: 1100px;
    --hero-gap: 3.5rem;
    --hero-image-size: 30rem;
    --hero-image-offset: 3.5rem;
    --hero-padding-x: 1.5rem;
    --hero-padding-y: 2.5rem;
    --hero-panel-min-height: 42rem;

    /* UI */
    --circle-border: 3px solid white;
    --icon-size: 42px;
    --icon-radius: 12px;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}

html,
body {
    width: 100%;
    min-width: 360px;
    margin: 0;
    overflow-x: hidden;
}

body {
    font-family: 'Poppins', sans-serif;
    background: var(--bordeaux);
    color: white;
}

img {
    display: block;
    max-width: 100%;
    height: auto;
}

h1,
h2,
h3,
h4,
h5 {
    margin: 0;
    font-family: 'Playfair Display', serif;
}

/* HEADER */
.main-header {
    position: fixed;
    inset: 0 0 auto 0;
    z-index: 100;
    height: var(--header-height);
    padding-inline: 52px;
    background: var(--beige);
    box-shadow: 0 4px 20px rgba(246, 236, 201, 0.55);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
}

.main-header a {
    color: var(--dark);
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s ease;
}

.main-header a:hover {
    color: var(--primary);
}

.main-header .btn,
.main-header .btn-cirquera-primary,
.main-header .btn-cirquera-light {
    width: auto;
    max-width: none;
    white-space: nowrap;
    flex-shrink: 0;
    padding: 10px 18px;
    border-radius: 999px;
}

/* BOTONES */
.btn-cirquera-primary {
    background: var(--primary);
    color: white;
    border: none;
    transition: background 0.3s ease;
}

.btn-cirquera-primary:hover {
    background: #cc2828;
    color: white;
}

.btn-cirquera-light {
    background: var(--beige);
    color: var(--bordeaux);
    border: none;
    transition: background 0.3s ease;
}

.btn-cirquera-light:hover {
    background: #f0e5cc;
    color: var(--bordeaux);
}

/* HERO */
.hero {
    display: flex;
    align-items: stretch;
    width: 100%;
    margin-top: var(--header-height);
    min-height: auto;
}

.hero-left,
.hero-right {
    position: relative;
    flex: 1 1 50%;
    min-width: 0;
    min-height: min(var(--hero-panel-min-height), calc(100vh - var(--header-height)));
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: var(--hero-padding-y) var(--hero-padding-x);
}

.hero-left {
    background: #3a1d1d;
}

.hero-right {
    background: var(--bordeaux);
}

.content {
    position: relative;
    z-index: 1;
    width: min(100%, var(--hero-max-width));
    display: grid;
    grid-template-columns: minmax(20rem, 1fr) minmax(0, var(--hero-image-size));
    align-items: start;
    gap: var(--hero-gap);
}

.text-content {
    min-width: 0;
}

.hero-image {
    width: min(100%, var(--hero-image-size));
    max-width: var(--hero-image-size);
    justify-self: end;
    align-self: start;
    margin-top: var(--hero-image-offset);
}

.rounded-circle {
    width: 100%;
    aspect-ratio: 1 / 1;
    border-radius: 50%;
    overflow: hidden;
    border: var(--circle-border);
    background: rgba(255, 255, 255, 0.02);
}

.rounded-circle img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: 0% 30%;
}

/* TEXTO */
.section-label {
    display: inline-block;
    margin-bottom: 18px;
    font-size: 12px;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: var(--primary);
}

.hero-title {
    font-size: clamp(2.4rem, 3vw, 4.5rem);
    font-weight: 900;
    line-height: 0.95;
    margin-bottom: 18px;
    padding-bottom: 12px;
    text-wrap: balance;
}

.text-content p {
    margin: 0 0 28px;
    max-width: 38ch;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.5;
    font-size: 17px;
}

/* FEATURES */
.feature-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.feature-list li {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
    min-width: 0;
    font-size: 16px;
    line-height: 1.4;
}

.feature-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: var(--icon-size);
    height: var(--icon-size);
    min-width: var(--icon-size);
    border-radius: var(--icon-radius);
    flex-shrink: 0;
}

.feature-icon .material-symbols-outlined {
    font-size: 22px;
    line-height: 1;
}

.icon-primary {
    background: var(--primary);
    color: white;
}

.icon-beige {
    background: var(--beige);
    color: var(--bordeaux);
}

/* BENEFICIOS */
.benefit-icon {
    width: 54px;
    height: 54px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
}

.benefit-icon .material-symbols-outlined {
    font-size: 28px;
    line-height: 1;
}

/* SECCIONES */
.section-artistas {
    background: var(--dark);
    color: white;
}

.section-companias {
    background: var(--bordeaux);
    color: var(--beige);
}

.section-que-es {
    background: var(--beige);
    color: var(--bordeaux);
    text-align: center;
    padding: 80px 0;
}

.section-como {
    background: var(--dark);
    color: white;
}

.bg-cta {
    background: var(--beige);
    color: var(--bordeaux);
    text-align: center;
    padding: 100px 0;
}

.bg-bordeaux {
    background: var(--bordeaux);
}

.text-beige {
    color: var(--beige);
}

/* FOOTER */
footer a {
    color: var(--beige) !important;
}

footer a:hover,
footer a:focus,
footer a:active {
    color: white !important;
    text-decoration: none;
}

/* LAPTOP */
@media (max-width: 1200px) {
    :root {
        --header-height: 72px;
        --hero-max-width: 860px;
        --hero-gap: 1.5rem;
        --hero-image-size: 11.5rem;
        --hero-image-offset: 2rem;
        --hero-padding-x: 1rem;
        --hero-padding-y: 2rem;
        --hero-panel-min-height: 35rem;
    }

    .main-header {
        padding-inline: 28px;
    }

    .content {
        grid-template-columns: minmax(18rem, 1fr) minmax(0, var(--hero-image-size));
    }

    .hero-title {
        white-space: normal;
    }

    .text-content p {
        font-size: 15px;
        max-width: 26ch;
        margin-bottom: 18px;
    }

    .feature-list li {
        font-size: 14px;
        gap: 10px;
        margin-bottom: 12px;
    }

    .feature-icon {
        --icon-size: 38px;
    }

    .feature-icon .material-symbols-outlined {
        font-size: 20px;
    }
}

/* DESDE AQUÍ EL CÍRCULO BAJA DEBAJO */
@media (max-width: 1122px) {
    .content {
        grid-template-columns: 1fr;
        gap: 24px;
    }

    .text-content,
    .text-content p {
        max-width: 100%;
    }

    .hero-image {
        justify-self: center;
        align-self: start;
        margin-top: 0;
    }

    .hero-title {
        white-space: normal;
        line-height: 1.02;
    }
}

/* TABLET / MÓVIL */
@media (max-width: 900px) {
    :root {
        --hero-padding-x: 20px;
        --hero-padding-y: 36px;
        --hero-image-size: 320px;
    }

    .hero {
        flex-direction: column;
    }

    .hero-left,
    .hero-right {
        min-height: auto;
        padding: var(--hero-padding-y) var(--hero-padding-x);
    }
}

/* MÓVIL */
@media (max-width: 768px) {
    :root {
        --header-height: 68px;
        --hero-padding-x: 16px;
        --hero-padding-y: 32px;
        --hero-gap: 22px;
        --hero-image-size: min(68vw, 260px);
    }

    .main-header {
        height: var(--header-height);
        padding-inline: 16px;
        gap: 10px;
    }

    .main-header .btn,
    .main-header .btn-cirquera-primary,
    .main-header .btn-cirquera-light {
        padding: 8px 14px;
        font-size: 13px;
    }

    .hero-left,
    .hero-right {
        padding: 40px 20px 32px;
    }

    .hero-title {
        font-size: clamp(1.9rem, 7vw, 2.4rem);
        line-height: 1.05;
    }

    .text-content p {
        font-size: 16px;
        margin-bottom: 20px;
    }
}
</style>
<body>

    <header class="main-header">
        <div class="d-flex align-items-center gap-3">
            <img src="<?php echo e(asset('storage/img/cirquera-logo.svg')); ?>" alt="Logo Cirquera" style="height: 40px; width: auto;">
        </div>

        <nav class="d-none d-md-flex gap-4">
            <a href="#inicio">Inicio</a>
            <a href="#nosotros">¿Qué es Cirquera?</a>
            <a href="#beneficios">Beneficios</a>
            <a href="#como-funciona">Cómo funciona</a>
        </nav>

        <button class="btn btn-cirquera-primary">Unirse</button>
    </header>

    <section id="inicio" class="hero">
        <div class="hero-left">
            <div class="grain"></div>

            <div class="content">
                <div class="text-content">
                    <span class="section-label">ARTISTAS & PERFORMER</span>
                    <h1 class="hero-title">Para el Talento</h1>
                    <p>Filtra por disciplina, ubicación y disponibilidad inmediata de artistas.</p>

                    <ul class="feature-list">
                        <li>
                            <span class="feature-icon icon-primary">
                                <span class="material-symbols-outlined">star</span>
                            </span>
                            <span>Encuentra Pista</span>
                        </li>
                        <li>
                            <span class="feature-icon icon-primary">
                                <span class="material-symbols-outlined">badge</span>
                            </span>
                            <span>Muestra tu Portafolio</span>
                        </li>
                        <li>
                            <span class="feature-icon icon-primary">
                                <span class="material-symbols-outlined">hub</span>
                            </span>
                            <span>Conecta con la Red</span>
                        </li>
                    </ul>
                </div>

                <div class="hero-image">
                    <div class="rounded-circle">
                        <img src="<?php echo e(asset('storage/img/cirquera_talent.jpeg')); ?>" alt="Talento destacado">
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-right">
            <div class="grain"></div>

            <div class="content">
                <div class="text-content">
                    <span class="section-label">EMPRESAS & PRODUCCIÓN</span>
                    <h1 class="hero-title">Para Compañías</h1>
                    <p>Filtra y gestiona profesionales de manera eficiente con herramientas centralizadas.</p>

                    <ul class="feature-list">
                        <li>
                            <span class="feature-icon icon-beige">
                                <span class="material-symbols-outlined">star</span>
                            </span>
                            <span>Encuentra Profesionales</span>
                        </li>
                        <li>
                            <span class="feature-icon icon-beige">
                                <span class="material-symbols-outlined">groups</span>
                            </span>
                            <span>Gestión de Candidatos</span>
                        </li>
                        <li>
                            <span class="feature-icon icon-beige">
                                <span class="material-symbols-outlined">verified</span>
                            </span>
                            <span>Calidad y Oficio</span>
                        </li>
                        <li>
                            <span class="feature-icon icon-beige">
                                <span class="material-symbols-outlined">calendar_month</span>
                            </span>
                            <span>Planificación de Proyectos</span>
                        </li>
                        <li>
                            <span class="feature-icon icon-beige">
                                <span class="material-symbols-outlined">support</span>
                            </span>
                            <span>Soporte y Asesoría</span>
                        </li>
                    </ul>
                </div>

                <div class="hero-image">
                    <div class="rounded-circle">
                        <img src="<?php echo e(asset('storage/img/cirquera_compañia.jpeg')); ?>" alt="Foto de empresa">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="nosotros" class="section-que-es">
        <div class="container text-center">
            <h2>¿Qué es Cirquera?</h2>
            <br>
            <p class="lead mx-auto" style="max-width: 700px;">
                Cirquera es la plataforma que conecta a artistas de circo con compañías y producciones a nivel global.
                Aquí los talentos pueden mostrar su portafolio y las compañías encontrar perfiles verificados de manera sencilla.
            </p>
        </div>
    </section>

    <section id="beneficios" class="section-artistas py-5 text-center">
        <div class="container">
            <h2 class="mb-5">Beneficios para Artistas</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="benefit-icon icon-primary">
                        <span class="material-symbols-outlined">star</span>
                    </div>
                    <h5>Encuentra Pista</h5>
                    <p>Acceso directo a audiciones y llamados de casting exclusivos en todo el mundo.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-icon icon-primary">
                        <span class="material-symbols-outlined">badge</span>
                    </div>
                    <h5>Muestra tu Portafolio</h5>
                    <p>Crea un perfil visual impactante que destaque tus actos y habilidades técnicas.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-icon icon-primary">
                        <span class="material-symbols-outlined">hub</span>
                    </div>
                    <h5>Conecta con la Red</h5>
                    <p>Forma parte de la comunidad digital más grande del gremio circense.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-companias py-5 text-center">
        <div class="container">
            <h2 class="mb-5">Beneficios para Compañías</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="benefit-icon icon-beige">
                        <span class="material-symbols-outlined">star</span>
                    </div>
                    <h5>Encuentra Profesionales</h5>
                    <p>Filtra por disciplina, ubicación y disponibilidad inmediata de artistas.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-icon icon-beige">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                    <h5>Gestión de Candidatos</h5>
                    <p>Herramientas centralizadas para organizar audiciones y contratos.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-icon icon-beige">
                        <span class="material-symbols-outlined">verified</span>
                    </div>
                    <h5>Calidad y Oficio</h5>
                    <p>Perfiles verificados que garantizan excelencia técnica y profesionalismo.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="como-funciona" class="section-como py-5 text-center">
        <div class="container">
            <h2 class="mb-5">Cómo Funciona</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <span class="material-symbols-outlined text-white" style="font-size: 50px;">person_add</span>
                    <h5 class="mt-2">Regístrate</h5>
                    <p>Crea tu perfil en Cirquera en pocos pasos.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <span class="material-symbols-outlined text-white" style="font-size: 50px;">search</span>
                    <h5 class="mt-2">Explora</h5>
                    <p>Busca oportunidades o talentos según tu necesidad.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <span class="material-symbols-outlined text-white" style="font-size: 50px;">handshake</span>
                    <h5 class="mt-2">Conecta</h5>
                    <p>Conecta con artistas o compañías de manera segura y verificada.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-cta">
        <div class="container">
            <h2 class="mb-4">Únete a Cirquera Hoy</h2>
            <p class="mb-4">Empieza a descubrir talento o oportunidades para tu compañía en minutos.</p>
            <button class="btn btn-cirquera-primary btn-lg rounded-pill px-5">Comenzar Ahora</button>
        </div>
    </section>

    <footer class="py-4 bg-bordeaux text-beige text-center">
        <div class="container">
            <div class="mb-2">© 2026 Cirquera. Todos los derechos reservados.</div>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="#" class="text-beige text-decoration-none">Política de Privacidad</a>
                <a href="#" class="text-beige text-decoration-none">Términos de Servicio</a>
                <a href="#" class="text-beige text-decoration-none">Cookies</a>
            </div>
        </div>
    </footer>

</body>
</html><?php /**PATH /var/www/html/resources/views/test.blade.php ENDPATH**/ ?>