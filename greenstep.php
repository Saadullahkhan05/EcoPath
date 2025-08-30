<?php
session_start(); // for session use
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EcoPath — GreenSteps</title>
  <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">


  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"/>

  <style>
    :root{
      --green:#4caf50;
      --aqua:#00e6e6;
      --dark-bg:#121212;
      --light-bg:#f9f9f9;
      --text-dark:#222;
      --text-light:#fff;
    }
    body{font-family:'Poppins', system-ui, -apple-system, Segoe UI, Roboto, sans-serif;background:var(--light-bg);color:var(--text-dark);transition:background .3s,color .3s}
    .font-montserrat{font-family:'Montserrat',system-ui, sans-serif}

    /* ====== PREMIUM SVG TREE LOADER ====== */
    #loader{
      position:fixed; inset:0; z-index:9999; display:flex; align-items:center; justify-content:center;
      background: radial-gradient(1200px 600px at 50% -20%, rgba(183,228,199,.55), rgba(247,247,232,.9) 60%);
      backdrop-filter: blur(2px);
    }
    .loader-wrap{display:grid; place-items:center; gap:.75rem}
    .fade-out{animation: loaderFade .7s ease forwards}
    @keyframes loaderFade{to{opacity:0; visibility:hidden}}
    /* SVG stroke draw helpers */
    .draw{stroke-dasharray:var(--len,800); stroke-dashoffset:var(--len,800); animation: draw 2.1s ease forwards}
    .draw.delay-1{animation-delay:.35s}
    .draw.delay-2{animation-delay:.7s}
    @keyframes draw {to{stroke-dashoffset:0}}
    .leaf-pop{opacity:0; transform:scale(.6); transform-origin:center; animation: leaf .65s cubic-bezier(.22,.9,.25,1.3) forwards}
    .leaf-pop.d1{animation-delay:1.2s}
    .leaf-pop.d2{animation-delay:1.35s}
    .leaf-pop.d3{animation-delay:1.5s}
    .leaf-pop.d4{animation-delay:1.65s}
    .leaf-pop.d5{animation-delay:1.8s}
    .leaf-pop.d6{animation-delay:1.95s}
    @keyframes leaf {to{opacity:1; transform:scale(1)}}

    /* Gradient animated title */
    @keyframes gradient-move {
      0%{background-position:0% 50%}
      50%{background-position:100% 50%}
      100%{background-position:0% 50%}
    }
    .animate-gradient-text{
      background: linear-gradient(90deg,#32a336,#c0f1bb,#3e7e46,#b7e4c7);
      background-size:200% 200%;
      -webkit-background-clip:text; background-clip:text; color:transparent;
      animation: gradient-move 3s ease-in-out infinite;
    }

    /* Scroll reveal */
    .reveal{opacity:0; transform:translateY(30px); transition:all .7s ease}
    .reveal.show{opacity:1; transform:translateY(0)}

    /* Card hover subtle 3D */
    .tilt{transition: transform .35s ease, box-shadow .35s ease; will-change: transform}
    .tilt:hover{transform: translateY(-4px) scale(1.01); box-shadow: 0 20px 50px -20px rgba(24,46,22,.22)}
  </style>
</head>

<body class="bg-white">

  <!-- ====== Loader with Premium SVG Tree ====== -->
  <div id="loader">
    <div class="loader-wrap">
      <svg width="180" height="220" viewBox="0 0 180 220" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Growing tree">
        <!-- trunk -->
        <path d="M90 190 L90 110"
              stroke="#2F6135" stroke-width="10" stroke-linecap="round"
              class="draw" style="--len:160"/>
        <!-- main branches -->
        <path d="M90 130 C 70 120, 60 105, 55 90" stroke="#2F6135" stroke-width="8" stroke-linecap="round" class="draw delay-1" style="--len:160"/>
        <path d="M90 140 C 110 130, 120 112, 125 95" stroke="#2F6135" stroke-width="8" stroke-linecap="round" class="draw delay-2" style="--len:160"/>
        <!-- leaves (circles) -->
        <circle cx="52" cy="86" r="10" fill="#72C48B" class="leaf-pop d1"/>
        <circle cx="126" cy="92" r="11" fill="#72C48B" class="leaf-pop d2"/>
        <circle cx="75" cy="105" r="9" fill="#8ED1A1" class="leaf-pop d3"/>
        <circle cx="105" cy="108" r="9" fill="#8ED1A1" class="leaf-pop d4"/>
        <circle cx="90" cy="95" r="10" fill="#5BBE77" class="leaf-pop d5"/>
        <circle cx="140" cy="78" r="8" fill="#5BBE77" class="leaf-pop d6"/>
        <!-- ground -->
        <ellipse cx="90" cy="195" rx="36" ry="8" fill="rgba(47,97,53,.15)"/>
      </svg>
      <p class="text-[#2F6135] font-semibold">Growing your GreenSteps...</p>
    </div>
  </div>

  <!-- !-- Navbar section  -->
  <header>

    <nav
      class="z-50 fixed top-2 left-2 right-2 w-[calc(100%-16px)] h-[70px] bg-gradient-to-r from-[#d9f5e5] via-[#b7e4c7] to-[#f7f7e8] rounded-2xl shadow-[0_4px_20px_-2px_rgba(24,46,22,0.3)] flex justify-between items-center transition-all duration-700 ease-in-out animate-fade-in-down px-4 md:px-10">

      <!-- Logo -->
      <div class="logo flex items-center gap-2 font-poppins text-xl md:text-2xl lg:text-3xl font-bold text-white">
        <img class="h-8 w-8" src="./favicon.png" alt="">
        <div class="text-[#3e7e46]">EcoPath</div>
      </div>

      <!-- Hamburger Icon -->
      <button id="menu-toggle"
        class="md:hidden flex items-center px-3 py-2 rounded-2xl border border-[#b7e4c7] bg-white shadow font-poppins"
        aria-label="Open Menu">
        <svg class="h-8 w-8 text-[#3d3d3d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <!-- Nav Links -->
      <ul id="nav-links" class="hidden md:flex gap-6 lg:gap-10 pr-4 md:pr-4 list-none">
        <li><a href="./index.php"
            class="text-[#3d3d3d] font-poppins text-lg lg:text-xl no-underline transition-colors duration-300 hover:text-[#3e7e46]">Home</a>
        </li>
        <li><a href="./eco awareness.html"
            class="text-[#3d3d3d] font-poppins text-lg lg:text-xl no-underline transition-colors duration-300 hover:text-[#3e7e46]">EcoAwareness</a>
        </li>
        <li><a href="greenstep.php"
            class="text-[#3d3d3d] font-poppins text-lg lg:text-xl no-underline transition-colors duration-300 hover:text-[#3e7e46]">GreenSteps</a>
        </li>
        <li><a href="./join  now.html"
            class="text-[#3d3d3d] font-poppins text-lg lg:text-xl no-underline transition-colors duration-300 hover:text-[#3e7e46]">Join
            Us</a></li>

        <!-- logout toggle -->
        <?php if (isset($_SESSION['user_id'])): ?>
          <!-- ✅ Jab user login ho -->
          <!-- <li><a href="dashboard.php">Dashboard</a></li> -->
          <li><a href="logout.php"
              class="text-[#3d3d3d] font-poppins font-bold text-lg lg:text-xl no-underline transition-colors duration-300 hover:text-white">Logout</a>
          </li>
        <?php else: ?>
          <!-- ✅ Jab user login NA ho -->
          <li><a href="./signup.html"
              class="text-[#3d3d3d] font-poppins font-bold text-lg lg:text-xl no-underline transition-colors duration-300 hover:text-white">Signup
            </a></li>
          <li><a href="./signIn.html"
              class="text-[#3d3d3d] font-poppins font-bold text-lg lg:text-xl no-underline transition-colors duration-300 hover:text-white">SignIn
            </a></li> <?php endif; ?>

      </ul>

    </nav>

    <!-- Nav Animation -->
    <style>
      @keyframes fade-in-down {
        0% {
          opacity: 0;
          transform: translateY(-40px);
        }

        100% {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .animate-fade-in-down {
        animation: fade-in-down 1s cubic-bezier(0.4, 0, 0.2, 1);
      }
    </style>

  </header>

  <!-- ===== HERO ===== -->
  <section class="mt-[100px] mx-2 h-auto bg-gradient-to-b from-[#F7FFF8] to-[#E8F6EA] rounded-2xl shadow-[0_4px_20px_-2px_rgba(24,46,22,0.3)]">
    <div class="flex flex-col lg:flex-row justify-between items-center h-full px-6 lg:px-12 py-10">
      <div class="text-center lg:text-left max-w-xl">
        <h1 class="font-montserrat text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-[#3e7e46] font-bold leading-snug animate-gradient-text">
          GREENSTEPS YOUR 7-DAY ECO JOURNEY
        </h1>
        <p class="font-poppins text-base sm:text-lg md:text-xl text-[#3d3d3d] mt-6 leading-relaxed">
          Start small. Stay consistent. See real impact. GreenSteps aap ko daily actionable tasks deta hai — plastic kam karo, energy save karo, aur nature ko protect karo.
        </p>
        <a href="#challenge" class="inline-block mt-6 px-6 py-3 rounded-xl bg-[#3e7e46] text-white font-semibold hover:scale-[1.02] transition">Start Challenge</a>
      </div>

      <div class="flex justify-center lg:justify-end flex-1 mt-8 lg:mt-0">
        <img src="./greenstep.png" alt="tree" class="max-h-[400px] w-full max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl drop-shadow-[0_4px_20px_rgba(42,82,39,0.466)] animate-tree-sway">
        <style>
          @keyframes tree-sway{
            0%{transform:rotate(-2deg) scaleX(.99)}
            20%{transform:rotate(2deg) scaleX(1.01)}
            40%{transform:rotate(-2deg) scaleX(.99)}
            60%{transform:rotate(2deg) scaleX(1.01)}
            80%{transform:rotate(-2deg) scaleX(.99)}
            100%{transform:rotate(-2deg) scaleX(.99)}
          }
          .animate-tree-sway{animation:tree-sway 8s infinite linear; transform-origin:bottom center; will-change:transform}
        </style>
      </div>
    </div>
  </section>

  <!-- ===== 7-DAY CHALLENGE ===== -->
  <section id="challenge" class="mt-16 mx-2 rounded-2xl reveal">
    <div class="flex flex-col text-center w-full mb-8">
      <h2 class="text-2xl sm:text-3xl font-montserrat font-bold text-[#3e7e46]">Your 7-Day Challenge</h2>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base sm:text-lg md:text-xl text-gray-900">Roz thora thora — 7 din mein habits banengi 🌱</p>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      <?php
        $days = [
          "Carry reusable bag & bottle",
          "Switch off appliances completely",
          "Avoid plastic for 24 hours",
          "Walk or cycle instead of car",
          "Eat a plant-based meal",
          "Pick up 10 pieces of litter",
          "Share a green tip online",
        ];
        foreach ($days as $i => $text):
      ?>
      <label class="tilt cursor-pointer min-w-[280px] p-5 rounded-xl shadow bg-gradient-to-br from-[#F8FAF7] to-[#E8F6EA] border border-white/60">
        <div class="flex items-start gap-3">
          <input type="checkbox" class="mt-1 scale-125 accent-[#3e7e46]">
          <div>
            <div class="font-semibold text-[#2F6135]">Day <?php echo $i+1; ?></div>
            <div class="text-[#3d3d3d]"><?php echo htmlspecialchars($text); ?></div>
          </div>
        </div>
      </label>
      <?php endforeach; ?>
    </div>

    <!-- progress bar -->
    <div class="max-w-3xl mx-auto mt-8">
      <div class="flex items-center justify-between mb-2">
        <span class="text-sm font-semibold text-[#2F6135]">Progress</span>
        <span id="progressText" class="text-sm font-semibold text-[#2F6135]">0 / 7</span>
      </div>
      <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">
        <div id="progressFill" class="h-full w-0 bg-gradient-to-r from-[#3e7e46] to-[#b7e4c7] transition-[width] duration-700"></div>
      </div>
    </div>
  </section>

  <!-- ===== ACHIEVEMENTS ===== -->
  <section class="mt-16 mx-2 rounded-2xl reveal">
    <div class="flex flex-col text-center w-full mb-8">
      <h2 class="text-2xl sm:text-3xl font-montserrat font-bold text-[#3e7e46]">Achievements</h2>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base sm:text-lg md:text-xl text-gray-900">Badges unlock hongay jab progress bar aage badhega ✨</p>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
      <div class="tilt p-5 rounded-xl shadow bg-white/70 backdrop-blur border border-white/60">
        <div class="text-lg font-semibold">🌱 Starter Badge</div>
        <p class="text-sm text-gray-600">First task complete</p>
      </div>
      <div class="tilt p-5 rounded-xl shadow bg-white/70 backdrop-blur border border-white/60">
        <div class="text-lg font-semibold">🍃 Eco Warrior</div>
        <p class="text-sm text-gray-600">All 7 days</p>
      </div>
      <div class="tilt p-5 rounded-xl shadow bg-white/70 backdrop-blur border border-white/60">
        <div class="text-lg font-semibold">♻️ Zero Waste Hero</div>
        <p class="text-sm text-gray-600">3 days no plastic</p>
      </div>
      <div class="tilt p-5 rounded-xl shadow bg-white/70 backdrop-blur border border-white/60">
        <div class="text-lg font-semibold">🚶 Green Commuter</div>
        <p class="text-sm text-gray-600">Eco transport week</p>
      </div>
    </div>

  </section>


  
  <!-- ===== ECO QUOTES ===== -->
  <section class="mt-16 mx-2 rounded-2xl reveal">
    <div class="flex flex-col text-center w-full mb-6">
      <h2 class="text-2xl sm:text-3xl font-montserrat font-bold text-[#3e7e46]">Eco Thoughts</h2>
    </div>
    <blockquote id="quoteBox" class="max-w-3xl mx-auto text-center text-xl text-[#2F6135] italic transition-opacity duration-500">
      “We do not inherit the Earth from our ancestors, we borrow it from our children.”
      <span class="block not-italic text-base text-[#3D3D3D] mt-2">— Native American Proverb</span>
    </blockquote>
  </section>

  <!-- ===== CARBON FOOTPRINT (UI only) ===== -->
  <section class="mt-16 mx-2 rounded-2xl reveal">
    <div class="flex flex-col text-center w-full mb-8">
      <h2 class="text-2xl sm:text-3xl font-montserrat font-bold text-[#3e7e46]">Carbon Footprint (UI)</h2>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base sm:text-lg md:text-xl text-gray-900">Quick estimate UI — backend/logic baad me connect ho sakta hai.</p>
    </div>
    <form class="max-w-3xl mx-auto grid gap-4 sm:grid-cols-2">
      <div>
        <label class="block text-sm font-semibold mb-1 text-[#2F6135]">Monthly Electricity (kWh)</label>
        <input type="number" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#3e7e46]" placeholder="e.g., 250">
      </div>
      <div>
        <label class="block text-sm font-semibold mb-1 text-[#2F6135]">Monthly Gas (m³)</label>
        <input type="number" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#3e7e46]" placeholder="e.g., 30">
      </div>
      <div>
        <label class="block text-sm font-semibold mb-1 text-[#2F6135]">Weekly Car KM</label>
        <input type="number" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#3e7e46]" placeholder="e.g., 60">
      </div>
      <div>
        <label class="block text-sm font-semibold mb-1 text-[#2F6135]">Flights / year</label>
        <input type="number" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#3e7e46]" placeholder="e.g., 2">
      </div>
      <div class="sm:col-span-2">
        <button type="button" id="calcBtn" class="w-full sm:w-auto px-6 py-3 rounded-xl bg-[#3e7e46] text-white font-semibold hover:scale-[1.02] transition">Estimate</button>
        <span id="calcResult" class="ml-3 font-semibold text-[#2F6135]"></span>
      </div>
    </form>
  </section>

  <!-- ===== EXTRA TIPS ===== -->
  <section class="mt-16 mx-2 rounded-2xl reveal">
    <div class="flex flex-col text-center w-full mb-8">
      <h2 class="text-2xl sm:text-3xl font-montserrat font-bold text-[#3e7e46]">Quick Eco Tips</h2>
    </div>
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
      <div class="tilt p-5 rounded-xl shadow bg-gradient-to-br from-[#F8FAF7] to-[#E8F6EA]">Use LED bulbs 💡</div>
      <div class="tilt p-5 rounded-xl shadow bg-gradient-to-br from-[#F8FAF7] to-[#E8F6EA]">Shorter showers 🚿</div>
      <div class="tilt p-5 rounded-xl shadow bg-gradient-to-br from-[#F8FAF7] to-[#E8F6EA]">Public transport 🚌</div>
      <div class="tilt p-5 rounded-xl shadow bg-gradient-to-br from-[#F8FAF7] to-[#E8F6EA]">Compost kitchen waste 🌿</div>
    </div>
  </section>

  <!-- ===== FOOTER (same as your index.php style) ===== -->
  <footer class="text-gray-600 body-font bg-[#f7f7e8] mt-8">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
      <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
        <img src="./favicon.png" alt="EcoPath Logo" class="w-10 h-10 p-2 rounded-full" />
        <span class="ml-3 text-xl">EcoPath</span>
      </a>

      <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2025
        EcoPath —
        <a href="EcoPath2025@gmail.com" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">EcoPath2025@gmail.com</a>
      </p>

      <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
        <a class="text-gray-500" target="_blank">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
          </svg>
        </a>

        <a class="ml-3 text-gray-500" href="https://x.com/Ecopath2025" target="_blank">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
          </svg>
        </a>

        <a class="ml-3 text-gray-500" href="https://www.instagram.com/ecopath2025/" target="_blank">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            class="w-5 h-5" viewBox="0 0 24 24">
            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
          </svg>
        </a>

        <a class="ml-3 text-gray-500" target="_blank" href="www.linkedin.com/in/ecopath2025">
          <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0"
            class="w-5 h-5" viewBox="0 0 24 24">
            <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
            <circle cx="4" cy="4" r="2" stroke="none"></circle>
          </svg>
        </a>

        <a class="ml-3 text-gray-500" href="https://youtube.com/@ecopath2025?si=BjshOUmre0S4X0ZX" target="_blank" rel="noopener">
          <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0"
            class="w-5 h-5" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 001.46 6.42 29.94 29.94 0 001 12c0 2 .16 3.73.46 5.58a2.78 2.78 0 001.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.96C22.84 15.73 23 14 23 12s-.16-3.73-.46-5.58zM10 15V9l5 3-5 3z"></path>
          </svg>
        </a>
      </span>
    </div>
  </footer>

  <!-- ===== SCRIPTS ===== -->
  <script>
    // Loader hide after animation ends
    window.addEventListener('load', () => {
      const loader = document.getElementById('loader');
      // max 2.6s for draw + leaves + pause
      setTimeout(() => loader.classList.add('fade-out'), 2400);
      setTimeout(() => loader.style.display = 'none', 3100);
    });

    // Hamburger menu toggle
    const menuToggle = document.getElementById('menu-toggle');
    const navLinks = document.getElementById('nav-links');
    menuToggle?.addEventListener('click', function () {
      navLinks.classList.toggle('hidden');
      navLinks.classList.toggle('flex');
      navLinks.classList.toggle('flex-col');
      navLinks.classList.toggle('absolute');
      navLinks.classList.toggle('top-[70px]');
      navLinks.classList.toggle('left-0');
      navLinks.classList.toggle('w-full');
      navLinks.classList.toggle('bg-gradient-to-r');
      navLinks.classList.toggle('from-[#d9f5e5]');
      navLinks.classList.toggle('via-[#b7e4c7]');
      navLinks.classList.toggle('to-[#f7f7e8]');
      navLinks.classList.toggle('rounded-b-2xl');
      navLinks.classList.toggle('shadow-[0_4px_20px_-2px_rgba(24,46,22,0.3)]');
      navLinks.classList.toggle('z-40');
      navLinks.classList.toggle('py-4');
    });

    // Scroll reveal
    const onScroll = () => {
      document.querySelectorAll('.reveal').forEach(el=>{
        const rect = el.getBoundingClientRect();
        if(rect.top < window.innerHeight - 80) el.classList.add('show');
      });
    };
    document.addEventListener('scroll', onScroll);
    window.addEventListener('load', onScroll);

    // Progress interactions (UI only)
    const boxes = Array.from(document.querySelectorAll('#challenge input[type="checkbox"]'));
    const fill = document.getElementById('progressFill');
    const text = document.getElementById('progressText');
    function updateProgress(){
      const done = boxes.filter(b=>b.checked).length;
      const total = boxes.length || 7;
      const pct = Math.round((done/total)*100);
      fill.style.width = pct + '%';
      if(text) text.textContent = `${done} / ${total}`;
    }
    boxes.forEach(b=> b.addEventListener('change', updateProgress));

    // Carbon UI (simple demo)
    document.getElementById('calcBtn')?.addEventListener('click', ()=>{
      const inputs = Array.from(document.querySelectorAll('section input[type="number"]'));
      const sum = inputs.reduce((a,i)=> a + (parseFloat(i.value)||0), 0);
      const est = (sum*0.02).toFixed(2);
      const out = document.getElementById('calcResult');
      if(out){ out.textContent = `~ ${est} tCO₂e (rough UI estimate)`; }
    });
  </script>
</body>
</html>
