<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title>Arez∞ Roshani | Computer Engineer</title>

       <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
      href="<?php echo site_url('portfolio/css'); ?>">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300;400;500&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap"
        rel="stylesheet">

    <style>

        :root {
            box-sizing: border-box;
            padding-top: env(safe-area-inset-top, 0px);
            padding-bottom: env(safe-area-inset-bottom, 0px);
        }

        html {
            scroll-padding-top: env(safe-area-inset-top, 0px);
        }

        body {
            background:
                radial-gradient(
                    circle at 10% 15%,
                    rgba(253, 164, 175, 0.20),
                    transparent 24%
                ),
                radial-gradient(
                    circle at 88% 25%,
                    rgba(254, 205, 211, 0.22),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 50% 80%,
                    rgba(255, 228, 230, 0.15),
                    transparent 28%
                ),
                #fdf6f8;
        }

        .butterfly-field {
            position: fixed;
            inset: 0;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            pointer-events: none;
            z-index: 20;
        }

        .butterfly {
            position: absolute;
            top: -12vh;
            left: auto;
            font-size: 24px;
            line-height: 1;
            opacity: 0.72;
            filter: drop-shadow(0 5px 10px rgba(244, 63, 94, 0.15));
            will-change: transform;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        .butterfly.small { font-size: 17px; opacity: 0.55; }
        .butterfly.medium { font-size: 24px; opacity: 0.68; }
        .butterfly.large { font-size: 31px; opacity: 0.78; }

        .butterfly:nth-child(1) { left: 4%; }
        .butterfly:nth-child(2) { left: 12%; }
        .butterfly:nth-child(3) { left: 20%; }
        .butterfly:nth-child(4) { left: 29%; }
        .butterfly:nth-child(5) { left: 37%; }
        .butterfly:nth-child(6) { left: 46%; }
        .butterfly:nth-child(7) { left: 55%; }
        .butterfly:nth-child(8) { left: 64%; }
        .butterfly:nth-child(9) { left: 72%; }
        .butterfly:nth-child(10) { left: 81%; }
        .butterfly:nth-child(11) { left: 89%; }
        .butterfly:nth-child(12) { left: 96%; }

        .flight-1 { animation: snowFallOne 14s linear infinite; }
        .flight-2 { animation: snowFallTwo 18s linear infinite; }
        .flight-3 { animation: snowFallThree 16s linear infinite; }
        .flight-4 { animation: snowFallFour 20s linear infinite; }
        .flight-5 { animation: snowFallFive 15s linear infinite; }
        .flight-6 { animation: snowFallSix 19s linear infinite; }
        .flight-7 { animation: snowFallSeven 17s linear infinite; }
        .flight-8 { animation: snowFallEight 21s linear infinite; }

        @keyframes snowFallOne {
            0% { transform: translate3d(0, -15vh, 0) rotate(0deg); }
            25% { transform: translate3d(10px, 25vh, 0) rotate(70deg); }
            50% { transform: translate3d(-8px, 50vh, 0) rotate(150deg); }
            75% { transform: translate3d(12px, 75vh, 0) rotate(230deg); }
            100% { transform: translate3d(-5px, 115vh, 0) rotate(310deg); }
        }
        @keyframes snowFallTwo {
            0% { transform: translate3d(0, -15vh, 0) rotate(20deg); }
            25% { transform: translate3d(-12px, 25vh, 0) rotate(90deg); }
            50% { transform: translate3d(8px, 50vh, 0) rotate(180deg); }
            75% { transform: translate3d(-10px, 75vh, 0) rotate(260deg); }
            100% { transform: translate3d(6px, 115vh, 0) rotate(350deg); }
        }
        @keyframes snowFallThree {
            0% { transform: translate3d(0, -15vh, 0) rotate(-10deg); }
            20% { transform: translate3d(8px, 20vh, 0) rotate(50deg); }
            40% { transform: translate3d(-12px, 40vh, 0) rotate(120deg); }
            60% { transform: translate3d(6px, 60vh, 0) rotate(190deg); }
            80% { transform: translate3d(-8px, 80vh, 0) rotate(260deg); }
            100% { transform: translate3d(10px, 115vh, 0) rotate(330deg); }
        }
        @keyframes snowFallFour {
            0% { transform: translate3d(0, -15vh, 0) rotate(10deg); }
            25% { transform: translate3d(-7px, 25vh, 0) rotate(80deg); }
            50% { transform: translate3d(13px, 50vh, 0) rotate(170deg); }
            75% { transform: translate3d(-10px, 75vh, 0) rotate(250deg); }
            100% { transform: translate3d(7px, 115vh, 0) rotate(340deg); }
        }
        @keyframes snowFallFive {
            0% { transform: translate3d(0, -15vh, 0) rotate(-20deg); }
            25% { transform: translate3d(14px, 25vh, 0) rotate(60deg); }
            50% { transform: translate3d(-10px, 50vh, 0) rotate(140deg); }
            75% { transform: translate3d(9px, 75vh, 0) rotate(230deg); }
            100% { transform: translate3d(-6px, 115vh, 0) rotate(320deg); }
        }
        @keyframes snowFallSix {
            0% { transform: translate3d(0, -15vh, 0) rotate(15deg); }
            20% { transform: translate3d(-10px, 20vh, 0) rotate(75deg); }
            40% { transform: translate3d(8px, 40vh, 0) rotate(140deg); }
            60% { transform: translate3d(-12px, 60vh, 0) rotate(210deg); }
            80% { transform: translate3d(10px, 80vh, 0) rotate(280deg); }
            100% { transform: translate3d(-5px, 115vh, 0) rotate(350deg); }
        }
        @keyframes snowFallSeven {
            0% { transform: translate3d(0, -15vh, 0) rotate(-5deg); }
            25% { transform: translate3d(9px, 25vh, 0) rotate(75deg); }
            50% { transform: translate3d(-14px, 50vh, 0) rotate(155deg); }
            75% { transform: translate3d(8px, 75vh, 0) rotate(240deg); }
            100% { transform: translate3d(-7px, 115vh, 0) rotate(330deg); }
        }
        @keyframes snowFallEight {
            0% { transform: translate3d(0, -15vh, 0) rotate(25deg); }
            20% { transform: translate3d(-8px, 20vh, 0) rotate(80deg); }
            40% { transform: translate3d(11px, 40vh, 0) rotate(150deg); }
            60% { transform: translate3d(-9px, 60vh, 0) rotate(220deg); }
            80% { transform: translate3d(12px, 80vh, 0) rotate(290deg); }
            100% { transform: translate3d(-6px, 115vh, 0) rotate(360deg); }
        }

        .delay-1 { animation-delay: -4s; }
        .delay-2 { animation-delay: -11s; }
        .delay-3 { animation-delay: -18s; }
        .delay-4 { animation-delay: -7s; }
        .delay-5 { animation-delay: -22s; }
        .delay-6 { animation-delay: -14s; }
        .delay-7 { animation-delay: -27s; }
        .delay-8 { animation-delay: -9s; }
        .delay-9 { animation-delay: -20s; }
        .delay-10 { animation-delay: -16s; }

        @media (max-width: 640px) {
            .butterfly.small { font-size: 14px; }
            .butterfly.medium { font-size: 19px; }
            .butterfly.large { font-size: 25px; }
        }

        @media (prefers-reduced-motion: reduce) {
            .butterfly { animation: none; opacity: 0.35; }
        }

      
        #petWidget {
            position: absolute;
            right: 24px;
            bottom: 24px;
            z-index: 30;
            width: 140px;
            height: 140px;
        }

        #petPlatform {
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            background: #fda4af;
            box-shadow: 0 18px 40px -12px rgba(244, 63, 94, .45), 0 0 0 1px rgba(244, 63, 94, .18);
        }

        #petBody {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0.36);
        }

        .pet-dot {
            position: absolute;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #292a22;
            pointer-events: none;
            will-change: transform, opacity;
        }

        .pet-eye {
            position: absolute;
            width: 74px;
            height: 74px;
            border-radius: 50%;
            background: #fff;
            z-index: 20;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .pet-eye.left { left: 70px; top: 105px; }
        .pet-eye.right { left: 196px; top: 105px; }

        .pet-pupil {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #090909;
            will-change: transform;
        }

        .pet-nose {
            position: absolute;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #090909;
            left: 50%;
            top: 51%;
            transform: translate(-50%, -50%);
            z-index: 15;
        }

        #petWidget:hover #petPlatform {
            box-shadow: 0 22px 48px -12px rgba(244, 63, 94, .45), 0 0 0 1px rgba(244, 63, 94, .18);
        }

        @media (max-width: 640px) {
            #petWidget { width: 108px; height: 108px; right: 12px; bottom: 12px; }
            #petBody { transform: translate(-50%, -50%) scale(0.27); }
        }

        @media (prefers-reduced-motion: reduce) {
            .pet-dot, .pet-pupil { transition: none; }
        }

    </style>

