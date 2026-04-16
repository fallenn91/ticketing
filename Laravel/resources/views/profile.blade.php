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
  <section id="hero" class="w-full h-screen flex justify-center items-center bg-[var(--secondary)] p-4 md:p-12">
    <div class="w-full flex flex-col justify-center p-12 gap-5 z-0">
      <h1 class="text-7xl font-semibold text-black text-left">
        WEBSITES THAT CONVERT
      </h1>
      <h2 class="text-6xl font-medium text-black text-right">Clean, responsive and conversion-focused web design.</h2>
      <button class="px-3 py-2.5 mt-3 bg-[var(--text)] text-white text-3xl font-semibold rounded-[50px] w-[200px] text-center self-center hover:bg-[#ada1d4] cursor-pointer transition-all duration-300">
        Let's Talk
      </button>
    </div>
  </section>
  <!-- MAIN -->
  <div class="relative w-full min-h-screen p-4 md:p-12 bg-[var(--bg)] rounded-t-[50px] gap-5">
    <div id="cursor-glow"></div>
    <div class="absolute inset-0 pointer-events-none" style="background: linear-gradient(200deg, rgba(168, 85, 247, 0) 0%, rgba(168, 85, 247, 0.15) 80%)"></div>
    <div class="w-full min-h-[50vh] mt-6 flex flex-col justify-center">
      <div class="w-full mt-5 p-12 flex flex-col gap-4">
        <h2 class="text-5xl text-white font-semibold text-left py-2.5 text-right">Modern websites built for performance and conversion</h2>
        <p class="text-4xl text-white font-medium text-left">I design and develop clean, modern websites focused on results.</p>
      </div>
    </div>
    <div id="features-section" class="w-full min-h-[90vh] flex flex-col justify-center items-center mt-5">
      <div class="w-full h-[80vh] flex justify-center items-start gap-[60px] mt-[50px]">
        <div class="feature h-full flex flex-col justify-start items-center">
          <h3 class="text-5xl text-white font-medium mb-3">Fast</h3>
          <p class="text-3xl text-white text-center">Built with performance in mind to ensure fast load times, smooth interactions, and a seamless user experience across all devices.</p>
        </div>
        <div class="feature h-full flex flex-col justify-center items-center">
          <h3 class="text-5xl text-white font-medium mb-3">Clean Design</h3>
          <p class="text-3xl text-white text-center">Clean, modern interfaces designed with clarity and usability in mind, ensuring users can navigate effortlessly and find what they need.</p>
        </div>
        <div class="feature h-full flex flex-col justify-end items-center">
          <h3 class="text-5xl text-white font-medium mb-3">Conversion-Focused</h3>
          <p class="text-3xl text-white text-center">Strategically designed to guide users through a clear journey, turning visitors into leads and helping businesses generate more clients.</p>
        </div>
      </div>
    </div>
    <!--SCROLL HORIZONTAL -->
    <div class="w-full min-h-[50vh] flex justify-center items-center p-4 md:p-12">
  
      <div id="slider" class="slider w-1/2 flex justify-center">
        
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
    <div class="w-full min-h-screen flex flex-col justify-center items-center p-4 md:p-12 mt-5 gap-5">
      <h2 class="text-4xl text-white font-medium mb-3 p-[50px]">Every project follows a clear process focused on design, performance, and conversion. I don’t just build websites — I create digital experiences designed to attract users and generate real results.</h2>
      
      <div class="card">
        <div class="w-2/3 flex flex-col gap-3 z-10">
          <span class="card-step">#01</span>
          <h1 class="text-8xl text-white font-bold">Project Analysis</h1>
          <p class="text-lg text-white/80 mt-2">I analyze the business, target audience, and project goals.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center z-10">
          <span class="card-number">01</span>
        </div>
      </div>
      <div class="card">
        <div class="w-2/3 flex flex-col gap-3 z-10">
          <span class="card-step">#02</span>
          <h1 class="text-8xl text-white font-bold">UI/UX Design</h1>
          <p class="text-lg text-white/80 mt-2">I design clean, modern, and user-focused interfaces. Every layout is crafted to guide users toward conversion.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center z-10">
          <span class="card-number">02</span>
        </div>
      </div>
      <div class="card">
        <div class="w-2/3 flex flex-col gap-3 z-10">
          <span class="card-step">#03</span>
          <h1 class="text-8xl text-white font-bold">Development</h1>
          <p class="text-lg text-white/80 mt-2">I build scalable and high-performance websites using modern technologies like Laravel or Next.js, following best practices.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center z-10">
          <span class="card-number">03</span>
        </div>
      </div>
      <div class="card">
        <div class="w-2/3 flex flex-col gap-3 z-10">
          <span class="card-step">#04</span>
          <h1 class="text-8xl text-white font-bold">Optimization</h1>
          <p class="text-lg text-white/80 mt-2">I optimize performance, SEO, accessibility, and responsiveness across all devices.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center z-10">
          <span class="card-number">04</span>
        </div>
      </div>
      <div class="card">
        <div class="w-2/3 flex flex-col gap-3 z-10">
          <span class="card-step">#05</span>
          <h1 class="text-8xl text-white font-bold">Deployment</h1>
          <p class="text-lg text-white/80 mt-2">I deploy the project and ensure everything is fully functional and production-ready.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center z-10">
          <span class="card-number">05</span>
        </div>
      </div>
    </div>
      
  </div>
  <!--SERVICES-->
  <section class="services-section min-h-screen px-12 py-24">
    <div class="services-section__header mb-16">
        <p class="services-section__eyebrow">Services</p>
        <h2 class="services-section__title">What I can do for you</h2>
        <p class="services-section__subtitle">
            Results-driven web design and development. Clear process, modern design,
            one real goal: turning visitors into clients.
        </p>
    </div>
    <div class="services-grid">

        <div class="service-card">
            <div>
                <div class="service-card__top">
                    <span class="service-card__tag">Starter</span>
                </div>
                <h3 class="service-card__title">Landing Page</h3>
                <p class="service-card__desc">A single page designed to capture leads and convert from the first scroll.</p>
            </div>
            <hr class="service-card__divider">
            <ul class="service-card__list">
                <li>Modern responsive design</li>
                <li>Mobile optimized</li>
                <li>Fast load & high performance</li>
                <li>Basic SEO integrated</li>
                <li>Contact form</li>
            </ul>
            <a href="#contact" class="service-card__cta">See details →</a>
        </div>

        <div class="service-card service-card--featured">
            <div>
                <div class="service-card__top">
                    <span class="service-card__tag">Growth</span>
                    <span class="service-card__badge">Most requested</span>
                </div>
                <h3 class="service-card__title">Web Redesign</h3>
                <p class="service-card__desc">Transform your current site into a modern, clean, conversion-focused experience.</p>
            </div>
            <hr class="service-card__divider">
            <ul class="service-card__list">
                <li>Modern UI/UX with improved branding</li>
                <li>Layouts for all devices</li>
                <li>Improved navigation & user flow</li>
                <li>Conversion-oriented design</li>
                <li>Higher retention & engagement</li>
            </ul>
            <a href="#contact" class="service-card__cta">See details →</a>
        </div>

        <div class="service-card">
            <div>
                <div class="service-card__top">
                    <span class="service-card__tag">Pro</span>
                </div>
                <h3 class="service-card__title">Corporate Website</h3>
                <p class="service-card__desc">Professional digital presence for businesses and personal brands looking to grow.</p>
            </div>
            <hr class="service-card__divider">
            <ul class="service-card__list">
                <li>Solid and professional brand identity</li>
                <li>Designed to generate trust and clients</li>
                <li>Clear communication of services</li>
                <li>UX that retains users longer</li>
                <li>Scalable base that grows with you</li>
            </ul>
            <a href="#contact" class="service-card__cta">See details →</a>
        </div>

    </div>
</section>
</body>
</html>