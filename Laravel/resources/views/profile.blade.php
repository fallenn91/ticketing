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
  <header class="glassmorph fixed top-[10px] left-1/2 -translate-x-1/2 w-[50%] h-[5vh] p-4 flex justify-center items-center z-20">
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
  <div class="w-full h-screen flex justify-center items-center bg-[var(--secondary)] p-4 md:p-12">
    <div class="fixed top-0 left-0 w-full h-full flex flex-col justify-center p-12 gap-5 z-0">
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
          <p class="text-3xl text-white text-black text-center">Built with performance in mind to ensure fast load times, smooth interactions, and a seamless user experience across all devices.</p>
        </div>
        <div class="feature h-full flex flex-col justify-center items-center">
          <h3 class="text-5xl text-white font-medium text-black mb-3">Clean Design</h3>
          <p class="text-3xl text-white text-black text-center">Clean, modern interfaces designed with clarity and usability in mind, ensuring users can navigate effortlessly and find what they need.</p>
        </div>
        <div class="feature h-full flex flex-col justify-end items-center">
          <h3 class="text-5xl text-white font-medium text-black mb-3">Conversion-Focused</h3>
          <p class="text-3xl text-white text-black text-center">Strategically designed to guide users through a clear journey, turning visitors into leads and helping businesses generate more clients.</p>
        </div>
      </div>
    </div>
    <!--SCROLL HORIZONTAL -->
    <div id="slider" class="slider w-full bg-[var(--secondary)] p-4 md:p-12">
      <div class="track w-full justify-center items-center">
        <h1 class="text-3xl text-black text-center">Laravel |</h1>
        <h1 class="text-3xl text-black text-center">Wordpress |</h1>
        <h1 class="text-3xl text-black text-center">HTML |</h1>
        <h1 class="text-3xl text-black text-center">CSS |</h1>
        <h1 class="text-3xl text-black text-center">Tailwind |</h1>
        <h1 class="text-3xl text-black text-center">Php |</h1>
        <h1 class="text-3xl text-black text-center">Git |</h1>
        <h1 class="text-3xl text-black text-center">Docker |</h1>
        <h1 class="text-3xl text-black text-center">React |</h1>
        <h1 class="text-3xl text-black text-center">Node |</h1>
        <h1 class="text-3xl text-black text-center">MongoDB |</h1>
        <h1 class="text-3xl text-black text-center">Express |</h1>
        <h1 class="text-3xl text-black text-center">Bootstrap |</h1>
        <h1 class="text-3xl text-black text-center">Laravel |</h1>
        <h1 class="text-3xl text-black text-center">Wordpress |</h1>
        <h1 class="text-3xl text-black text-center">HTML |</h1>
        <h1 class="text-3xl text-black text-center">CSS |</h1>
        <h1 class="text-3xl text-black text-center">Tailwind |</h1>
        <h1 class="text-3xl text-black text-center">Php |</h1>
        <h1 class="text-3xl text-black text-center">Git |</h1>
        <h1 class="text-3xl text-black text-center">Docker |</h1>
        <h1 class="text-3xl text-black text-center">React |</h1>
        <h1 class="text-3xl text-black text-center">Node |</h1>
        <h1 class="text-3xl text-black text-center">MongoDB |</h1>
        <h1 class="text-3xl text-black text-center">Express |</h1>
        <h1 class="text-3xl text-black text-center">Bootstrap |</h1>
      </div>
    </div>
    <!-- CARDS -->
    <div class="w-full flex flex-col justify-center items-center p-4 md:p-12 mt-5 gap-5">
      <h2 class="text-4xl text-white font-medium text-black mb-3">Every project follows a clear process focused on design, performance, and conversion. I don’t just build websites — I create digital experiences designed to attract users and generate real results.</h2>
      <div class="card w-full h-[400px] flex justify-between items-center px-[50px] rounded-lg bg-[var(--text)] gap-5 mt-5">
        <div class="w-2/3">
          <h1 class="text-8xl text-white font-bold text-black mb-3">Project Analysis</h1>
          <p class="text-3xl text-white mt-5">I analyze the business, target audience, and project goals. This helps define what the website needs to achieve real results.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center">
          <h2 class="text-9xl text-white leading-none tracking-tight font-bold scale-y-[2]">01</h2>
        </div>
      </div>
      <div class="card w-full h-[400px] flex justify-between items-center px-[50px] rounded-lg bg-[var(--text)] gap-5 mt-5">
        <div class="w-2/3">
          <h1 class="text-8xl text-white font-bold text-black mb-3">UI/UX Design</h1>
          <p class="text-3xl text-white mt-5">I design clean, modern, and user-focused interfaces. Every layout is crafted to guide users toward conversion.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center">
          <h2 class="text-9xl text-white leading-none tracking-tight font-bold scale-y-[2]">02</h2>
        </div>
      </div>
      <div class="card w-full h-[400px] flex justify-between items-center px-[50px] rounded-lg bg-[var(--text)] gap-5 mt-5">
        <div class="w-2/3">
          <h1 class="text-8xl text-white font-bold text-black mb-3">Development</h1>
          <p class="text-3xl text-white mt-5">I build scalable and high-performance websites using modern technologies like Laravel or Next.js, following best practices.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center">
          <h2 class="text-9xl text-white leading-none tracking-tight font-bold scale-y-[2]">03</h2>
        </div>
      </div>
      <div class="card w-full h-[400px] flex justify-between items-center px-[50px] rounded-lg bg-[var(--text)] gap-5 mt-5">
        <div class="w-2/3">
          <h1 class="text-8xl text-white font-bold text-black mb-3">Optimization</h1>
          <p class="text-3xl text-white mt-5">I optimize performance, SEO, accessibility, and responsiveness across all devices.</p>
        </div>
        <div class="w-1/2 h-full flex justify-end items-center">
          <h2 class="text-9xl text-white leading-none tracking-tight font-bold scale-y-[2]">04</h2>
        </div>
      </div>
      <div class="card w-full h-[400px] flex justify-between items-center px-[50px] rounded-lg bg-[var(--text)] gap-5 mt-5">
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
  <div class="w-full h-screen bg-[var(--secondary)] p-4 md:p-12">
      <div class="w-full flex justify-center items-center gap-4">
        <div class="services w-[400px]">
          <h2 class="text-5xl text-white font-medium text-black">Landing Page</h2>
          <ul class="space-y-3">
            <li class="text-white">✔ Modern and responsive design</li>
            <li>✔ Mobile optimized</li>
            <li>✔ Fast loading performance</li>
            <li>✔ Basic SEO setup</li>
            <li>✔ Contact form integration</li>
          </ul>
        </div>
      </div>
    </div>
</body>
</html>