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
      <button class="px-3 py-2.5 mt-3 bg-[var(--text)] text-white text-xl font-semibold rounded-[50px] w-[200px] text-center self-center hover:bg-[#ada1d4] cursor-pointer transition-all duration-300">
        Let's Talk
      </button>
    </div>
  </div>
  <div class="relative w-full h-full p-4 md:p-12 bg-[var(--bg)] rounded-t-[50px] gap-5">
    <div class="w-full h-auto mt-6 flex flex-col items-left">
      <div class="w-[50%] mt-5">
        <h2 class="text-5xl text-white font-semibold text-black text-left py-2.5">Modern websites built for performance and conversion</h2>
        <h2 class="text-4xl text-white font-medium text-black text-left">I design and develop clean, modern websites focused on results.</h2>
      </div>
    </div>
    <div class="w-full h-[100vh] flex flex-col justify-center items-center mt-5">
      <div class="w-full h-[500px] flex justify-center items-start gap-[60px] mt-[50px]">
        <div class="h-full flex flex-col justify-start items-center">
          <h3 class="text-5xl text-white font-medium text-black mb-3">Fast</h3>
          <p class="text-3xl text-white text-black text-center">Built with performance in mind to ensure fast load times, smooth interactions, and a seamless user experience across all devices.</p>
        </div>
        <div class="h-full flex flex-col justify-center items-center">
          <h3 class="text-5xl text-white font-medium text-black mb-3">Clean Design</h3>
          <p class="text-3xl text-white text-black text-center">Clean, modern interfaces designed with clarity and usability in mind, ensuring users can navigate effortlessly and find what they need.</p>
        </div>
        <div class="h-full flex flex-col justify-end items-center">
          <h3 class="text-5xl text-white font-medium text-black mb-3">Conversion-Focused</h3>
          <p class="text-3xl text-white text-black text-center">Strategically designed to guide users through a clear journey, turning visitors into leads and helping businesses generate more clients.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>