import './bootstrap';
import '../css/app.css';

document.addEventListener("DOMContentLoaded", () => {

  const section = document.getElementById("features-section");
  const glow = document.getElementById("cursor-glow");

  if (!section || !glow) return;

  let gx = 0, gy = 0;
  let tx = 0, ty = 0;

  let size = 300;
  let targetSize = 300;

  let lastX = 0;
  let lastY = 0;

  let isInside = false;

  /* ENTER / LEAVE */
  section.addEventListener("mouseenter", () => {
    isInside = true;
    glow.style.opacity = "1";
  });

  section.addEventListener("mouseleave", () => {
    isInside = false;
    glow.style.opacity = "0";
  });

  /* MOUSE MOVE */
  section.addEventListener("mousemove", (e) => {
    if (!isInside) return;

    tx = e.clientX;
    ty = e.clientY;

    const speed = Math.abs(e.clientX - lastX) + Math.abs(e.clientY - lastY);

    targetSize = 250 + speed * 2;

    lastX = e.clientX;
    lastY = e.clientY;
  });

  /* ANIMATION LOOP */
  function animateGlow() {
    gx += (tx - gx) * 0.12;
    gy += (ty - gy) * 0.12;

    size += (targetSize - size) * 0.1;

    glow.style.left = gx + "px";
    glow.style.top = gy + "px";

    glow.style.width = size + "px";
    glow.style.height = size + "px";

    requestAnimationFrame(animateGlow);
  }

  animateGlow();

  /* RESET WHEN STOP */
  let timeout;

  section.addEventListener("mousemove", () => {
    clearTimeout(timeout);

    timeout = setTimeout(() => {
      targetSize = 220;
    }, 100);
  });

  /* CARDS MOVE */
  let mouseX = 0;
  let mouseY = 0;

  let currentX = 0;
  let currentY = 0;

  document.addEventListener("mousemove", (e) => {
    mouseX = e.clientX / window.innerWidth - 0.5;
    mouseY = e.clientY / window.innerHeight - 0.5;
  });

  function animate() {
    currentX += (mouseX - currentX) * 0.08;
    currentY += (mouseY - currentY) * 0.08;

    document.querySelectorAll(".feature").forEach((el, i) => {
      const intensity = (i + 1) * 15;

      el.style.transform = `
        translate(${currentX * intensity}px, ${currentY * intensity}px)
      `;
    });

    requestAnimationFrame(animate);
  }

  animate();

  /* SCROLL CARDS */
  const cards = document.querySelectorAll(".card");

  function animateCards() {
    const windowHeight = window.innerHeight;

    cards.forEach((card) => {
      const rect = card.getBoundingClientRect();

      const cardCenter = rect.top + rect.height / 2;
      const screenCenter = windowHeight / 2;

      const distance = Math.abs(screenCenter - cardCenter);

      const scale = Math.max(0.85, 1 - distance / 1000);

      const opacity = Math.max(0.3, 1 - distance / 800);
      
      const blur = Math.min(distance / 100, 5);
      card.style.filter = `blur(${blur}px)`;

      card.style.transform = `scale(${scale})`;
      card.style.opacity = opacity;
    });

    requestAnimationFrame(animateCards);
  }

  animateCards();

  /*HERO SECTION  */
  const hero = document.getElementById("hero");

  window.addEventListener("scroll", () => {
    const scrollY = window.scrollY;

    // controla cuánto desaparece
    const opacity = 1 - scrollY / 600;

    // mueve hacia arriba
    const translateY = scrollY * 0.5;

    hero.style.opacity = Math.max(opacity, 0);
    hero.style.transform = `translateY(-${translateY}px)`;
  });
});