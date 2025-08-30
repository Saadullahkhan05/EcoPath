<?php
session_start(); // for session use
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EcoPath</title>
  <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@400;500;600&display=swap"
    rel="stylesheet">

  <!-- loader styling -->
  <style>
    /* Theme colors */
    :root {
      --green: #4caf50;
      --aqua: #00e6e6;
      --dark-bg: #121212;
      --light-bg: #f9f9f9;
      --text-dark: #222;
      --text-light: #fff;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: var(--light-bg);
      color: var(--text-dark);
      transition: background 0.3s, color 0.3s;
    }

    body.dark-mode {
      background: var(--dark-bg);
      color: var(--text-light);
    }

    /* Loader default style */
    #loader {
      position: fixed;
      inset: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background: var(--dark-bg);
      z-index: 9999;
    }

    /* Circle loader */
    .spinner {
      width: 60px;
      height: 60px;
      border: 6px solid rgba(255, 255, 255, 0.3);
      border-top: 6px solid var(--green);
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    /* ===== Loader variants: circle vs line (toggle via #loader class) ===== */
    #loader.circle .spinner {
      display: block;
    }

    #loader.circle .line-loader {
      display: none;
    }

    #loader.line .spinner {
      display: none;
    }

    #loader.line .line-loader {
      display: block;
    }

    /* Line (indeterminate) loader */
    .line-loader {
      width: min(560px, 70vw);
      height: 4px;
      background: rgba(255, 255, 255, 0.25);
      border-radius: 999px;
      overflow: hidden;
      position: absolute;
      bottom: 18%;
      left: 50%;
      transform: translateX(-50%);
    }

    .line-bar {
      width: 40%;
      height: 100%;
      background: linear-gradient(90deg, var(--green), var(--aqua));
      border-radius: 999px;
      animation: indeterminate 1.1s ease-in-out infinite;
    }

    @keyframes indeterminate {
      0% {
        transform: translateX(-120%);
      }

      100% {
        transform: translateX(260%);
      }
    }

    /* Dark mode toggle */
    .dark-toggle {
      position: fixed;
      top: 15px;
      right: 15px;
      border: none;
      background: var(--green);
      color: #fff;
      padding: 8px 12px;
      border-radius: 50%;
      cursor: pointer;
      font-size: 1.2rem;
      transition: background 0.3s;
    }

    .dark-toggle:hover {
      background: var(--aqua);
    }

    /* Sections */
    .container {
      max-width: 800px;
      margin: 100px auto;
      padding: 20px;
      text-align: center;
    }

    .section {
      display: none;
    }

    .section h1 {
      font-size: 2rem;
      margin-bottom: 10px;
    }

    .section p,
    blockquote {
      font-size: 1.1rem;
    }

    /* Navigation buttons */
    .nav-buttons {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin: 20px;
    }

    .nav-buttons button {
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      background: var(--green);
      color: #fff;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
    }

    .nav-buttons button:hover {
      background: var(--aqua);
    }
  </style>

  <!-- Smooth Scrolling and Hero Animation Styles -->
  <style>
    /* Eco particle effect - Floating dots */
    .eco-particle {
      position: fixed;
      background: rgba(62, 126, 70, 0.6);
      border-radius: 50%;
      pointer-events: none;
      animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0) rotate(0deg);
        opacity: 0.7;
      }

      50% {
        transform: translateY(-20px) rotate(180deg);
        opacity: 1;
      }
    }
  </style>

</head>