</head>


<body class="overflow-x-hidden bg-[#fdf6f8] text-slate-800">



    <div class="butterfly-field" aria-hidden="true">

        <span class="butterfly medium flight-1 delay-1">🌸</span>
        <span class="butterfly small flight-8 delay-8">🌸</span>
        <span class="butterfly small flight-8 delay-8">🌸</span>
        <span class="butterfly small flight-1 delay-9">✨</span>
        <span class="butterfly small flight-8 delay-6">🌸</span>
        <span class="butterfly small flight-8 delay-8">🌸</span>
        <span class="butterfly small flight-1 delay-5">🌸</span>
        <span class="butterfly small flight-8 delay-1">✨</span>
        <span class="butterfly small flight-8 delay-8">🌸</span>
        <span class="butterfly medium flight-1 delay-2">✨</span>
        <span class="butterfly small flight-8 delay-6">🌸</span>
        <span class="butterfly small flight-8 delay-8">🌸</span>

    </div>




    <header class="fixed left-0 right-0 top-0 z-50 px-4 pt-4 md:px-6 md:pt-5" style="padding-top: calc(1rem + env(safe-area-inset-top, 0px));">

        <nav class="mx-auto max-w-7xl rounded-2xl border border-white/70 bg-white/75 px-5 py-4 shadow-xl shadow-rose-100/30 backdrop-blur-xl">

            <div class="flex items-center justify-between">

                <a href="index.html" class="group flex items-center gap-2">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-900 text-sm font-bold text-white transition duration-300 group-hover:bg-rose-600">A</div>
                    <span class="hidden font-mono text-xs tracking-widest text-slate-500 sm:block">AREZ∞ ROSHANI</span>
                </a>

                <div class="hidden items-center gap-2 md:flex">
                    <a href="<?php echo site_url('portfolio'); ?>" class="rounded-full bg-rose-50 px-5 py-2.5 text-sm font-medium text-rose-600">Home</a>
                    <a href="<?php echo site_url('portfolio/about'); ?>" class="rounded-full px-5 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-rose-50 hover:text-rose-600">About Me</a>
                    <a href="<?php echo site_url('portfolio/interests'); ?>" class="rounded-full px-5 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-rose-50 hover:text-rose-600">My Interests</a>
                    <a href="<?php echo site_url('portfolio/contact'); ?>" class="ml-2 rounded-full bg-slate-900 px-6 py-2.5 text-sm font-medium text-white transition duration-300 hover:bg-rose-600">Contact</a>
                </div>

                <a href="<?php echo site_url('portfolio/contact'); ?>" class="rounded-full bg-slate-900 px-4 py-2 text-xs font-medium text-white md:hidden">Contact</a>

            </div>

        </nav>

    </header>


    <main>



        <section class="relative min-h-screen overflow-hidden px-5 pb-20 pt-36 md:px-8 md:pt-44">

            <div class="absolute -left-40 top-20 h-[420px] w-[420px] rounded-full bg-rose-200/40 blur-[110px]"></div>
            <div class="absolute -right-40 bottom-10 h-[500px] w-[500px] rounded-full bg-pink-200/30 blur-[120px]"></div>
            <div class="absolute left-[45%] top-[25%] h-72 w-72 rounded-full bg-rose-100/30 blur-[100px]"></div>

            <svg class="pointer-events-none absolute left-4 top-24 h-24 w-24 text-rose-300/70 md:left-10 md:top-32 md:h-32 md:w-32" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M60 60C60 60 52 30 60 14C68 30 60 60 60 60Z" fill="currentColor" opacity="0.55"/>
                <path d="M60 60C60 60 88 52 104 60C88 68 60 60 60 60Z" fill="currentColor" opacity="0.45"/>
                <path d="M60 60C60 60 68 90 60 106C52 90 60 60 60 60Z" fill="currentColor" opacity="0.5"/>
                <path d="M60 60C60 60 32 68 16 60C32 52 60 60 60 60Z" fill="currentColor" opacity="0.4"/>
                <path d="M60 60C60 60 82 38 98 30C90 46 60 60 60 60Z" fill="currentColor" opacity="0.35"/>
                <path d="M60 60C60 60 38 82 30 98C46 90 60 60 60 60Z" fill="currentColor" opacity="0.35"/>
                <circle cx="60" cy="60" r="6" fill="currentColor" opacity="0.75"/>
            </svg>

            <div class="absolute inset-0 -z-10 opacity-60 [background-image:radial-gradient(rgba(244,63,94,0.10)_1.5px,transparent_1.5px)] [background-size:28px_28px]"></div>

            <div class="absolute left-[8%] top-[30%] h-2 w-2 rounded-full bg-rose-300/60 shadow-[0_0_20px_rgba(139,92,246,0.4)]"></div>
            <div class="absolute right-[12%] top-[20%] h-1.5 w-1.5 rounded-full bg-rose-400/60 shadow-[0_0_18px_rgba(139,92,246,0.5)]"></div>
            <div class="absolute bottom-[18%] left-[48%] h-2 w-2 rounded-full bg-pink-300/50"></div>

            <div class="relative mx-auto grid max-w-7xl items-center gap-16 lg:grid-cols-[1fr_0.9fr]">

                <div>

                    <div class="mb-8 inline-flex items-center gap-3 rounded-full border border-rose-200 bg-white/80 px-4 py-2 shadow-sm backdrop-blur">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-rose-400 opacity-60"></span>
                            <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-rose-500"></span>
                        </span>
                        <span class="font-mono text-[10px] tracking-[0.2em] text-slate-500">BUILDING • LEARNING • EXPLORING</span>
                    </div>

                    <p class="font-mono text-sm tracking-[0.3em] text-rose-500">COMPUTER ENGINEER</p>

                    <h1 class="mt-5 max-w-3xl font-serif text-6xl font-semibold leading-[0.95] tracking-tight text-slate-900 sm:text-7xl lg:text-8xl">
                        Arez∞
                        <span class="text-rose-500">Roshani.</span>
                    </h1>

                    <p class="mt-8 max-w-xl text-base leading-8 text-slate-600 md:text-lg">
                        I am interested in the part of software that users
                        don't always see: the architecture, logic and
                        systems behind the interface.
                    </p>

                    <div class="mt-6 flex flex-wrap items-center gap-2">
                        <span class="rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-slate-600">ASP.NET Core</span>
                        <span class="rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-slate-600">Clean Architecture</span>
                        <span class="rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-slate-600">Microservices</span>
                    </div>

                    <div class="mt-9 flex flex-wrap gap-4">
                        <a href="<?php echo site_url('portfolio/about'); ?>" class="group inline-flex items-center gap-3 rounded-full bg-slate-900 px-7 py-4 text-sm font-medium text-white shadow-xl shadow-slate-200 transition duration-300 hover:-translate-y-1 hover:bg-rose-600">
                            Explore My Story
                            <span class="transition duration-300 group-hover:translate-x-1">→</span>
                        </a>
                        <a href="<?php echo site_url('portfolio/interests'); ?>" class="inline-flex items-center rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-medium text-slate-700 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-rose-300 hover:text-rose-600">
                            What Keeps Me Curious?
                        </a>
                    </div>

                    <div class="mt-12 grid max-w-xl grid-cols-3 border-y border-slate-200 py-6">
                        <div>
                            <p class="font-serif text-2xl font-semibold text-slate-900">.NET</p>
                            <p class="mt-1 font-mono text-[9px] tracking-widest text-slate-400">ECOSYSTEM</p>
                        </div>
                        <div class="border-l border-slate-200 pl-5">
                            <p class="font-serif text-2xl font-semibold text-slate-900">DDD</p>
                            <p class="mt-1 font-mono text-[9px] tracking-widest text-slate-400">MINDSET</p>
                        </div>
                        <div class="border-l border-slate-200 pl-5">
                            <p class="font-serif text-2xl font-semibold text-slate-900">∞</p>
                            <p class="mt-1 font-mono text-[9px] tracking-widest text-slate-400">Depth</p>
                        </div>
                    </div>

                </div>

                <div class="relative mx-auto w-full max-w-xl">

                    <div class="absolute left-1/2 top-1/2 h-[430px] w-[430px] -translate-x-1/2 -translate-y-1/2 rounded-full border border-rose-200/60 md:h-[520px] md:w-[520px]"></div>
                    <div class="absolute left-1/2 top-1/2 h-[340px] w-[340px] -translate-x-1/2 -translate-y-1/2 rounded-full border border-dashed border-rose-200/70 md:h-[410px] md:w-[410px]"></div>

                    <div class="relative mx-auto w-[300px] overflow-hidden rounded-[2.5rem] border border-white bg-white/80 p-3 shadow-2xl shadow-rose-200/50 backdrop-blur-xl sm:w-[350px]">
                        <div class="relative overflow-hidden rounded-[2rem] bg-slate-100">
                            <img src="<?php echo site_url('portfolio/image/anjo.jpg'); ?>"
     alt="Arezoo Roshani" class="h-[430px] w-full object-cover transition duration-700 hover:scale-105">
							
                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/80 to-transparent px-6 pb-6 pt-20">
                                <p class="font-mono text-[9px] tracking-[0.25em] text-rose-200">BACKEND / ARCHITECTURE</p>
                                <p class="mt-2 font-serif text-xl text-white">Think. Design. Build.</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -left-2 top-12 rounded-2xl border border-white bg-white/90 px-5 py-4 shadow-xl shadow-rose-100/50 backdrop-blur md:-left-8">
                        <div class="flex items-center gap-3">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-rose-50 font-mono text-xs text-rose-600">01</div>
                            <div>
                                <p class="text-xs font-semibold text-slate-800">Architecture</p>
                                <p class="mt-0.5 font-mono text-[8px] text-slate-400">STRUCTURE</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -right-2 bottom-20 rounded-2xl border border-white bg-slate-900 px-5 py-4 shadow-xl md:-right-8">
                        <div class="flex items-center gap-3">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-rose-500 font-mono text-xs text-white">02</div>
                            <div>
                                <p class="text-xs font-semibold text-white">Backend</p>
                                <p class="mt-0.5 font-mono text-[8px] text-slate-500">LOGIC</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -bottom-5 left-4 hidden rounded-2xl border border-slate-200 bg-white/90 p-4 font-mono text-[9px] leading-5 text-slate-400 shadow-xl backdrop-blur sm:block">
                        <span class="text-rose-500">architecture</span><span class="text-slate-300">.</span><span class="text-slate-700">build</span><span class="text-slate-300">(</span><span class="text-rose-500">ideas</span><span class="text-slate-300">);</span>
                    </div>

                </div>

            </div>

            <svg class="pointer-events-none absolute inset-x-0 bottom-0 h-10 w-full text-white md:h-14" viewBox="0 0 1200 60" preserveAspectRatio="none" fill="currentColor" aria-hidden="true">
                <path d="M0,30 C50,55 100,5 150,30 C200,55 250,5 300,30 C350,55 400,5 450,30 C500,55 550,5 600,30 C650,55 700,5 750,30 C800,55 850,5 900,30 C950,55 1000,5 1050,30 C1100,55 1150,5 1200,30 L1200,60 L0,60 Z"/>
            </svg>

            <div id="petWidget" title="say hi 👋" aria-hidden="true">
                <div id="petPlatform"></div>
                <div id="petBody">
                    <div class="pet-eye left"><div class="pet-pupil"></div></div>
                    <div class="pet-eye right"><div class="pet-pupil"></div></div>
                    <div class="pet-nose"></div>
                </div>
            </div>

        </section>

        <section class="border-b border-slate-100 bg-white px-5 py-20 md:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                    <div>
                        <p class="font-mono text-xs tracking-[0.3em] text-rose-500">01 / A QUICK LOOK</p>
                        <h2 class="mt-4 font-serif text-4xl font-semibold text-slate-900 md:text-5xl">A few things that define me.</h2>
                    </div>
                    <p class="max-w-md text-sm leading-7 text-slate-500">More than technologies, these are the ideas that shape how I approach software.</p>
                </div>

                <div class="grid gap-5 md:grid-cols-3">

                    <div class="group rounded-[2rem] border border-slate-100 bg-[#fdf6f8] p-8 transition duration-500 hover:-translate-y-2 hover:shadow-xl hover:shadow-rose-100">
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs text-rose-500">01</span>
                            <span class="text-2xl text-slate-300 transition group-hover:text-rose-400">◇</span>
                        </div>
                        <h3 class="mt-10 font-serif text-2xl font-semibold">Beyond the Obvious</h3>
                        <p class="mt-4 text-sm leading-7 text-slate-500">I am drawn to the hidden logic beneath complexity, where every system reveals a deeper order waiting to be understood.</p>
                    </div>

                    <div class="group rounded-[2rem] bg-slate-900 p-8 text-white transition duration-500 hover:-translate-y-2 hover:shadow-xl">
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs text-rose-400">02</span>
                            <span class="text-2xl text-slate-600">⌁</span>
                        </div>
                        <h3 class="mt-10 font-serif text-2xl font-semibold">Structure</h3>
                        <p class="mt-4 text-sm leading-7 text-slate-400">I enjoy transforming complicated problems into clear and maintainable structures.</p>
                    </div>

                    <div class="group rounded-[2rem] border border-rose-100 bg-rose-50 p-8 transition duration-500 hover:-translate-y-2 hover:shadow-xl hover:shadow-rose-100">
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs text-rose-500">03</span>
                            <span class="text-2xl text-rose-300">∞</span>
                        </div>
                        <h3 class="mt-10 font-serif text-2xl font-semibold">Continuous Learning</h3>
                        <p class="mt-4 text-sm leading-7 text-slate-500">Every system I build reshapes the way I think, challenging assumptions, refining decisions, and revealing better possibilities.</p>
                    </div>

                </div>
            </div>
        </section>

        <section class="px-5 py-24 md:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="grid gap-16 lg:grid-cols-[0.7fr_1.3fr]">

                    <div>
                        <p class="font-mono text-xs tracking-[0.3em] text-rose-500">02 / MY MINDSET</p>
                        <h2 class="mt-5 font-serif text-5xl font-semibold leading-tight text-slate-900">The way <span class="text-rose-500">I think.</span></h2>
                        <p class="mt-6 max-w-sm text-sm leading-7 text-slate-500">Before writing code, I like understanding the problem behind the code.</p>
                    </div>

                    <div class="space-y-5">

                        <div class="group flex gap-6 rounded-3xl border border-slate-100 bg-white p-7 shadow-sm transition hover:border-rose-200 hover:shadow-lg">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-rose-50 font-mono text-sm text-rose-600">01</div>
                            <div>
                                <h3 class="text-lg font-semibold">Understand the problem</h3>
                                <p class="mt-2 text-sm leading-7 text-slate-500">What are we actually trying to solve? What are the boundaries and constraints?</p>
                            </div>
                        </div>

                        <div class="group flex gap-6 rounded-3xl border border-slate-100 bg-white p-7 shadow-sm transition hover:border-rose-200 hover:shadow-lg">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-rose-50 font-mono text-sm text-rose-600">02</div>
                            <div>
                                <h3 class="text-lg font-semibold">Design the structure</h3>
                                <p class="mt-2 text-sm leading-7 text-slate-500">I think about responsibilities, dependencies, data flow and how the pieces should communicate.</p>
                            </div>
                        </div>

                        <div class="group flex gap-6 rounded-3xl border border-slate-100 bg-white p-7 shadow-sm transition hover:border-rose-200 hover:shadow-lg">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-rose-50 font-mono text-sm text-rose-600">03</div>
                            <div>
                                <h3 class="text-lg font-semibold">Build with intention</h3>
                                <p class="mt-2 text-sm leading-7 text-slate-500">Then comes the code clean, understandable and designed to survive the next change.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <section class="relative overflow-hidden bg-slate-950 px-5 py-28 text-white md:px-8">

            <div class="absolute left-1/2 top-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-rose-600/10 blur-[100px]"></div>

            <div class="relative mx-auto max-w-7xl">

                <div class="text-center">
                    <p class="font-mono text-xs tracking-[0.3em] text-rose-400">03 / TECHNOLOGY CONSTELLATION</p>
                    <h2 class="mt-5 font-serif text-4xl font-semibold md:text-5xl">The ecosystem I explore.</h2>
                    <p class="mx-auto mt-5 max-w-xl text-sm leading-7 text-slate-400">Different tools, one goal: building systems that make sense.</p>
                </div>

                <div class="relative mx-auto mt-20 h-[430px] max-w-3xl">

                    <div class="absolute left-1/2 top-1/2 h-[1px] w-[70%] -translate-x-1/2 rotate-[25deg] bg-rose-500/20"></div>
                    <div class="absolute left-1/2 top-1/2 h-[1px] w-[70%] -translate-x-1/2 -rotate-[25deg] bg-rose-500/20"></div>
                    <div class="absolute left-1/2 top-1/2 h-[70%] w-[1px] -translate-x-1/2 bg-rose-500/20"></div>

                    <span class="absolute left-[28%] top-[36%] h-1.5 w-1.5 rounded-full bg-rose-300 shadow-[0_0_10px_2px_rgba(251,113,133,0.7)]"></span>
                    <span class="absolute left-[72%] top-[36%] h-1.5 w-1.5 rounded-full bg-rose-300 shadow-[0_0_10px_2px_rgba(251,113,133,0.7)]"></span>
                    <span class="absolute left-[28%] top-[64%] h-1.5 w-1.5 rounded-full bg-rose-300 shadow-[0_0_10px_2px_rgba(251,113,133,0.7)]"></span>
                    <span class="absolute left-[72%] top-[64%] h-1.5 w-1.5 rounded-full bg-rose-300 shadow-[0_0_10px_2px_rgba(251,113,133,0.7)]"></span>
                    <span class="absolute left-1/2 top-[14%] h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-rose-300 shadow-[0_0_10px_2px_rgba(251,113,133,0.7)]"></span>
                    <span class="absolute left-1/2 top-[86%] h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-rose-300 shadow-[0_0_10px_2px_rgba(251,113,133,0.7)]"></span>

                    <span class="absolute left-[10%] top-[8%] text-xs text-rose-300/70">✦</span>
                    <span class="absolute right-[8%] top-[12%] text-sm text-rose-300/50">✧</span>
                    <span class="absolute bottom-[10%] left-[14%] text-sm text-rose-300/60">✦</span>
                    <span class="absolute bottom-[6%] right-[12%] text-xs text-rose-300/70">✧</span>

                    <div class="absolute left-1/2 top-1/2 z-20 flex h-36 w-36 -translate-x-1/2 -translate-y-1/2 flex-col items-center justify-center rounded-full border border-rose-400/40 bg-rose-500/10 shadow-[0_0_80px_rgba(139,92,246,0.18)] backdrop-blur">
                        <span class="font-mono text-xs tracking-widest text-rose-300">CORE</span>
                        <span class="mt-2 font-serif text-2xl font-semibold">.NET</span>
                    </div>

                    <div class="absolute left-[5%] top-[17%] rounded-2xl border border-white/10 bg-white/5 px-5 py-4 backdrop-blur transition hover:border-rose-400/40">
                        <p class="text-sm font-semibold">ASP.NET Core</p>
                        <p class="mt-1 font-mono text-[8px] text-slate-500">BACKEND</p>
                    </div>

                    <div class="absolute right-[4%] top-[15%] rounded-2xl border border-white/10 bg-white/5 px-5 py-4 backdrop-blur">
                        <p class="text-sm font-semibold">CQRS</p>
                        <p class="mt-1 font-mono text-[8px] text-slate-500">PATTERN</p>
                    </div>

                    <div class="absolute bottom-[17%] left-[1%] rounded-2xl border border-white/10 bg-white/5 px-5 py-4 backdrop-blur">
                        <p class="text-sm font-semibold">DDD</p>
                        <p class="mt-1 font-mono text-[8px] text-slate-500">DOMAIN</p>
                    </div>

                    <div class="absolute bottom-[16%] right-[2%] rounded-2xl border border-white/10 bg-white/5 px-5 py-4 backdrop-blur">
                        <p class="text-sm font-semibold">Docker</p>
                        <p class="mt-1 font-mono text-[8px] text-slate-500">CONTAINERS</p>
                    </div>

                    <div class="absolute left-1/2 top-[2%] -translate-x-1/2 rounded-full border border-rose-400/20 bg-rose-500/10 px-6 py-3 backdrop-blur">
                        <p class="font-mono text-[10px] tracking-widest text-rose-300">CLEAN ARCHITECTURE</p>
                    </div>

                    <div class="absolute bottom-[1%] left-1/2 -translate-x-1/2 rounded-full border border-white/10 bg-white/5 px-6 py-3 backdrop-blur">
                        <p class="font-mono text-[10px] tracking-widest text-slate-400">REDIS • EF CORE • REST API</p>
                    </div>

                </div>

            </div>

        </section>

        <section class="px-5 py-24 md:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="grid items-center gap-16 lg:grid-cols-[0.8fr_1.2fr]">

                    <div>
                        <p class="font-mono text-xs tracking-[0.3em] text-rose-500">04 / ARCHITECTURE MINDSET</p>
                        <h2 class="mt-5 font-serif text-5xl font-semibold leading-tight">From idea <span class="text-rose-500">to system.</span></h2>
                        <p class="mt-6 max-w-lg text-sm leading-8 text-slate-500">Good software is more than a collection of features. It is a structure where every part knows what it is responsible for.</p>
                        <a href="about-me.html" class="mt-8 inline-flex items-center gap-3 font-mono text-xs tracking-widest text-rose-600">LEARN MORE <span>→</span></a>
                    </div>

                    <div class="rounded-[2.5rem] border border-slate-100 bg-white p-6 shadow-xl shadow-rose-100/40 md:p-8">

                        <div class="rounded-2xl border border-rose-100 bg-rose-50 p-6">
                            <div class="flex items-center justify-between">
                                <span class="font-mono text-[10px] tracking-widest text-rose-500">DOMAIN</span>
                                <span class="text-rose-300">01</span>
                            </div>
                            <p class="mt-4 font-serif text-2xl font-semibold">Business Logic</p>
                        </div>

                        <div class="flex justify-center py-3 text-rose-400">↓</div>

                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                            <div class="flex items-center justify-between">
                                <span class="font-mono text-[10px] tracking-widest text-slate-400">APPLICATION</span>
                                <span class="text-slate-300">02</span>
                            </div>
                            <p class="mt-4 font-serif text-2xl font-semibold">Use Cases & Flow</p>
                        </div>

                        <div class="flex justify-center py-3 text-rose-400">↓</div>

                        <div class="grid gap-3 sm:grid-cols-2">
                            <div class="rounded-2xl bg-slate-900 p-5 text-white">
                                <p class="font-mono text-[9px] tracking-widest text-rose-300">INFRASTRUCTURE</p>
                                <p class="mt-3 text-sm font-semibold">Data & Services</p>
                            </div>
                            <div class="rounded-2xl bg-slate-900 p-5 text-white">
                                <p class="font-mono text-[9px] tracking-widest text-rose-300">PRESENTATION</p>
                                <p class="mt-3 text-sm font-semibold">API & Interface</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <section class="border-y border-slate-100 bg-rose-50/60 px-5 py-24 md:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="grid gap-12 lg:grid-cols-[1fr_1fr]">

                    <div>
                        <p class="font-mono text-xs tracking-[0.3em] text-rose-500">05 / BEYOND THE CODE</p>
                        <h2 class="mt-5 max-w-lg font-serif text-5xl font-semibold leading-tight text-slate-900"><span class="text-rose-500">Depth</span></h2>
                        <p class="mt-6 max-w-lg text-sm leading-8 text-slate-500">I am drawn to what lies beneath the surface the structures, patterns, and ideas that are easy to overlook but essential to understanding the whole. I find meaning in going deeper, questioning assumptions, and discovering the complexity that gives simple things their shape.</p>
                        <a href="<?php echo site_url('portfolio/interests'); ?>" class="mt-8 inline-flex items-center gap-3 rounded-full bg-slate-900 px-6 py-3.5 text-sm font-medium text-white transition hover:bg-rose-600">Explore My Interests <span>→</span></a>
                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <div class="rounded-[2rem] bg-white p-7 shadow-sm transition hover:-translate-y-1">
                            <span class="text-3xl">⌁</span>
                            <h3 class="mt-10 font-serif text-xl font-semibold">Robotics</h3>
                            <p class="mt-2 text-xs leading-6 text-slate-500">When mathematics turns into movement.</p>
                        </div>

                        <div class="mt-8 rounded-[2rem] bg-slate-900 p-7 text-white shadow-sm transition hover:-translate-y-1">
                            <span class="text-3xl text-rose-400">◇</span>
                            <h3 class="mt-10 font-serif text-xl font-semibold">Visual Thinking</h3>
                            <p class="mt-2 text-xs leading-6 text-slate-400">Turning abstract ideas into something visible.</p>
                        </div>

                        <div class="-mt-8 rounded-[2rem] bg-white p-7 shadow-sm transition hover:-translate-y-1">
                            <span class="text-3xl">⌕</span>
                            <h3 class="mt-10 font-serif text-xl font-semibold">Debugging</h3>
                            <p class="mt-2 text-xs leading-6 text-slate-500">A little bit of engineering, a little bit of detective work.</p>
                        </div>

                        <div class="rounded-[2rem] bg-rose-500 p-7 text-white shadow-sm transition hover:-translate-y-1">
                            <span class="text-3xl">∞</span>
                            <h3 class="mt-10 font-serif text-xl font-semibold">Depth</h3>
                            <p class="mt-2 text-xs leading-6 text-rose-100">I value depth over speed , understanding the foundation before building upon it.</p>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <section class="px-5 py-24 md:px-8">

            <div class="relative mx-auto max-w-7xl overflow-hidden rounded-[3rem] bg-slate-950 px-8 py-20 text-center shadow-2xl shadow-rose-100 md:px-16">

                <div class="absolute -left-24 -top-24 h-64 w-64 rounded-full border border-rose-500/20"></div>
                <div class="absolute -bottom-32 -right-20 h-80 w-80 rounded-full border border-rose-500/20"></div>
                <div class="absolute left-1/2 top-1/2 h-72 w-72 -translate-x-1/2 -translate-y-1/2 rounded-full bg-rose-500/10 blur-[90px]"></div>

                <svg class="pointer-events-none absolute -bottom-4 -right-4 h-28 w-28 text-rose-400/40 md:h-36 md:w-36" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M60 60C60 60 52 30 60 14C68 30 60 60 60 60Z" fill="currentColor" opacity="0.55"/>
                    <path d="M60 60C60 60 88 52 104 60C88 68 60 60 60 60Z" fill="currentColor" opacity="0.45"/>
                    <path d="M60 60C60 60 68 90 60 106C52 90 60 60 60 60Z" fill="currentColor" opacity="0.5"/>
                    <path d="M60 60C60 60 32 68 16 60C32 52 60 60 60 60Z" fill="currentColor" opacity="0.4"/>
                    <circle cx="60" cy="60" r="6" fill="currentColor" opacity="0.75"/>
                </svg>

                <span class="pointer-events-none absolute left-10 top-10 text-sm text-rose-300/50">✦</span>
                <span class="pointer-events-none absolute right-16 top-14 text-xs text-rose-300/40">✧</span>

                <div class="relative">
                    <p class="font-mono text-xs tracking-[0.3em] text-rose-400">END OF THE FIRST LOOK</p>
                    <h2 class="mx-auto mt-6 max-w-3xl font-serif text-4xl font-semibold leading-tight text-white md:text-6xl">There is more <span class="text-rose-400">behind the interface.</span></h2>
                    <p class="mx-auto mt-6 max-w-xl text-sm leading-7 text-slate-400">Explore my story, discover what keeps me curious, or simply send me an email.</p>

                    <div class="mt-9 flex flex-wrap justify-center gap-4">
                        <a href="<?php echo site_url('portfolio/about'); ?>" class="rounded-full bg-white px-7 py-3.5 text-sm font-semibold text-slate-900 transition hover:bg-rose-400 hover:text-white">About Me</a>
                        <a href="<?php echo site_url('portfolio/contact'); ?>" class="rounded-full border border-white/10 bg-white/5 px-7 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">Contact Me</a>
                    </div>
                </div>

            </div>

        </section>

    </main>

    <footer class="border-t border-slate-100 bg-white px-5 py-8 md:px-8">
        <div class="mx-auto flex max-w-7xl flex-col justify-between gap-4 text-sm text-slate-500 md:flex-row md:items-center">
            <p>© 2026 Arez∞ Roshani</p>
            <p class="font-mono text-[10px] tracking-widest text-slate-400">COMPUTER ENGINEER • ASP.NET CORE • ARCHITECTURE</p>
        </div>
    </footer>


    <script>
    (function () {
        const petBody = document.getElementById('petBody');
        const pupils = [...petBody.querySelectorAll('.pet-pupil')];

        const CENTER = 180;
        const RADIUS = 169;
        const RINGS = 15;
        const DOTS_PER_RING = 28;
        const dots = [];

        for (let ring = 0; ring < RINGS; ring++) {
            const latitude = -Math.PI / 2 + (ring + 0.5) * (Math.PI / RINGS);
            const ringRadius = Math.cos(latitude);
            const ringY = Math.sin(latitude);
            const speed = 0.00035 + (ring % 3) * 0.00008;
            const direction = ring % 2 === 0 ? 1 : -1;

            for (let i = 0; i < DOTS_PER_RING; i++) {
                const el = document.createElement('span');
                el.className = 'pet-dot';
                petBody.appendChild(el);
                const angle = (i / DOTS_PER_RING) * Math.PI * 2;
                dots.push({ el, ringRadius, ringY, angle, speed, direction, ring });
            }
        }

        let mouse = { x: window.innerWidth * .85, y: window.innerHeight * .85 };
        let smoothMouse = { ...mouse };

        window.addEventListener('pointermove', e => {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
        });

        function eyeCenter(eye) {
            const rect = eye.getBoundingClientRect();
            return { x: rect.left + rect.width / 2, y: rect.top + rect.height / 2 };
        }

        function rotateX(point, angle) {
            const cos = Math.cos(angle), sin = Math.sin(angle);
            return { x: point.x, y: point.y * cos - point.z * sin, z: point.y * sin + point.z * cos };
        }
        function rotateZ(point, angle) {
            const cos = Math.cos(angle), sin = Math.sin(angle);
            return { x: point.x * cos - point.y * sin, y: point.x * sin + point.y * cos, z: point.z };
        }

        let lastTime = performance.now();

        function animate(now) {
            const dt = Math.min(.04, (now - lastTime) / 1000);
            lastTime = now;

            smoothMouse.x += (mouse.x - smoothMouse.x) * Math.min(1, dt * 7);
            smoothMouse.y += (mouse.y - smoothMouse.y) * Math.min(1, dt * 7);

            dots.forEach(dot => {
                const rotation = now * dot.speed * dot.direction;
                const angle = dot.angle + rotation;

                let point = {
                    x: dot.ringRadius * Math.cos(angle),
                    y: dot.ringY,
                    z: dot.ringRadius * Math.sin(angle),
                };

                point = rotateZ(point, -0.48);
                point = rotateX(point, 0.18);

                const depth = (point.z + 1) / 2;
                const scale = 0.62 + depth * 0.58;
                const opacity = 0.28 + depth * 0.72;
                const screenX = CENTER + point.x * RADIUS;
                const screenY = CENTER + point.y * RADIUS;

                dot.el.style.transform = `translate(${screenX}px, ${screenY}px) translate(-50%,-50%) scale(${scale})`;
                dot.el.style.opacity = opacity;
            });

            pupils.forEach(pupil => {
                const center = eyeCenter(pupil.parentElement);
                let ex = smoothMouse.x - center.x;
                let ey = smoothMouse.y - center.y;
                const len = Math.hypot(ex, ey) || 1;
                const max = 17;
                const amount = Math.min(max, len * .075);
                pupil.style.transform = `translate(${ex / len * amount}px, ${ey / len * amount}px)`;
            });

            requestAnimationFrame(animate);
        }

        requestAnimationFrame(animate);
    })();
    </script>


</body>

</html>
