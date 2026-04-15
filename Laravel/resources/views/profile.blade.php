<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio</title>
  @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>
<body>
  <!--HEADER-->
  <header class="glassmorph fixed top-[20px] left-1/2 -translate-x-1/2 w-[50%] h-[5vh] p-4 flex justify-center items-center z-20">
    <div class="flex justify-between items-center w-full">
      <div>
        <a><h1 class="text-white">LOGO</h1></a>
      </div>
      <div>
        <ul class="flex justify-center items-center gap-3">
          <li class="text-white"><a>HOME</a></li>
          <li class="text-white"><a>HOME</a></li>
          <li class="text-white"><a>HOME</a></li>
        </ul>
      </div>
    </div>
  </header>
  <!--HERO SECTION-->
  <div id="hero" class="w-full h-screen flex justify-center items-center bg-[var(--secondary)] p-4 md:p-12">
    <div class="w-full flex flex-col justify-center p-12 gap-5 z-0">
      <h1 class="text-7xl font-semibold text-black text-left">
        WEBSITES THAT CONVERT
      </h1>
      <h2 class="text-6xl font-medium text-black text-right">Clean, responsive and conversion-focused web design.</h2>
      <button class="px-3 py-2.5 mt-3 bg-[var(--text)] text-white text-3xl font-semibold rounded-[50px] w-[200px] text-center self-center hover:bg-[#ada1d4] cursor-pointer transition-all duration-300">
        Let's Talk
      </button>
    </div>
  </div>
  <!-- MAIN -->
  <div class="relative w-full h-full p-4 md:p-12 bg-[var(--bg)] rounded-t-[50px] gap-5">
    <div class="w-full h-auto mt-6 flex flex-col items-left">
      <div class="w-[50%] mt-5">
        <h2 class="text-5xl text-white font-semibold text-left py-2.5">Modern websites built for performance and conversion</h2>
        <h2 class="text-4xl text-white font-medium text-left">I design and develop clean, modern websites focused on results.</h2>
      </div>
    </div>
    <div id="cursor-glow"></div>
    <div id="features-section" class="w-full h-[100vh] flex flex-col justify-center items-center mt-5">
      <div class="w-full h-[500px] flex justify-center items-start gap-[60px] mt-[50px]">
        <div class="feature h-full flex flex-col justify-start items-center">
          <h3 class="text-5xl text-white font-medium text-black mb-3">Fast</h3>
          <p class="text-3xl text-white text-center">Built with performance in mind to ensure fast load times, smooth interactions, and a seamless user experience across all devices.</p>
        </div>
        <div class="feature h-full flex flex-col justify-center items-center">
          <h3 class="text-5xl text-white font-medium text-black mb-3">Clean Design</h3>
          <p class="text-3xl text-white text-center">Clean, modern interfaces designed with clarity and usability in mind, ensuring users can navigate effortlessly and find what they need.</p>
        </div>
        <div class="feature h-full flex flex-col justify-end items-center">
          <h3 class="text-5xl text-white font-medium text-black mb-3">Conversion-Focused</h3>
          <p class="text-3xl text-white text-center">Strategically designed to guide users through a clear journey, turning visitors into leads and helping businesses generate more clients.</p>
        </div>
      </div>
    </div>
    <!--SCROLL HORIZONTAL -->
    <div id="slider" class="slider w-full flex justify-center items-center p-4 md:p-12">
  
      <div class="w-1/2 flex justify-center">
        
        <div class="track flex justify-center items-center gap-4">
          
          <span class="badge">Laravel</span>
          <span class="badge">Tailwind</span>
          <span class="badge">CSS</span>
          <span class="badge">HTML</span>
          <span class="badge">PHP</span>
          <span class="badge">WordPress</span>
          <span class="badge">Node</span>
          <span class="badge">React</span>
          <span class="badge">MongoDB</span>
          <span class="badge">MySQL</span>
          <span class="badge">Laravel</span>
          <span class="badge">Tailwind</span>
          <span class="badge">CSS</span>
          <span class="badge">HTML</span>
          <span class="badge">PHP</span>
          <span class="badge">WordPress</span>
          <span class="badge">Node</span>
          <span class="badge">React</span>
          <span class="badge">MongoDB</span>
          <span class="badge">MySQL</span>
          <span class="badge">Laravel</span>
          <span class="badge">Tailwind</span>
          <span class="badge">CSS</span>
          <span class="badge">HTML</span>
          <span class="badge">PHP</span>
          <span class="badge">WordPress</span>
          <span class="badge">Node</span>
          <span class="badge">React</span>
          <span class="badge">MongoDB</span>
          <span class="badge">MySQL</span>
          <span class="badge">Laravel</span>
          <span class="badge">Tailwind</span>
          <span class="badge">CSS</span>
          <span class="badge">HTML</span>
          <span class="badge">PHP</span>
          <span class="badge">WordPress</span>
          <span class="badge">Node</span>
          <span class="badge">React</span>
          <span class="badge">MongoDB</span>
          <span class="badge">MySQL</span>

        </div>

      </div>

    </div>
    <!-- CARDS -->
    <div class="w-full flex flex-col justify-center items-center p-4 md:p-12 mt-5 gap-5">
      <h2 class="text-4xl text-white font-medium text-black mb-3 p-[50px]">Every project follows a clear process focused on design, performance, and conversion. I don’t just build websites — I create digital experiences designed to attract users and generate real results.</h2>
      <div class="card w-full h-[400px] flex justify-between items-center px-[50px] rounded-lg bg-[#7c6fa6]/80 gap-5 mt-5">
        <div class="w-2/3">
          <h1 class="text-8xl text-white font-bold text-black mb-3">Project Analysis</h1>
          <p class="text-3xl text-white mt-5">I analyze the business, target audience, and project goals. This helps define what the website needs to achieve real results.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center">
          <h2 class="text-9xl text-white leading-none tracking-tight font-bold scale-y-[2]">01</h2>
        </div>
      </div>
      <div class="card w-full h-[400px] flex justify-between items-center px-[50px] rounded-lg bg-[#3b82f6]/80 gap-5 mt-5">
        <div class="w-2/3">
          <h1 class="text-8xl text-white font-bold text-black mb-3">UI/UX Design</h1>
          <p class="text-3xl text-white mt-5">I design clean, modern, and user-focused interfaces. Every layout is crafted to guide users toward conversion.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center">
          <h2 class="text-9xl text-white leading-none tracking-tight font-bold scale-y-[2]">02</h2>
        </div>
      </div>
      <div class="card w-full h-[400px] flex justify-between items-center px-[50px] rounded-lg bg-[#22d3ee]/80 gap-5 mt-5">
        <div class="w-2/3">
          <h1 class="text-8xl text-white font-bold text-black mb-3">Development</h1>
          <p class="text-3xl text-white mt-5">I build scalable and high-performance websites using modern technologies like Laravel or Next.js, following best practices.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center">
          <h2 class="text-9xl text-white leading-none tracking-tight font-bold scale-y-[2]">03</h2>
        </div>
      </div>
      <div class="card w-full h-[400px] flex justify-between items-center px-[50px] rounded-lg bg-[#22c55e]/80 gap-5 mt-5">
        <div class="w-2/3">
          <h1 class="text-8xl text-white font-bold text-black mb-3">Optimization</h1>
          <p class="text-3xl text-white mt-5">I optimize performance, SEO, accessibility, and responsiveness across all devices.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center">
          <h2 class="text-9xl text-white leading-none tracking-tight font-bold scale-y-[2]">04</h2>
        </div>
      </div>
      <div class="card w-full h-[400px] flex justify-between items-center px-[50px] rounded-lg bg-[#f59e0b]/80 gap-5 mt-5">
        <div class="w-2/3">
          <h1 class="text-8xl text-white font-bold text-black mb-3">Deployment</h1>
          <p class="text-3xl text-white mt-5">I deploy the project and ensure everything is fully functional and production-ready.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center">
          <h2 class="text-9xl text-white leading-none tracking-tight font-bold scale-y-[2]">05</h2>
        </div>
      </div>
    </div>
  </div>
  <!--SERVICES-->
  <section class="services-section">
    <div class="services-section__header">
      <p class="services-section__eyebrow">Servicios</p>
      <h2 class="services-section__title">What I can do for you</h2>
      <p class="services-section__subtitle">
        Diseño y desarrollo web orientado a resultados. Proceso claro, diseño moderno,
        objetivo real: convertir visitantes en clientes.
      </p>
    </div>
    <div class="services-grid">
      <!-- Card 1: Landing Page -->
      <div class="service-card">
        <div>
          <div class="service-card__top">
            <span class="service-card__tag">Starter</span>
          </div>
          <h3 class="service-card__title">Landing Page</h3>
          <p class="service-card__desc">
            Una sola página diseñada para captar leads y convertir desde el primer scroll.
          </p>
        </div>
        <hr class="service-card__divider">
        <ul class="service-card__list">
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Diseño moderno y responsive
          </li>
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Optimizada para móvil
          </li>
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Carga rápida y alto rendimiento
          </li>
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            SEO básico integrado
          </li>
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Formulario de contacto
          </li>
        </ul>
        <a href="#contact" class="service-card__cta">
          Ver detalles
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
            <path d="M3 7h8M7 3l4 4-4 4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </div>
      <!-- Card 2: Rediseño Web (FEATURED) -->
      <div class="service-card service-card--featured">
        <div>
          <div class="service-card__top">
            <span class="service-card__tag">Growth</span>
            <span class="service-card__badge">Más solicitado</span>
          </div>
          <h3 class="service-card__title">Rediseño Web</h3>
          <p class="service-card__desc">
            Transforma tu web actual en una experiencia moderna, limpia y enfocada en conversión.
          </p>
        </div>
        <hr class="service-card__divider">
        <ul class="service-card__list">
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            UI/UX moderno con branding mejorado
          </li>
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Layouts para todos los dispositivos
          </li>
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Navegación y flujo de usuario mejorados
          </li>
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Diseño orientado a conversión
          </li>
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Mayor retención y engagement
          </li>
        </ul>
        <a href="#contact" class="service-card__cta">
          Ver detalles
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
            <path d="M3 7h8M7 3l4 4-4 4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </div>
      <!-- Card 3: Web Corporativa -->
      <div class="service-card">
        <div>
          <div class="service-card__top">
            <span class="service-card__tag">Pro</span>
          </div>
          <h3 class="service-card__title">Web Corporativa</h3>
          <p class="service-card__desc">
            Presencia digital profesional para empresas y marcas personales que buscan crecer.
          </p>
        </div>
        <hr class="service-card__divider">
        <ul class="service-card__list">
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Identidad de marca sólida y profesional
          </li>
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Diseñada para generar confianza y clientes
          </li>
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Comunicación clara de servicios y valor
          </li>
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            UX que retiene a los usuarios más tiempo
          </li>
          <li>
            <svg viewBox="0 0 16 16" fill="none">
              <circle cx="8" cy="8" r="7.5" stroke="#AFA9EC" stroke-width="1"/>
              <path d="M5 8l2 2 4-4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Base escalable que crece con tu negocio
          </li>
        </ul>
        <a href="#contact" class="service-card__cta">
          Ver detalles
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
            <path d="M3 7h8M7 3l4 4-4 4" stroke="#534AB7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </div>
    </div>
  </section>
</body>
</html>