<body class="bg-white">
  <!-- ====== LOADER START ====== -->
  <div id="loader">
    <div class="loader-wrap">
      <svg width="200" height="240" viewBox="0 0 200 240" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
        aria-label="Growing tree">
        <!-- Sunlight glow -->
        <circle cx="100" cy="100" r="70" fill="url(#sun)" opacity="0.3">
          <animate attributeName="r" values="60;80;60" dur="6s" repeatCount="indefinite" />
        </circle>
        <defs>
          <radialGradient id="sun" cx="0.5" cy="0.5" r="0.5">
            <stop offset="0%" stop-color="#fff176" />
            <stop offset="100%" stop-color="transparent" />
          </radialGradient>
        </defs>

        <!-- trunk -->
        <path d="M100 200 L100 120" stroke="#2F6135" stroke-width="12" stroke-linecap="round" class="draw trunk"
          style="--len:160" />

        <!-- main branches -->
        <path d="M100 140 C 80 130, 70 115, 65 95" stroke="#2F6135" stroke-width="9" stroke-linecap="round"
          class="draw delay-1 branch" style="--len:160" />
        <path d="M100 150 C 120 140, 130 118, 135 100" stroke="#2F6135" stroke-width="9" stroke-linecap="round"
          class="draw delay-2 branch" style="--len:160" />

        <!-- leaves -->
        <circle cx="62" cy="92" r="11" fill="#72C48B" class="leaf-pop d1" />
        <circle cx="138" cy="98" r="12" fill="#72C48B" class="leaf-pop d2" />
        <circle cx="82" cy="110" r="9" fill="#8ED1A1" class="leaf-pop d3" />
        <circle cx="118" cy="112" r="9" fill="#8ED1A1" class="leaf-pop d4" />
        <circle cx="100" cy="102" r="10" fill="#5BBE77" class="leaf-pop d5" />
        <circle cx="150" cy="85" r="9" fill="#5BBE77" class="leaf-pop d6" />

        <!-- ground -->
        <ellipse cx="100" cy="205" rx="40" ry="9" fill="rgba(47,97,53,.15)" />
      </svg>
      <p class="text-[#2F6135] font-semibold">BEGINS YOUR jOURNEY</p>
    </div>
  </div>

  <style>
    #loader {
      position: fixed;
      inset: 0;
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      background: radial-gradient(1000px 500px at 50% -10%, rgba(183, 228, 199, .55), rgba(247, 247, 232, .9) 60%);
      backdrop-filter: blur(2px);
    }

    .loader-wrap {
      display: grid;
      place-items: center;
      gap: .75rem
    }

    /* Fade out after animation */
    .fade-out {
      animation: loaderFade .8s ease forwards
    }

    @keyframes loaderFade {
      to {
        opacity: 0;
        visibility: hidden
      }
    }

    /* Draw animation */
    .draw {
      stroke-dasharray: var(--len, 800);
      stroke-dashoffset: var(--len, 800);
      animation: draw 2s ease forwards;
    }

    .draw.trunk {
      animation-duration: 2.2s
    }

    .draw.delay-1 {
      animation-delay: .5s
    }

    .draw.delay-2 {
      animation-delay: .9s
    }

    @keyframes draw {
      to {
        stroke-dashoffset: 0
      }
    }

    /* Branch glow */
    .branch {
      filter: drop-shadow(0 0 4px #4caf50aa)
    }

    .branch {
      animation: draw 1.8s ease forwards, branchGlow 2s 2s infinite alternate
    }

    @keyframes branchGlow {
      from {
        filter: drop-shadow(0 0 2px #4caf50aa)
      }

      to {
        filter: drop-shadow(0 0 8px #4caf50ff)
      }
    }

    /* Leaves pop */
    .leaf-pop {
      opacity: 0;
      transform: scale(.4);
      transform-origin: center;
      animation: leaf .7s cubic-bezier(.22, .9, .25, 1.3) forwards
    }

    .leaf-pop.d1 {
      animation-delay: 1.2s
    }

    .leaf-pop.d2 {
      animation-delay: 1.4s
    }

    .leaf-pop.d3 {
      animation-delay: 1.6s
    }

    .leaf-pop.d4 {
      animation-delay: 1.8s
    }

    .leaf-pop.d5 {
      animation-delay: 2s
    }

    .leaf-pop.d6 {
      animation-delay: 2.2s
    }

    @keyframes leaf {
      to {
        opacity: 1;
        transform: scale(1)
      }
    }
  </style>

  <script>
    window.addEventListener('load', () => {
      const loader = document.getElementById('loader');
      setTimeout(() => loader.classList.add('fade-out'), 3000);
      setTimeout(() => loader.style.display = "none", 3800);
    });
  </script>
  <!-- ====== LOADER END ====== -->


  <!-- Navbar section -->
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


  <!-- Hero Section -->
  <section
    class="hero-section mt-[100px] mx-2 h-auto bg-gradient-to-b from-[#F7FFF8] to-[#E8F6EA] rounded-2xl shadow-[0_4px_20px_-2px_rgba(24,46,22,0.3)]">

    <!-- main div -->
    <div class="flex flex-col lg:flex-row justify-between items-center h-full px-6 lg:px-12 py-10">

      <!-- content 1 -->
      <div class="text-center lg:text-left max-w-xl">
        <h1
          class="font-montserrat text-1xl sm:text-2xl md:text-3xl lg:text-4xl text-[#3e7e46] font-bold leading-snug animate-gradient-text"
          style="background: linear-gradient(90deg, #32a336, #c0f1bb, #3e7e46, #b7e4c7); background-size: 200% 200%; -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; color: transparent;">
          WELCOME TO ECOPATH <br> YOUR GREEN JOURNEY BEGINS HERE
        </h1>

        <!-- h1 styling -->
        <style>
          @keyframes gradient-move {
            0% {
              background-position: 0% 50%;
            }

            50% {
              background-position: 100% 50%;
            }

            100% {
              background-position: 0% 50%;
            }
          }

          .animate-gradient-text {
            animation: gradient-move 3s ease-in-out infinite;
          }
        </style>

        <p class="font-poppins text-base sm:text-lg md:text-xl text-[#3d3d3d] mt-6 leading-relaxed">
          Discover how your everyday choices can create a greener, healthier planet.
          From reducing plastic to planting trees, every action matters.
          <b>EcoPath</b> is dedicated to creating a cleaner, greener, and healthier planet.
          From promoting renewable energy to supporting zero-waste lifestyles,
          we inspire action for climate change, biodiversity protection,
          and sustainable living.
        </p>

      </div>

      <!-- hero section tree img -->
      <div class="flex justify-center lg:justify-end flex-1 mt-8 lg:mt-0">

        <!-- tree img -->
        <img src="./tree.png" alt="tree"
          class="max-h-[400px] w-full max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl drop-shadow-[0_4px_20px_rgba(42,82,39,0.466)] animate-tree-sway">

        <!-- tree img animation -->
        <style>
          @keyframes tree-sway {
            0% {
              transform: rotate(-2deg) scaleX(0.99);
            }

            20% {
              transform: rotate(2deg) scaleX(1.01);
            }

            40% {
              transform: rotate(-2deg) scaleX(0.99);
            }

            60% {
              transform: rotate(2deg) scaleX(1.01);
            }

            80% {
              transform: rotate(-2deg) scaleX(0.99);
            }

            100% {
              transform: rotate(-2deg) scaleX(0.99);
            }
          }

          .animate-tree-sway {
            animation: tree-sway 8s infinite linear;
            transform-origin: bottom center;
            will-change: transform;
          }
        </style>
      </div>

    </div>

  </section>


  <!-- Our Mission Section -->
  <section class="mt-16 mx-2 rounded-2xl">

    <!-- content no 2 div -->
    <div class="flex flex-col text-center w-full mb-12">

      <!-- heading -->
      <h1 class="text-2xl sm:text-3xl font-montserrat mb-4 font-bold text-[#3e7e46]">Our Mission</h1>

      <!-- content -->
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base sm:text-lg md:text-xl text-gray-900">
        Our mission is to inspire and empower individuals, communities, and businesses to embrace
        sustainable living and eco-friendly practices. We aim to reduce carbon footprints, protect
        natural resources, and promote renewable energy solutions for a greener future. Through education,
        innovation, and community action, we are committed to fighting climate change, preserving
        biodiversity, and creating a cleaner, healthier planet for generations to come.
      </p>
    </div>

    <!-- mission points amin div -->
    <div class="flex justify-center items-center">

      <!-- mission points -->
      <div class="flex flex-col items-center justify-center w-full space-y-6">

        <!-- heading     -->
        <span class="font-montserrat font-bold text-xl sm:text-2xl md:text-3xl text-[#3e7e46]">We work to:</span>

        <!-- pooints -->
        <div class="flex flex-wrap justify-center gap-4 w-full px-4">
          <!-- 1   -->
          <div
            class="flex-1 cursor-pointer min-w-[280px] max-w-sm p-4 rounded-lg shadow-xl font-poppins text-base md:text-lg text-[#3d3d3d] bg-gradient-to-br from-[#F8FAF7] to-[#E8F6EA] transition-transform duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gradient-to-br ">
            • Promote sustainable lifestyles that are practical and accessible
          </div>

          <!-- 2 -->
          <div
            class="flex-1 cursor-pointer min-w-[280px] max-w-sm p-4 rounded-lg shadow-xl font-poppins text-base md:text-lg text-[#3d3d3d] bg-gradient-to-br from-[#F8FAF7] to-[#E8F6EA] transition-transform duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gradient-to-br ">
            • Encourage waste reduction through reuse and recycling
          </div>

          <!-- 3 -->
          <div
            class="flex-1 cursor-pointer min-w-[280px] max-w-sm p-4 rounded-lg shadow-xl font-poppins text-base md:text-lg text-[#3d3d3d] bg-gradient-to-br from-[#F8FAF7] to-[#E8F6EA] transition-transform duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gradient-to-br ">
            • Support clean energy adoption to reduce environmental harm
          </div>

          <!-- 4 -->
          <div
            class="flex-1 cursor-pointer min-w-[280px] max-w-sm p-4 rounded-lg shadow-xl font-poppins text-base md:text-lg text-[#3d3d3d] bg-gradient-to-br from-[#F8FAF7] to-[#E8F6EA] transition-transform duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gradient-to-br ">
            • Raise awareness about environmental challenges and solutions
          </div>
        </div>

        <!-- final point -->
        <div
          class="w-full cursor-pointer max-w-3xl p-4 rounded-lg shadow-xl font-poppins text-base md:text-lg text-[#3d3d3d] bg-gradient-to-br from-[#F8FAF7] to-[#E8F6EA] transition-transform duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gradient-to-br ">
          Our goal is simple: to inspire people everywhere to take positive action for the planet —
          because protecting the Earth is not just a choice, it’s our responsibility.
        </div>

      </div>
    </div>
  </section>


  <!-- Who We Are Section -->
  <section
    class="text-gray-600 body-font bg-gradient-to-br from-[#eafaf1] via-[#f7f7e8] to-[#e3f0ff] shadow-[0_-4px_10px_-2px_rgba(24,46,22,0.3)] mt-16">

    <!-- main div -->
    <div class="container px-4 py-20 mx-auto">

      <!-- content no 3 div -->
      <div class="flex flex-col text-center w-full mb-12">

        <h1 class="text-2xl sm:text-3xl font-montserrat mb-4 font-bold text-[#3e7e46]">Who We Are</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base sm:text-lg md:text-xl">
          At EcoPath, we are a passionate community of environmental advocates, innovators,
          and changemakers dedicated to building a greener tomorrow. Our mission is to provide
          sustainable solutions, promote eco-friendly living, and inspire individuals to
          take climate action. From renewable energy projects to zero-waste initiatives,
          we work towards protecting biodiversity and creating a world where nature and
          humanity thrive together.
        </p>
      </div>

      <!-- cards main div -->
      <div class="flex flex-wrap gap-6 justify-center">
        <!-- Card 1 -->
        <div class="w-full sm:w-[45%] lg:w-[22%] px-6 py-6 rounded-2xl bg-gradient-to-br from-[#F9FBF8] to-[#F1F7F2] 
           text-center shadow-md relative overflow-hidden group transition-all duration-500">
          <!-- Eco wave decoration -->
          <div class="absolute -bottom-10 -right-10 w-24 h-24 bg-green-300/30 rounded-full blur-2xl 
             scale-0 group-hover:scale-125 transition-all duration-500"></div>
          <div class="absolute -top-10 -left-10 w-24 h-24 bg-emerald-400/20 rounded-full blur-2xl 
             scale-0 group-hover:scale-125 transition-all duration-500 delay-75"></div>

          <!-- Card Content -->
          <div class="relative bg-white/70 backdrop-blur-sm rounded-xl p-6 
             transition transform group-hover:-translate-y-2 group-hover:shadow-xl">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2 
               transition-colors duration-300 group-hover:text-emerald-700">
              Eco Innovators
            </h2>
            <p class="leading-relaxed text-base text-gray-600">
              We design eco-friendly solutions to protect our planet and inspire change.
            </p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="w-full sm:w-[45%] lg:w-[22%] px-6 py-6 rounded-2xl bg-gradient-to-br from-[#F9FBF8] to-[#F1F7F2] 
           text-center shadow-md relative overflow-hidden group transition-all duration-500">
          <div class="absolute -bottom-10 -right-10 w-24 h-24 bg-green-300/30 rounded-full blur-2xl 
             scale-0 group-hover:scale-125 transition-all duration-500"></div>
          <div class="absolute -top-10 -left-10 w-24 h-24 bg-emerald-400/20 rounded-full blur-2xl 
             scale-0 group-hover:scale-125 transition-all duration-500 delay-75"></div>

          <!-- card content -->
          <div class="relative bg-white/70 backdrop-blur-sm rounded-xl p-6 
             transition transform group-hover:-translate-y-2 group-hover:shadow-xl">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2 
               transition-colors duration-300 group-hover:text-emerald-700">
              Community Driven
            </h2>
            <p class="leading-relaxed text-base text-gray-600">
              Working hand-in-hand with local communities for a sustainable future.
            </p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="w-full sm:w-[45%] lg:w-[22%] px-6 py-6 rounded-2xl bg-gradient-to-br from-[#F9FBF8] to-[#F1F7F2] 
           text-center shadow-md relative overflow-hidden group transition-all duration-500">
          <div class="absolute -bottom-10 -right-10 w-24 h-24 bg-green-300/30 rounded-full blur-2xl 
             scale-0 group-hover:scale-125 transition-all duration-500"></div>
          <div class="absolute -top-10 -left-10 w-24 h-24 bg-emerald-400/20 rounded-full blur-2xl 
             scale-0 group-hover:scale-125 transition-all duration-500 delay-75"></div>

          <!-- card content -->
          <div class="relative bg-white/70 backdrop-blur-sm rounded-xl p-6 
             transition transform group-hover:-translate-y-2 group-hover:shadow-xl">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2 
               transition-colors duration-300 group-hover:text-emerald-700">
              Green Goals
            </h2>
            <p class="leading-relaxed text-base text-gray-600">
              Turning environmental goals into action for cleaner air and water.
            </p>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="w-full sm:w-[45%] lg:w-[22%] px-6 py-6 rounded-2xl bg-gradient-to-br from-[#F9FBF8] to-[#F1F7F2] 
           text-center shadow-md relative overflow-hidden group transition-all duration-500">
          <div class="absolute -bottom-10 -right-10 w-24 h-24 bg-green-300/30 rounded-full blur-2xl 
             scale-0 group-hover:scale-125 transition-all duration-500"></div>
          <div class="absolute -top-10 -left-10 w-24 h-24 bg-emerald-400/20 rounded-full blur-2xl 
             scale-0 group-hover:scale-125 transition-all duration-500 delay-75"></div>

          <!-- card content -->
          <div class="relative bg-white/70 backdrop-blur-sm rounded-xl p-6 
             transition transform group-hover:-translate-y-2 group-hover:shadow-xl">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2 
               transition-colors duration-300 group-hover:text-emerald-700">
              Global Impact
            </h2>
            <p class="leading-relaxed text-base text-gray-600">
              Our projects create positive change for people and nature worldwide.
            </p>
          </div>
        </div>
      </div>

    </div>

  </section>

  <!-- why it’s matter -->
  <section class="mt-16 mx-2 rounded-2xl">

    <!-- content no 4 div -->
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="text-2xl sm:text-3xl font-montserrat mb-4 font-extrabold text-[#3e7e46]">Why it’s matter</h1>
      <h2 class="text-1xl sm:text-2xl font-montserrat mb-4 font-bold text-[#3e7e46]">“Why Going Green Isn’t Optional
        Anymore”</h2>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base sm:text-lg md:text-xl text-gray-900">
        The climate crisis, plastic pollution, and deforestation are rapidly damaging our planet. Every day, over 8
        million pieces of plastic enter our oceans. Our forests are disappearing, and air quality is declining in urban
        areas.
        But the solution begins with you. By making small eco-conscious choices daily, we can reverse the damage
        together.
      </p>
    </div>

    <!-- </div> -->

    <!-- child sec -->
    <section class="text-gray-600 body-font">

      <!-- points container -->
      <div class="container px-5 py-8 mx-auto">
        <div class="flex flex-wrap -m-4">

          <!-- 1 -->
          <div class="p-4 md:w-1/3">
            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
              <div class="p-6">
                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Plastic Decomposing</h1>
                <p class="leading-relaxed mb-3"> ♻️ "Plastic takes up to 500 years to decompose"
                  <b>Choose reusable, not disposable.</b> Plastic straws may be used for minutes, but they linger in
                  nature
                  for centuries.
                </p>

                </p>

              </div>
            </div>
          </div>

          <!-- 2 -->
          <div class="p-4 md:w-1/3">
            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
              <!-- <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="./tree.jpg" alt="tree img"> -->
              <div class="p-6">
                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">The Trees</h1>
                <p class="leading-relaxed mb-3"> 🌳 "One tree can remove 48 lbs of CO₂ per year"
                  <b>Plant a tree, grow a future.</b> Trees are the lungs of our planet, absorbing CO₂ and releasing
                  oxygen. Every tree planted is a step towards a healthier Earth.
                </p>

              </div>
            </div>
          </div>

          <!-- 3 -->
          <div class="p-4 md:w-1/3">
            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
              <div class="p-6">
                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Save Water</h1>
                <p class="leading-relaxed mb-3">"<b>💧Water is the essence of life</b>, yet we waste it daily.
                  Small actions like fixing leaks and taking shorter showers can save thousands of gallons.
                  Protecting water today means securing life for tomorrow."
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>

  </section>

  <!-- what you will learn at ecopath section -->
  <section class="ml-4 mr-4 shadow-xl rounded-2xl text-gray-600 body-font mt-24">

    <!-- content no 5 div  -->
    <div class="flex flex-col bg-gradient-to-b from-[#F7FFF8] to-[#E8F6EA] p-6  rounded-2xl text-center w-full mb-12">
      <h1 class="text-2xl sm:text-3xl font-montserrat mb-4 font-bold text-[#3e7e46]">What you'll learn at EcoPath</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base sm:text-lg md:text-xl text-gray-900">
        At EcoPath, you’ll explore sustainable living tips, eco-friendly lifestyle practices, and green innovations that
        make a real difference. Discover how renewable energy, zero-waste habits, and plastic-free solutions can protect
        our planet. From climate action awareness to community-driven environmental projects, EcoPath is your guide to
        building a cleaner, greener, and healthier future.
      </p>
    </div>

    <!-- container that contain points -->
    <div class="container px-5 py-8 mx-auto flex flex-wrap">

      <!-- points 1 -->
      <div class="flex relative pt-10 pb-20 sm:items-center md:w-2/3 mx-auto">
        <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
          <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
        </div>
        <div
          class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-[#b7e4c7] text-white relative z-10 title-font font-medium text-sm">
          1</div>
        <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">

          <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
            <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">Green Living Tips </h2>
            <p class="leading-relaxed"> How to reduce waste, save energy, and live eco-smart</p>
          </div>
        </div>
      </div>

      <!-- points 2 -->
      <div class="flex relative pb-20 sm:items-center md:w-2/3 mx-auto">
        <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
          <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
        </div>
        <div
          class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-[#b7e4c7] text-white relative z-10 title-font font-medium text-sm">
          2</div>
        <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">

          <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
            <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">Eco Challenges</h2>
            <p class="leading-relaxed">Join daily and weekly tasks to build habits</p>
          </div>
        </div>
      </div>

      <!-- point 3 -->
      <div class="flex relative pb-20 sm:items-center md:w-2/3 mx-auto">
        <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
          <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
        </div>
        <div
          class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-[#b7e4c7] text-white relative z-10 title-font font-medium text-sm">
          3</div>
        <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">

          <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
            <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">Global Impact Info</h2>
            <p class="leading-relaxed">Learn how your small steps lead to global change</p>
          </div>
        </div>
      </div>

      <!-- point 4 -->
      <div class="flex relative pb-10 sm:items-center md:w-2/3 mx-auto">
        <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
          <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
        </div>
        <div
          class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-[#b7e4c7] text-white relative z-10 title-font font-medium text-sm">
          4</div>
        <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">

          <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
            <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">Renewable Energy Guides</h2>
            <p class="leading-relaxed">Discover solar, wind, and clean energy solutions for everyday life</p>
          </div>
        </div>
      </div>

    </div>
  </section>



  <!-- Footer -->
  <footer class="text-gray-600 body-font bg-[#f7f7e8] mt-8">

    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
      <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
        <img src="./favicon.png" alt="EcoPath Logo" class="w-10 h-10 p-2  rounded-full" />
        <span class="ml-3 text-xl">EcoPath</span>
      </a>

      <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2025
        EcoPath —
        <a href="EcoPath2025@gmail.com" class="text-gray-600 ml-1" rel="noopener noreferrer"
          target="_blank">EcoPath2025@gmail.com</a>
      </p>

      <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
        <a class="text-gray-500" target="_blank">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
            viewBox="0 0 24 24">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
          </svg>
        </a>

        <a class="ml-3 text-gray-500" href="https://x.com/Ecopath2025" target="_blank">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
            viewBox="0 0 24 24">
            <path
              d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
            </path>
          </svg>
        </a>

        <!-- instagram link -->
        <a class="ml-3 text-gray-500" href="https://www.instagram.com/ecopath2025/" target="_blank">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            class="w-5 h-5" viewBox="0 0 24 24">
            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
          </svg>
        </a>

        <!-- linkedin link -->
        <a class="ml-3 text-gray-500" target="_blank" href="www.linkedin.com/in/ecopath2025"></a>
        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0"
          class="w-5 h-5" viewBox="0 0 24 24">
          <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
          </path>
          <circle cx="4" cy="4" r="2" stroke="none"></circle>
        </svg>
        </a>

        <!-- youtube link -->
        <a class="ml-3 text-gray-500" href="https://youtube.com/@ecopath2025?si=BjshOUmre0S4X0ZX" target="_blank"
          rel="noopener">
          <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0"
            class="w-5 h-5" viewBox="0 0 24 24" aria-hidden="true">
            <path
              d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 001.46 6.42 29.94 29.94 0 001 12c0 2 .16 3.73.46 5.58a2.78 2.78 0 001.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.96C22.84 15.73 23 14 23 12s-.16-3.73-.46-5.58zM10 15V9l5 3-5 3z">
            </path>
          </svg>
        </a>

      </span>
    </div>
  </footer>


  <!-- hungergur script -->
  <script>
    // Hamburger menu toggle
    const menuToggle = document.getElementById('menu-toggle');
    const navLinks = document.getElementById('nav-links');

    menuToggle.addEventListener('click', function () {
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
  </script>

  <!-- animation script -->
  <script>
    // Create floating eco particles
    function createEcoParticles() {
      const colors = [
        'rgba(62, 126, 70, 0.6)',    // Green
        'rgba(76, 175, 80, 0.5)',    // Light green
        'rgba(139, 195, 74, 0.4)',   // Lime green
        'rgba(205, 220, 57, 0.3)'    // Light lime
      ];

      for (let i = 0; i < 20; i++) {
        const particle = document.createElement('div');
        particle.className = 'eco-particle';

        // Random properties
        const size = Math.random() * 10 + 5; // 5-15px
        const color = colors[Math.floor(Math.random() * colors.length)];
        const left = Math.random() * 100; // 0-100% of viewport width
        const animationDelay = Math.random() * 5; // 0-5s delay

        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.background = color;
        particle.style.left = `${left}%`;
        particle.style.top = `${Math.random() * 100}%`;
        particle.style.animationDelay = `${animationDelay}s`;
        particle.style.animationDuration = `${Math.random() * 2 + 2}s`; // 2-4s duration

        document.body.appendChild(particle);
      }
    }

    // Initialize particles when page loads
    document.addEventListener('DOMContentLoaded', createEcoParticles);
  </script>

</body>

</html>