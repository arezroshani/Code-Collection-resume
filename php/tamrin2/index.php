<?php
$schoolName = "Tiffany School";
$schoolTagline = "LEARN · PLAY · SHINE ✨";
$currentYear = date("Y");

$schoolInfo = [
    "experience" => "+24 ⭐",
    "students" => "+1800 🎈",
    "satisfaction" => "98% 🌈"
];

$registrationOpen = true;
?>
<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

<meta name="description" content="Tiffany School — where learning sparkles with joy">

<title><?= htmlspecialchars($schoolName) ?> | Learn • Play • Shine ✨</title>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./dist/output.css">
<script src="https://cdn.tailwindcss.com"></script>

<script>

tailwind.config = {

  theme: {

    extend: {

      fontFamily: { baloo: ['"Baloo 2"', 'cursive'], quick: ['Quicksand', 'sans-serif'] },

      colors: {

        navy: '#241b4d',

        brand: { 50:'#f6f2ff',100:'#ece0ff',200:'#d9c4ff',300:'#bd97ff',400:'#a06bff',500:'#8438f5',600:'#7226dd',700:'#5f1cb8',800:'#4e1a93',900:'#3c1670' },

        sun: { 50:'#fff9eb',100:'#ffefc3',300:'#ffd866',400:'#ffc531',500:'#f7a712',600:'#dc8a08' },

        coral: { 300:'#ffb3c0',400:'#ff8fa3',500:'#ff6b88',600:'#ef4463' },

        mint: { 300:'#9ee8c8',400:'#5fd3a3',500:'#2bb787' },

        sky: { 300:'#9fd8ff',400:'#6fc0ff',500:'#3fa6f7' },

      },

      boxShadow: { soft:'0 20px 50px -20px rgba(36,27,77,.3)', glow:'0 0 0 10px rgba(255,197,49,.18)' },

    },

  },

};

</script>

<style>

  body{ font-family:'Quicksand',sans-serif; }

  h1,h2,h3,.baloo{ font-family:'Baloo 2',cursive; }

  .blob{ position:absolute; border-radius:50%; filter:blur(70px); pointer-events:none; }

  .float{ animation:float 5s ease-in-out infinite; }

  .float-slow{ animation:float 8s ease-in-out infinite; }

  .float-fast{ animation:float 3.2s ease-in-out infinite; }

  @keyframes float{ 0%,100%{ transform:translateY(0) rotate(var(--r,0deg));} 50%{ transform:translateY(-16px) rotate(calc(var(--r,0deg) + 8deg));} }

  .spin-slow{ animation:spin 24s linear infinite; }

  @keyframes spin{ to{ transform:rotate(360deg);} }

  .wiggle{ animation:wiggle 2.6s ease-in-out infinite; }

  @keyframes wiggle{ 0%,100%{ transform:rotate(-6deg);} 50%{ transform:rotate(6deg) scale(1.08);} }

  .marquee{ display:flex; width:max-content; animation:mq 24s linear infinite; }

  @keyframes mq{ to{ transform:translateX(-50%); } }

  .bounce-badge{ animation:bb 1.6s ease-in-out infinite; }

  @keyframes bb{ 0%,100%{ transform:translateY(0) rotate(-8deg);} 50%{ transform:translateY(-6px) rotate(-8deg);} }

  .card-tilt{ transition:transform .4s cubic-bezier(.2,.8,.2,1), box-shadow .4s; }

  .card-tilt:hover{ transform:translateY(-10px) rotate(-1deg) scale(1.02); }

  #sticker-field span{ position:absolute; pointer-events:none; user-select:none; }

  ::selection{ background:#ffd866; color:#241b4d; }


  .sticker{
    position:absolute;
    z-index:25;
    display:grid;
    place-items:center;
    width:58px;height:58px;
    border-radius:20px;
    background:rgba(255,255,255,.96);
    border:3px solid rgba(255,255,255,.95);
    box-shadow:0 12px 30px rgba(36,27,77,.14), 0 0 0 5px rgba(132,56,245,.08);
    font-size:30px;
    transform:rotate(var(--rot,-6deg));
    animation:stickerFloat 4.5s ease-in-out infinite;
    user-select:none;
    pointer-events:none;
  }
  .sticker::after{
    content:"";
    position:absolute;
    inset:5px;
    border:2px dashed rgba(132,56,245,.16);
    border-radius:15px;
  }
  .sticker.small{width:46px;height:46px;border-radius:16px;font-size:23px}
  .sticker.big{width:72px;height:72px;border-radius:24px;font-size:38px}
  @keyframes stickerFloat{
    0%,100%{transform:translateY(0) rotate(var(--rot,-6deg))}
    50%{transform:translateY(-10px) rotate(calc(var(--rot,-6deg) + 6deg))}
  }

  .sparkle{
    position:absolute;
    width:12px;height:12px;
    background:#ffc531;
    clip-path:polygon(50% 0,62% 38%,100% 50%,62% 62%,50% 100%,38% 62%,0 50%,38% 38%);
    animation:sparklePulse 2s ease-in-out infinite;
    pointer-events:none;
  }
  @keyframes sparklePulse{
    0%,100%{transform:scale(.7) rotate(0);opacity:.35}
    50%{transform:scale(1.25) rotate(25deg);opacity:1}
  }

  .kid-badge{
    position:absolute;
    z-index:30;
    padding:8px 13px;
    border-radius:999px;
    font-family:'Baloo 2',cursive;
    font-weight:800;
    font-size:12px;
    color:#241b4d;
    background:#fff;
    border:3px solid #fff;
    box-shadow:0 12px 25px rgba(36,27,77,.13);
    transform:rotate(-5deg);
    animation:badgeWiggle 3s ease-in-out infinite;
  }
  @keyframes badgeWiggle{
    0%,100%{transform:rotate(-5deg) translateY(0)}
    50%{transform:rotate(3deg) translateY(-4px)}
  }

  .fun-card{
    position:relative;
    overflow:hidden;
  }
  .fun-card::before{
    content:"";
    position:absolute;
    width:130px;height:130px;
    border-radius:50%;
    background:rgba(255,216,102,.20);
    top:-65px;right:-65px;
    transition:.45s ease;
  }
  .fun-card:hover::before{
    transform:scale(1.7);
  }

  .rainbow-line{
    height:8px;
    border-radius:999px;
    background:linear-gradient(90deg,#8438f5 0 20%,#6fc0ff 20% 40%,#5fd3a3 40% 60%,#ffd866 60% 80%,#ff8fa3 80%);
  }

  .sticker-pop{
    transition:transform .35s ease, box-shadow .35s ease;
  }
  .sticker-pop:hover{
    transform:translateY(-8px) rotate(2deg) scale(1.03);
    box-shadow:0 22px 45px rgba(36,27,77,.14);
  }

  @media (max-width:640px){
    .sticker{transform:scale(.8) rotate(var(--rot,-6deg))}
    .sticker.big{transform:scale(.72) rotate(var(--rot,-6deg))}
  }

  .brand-title{
    background:linear-gradient(90deg,#7226dd 0%,#ff6b88 55%,#f7a712 100%);
    -webkit-background-clip:text;
    background-clip:text;
    color:transparent;
    -webkit-text-fill-color:transparent;
    letter-spacing:.01em;
    filter:drop-shadow(0 2px 0 rgba(255,255,255,.9));
  }

  .speech-bubble{
    position:relative;
  }
  .speech-bubble::before{
    content:"";
    position:absolute;
    inset:10px;
    border:2px dashed rgba(132,56,245,.22);
    border-radius:2rem;
    pointer-events:none;
  }
  .speech-tail{
    position:absolute;
    left:50%;
    bottom:-17px;
    width:34px;height:34px;
    background:#fff;
    border-right:4px solid #bd97ff;
    border-bottom:4px solid #bd97ff;
    border-bottom-right-radius:10px;
    transform:translateX(-50%) rotate(45deg);
  }
  .lady-sticker{
    background:#fff;
    border:5px solid #fff;
    border-radius:2.2rem;
    box-shadow:0 18px 40px rgba(36,27,77,.18), 0 0 0 5px rgba(132,56,245,.10);
    position:relative;
    animation:stickerFloat 5s ease-in-out infinite;
    --rot:-3deg;
  }
  .lady-sticker::after{
    content:"";
    position:absolute;
    inset:6px;
    border:2px dashed rgba(132,56,245,.18);
    border-radius:1.7rem;
    pointer-events:none;
  }

</style>

</head>

<body class="bg-[#fbf7ff] text-navy antialiased overflow-x-hidden">

<div id="sticker-field" class="fixed inset-0 -z-10 overflow-hidden" aria-hidden="true"></div>

<div class="fixed inset-0 -z-20 overflow-hidden pointer-events-none">

<div class="blob w-[440px] h-[440px] bg-brand-200/50 -top-32 -left-32"></div>

<div class="blob w-[380px] h-[380px] bg-sun-300/40 top-[28%] -right-40"></div>

<div class="blob w-[380px] h-[380px] bg-coral-300/30 bottom-0 left-1/3"></div>

<div class="blob w-[320px] h-[320px] bg-sky-300/30 bottom-20 right-10"></div>

</div>


<header class="sticky top-0 z-50 bg-white/85 backdrop-blur-xl border-b-4 border-brand-200">

<nav class="max-w-7xl mx-auto px-5 lg:px-8 h-20 flex items-center justify-between">

<a href="index.php" class="flex items-center gap-3 group">

<span class="relative w-12 h-12 grid place-items-center rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 shadow-soft group-hover:scale-110 group-hover:-rotate-6 transition">

<svg viewBox="0 0 24 24" class="w-7 h-7 text-sun-300" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9.5L12 4l9 5.5-9 5.5-9-5.5Z"/><path d="M7 12v5c0 1.5 2.5 3 5 3s5-1.5 5-3v-5"/><path d="M20 9.5v6" /></svg>

</span>

<span class="leading-none baloo">

<span class="flex items-center gap-1.5">
  <span class="brand-title block font-extrabold text-2xl sm:text-[28px] tracking-tight"><?= htmlspecialchars($schoolName) ?></span>
  <span class="text-lg sm:text-xl wiggle inline-block">✨</span>
</span>

<span class="block mt-1 text-[10px] font-bold text-brand-500 tracking-[0.28em]"><?= htmlspecialchars($schoolTagline) ?></span>

</span>

</a>

<div class="hidden lg:flex items-center gap-1 bg-brand-50/70 rounded-full p-1.5 baloo text-sm font-semibold">

<a href="index.php" class="px-5 py-2.5 rounded-full bg-white text-brand-700 shadow-sm">Home</a>

<a href="about.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">About Us</a>

<a href="contact.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">Contact</a>

<a href="pre-registration.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">Pre-Registration</a>

</div>

<a href="pre-registration.php" class="hidden sm:inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-navy font-bold text-sm px-6 py-3 rounded-full shadow-glow transition baloo">

      Enroll Now 🎉

</a>

</nav>

</header>

<main>


<section class="relative max-w-7xl mx-auto px-5 lg:px-8 pt-16 pb-24 grid lg:grid-cols-2 gap-14 items-center">

<span class="absolute -top-2 left-10 text-4xl float wiggle" style="--r:-10deg">🎈</span>

<span class="absolute top-24 -left-2 text-3xl float-slow" style="--r:6deg">⭐</span>

<span class="absolute top-6 right-6 text-4xl float-fast">🚀</span>

<div>

<span class="inline-flex items-center gap-2 bg-white border-2 border-brand-200 shadow-sm rounded-full px-4 py-2 text-xs font-bold text-brand-600 baloo">

<span class="w-2 h-2 rounded-full bg-mint-500 animate-pulse"></span>

      New school year registration is open! 🎉

</span>

<h1 class="mt-7 text-4xl sm:text-5xl lg:text-6xl font-bold leading-[1.15]">

      Where Learning <span class="relative inline-block text-brand-600">Sparkles

<svg class="absolute -bottom-2 left-0 w-full" height="14" viewBox="0 0 200 14" fill="none"><path d="M3 10C40 2 160 2 197 10" stroke="#FFC531" stroke-width="7" stroke-linecap="round"/></svg>

</span> with Pure <span class="text-coral-500">Joy</span> 🌈

</h1>

<p class="mt-6 text-navy/60 text-lg leading-8 max-w-lg font-quick">

      At Tiffany School, every child discovers their own spark through creativity, safety, and non-stop curiosity. Learning here means playing, exploring, and growing , all at once!

</p>

<div class="mt-9 flex flex-wrap gap-4 baloo font-bold">

<a href="pre-registration.php" class="inline-flex items-center gap-2 bg-navy text-white px-7 py-4 rounded-2xl shadow-soft hover:-translate-y-1 hover:bg-brand-700 transition">

        Free Pre-Registration ✏️

</a>

<a href="about.php" class="inline-flex items-center gap-2 border-2 border-brand-200 bg-white px-7 py-4 rounded-2xl text-navy hover:border-brand-400 hover:-translate-y-1 transition">

        Meet Our School 🏫

</a>

</div>

<div class="mt-12 flex flex-wrap gap-8 border-t-4 border-dashed border-brand-200 pt-7 baloo">

<div><p class="text-3xl font-bold text-brand-600"><?= $schoolInfo["experience"] ?></p><p class="text-xs text-navy/50 mt-1 font-semibold">Years of experience</p></div>

<div><p class="text-3xl font-bold text-coral-500"><?= $schoolInfo["students"] ?></p><p class="text-xs text-navy/50 mt-1 font-semibold">Happy students</p></div>

<div><p class="text-3xl font-bold text-mint-500"><?= $schoolInfo["satisfaction"] ?></p><p class="text-xs text-navy/50 mt-1 font-semibold">Parent satisfaction</p></div>

</div>

</div>

<div class="relative w-full aspect-square max-w-lg mx-auto">
<span class="kid-badge -top-7 left-6 bg-sun-300">WOW! ⭐</span>
<span class="kid-badge bottom-20 right-0 bg-mint-300" style="animation-delay:.8s">LET'S PLAY! 🎮</span>


<span class="absolute -top-6 -right-4 text-4xl float wiggle z-20">🌟</span>

<span class="absolute top-1/3 -right-8 text-3xl float-slow z-20">🖍️</span>

<span class="absolute -bottom-2 -right-2 text-4xl float-fast z-20">🧸</span>

<span class="absolute bottom-10 -left-8 text-3xl float z-20">🍎</span>

<span class="absolute top-6 -left-8 text-3xl float-slow z-20">🎨</span>

<div class="absolute inset-6 bg-gradient-to-br from-brand-500 to-brand-700 rounded-[3rem] rotate-6 shadow-soft"></div>

<div class="absolute inset-6 bg-white/95 rounded-[3rem] -rotate-3 shadow-soft overflow-hidden">

<img
  src="./images/bib.jpg"
  alt="Happy student learning at Tiffany School"
  class="w-full h-full object-cover"
  onerror="this.onerror=null; this.src='../school-kids.png';"
>

</div>

<div class="absolute -bottom-5 -left-5 bg-white rounded-2xl shadow-soft px-5 py-3 flex items-center gap-3 border-2 border-brand-200">

<span class="w-10 h-10 rounded-xl bg-mint-500/10 grid place-items-center text-mint-500">

<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>

</span>

<div class="baloo"><p class="text-sm font-bold">Safe & happy space</p><p class="text-[11px] text-navy/50 font-quick">Loved by parents 💕</p></div>

</div>

</div>

</section>


<svg viewBox="0 0 1440 60" class="w-full -mb-1 text-navy"><path fill="currentColor" d="M0 30C240 70 480 0 720 20S1200 60 1440 20V60H0Z"/></svg>

<div class="bg-navy py-4 overflow-hidden">

<div class="marquee text-white/90 text-sm font-bold tracking-wide gap-10 whitespace-nowrap baloo">

<span class="flex gap-10 pl-10">

<span>✦ Smart Classrooms</span><span>✦ Robotics & Languages</span><span>✦ Free Counseling</span><span>✦ School Bus Service</span><span>✦ Outdoor Play Zones</span><span>✦ Healthy Meals</span>

</span>

<span class="flex gap-10 pl-10" aria-hidden="true">

<span>✦ Smart Classrooms</span><span>✦ Robotics & Languages</span><span>✦ Free Counseling</span><span>✦ School Bus Service</span><span>✦ Outdoor Play Zones</span><span>✦ Healthy Meals</span>

</span>

</div>

</div>

<section class="max-w-7xl mx-auto px-5 lg:px-8 py-24 relative">

<span class="absolute top-6 left-6 text-3xl float">🎉</span>

<span class="absolute top-10 right-10 text-3xl float-slow">🪁</span>

<div class="text-center max-w-2xl mx-auto">

<span class="text-brand-600 font-bold text-sm tracking-widest baloo">ONLY AT TIFFANY</span>

<h2 class="mt-3 text-3xl sm:text-4xl font-bold">Things No Other School Has 🤩</h2>

<p class="mt-4 text-navy/55 font-quick">These aren't your everyday school amenities , they're exactly what makes kids fall in love with coming to school.</p>

</div>

<div class="mt-16 grid sm:grid-cols-2 lg:grid-cols-3 gap-7">

<div class="card-tilt fun-card sticker-pop bg-white rounded-[2rem] p-7 border-4 border-brand-100 shadow-sm hover:shadow-soft relative overflow-visible">

<span class="absolute -top-4 -left-4 bg-coral-500 text-white text-[11px] font-bold px-3 py-1.5 rounded-full bounce-badge shadow baloo">Weird but true! 😮</span>

<span class="absolute -top-3 -right-3 text-2xl wiggle">🎵</span>

<div class="w-24 h-24 mx-auto">

<svg viewBox="0 0 100 100" class="w-full h-full float-slow">

<rect x="34" y="14" width="32" height="46" rx="16" fill="#8438f5"/>

<rect x="40" y="22" width="20" height="4" rx="2" fill="#fff" opacity=".5"/><rect x="40" y="30" width="20" height="4" rx="2" fill="#fff" opacity=".5"/><rect x="40" y="38" width="20" height="4" rx="2" fill="#fff" opacity=".5"/>

<path d="M24 46a26 26 0 0 0 52 0" fill="none" stroke="#4e1a93" stroke-width="4" stroke-linecap="round"/>

<line x1="50" y1="72" x2="50" y2="84" stroke="#4e1a93" stroke-width="4" stroke-linecap="round"/><line x1="38" y1="84" x2="62" y2="84" stroke="#4e1a93" stroke-width="4" stroke-linecap="round"/>

<circle cx="42" cy="36" r="3" fill="#fff"/><circle cx="58" cy="36" r="3" fill="#fff"/><path d="M42 46q8 6 16 0" stroke="#fff" stroke-width="2.4" fill="none" stroke-linecap="round"/>

<circle cx="78" cy="22" r="4" fill="#ffd866"/><circle cx="20" cy="18" r="3" fill="#ff8fa3"/>

</svg>

</div>

<h3 class="mt-5 font-bold text-lg text-center baloo">Student Podcast Studio</h3>

<p class="mt-2 text-sm text-navy/55 leading-7 text-center font-quick">Every student records their own voice in a real studio , episodes get played for the whole school!</p>

</div>

<div class="card-tilt fun-card sticker-pop bg-white rounded-[2rem] p-7 border-4 border-brand-100 shadow-sm hover:shadow-soft relative overflow-visible">

<span class="absolute -top-3 -right-3 text-2xl wiggle">✨</span>

<div class="w-24 h-24 mx-auto">

<svg viewBox="0 0 100 100" class="w-full h-full float">

<path d="M50 10l9.5 19.3L80 32.4 65 47l3.5 20.5L50 57.9 31.5 67.5 35 47 20 32.4l20.5-3.1L50 10Z" fill="#ffc531"/>

<circle cx="42" cy="40" r="3" fill="#4e1a93"/><circle cx="58" cy="40" r="3" fill="#4e1a93"/><path d="M42 50q8 5 16 0" stroke="#4e1a93" stroke-width="2.4" fill="none" stroke-linecap="round"/>

<rect x="60" y="62" width="30" height="7" rx="3" fill="#8438f5" transform="rotate(-28 75 65)"/>

<rect x="83" y="52" width="10" height="6" rx="2" fill="#5f1cb8" transform="rotate(-28 88 55)"/>

<line x1="18" y1="86" x2="82" y2="86" stroke="#4e1a93" stroke-width="3" stroke-linecap="round" stroke-dasharray="1 7"/>

</svg>

</div>

<h3 class="mt-5 font-bold text-lg text-center baloo">Rooftop Observatory</h3>

<p class="mt-2 text-sm text-navy/55 leading-7 text-center font-quick">Every Thursday night, our rooftop telescope opens up for little stargazers.</p>

</div>

<div class="card-tilt fun-card sticker-pop bg-white rounded-[2rem] p-7 border-4 border-brand-100 shadow-sm hover:shadow-soft relative overflow-visible">

<span class="absolute -top-3 -right-3 text-2xl wiggle">🤖</span>

<div class="w-24 h-24 mx-auto">

<svg viewBox="0 0 100 100" class="w-full h-full float-slow">

<circle cx="50" cy="16" r="4" fill="#5f1cb8"/><line x1="50" y1="20" x2="50" y2="28" stroke="#5f1cb8" stroke-width="3"/>

<rect x="24" y="28" width="52" height="42" rx="12" fill="#a06bff"/>

<circle cx="40" cy="47" r="6" fill="#fff"/><circle cx="60" cy="47" r="6" fill="#fff"/><circle cx="40" cy="47" r="2.6" fill="#241b4d"/><circle cx="60" cy="47" r="2.6" fill="#241b4d"/>

<rect x="38" y="58" width="24" height="5" rx="2.5" fill="#fff" opacity=".8"/>

<rect x="12" y="40" width="10" height="20" rx="5" fill="#ffc531"/><rect x="78" y="40" width="10" height="20" rx="5" fill="#ffc531"/>

<rect x="34" y="74" width="32" height="14" rx="6" fill="#5f1cb8"/>

</svg>

</div>

<h3 class="mt-5 font-bold text-lg text-center baloo">Robotics & AI Lab</h3>

<p class="mt-2 text-sm text-navy/55 leading-7 text-center font-quick">Starting in 1st grade, kids build their own robots and learn the basics of coding!</p>

</div>

<div class="card-tilt fun-card sticker-pop bg-white rounded-[2rem] p-7 border-4 border-brand-100 shadow-sm hover:shadow-soft relative overflow-visible">

<span class="absolute -top-4 -left-4 bg-mint-500 text-white text-[11px] font-bold px-3 py-1.5 rounded-full bounce-badge shadow baloo">Fan favorite! 🙌</span>

<span class="absolute -top-3 -right-3 text-2xl wiggle">🔎</span>

<div class="w-24 h-24 mx-auto">

<svg viewBox="0 0 100 100" class="w-full h-full float">

<circle cx="42" cy="42" r="26" fill="#9ee8c8"/><circle cx="42" cy="42" r="26" fill="none" stroke="#2bb787" stroke-width="5"/>

<circle cx="34" cy="38" r="3" fill="#241b4d"/><circle cx="50" cy="38" r="3" fill="#241b4d"/><path d="M34 50q8 6 16 0" stroke="#241b4d" stroke-width="2.4" fill="none" stroke-linecap="round"/>

<line x1="61" y1="61" x2="84" y2="84" stroke="#2bb787" stroke-width="7" stroke-linecap="round"/>

<path d="M20 16l4 4M24 14l-2 6" stroke="#ffc531" stroke-width="3" stroke-linecap="round"/>

</svg>

</div>

<h3 class="mt-5 font-bold text-lg text-center baloo">Educational Escape Room</h3>

<p class="mt-2 text-sm text-navy/55 leading-7 text-center font-quick">No boring tests here , solve puzzles and team up to escape the "classroom"!</p>

</div>

<div class="card-tilt fun-card sticker-pop bg-white rounded-[2rem] p-7 border-4 border-brand-100 shadow-sm hover:shadow-soft relative overflow-visible">

<span class="absolute -top-3 -right-3 text-2xl wiggle">👑</span>

<div class="w-24 h-24 mx-auto">

<svg viewBox="0 0 100 100" class="w-full h-full float-slow">

<circle cx="50" cy="56" r="26" fill="#ffb3c0"/>

<circle cx="42" cy="54" r="3" fill="#241b4d"/><circle cx="58" cy="54" r="3" fill="#241b4d"/><path d="M42 64q8 6 16 0" stroke="#241b4d" stroke-width="2.4" fill="none" stroke-linecap="round"/>

<path d="M26 30l10 14 14-18 14 18 10-14-4 22H30l-4-22Z" fill="#ffc531" stroke="#dc8a08" stroke-width="2" stroke-linejoin="round"/>

<circle cx="26" cy="29" r="3" fill="#ff6b88"/><circle cx="50" cy="24" r="3" fill="#ff6b88"/><circle cx="74" cy="29" r="3" fill="#ff6b88"/>

</svg>

</div>

<h3 class="mt-5 font-bold text-lg text-center baloo">"Principal for a Day"</h3>

<p class="mt-2 text-sm text-navy/55 leading-7 text-center font-quick">Every month, one lucky student gets to run the school for a whole day!</p>

</div>

<div class="card-tilt fun-card sticker-pop bg-white rounded-[2rem] p-7 border-4 border-brand-100 shadow-sm hover:shadow-soft relative overflow-visible">

<span class="absolute -top-3 -right-3 text-2xl wiggle">🎶</span>

<div class="w-24 h-24 mx-auto">

<svg viewBox="0 0 100 100" class="w-full h-full float">

<rect x="44" y="22" width="5" height="50" rx="2.5" fill="#4e1a93"/>

<rect x="76" y="14" width="5" height="50" rx="2.5" fill="#4e1a93"/>

<path d="M44 22L81 14V27L44 35Z" fill="#4e1a93"/>

<ellipse cx="34" cy="72" rx="14" ry="11" fill="#ff6b88" transform="rotate(-20 34 72)"/>

<ellipse cx="66" cy="64" rx="14" ry="11" fill="#ffc531" transform="rotate(-20 66 64)"/>

<circle cx="30" cy="70" r="2.4" fill="#fff"/><circle cx="39" cy="70" r="2.4" fill="#fff"/><path d="M30 77q4.5 4 9 0" stroke="#fff" stroke-width="2.2" fill="none" stroke-linecap="round"/>

<circle cx="62" cy="62" r="2.4" fill="#241b4d"/><circle cx="71" cy="62" r="2.4" fill="#241b4d"/><path d="M62 69q4.5 4 9 0" stroke="#241b4d" stroke-width="2.2" fill="none" stroke-linecap="round"/>

<circle cx="16" cy="30" r="3" fill="#9ee8c8"/><circle cx="90" cy="40" r="3" fill="#8438f5"/><circle cx="20" cy="50" r="2.5" fill="#ffd866"/>

</svg>

</div>

<h3 class="mt-5 font-bold text-lg text-center baloo">Music Room</h3>

<p class="mt-2 text-sm text-navy/55 leading-7 text-center font-quick">From piano to drums , every child picks an instrument and joins our school band!</p>

</div>

</div>

</section>

<svg viewBox="0 0 1440 60" class="w-full -mb-1 text-brand-900"><path fill="currentColor" d="M0 20C240 60 480 0 720 10S1200 50 1440 10V60H0Z"/></svg>

<div class="max-w-7xl mx-auto px-5 lg:px-8"><div class="rainbow-line"></div></div>
<section class="bg-brand-900 text-white py-24 relative overflow-hidden">

<div class="blob w-[400px] h-[400px] bg-brand-600/40 -top-20 right-0"></div>

<span class="absolute top-10 left-10 text-3xl float">🎒</span>

<span class="absolute bottom-10 right-16 text-3xl float-slow">📚</span>

<div class="max-w-7xl mx-auto px-5 lg:px-8 relative">

<div class="text-center max-w-xl mx-auto">

<span class="text-sun-400 font-bold text-sm tracking-widest baloo">GRADE LEVELS</span>

<h2 class="mt-3 text-3xl sm:text-4xl font-bold">A Journey, Step by Step 🚸</h2>

</div>

<div class="mt-14 grid sm:grid-cols-3 gap-6">

<div class="bg-white/5 border-2 border-white/15 rounded-3xl p-8 backdrop-blur hover:bg-white/10 transition">

<p class="text-sun-400 font-extrabold text-sm baloo">Pre-K 🧸</p>

<p class="mt-2 text-2xl font-bold baloo">Ages 4–6</p>

<p class="mt-4 text-white/60 text-sm leading-7 font-quick">Play, language, and getting ready for the world of learning.</p>

</div>

<div class="bg-white/5 border-2 border-white/15 rounded-3xl p-8 backdrop-blur hover:bg-white/10 transition">

<p class="text-coral-400 font-extrabold text-sm baloo">Elementary 🖍️</p>

<p class="mt-2 text-2xl font-bold baloo">Ages 7–11</p>

<p class="mt-4 text-white/60 text-sm leading-7 font-quick">Building scientific skills, creativity, and teamwork.</p>

</div>

<div class="bg-white/5 border-2 border-white/15 rounded-3xl p-8 backdrop-blur hover:bg-white/10 transition">

<p class="text-mint-400 font-extrabold text-sm baloo">Middle School 🔬</p>

<p class="mt-2 text-2xl font-bold baloo">Ages 12–14</p>

<p class="mt-4 text-white/60 text-sm leading-7 font-quick">Deepening knowledge and guiding students toward a bright future.</p>

</div>

</div>

</div>

</section>

<section class="max-w-5xl mx-auto px-5 lg:px-8 py-24 text-center relative">

<span class="absolute top-6 left-10 text-3xl float">💬</span>

<span class="absolute top-10 right-10 text-3xl float-slow">💕</span>

<div class="flex flex-col items-center">

<div class="speech-bubble relative max-w-2xl w-full bg-white border-4 border-brand-300 rounded-[2.5rem] px-7 sm:px-12 py-10 shadow-soft">

<span class="absolute -top-5 -left-3 text-3xl wiggle select-none" aria-hidden="true">🗯️</span>

<span class="absolute -top-3 -right-3 text-2xl float-slow select-none" aria-hidden="true">✨</span>

<svg class="w-9 h-9 mx-auto text-sun-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9.5 4C5.9 5.2 3.5 8.5 3.5 12.3c0 3.3 2.2 5.7 5 5.7 2.2 0 4-1.7 4-3.9 0-2.1-1.6-3.7-3.6-3.7-.3 0-.6 0-.9.1.5-2 2.3-3.6 4.5-4.1L9.5 4Zm10 0c-3.6 1.2-6 4.5-6 8.3 0 3.3 2.2 5.7 5 5.7 2.2 0 4-1.7 4-3.9 0-2.1-1.6-3.7-3.6-3.7-.3 0-.6 0-.9.1.5-2 2.3-3.6 4.5-4.1L19.5 4Z"/></svg>

<p class="relative mt-4 text-lg sm:text-2xl font-bold leading-relaxed text-navy/80 baloo">

    "Ever since my child started at Tiffany, their confidence and excitement for learning have multiplied. The teachers truly care." 🧸

</p>

<span class="speech-tail" aria-hidden="true"></span>

</div>

<div class="lady-sticker mt-8 w-36 h-36 sm:w-44 sm:h-44 grid place-items-center" aria-hidden="true">

<svg viewBox="0 0 120 120" class="w-full h-full p-2">

<path d="M14 120c0-28 20-40 46-40s46 12 46 40Z" fill="#8438f5"/>
<path d="M46 82l14 16 14-16" fill="#fff" stroke="#fff" stroke-width="2" stroke-linejoin="round"/>

<rect x="52" y="68" width="16" height="18" rx="6" fill="#f2bf99"/>

<ellipse cx="60" cy="48" rx="33" ry="35" fill="#4a2c2a"/>
<circle cx="60" cy="12" r="12" fill="#4a2c2a"/>
<circle cx="60" cy="12" r="5" fill="#ffc531"/>
<ellipse cx="60" cy="53" rx="25" ry="27" fill="#fcd5b5"/>

<path d="M34 48c3-20 37-26 52 0-10-7-22-11-31-9-8 2-14 5-21 9Z" fill="#4a2c2a"/>
<circle cx="34" cy="62" r="3" fill="#ffc531"/><circle cx="86" cy="62" r="3" fill="#ffc531"/>
<circle cx="50" cy="55" r="3" fill="#241b4d"/><circle cx="70" cy="55" r="3" fill="#241b4d"/>
<circle cx="51" cy="54" r="1" fill="#fff"/><circle cx="71" cy="54" r="1" fill="#fff"/>
<circle cx="42" cy="65" r="5" fill="#ff8fa3" opacity=".45"/><circle cx="78" cy="65" r="5" fill="#ff8fa3" opacity=".45"/>
<path d="M51 66q9 8 18 0" stroke="#c2415a" stroke-width="3" fill="none" stroke-linecap="round"/>

</svg>

</div>

<div class="mt-4 text-center">

<p class="font-bold text-sm baloo">Parent of a 4th grader</p>

<p class="text-xs text-navy/50 font-quick">Tiffany School Family</p>

</div>

</div>

</section>

<section class="max-w-7xl mx-auto px-5 lg:px-8 pb-24">

<div class="relative sticker-pop rounded-[2.5rem] bg-gradient-to-r from-brand-600 to-brand-800 px-8 sm:px-16 py-16 text-center overflow-hidden shadow-soft">

<span class="absolute top-6 left-10 text-3xl float wiggle">🎉</span>

<span class="absolute top-10 right-12 text-3xl float-slow">🎈</span>

<span class="absolute bottom-8 left-16 text-2xl float-fast">⭐</span>

<span class="absolute bottom-10 right-20 text-3xl float">🚀</span>

<h2 class="relative text-3xl sm:text-4xl font-bold text-white">Spots for the New Year Are Limited! ⏰</h2>

<p class="relative mt-4 text-brand-100 max-w-xl mx-auto font-quick">Fill out the pre-registration form today so our team can reach out to you as soon as possible.</p>

<a href="pre-registration.php" class="relative mt-8 inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-navy font-bold px-8 py-4 rounded-2xl shadow-lg transition hover:-translate-y-1 baloo">

      Start Pre-Registration 🚀

</a>

</div>

</section>

<section class="max-w-7xl mx-auto px-5 lg:px-8 pb-24">

<style>
  .ps-shine{ position:relative; overflow:hidden; }
  .ps-shine::after{
    content:""; position:absolute; top:0; left:-60%; width:40%; height:100%;
    background:linear-gradient(100deg,transparent,rgba(255,255,255,.55),transparent);
    transform:skewX(-20deg); animation:psShine 4.5s ease-in-out infinite;
  }
  @keyframes psShine{ 0%{ left:-60%; } 60%,100%{ left:130%; } }
  .ps-title{
    background:linear-gradient(90deg,#7226dd 0%,#ff6b88 55%,#f7a712 100%);
    -webkit-background-clip:text; background-clip:text;
    color:transparent; -webkit-text-fill-color:transparent;
  }
  .ps-arrow{ transition:transform .3s ease; }
  .ps-btn:hover .ps-arrow{ transform:translateX(6px); }
</style>

<span class="kid-badge top-3 left-8 bg-coral-300">CHEESE! 📸</span>

<div class="relative grid lg:grid-cols-2 gap-10 items-center bg-white/90 backdrop-blur rounded-[2.5rem] p-6 sm:p-10 border-4 border-brand-100 shadow-soft overflow-visible">

<div class="absolute inset-0 rounded-[2.2rem] overflow-hidden pointer-events-none">
  <div class="blob w-72 h-72 bg-sun-300/40 -top-20 -right-16"></div>
  <div class="blob w-72 h-72 bg-brand-200/50 -bottom-24 -left-16"></div>
</div>

<span class="absolute -top-5 right-10 text-3xl wiggle z-10">📸</span>
<span class="absolute -bottom-5 left-10 text-3xl float z-10">🎈</span>

<div class="relative">

  <div class="absolute -inset-3 rounded-[2.4rem] bg-gradient-to-br from-brand-400 via-coral-400 to-sun-400 rotate-3 opacity-90"></div>

  <div class="ps-shine relative aspect-[4/3] rounded-[2rem] overflow-hidden bg-gradient-to-br from-brand-100 to-coral-100 border-4 border-white shadow-soft">

    <img src="./images/yop.jpg" alt="Tiffany School campus"
      class="w-full h-full object-cover"
      onerror="this.style.display='none'; this.parentElement.querySelector('.ph-fallback').style.display='flex';">

    <div class="ph-fallback absolute inset-0 hidden flex-col items-center justify-center gap-3 text-brand-500">
      <svg class="w-14 h-14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2.5"/><circle cx="9" cy="11" r="2.2"/><path d="M21 16l-5.5-5L9 17"/></svg>
      <p class="text-sm font-bold baloo">Campus photo goes here</p>
      <p class="text-[11px] text-brand-400 font-quick">./images/yop.jpg</p>
    </div>

    <span class="absolute bottom-4 left-4 bg-white/90 backdrop-blur px-4 py-2 rounded-full text-xs font-bold text-navy shadow baloo">A peek inside Tiffany 🏫</span>

  </div>

  <span class="absolute -top-4 -left-4 bg-sun-400 text-navy text-[11px] font-extrabold px-3 py-1.5 rounded-full shadow baloo bounce-badge z-10">Smile! 😊</span>

</div>

<div class="relative">

  <span class="inline-flex items-center gap-2 bg-brand-50 border-2 border-brand-200 text-brand-600 font-bold text-[11px] sm:text-xs tracking-[0.2em] px-4 py-2 rounded-full baloo">
    A LITTLE GLIMPSE OF TIFFANY ✨
  </span>

  <h2 class="ps-title mt-5 text-3xl sm:text-4xl lg:text-[44px] font-extrabold leading-[1.15] pb-1">
    Where Every Day Becomes an Adventure 
  </h2>

  <div class="mt-5 flex gap-1.5">
    <span class="h-1.5 w-10 rounded-full bg-brand-500"></span>
    <span class="h-1.5 w-6 rounded-full bg-coral-400"></span>
    <span class="h-1.5 w-3 rounded-full bg-sun-400"></span>
  </div>

  <p class="mt-6 text-navy/60 text-base sm:text-lg leading-8 font-quick max-w-xl">
    From joyful classrooms to creative activities and playful moments, Tiffany is a place where children learn, discover, make friends, and create memories every day.
  </p>

  <div class="mt-7 flex flex-wrap gap-3 baloo text-xs font-bold">
    <span class="px-4 py-2 rounded-full bg-mint-300/40 text-mint-500 border-2 border-mint-300">🎨 Creative Activities</span>
    <span class="px-4 py-2 rounded-full bg-sky-300/40 text-sky-500 border-2 border-sky-300">🤝 Make Friends</span>
    <span class="px-4 py-2 rounded-full bg-coral-300/40 text-coral-600 border-2 border-coral-300">🎈 Playful Moments</span>
  </div>

  <a href="about.php" class="ps-btn mt-9 inline-flex items-center gap-3 bg-gradient-to-r from-brand-600 to-brand-800 text-white font-bold text-sm sm:text-base px-8 py-4 rounded-2xl shadow-soft hover:-translate-y-1 hover:shadow-glow transition baloo">
    Discover Tiffany School
    <svg class="ps-arrow w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
  </a>

</div>

</div>

</section>

<section class="relative max-w-7xl mx-auto px-5 lg:px-8 pt-2 pb-0" aria-hidden="true">

<style>
  .gs-fl{ animation:gsFl 4.8s ease-in-out infinite; }
  .gs-fl2{ animation:gsFl 6.8s ease-in-out infinite; }
  @keyframes gsFl{ 0%,100%{ transform:translateY(0);} 50%{ transform:translateY(-9px);} }
  .gs-tw{ animation:gsTw 2.4s ease-in-out infinite; transform-box:fill-box; transform-origin:center; }
  @keyframes gsTw{ 0%,100%{ transform:scale(.6); opacity:.4;} 50%{ transform:scale(1.25); opacity:1;} }
  .gs-bl{ animation:gsBl 5s infinite; transform-box:fill-box; transform-origin:center; }
  @keyframes gsBl{ 0%,92%,100%{ transform:scaleY(1);} 95%{ transform:scaleY(.1);} }
  .gs-sway{ animation:gsSway 4s ease-in-out infinite; transform-box:fill-box; transform-origin:top center; }
  @keyframes gsSway{ 0%,100%{ transform:rotate(-3deg);} 50%{ transform:rotate(3deg);} }
</style>

<svg viewBox="0 0 900 380" class="w-full h-auto block" role="img" aria-label="A girl sitting on the edge of the page, surrounded by books, a pencil case and school bag items">

<defs>
  <radialGradient id="gs-glow" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="#fff" stop-opacity=".9"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></radialGradient>
  <linearGradient id="gs-bag" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#ff8fa3"/><stop offset="1" stop-color="#ef4463"/></linearGradient>
  <linearGradient id="gs-hood" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffd866"/><stop offset="1" stop-color="#ffc531"/></linearGradient>
</defs>


<g transform="translate(0 40)">

  <ellipse cx="450" cy="230" rx="280" ry="190" fill="url(#gs-glow)"/>

   
  <g class="gs-fl2">
    <rect x="540" y="22" width="150" height="46" rx="23" fill="#fff" stroke="#bd97ff" stroke-width="3"/>
    <path d="M552 62 L534 84 L578 68Z" fill="#fff" stroke="#bd97ff" stroke-width="3" stroke-linejoin="round"/>
    <path d="M553 63 L578 66" stroke="#fff" stroke-width="5"/>
    <text x="615" y="52" text-anchor="middle" font-family="'Baloo 2',cursive" font-weight="800" font-size="19" fill="#7226dd">I love books!</text>
    <path d="M668 18 c-6-8-18-2-10 8 l10 9 10-9 c8-10-4-16-10-8Z" fill="#ff6b88" transform="translate(-2 -4) scale(.8)"/>
  </g>

  <g class="gs-fl" style="animation-delay:-1s">
    <g transform="rotate(-12 245 100)">
      <path d="M205 96 L245 88 L245 124 L205 132Z" fill="#fff" stroke="#8438f5" stroke-width="2.5" stroke-linejoin="round"/>
      <path d="M245 88 L285 96 L285 132 L245 124Z" fill="#f6f2ff" stroke="#8438f5" stroke-width="2.5" stroke-linejoin="round"/>
      <path d="M213 105l24-4M213 113l24-4M253 101l24 4M253 109l24 4" stroke="#bd97ff" stroke-width="2" stroke-linecap="round"/>
    </g>
  </g>

  
  <g class="gs-fl2" style="animation-delay:-2s">
    <g transform="rotate(14 770 110)">
      <rect x="732" y="94" width="76" height="32" rx="5" fill="#2bb787"/>
      <rect x="740" y="101" width="60" height="4" rx="2" fill="#fff" opacity=".6"/>
      <rect x="732" y="94" width="10" height="32" rx="3" fill="#1f9a72"/>
    </g>
  </g>

  
  <text class="gs-fl" x="325" y="86" font-family="'Baloo 2',cursive" font-weight="800" font-size="42" fill="#8438f5" style="animation-delay:-.4s">A</text>
  <text class="gs-fl2" x="150" y="120" font-family="'Baloo 2',cursive" font-weight="800" font-size="38" fill="#ff6b88" style="animation-delay:-2.4s">B</text>
  <text class="gs-fl" x="385" y="52" font-family="'Baloo 2',cursive" font-weight="800" font-size="30" fill="#f7a712" style="animation-delay:-1.7s">1+1</text>
  <text class="gs-fl2" x="575" y="138" font-family="'Baloo 2',cursive" font-weight="800" font-size="34" fill="#3fa6f7" style="animation-delay:-3s">π</text>

  
  <g class="gs-fl" style="animation-delay:-2.2s">
    <circle cx="478" cy="62" r="14" fill="#ffd866"/>
    <rect x="472" y="74" width="12" height="8" rx="3" fill="#bd97ff"/>
    <path d="M478 40v-7M462 46l-5-5M494 46l5-5M455 62h-7M501 62h7" stroke="#ffc531" stroke-width="3" stroke-linecap="round"/>
  </g>

  
  <path class="gs-tw" d="M95 190l5 13 13 5-13 5-5 13-5-13-13-5 13-5Z" fill="#ffc531"/>
  <path class="gs-tw" style="animation-delay:.8s" d="M850 150l4 11 11 4-11 4-4 11-4-11-11-4 11-4Z" fill="#ff8fa3"/>
  <path class="gs-tw" style="animation-delay:1.4s" d="M300 160l3 8 8 3-8 3-3 8-3-8-8-3 8-3Z" fill="#8438f5"/>
  <path class="gs-tw" style="animation-delay:.3s" d="M640 190l3 8 8 3-8 3-3 8-3-8-8-3 8-3Z" fill="#2bb787"/>
  <path class="gs-tw" style="animation-delay:1.1s" d="M60 90l3 8 8 3-8 3-3 8-3-8-8-3 8-3Z" fill="#3fa6f7"/>
  <circle class="gs-tw" style="animation-delay:.6s" cx="410" cy="130" r="4" fill="#ffc531"/>
  <circle class="gs-tw" style="animation-delay:1.7s" cx="860" cy="260" r="4" fill="#8438f5"/>


  <g>
    <rect x="26" y="322" width="32" height="18" rx="5" fill="#9fd8ff"/>
    <rect x="26" y="322" width="15" height="18" rx="5" fill="#ff8fa3"/>
  </g>

  
  <g transform="rotate(-20 100 300)"><rect x="95" y="252" width="11" height="54" rx="2" fill="#ffc531"/><path d="M95 252 L100.5 238 L106 252Z" fill="#f2bf99"/><path d="M98 245 L100.5 238 L103 245Z" fill="#241b4d"/><rect x="95" y="292" width="11" height="6" fill="#ff6b88"/></g>
  <g transform="rotate(2 135 300)"><rect x="129" y="246" width="11" height="60" rx="2" fill="#2bb787"/><path d="M129 246 L134.5 232 L140 246Z" fill="#f2bf99"/><path d="M132 239 L134.5 232 L137 239Z" fill="#241b4d"/></g>
  <g transform="rotate(20 170 300)"><rect x="164" y="254" width="11" height="52" rx="2" fill="#3fa6f7"/><path d="M164 254 L169.5 240 L175 254Z" fill="#f2bf99"/><path d="M167 247 L169.5 240 L172 247Z" fill="#241b4d"/></g>
  <g transform="rotate(34 190 304)"><rect x="184" y="262" width="12" height="46" rx="2" fill="#ffd866"/><path d="M184 270h5M184 278h5M184 286h5M184 294h5" stroke="#dc8a08" stroke-width="1.5"/></g>

 
  <g>
    <rect x="66" y="292" width="140" height="48" rx="22" fill="#8438f5"/>
    <rect x="76" y="298" width="120" height="6" rx="3" fill="#fff" opacity=".28"/>
    <path d="M82 310 H190" stroke="#d9c4ff" stroke-width="3" stroke-dasharray="4 4" stroke-linecap="round"/>
    <circle cx="190" cy="310" r="5" fill="#ffc531"/>
    <circle cx="112" cy="324" r="3.4" fill="#fff"/><circle cx="148" cy="324" r="3.4" fill="#fff"/>
    <circle cx="113" cy="323" r="1.2" fill="#241b4d"/><circle cx="149" cy="323" r="1.2" fill="#241b4d"/>
    <path d="M122 330q8 6 16 0" stroke="#fff" stroke-width="2.6" fill="none" stroke-linecap="round"/>
    <circle cx="98" cy="330" r="4.5" fill="#ff8fa3" opacity=".7"/><circle cx="162" cy="330" r="4.5" fill="#ff8fa3" opacity=".7"/>
  </g>

  <g>
    <rect x="228" y="318" width="112" height="22" rx="5" fill="#ff6b88"/>
    <rect x="236" y="324" width="94" height="4" rx="2" fill="#fff" opacity=".5"/>
    <rect x="222" y="296" width="118" height="22" rx="5" fill="#ffc531"/>
    <rect x="230" y="302" width="100" height="4" rx="2" fill="#fff" opacity=".6"/>
    <rect x="232" y="276" width="100" height="20" rx="5" fill="#2bb787" transform="rotate(-4 282 286)"/>
    <rect x="240" y="281" width="84" height="3.5" rx="1.7" fill="#fff" opacity=".55" transform="rotate(-4 282 286)"/>
    <path d="M318 296v22l6-5 6 5v-22Z" fill="#ef4463"/>
  </g>

  
  <g>
    <rect x="560" y="318" width="112" height="22" rx="5" fill="#a06bff"/>
    <rect x="568" y="324" width="94" height="4" rx="2" fill="#fff" opacity=".5"/>
    <rect x="566" y="296" width="106" height="22" rx="5" fill="#3fa6f7"/>
    <rect x="574" y="302" width="90" height="4" rx="2" fill="#fff" opacity=".55"/>
    <rect x="556" y="274" width="116" height="22" rx="5" fill="#ffd866" transform="rotate(3 614 285)"/>
    <rect x="564" y="280" width="100" height="4" rx="2" fill="#fff" opacity=".7" transform="rotate(3 614 285)"/>
    
    <circle cx="620" cy="260" r="13" fill="#ef4463"/>
    <path d="M620 248q2-8 8-9" stroke="#5f1cb8" stroke-width="3" fill="none" stroke-linecap="round"/>
    <path d="M623 247q8-6 13 0q-6 5-13 0Z" fill="#2bb787"/>
  </g>

  <g>
    <rect x="688" y="268" width="28" height="72" rx="11" fill="#6fc0ff"/>
    <rect x="693" y="254" width="18" height="16" rx="4" fill="#5f1cb8"/>
    <rect x="688" y="294" width="28" height="24" fill="#fff" opacity=".75"/>
    <path d="M702 313 c-6-4-8-8-4-11 c2-1 4 0 4 2 c0-2 2-3 4-2 c4 3 2 7-4 11Z" fill="#ff6b88"/>
    <rect x="693" y="274" width="4" height="16" rx="2" fill="#fff" opacity=".6"/>
  </g>

  <g transform="rotate(-10 767 213)"><rect x="752" y="190" width="32" height="46" rx="4" fill="#3fa6f7"/><rect x="758" y="198" width="20" height="12" rx="3" fill="#fff" opacity=".85"/><path d="M752 196h4M752 206h4M752 216h4" stroke="#fff" stroke-width="2"/></g>
  <g transform="rotate(12 806 212)"><rect x="800" y="184" width="13" height="56" rx="2" fill="#ffd866"/><path d="M800 192h6M800 200h6M800 208h6M800 216h6" stroke="#dc8a08" stroke-width="1.5"/></g>

  <g>
    <path d="M768 232 q0-24 22-24 q22 0 22 24" fill="none" stroke="#4e1a93" stroke-width="8" stroke-linecap="round"/>
    <rect x="728" y="224" width="124" height="116" rx="36" fill="url(#gs-bag)"/>
    <path d="M736 252 q54 24 108 0" fill="none" stroke="#fff" stroke-opacity=".45" stroke-width="4" stroke-linecap="round"/>
    <rect x="745" y="282" width="90" height="48" rx="18" fill="#ef4463" stroke="#ffb3c0" stroke-width="2"/>
    <path d="M756 290 H824" stroke="#ffd1da" stroke-width="3" stroke-dasharray="4 4" stroke-linecap="round"/>
    <circle cx="776" cy="308" r="3.2" fill="#fff"/><circle cx="804" cy="308" r="3.2" fill="#fff"/>
    <circle cx="777" cy="307" r="1.2" fill="#241b4d"/><circle cx="805" cy="307" r="1.2" fill="#241b4d"/>
    <path d="M784 314q6 5 12 0" stroke="#fff" stroke-width="2.4" fill="none" stroke-linecap="round"/>
    <circle cx="766" cy="316" r="4" fill="#ffb3c0" opacity=".8"/><circle cx="814" cy="316" r="4" fill="#ffb3c0" opacity=".8"/>
    <g class="gs-sway"><path d="M846 262 v16" stroke="#fff" stroke-width="2"/><path d="M846 280 l4 8 9 1 -7 6 2 9 -8-5 -8 5 2-9 -7-6 9-1Z" fill="#ffd84d" stroke="#fff" stroke-width="1.5" stroke-linejoin="round"/></g>
  </g>

  <g>
    <path d="M866 316 q10-12 20 0" fill="none" stroke="#2bb787" stroke-width="3.5" stroke-linecap="round"/>
    <rect x="858" y="316" width="36" height="24" rx="7" fill="#5fd3a3"/>
    <rect x="858" y="326" width="36" height="4" fill="#fff" opacity=".5"/>
    <circle cx="876" cy="333" r="2" fill="#fff"/>
  </g>

  

  <path d="M352 340 C352 306 395 292 450 292 C505 292 548 306 548 340 Z" fill="#8438f5"/>
  <path d="M396 320 q54 16 108 0" stroke="#bd97ff" stroke-width="3" fill="none" stroke-linecap="round" opacity=".6"/>
  <ellipse cx="392" cy="332" rx="26" ry="10" fill="#ff6b88"/>
  <ellipse cx="508" cy="332" rx="26" ry="10" fill="#ff6b88"/>
  <path d="M374 330 h36 M490 330 h36" stroke="#fff" stroke-width="2.4" stroke-linecap="round" opacity=".7"/>

  <rect x="440" y="204" width="20" height="28" rx="8" fill="#f2bf99"/>

  <path d="M392 306 C390 246 412 224 450 224 C488 224 510 246 508 306 Z" fill="url(#gs-hood)"/>
  <path d="M420 230 Q450 252 480 230 Q474 220 450 218 Q426 220 420 230Z" fill="#f7a712"/>
  <path d="M441 250 v22 M459 250 v22" stroke="#fff" stroke-width="3" stroke-linecap="round"/>
  <circle cx="441" cy="274" r="3" fill="#fff"/><circle cx="459" cy="274" r="3" fill="#fff"/>

  <g class="gs-sway"><ellipse cx="384" cy="170" rx="16" ry="32" fill="#4a2c2a" transform="rotate(14 384 170)"/></g>
  <g class="gs-sway" style="animation-delay:-2s"><ellipse cx="516" cy="170" rx="16" ry="32" fill="#4a2c2a" transform="rotate(-14 516 170)"/></g>

  <ellipse cx="450" cy="158" rx="60" ry="62" fill="#4a2c2a"/>

  <ellipse cx="450" cy="168" rx="46" ry="48" fill="#fcd5b5"/>

  <circle cx="405" cy="176" r="8" fill="#f6c6a0"/><circle cx="495" cy="176" r="8" fill="#f6c6a0"/>

  <path d="M402 162 C404 108 496 108 498 162 C486 142 468 132 450 132 C432 132 414 142 402 162Z" fill="#4a2c2a"/>
  <path d="M422 128 q14-12 30-10" stroke="#7a4a3a" stroke-width="3" fill="none" stroke-linecap="round" opacity=".6"/>

  <g><path d="M394 150 l-20-11 v22Z M394 150 l20-11 v22Z" fill="#ff6b88"/><circle cx="394" cy="150" r="5" fill="#ef4463"/></g>
  <g><path d="M506 150 l-20-11 v22Z M506 150 l20-11 v22Z" fill="#ff6b88"/><circle cx="506" cy="150" r="5" fill="#ef4463"/></g>

  <path d="M419 154 q12-8 24-2" stroke="#4a2c2a" stroke-width="3.5" fill="none" stroke-linecap="round"/>
  <path d="M457 152 q12-6 24 2" stroke="#4a2c2a" stroke-width="3.5" fill="none" stroke-linecap="round"/>

  <circle cx="431" cy="172" r="15" fill="#fff" fill-opacity=".3" stroke="#241b4d" stroke-width="2.6"/>
  <circle cx="469" cy="172" r="15" fill="#fff" fill-opacity=".3" stroke="#241b4d" stroke-width="2.6"/>
  <path d="M446 172h8" stroke="#241b4d" stroke-width="2.6" stroke-linecap="round"/>

  <g class="gs-bl">
    <ellipse cx="432" cy="172" rx="6" ry="7" fill="#241b4d"/><ellipse cx="470" cy="172" rx="6" ry="7" fill="#241b4d"/>
    <circle cx="434" cy="169" r="2.4" fill="#fff"/><circle cx="472" cy="169" r="2.4" fill="#fff"/>
    <circle cx="430" cy="175" r="1.2" fill="#fff"/><circle cx="468" cy="175" r="1.2" fill="#fff"/>
  </g>

  <circle cx="412" cy="192" r="7" fill="#ff8fa3" opacity=".5"/><circle cx="488" cy="192" r="7" fill="#ff8fa3" opacity=".5"/>

  <path d="M436 192 Q450 214 464 192 Q450 198 436 192Z" fill="#8a2f3c"/>
  <path d="M440 193 Q450 198 460 193 Q450 196 440 193Z" fill="#fff"/>
  <path d="M444 205 Q450 210 456 205 Q450 202 444 205Z" fill="#ff7a93"/>

  <path d="M406 252 C374 264 376 214 406 202" fill="none" stroke="#ffc531" stroke-width="18" stroke-linecap="round"/>
  <path d="M494 252 C526 264 524 214 494 202" fill="none" stroke="#ffc531" stroke-width="18" stroke-linecap="round"/>
  <circle cx="410" cy="196" r="11" fill="#fcd5b5"/>
  <circle cx="490" cy="196" r="11" fill="#fcd5b5"/>
  <path d="M402 192 q6-4 12 0 M402 199 q7-3 12 1" stroke="#e8a97e" stroke-width="1.8" fill="none" stroke-linecap="round"/>
  <path d="M498 192 q-6-4 -12 0 M498 199 q-7-3 -12 1" stroke="#e8a97e" stroke-width="1.8" fill="none" stroke-linecap="round"/>

  <path d="M398 308 L450 300 L450 326 L398 334Z" fill="#fff" stroke="#8438f5" stroke-width="2.5" stroke-linejoin="round"/>
  <path d="M450 300 L502 308 L502 334 L450 326Z" fill="#f6f2ff" stroke="#8438f5" stroke-width="2.5" stroke-linejoin="round"/>
  <path d="M408 314l32-5M408 321l32-5M460 309l32 5M460 316l32 5" stroke="#bd97ff" stroke-width="2" stroke-linecap="round"/>

</g>

</svg>

</section>

</main>


<footer class="relative bg-navy text-white/70 overflow-hidden">

<div class="h-1.5 w-full bg-gradient-to-r from-brand-500 via-coral-400 to-sun-400"></div>

<div class="blob w-[360px] h-[360px] bg-brand-700/30 -top-24 -right-24"></div>

<div class="max-w-7xl mx-auto px-5 lg:px-8 pt-16 pb-12 relative">

<div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-12">

<div class="lg:col-span-4">

<a href="index.php" class="inline-flex items-center gap-3">

<span class="w-12 h-12 grid place-items-center rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 shadow-soft">

<svg viewBox="0 0 24 24" class="w-6 h-6 text-sun-300" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9.5L12 4l9 5.5-9 5.5-9-5.5Z"/><path d="M7 12v5c0 1.5 2.5 3 5 3s5-1.5 5-3v-5"/></svg>

</span>

<span class="leading-tight baloo">
<span class="block font-bold text-white text-xl"><?= htmlspecialchars($schoolName) ?></span>
<span class="block text-[10px] font-semibold text-sun-300 tracking-[0.25em]">LEARN · PLAY · SHINE</span>
</span>

</a>

<p class="mt-6 text-sm leading-7 font-quick max-w-sm">A place to grow, learn, and discover every student's spark , with expertise.</p>

<div class="mt-7 flex gap-3">

<a href="#" aria-label="LinkedIn" class="w-10 h-10 rounded-xl bg-white/10 grid place-items-center text-white/80 hover:bg-sun-400 hover:text-navy transition">
<svg class="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3 9.75h4V21H3V9.75Zm6.5 0h3.8v1.6h.06c.53-1 1.84-2.05 3.78-2.05 4.04 0 4.78 2.66 4.78 6.1V21h-4v-5.1c0-1.22-.02-2.78-1.7-2.78-1.7 0-1.96 1.33-1.96 2.7V21h-4V9.75Z"/></svg>
</a>

<a href="#" aria-label="Instagram" class="w-10 h-10 rounded-xl bg-white/10 grid place-items-center text-white/80 hover:bg-sun-400 hover:text-navy transition">
<svg class="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
</a>

<a href="#" aria-label="Telegram" class="w-10 h-10 rounded-xl bg-white/10 grid place-items-center text-white/80 hover:bg-sun-400 hover:text-navy transition">
<svg class="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 3.5 2.8 10.7c-.9.4-.9 1.1-.2 1.3l4.8 1.5 1.8 5.6c.2.6.4.8.9.8.4 0 .6-.2.9-.5l2.4-2.3 4.9 3.6c.9.5 1.5.2 1.8-.8L22.9 4.9c.3-1.2-.4-1.8-1.4-1.4ZM8.5 13.3l9.8-6.2c.5-.3.9-.1.5.2l-8.1 7.3-.3 3.4-1.9-4.7Z"/></svg>
</a>

</div>

</div>

<div class="lg:col-span-2">

<p class="text-white font-bold mb-5 text-sm baloo tracking-wide uppercase">Quick Links</p>

<ul class="space-y-3 text-sm font-quick">

<li><a href="index.php" class="hover:text-sun-400 transition">Home</a></li>

<li><a href="about.php" class="hover:text-sun-400 transition">About Us</a></li>

<li><a href="contact.php" class="hover:text-sun-400 transition">Contact</a></li>

<li><a href="pre-registration.php" class="hover:text-sun-400 transition">Pre-Registration</a></li>

</ul>

</div>

<div class="lg:col-span-2">

<p class="text-white font-bold mb-5 text-sm baloo tracking-wide uppercase">Programs</p>

<ul class="space-y-3 text-sm font-quick">

<li>Pre-K · Ages 4–6</li>

<li>Elementary · Ages 7–11</li>

<li>Middle School · Ages 12–14</li>

</ul>

</div>

<div class="lg:col-span-4">

<p class="text-white font-bold mb-5 text-sm baloo tracking-wide uppercase">Contact Us</p>

<ul class="space-y-4 text-sm font-quick">

<li class="flex items-start gap-3">
<span class="mt-0.5 w-8 h-8 shrink-0 rounded-lg bg-white/10 grid place-items-center text-sun-300">
<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-6.2 7-11.5A7 7 0 0 0 5 9.5C5 14.8 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.5"/></svg>
</span>
<span>Valiasr St, Tehran</span>
</li>

<li class="flex items-start gap-3">
<span class="mt-0.5 w-8 h-8 shrink-0 rounded-lg bg-white/10 grid place-items-center text-sun-300">
<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>
</span>
<span>021 99994499</span>
</li>

<li class="flex items-start gap-3">
<span class="mt-0.5 w-8 h-8 shrink-0 rounded-lg bg-white/10 grid place-items-center text-sun-300">
<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2.5"/><path d="m3.5 7 8.5 6 8.5-6"/></svg>
</span>
<span>tifani99@gmail.com</span>
</li>

<li class="flex items-start gap-3">
<span class="mt-0.5 w-8 h-8 shrink-0 rounded-lg bg-white/10 grid place-items-center text-sun-300">
<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
</span>
<span>Sat – Wed · 7:30 AM – 4:00 PM</span>
</li>

</ul>

</div>

</div>

<div class="mt-14 rounded-3xl border border-white/10 bg-white/5 px-6 sm:px-10 py-7 flex flex-col sm:flex-row items-center justify-between gap-5">

<div class="text-center sm:text-left">
<p class="text-white font-bold baloo text-lg">Ready to join the Tiffany family?</p>
<p class="text-sm font-quick text-white/60">Pre-registration is quick, free, and takes just a few minutes.</p>
</div>

<a href="pre-registration.php" class="inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-navy font-bold text-sm px-6 py-3 rounded-full transition baloo whitespace-nowrap">
Start Pre-Registration
<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
</a>

</div>

</div>

<div class="border-t border-white/10">

<div class="max-w-7xl mx-auto px-5 lg:px-8 py-6 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-white/45 font-quick">

<p>© <?= $currentYear ?> <?= htmlspecialchars($schoolName) ?> 🌈</p>

<div class="flex items-center gap-6">
<a href="#" class="hover:text-sun-400 transition">Privacy Policy</a>
<a href="#" class="hover:text-sun-400 transition">Terms of Use</a>
<a href="#top" onclick="window.scrollTo({top:0,behavior:'smooth'});return false;" class="inline-flex items-center gap-1.5 hover:text-sun-400 transition">
Back to top
<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M6 11l6-6 6 6"/></svg>
</a>
</div>

</div>

</div>

</footer>

<script>

const symbols = ['⭐','🎈','🌈','🚀','🍎','✏️','🎨','🧸','🎉','🦋','🌟','🖍️','📚','🪁','🔭','🌻','💫','🎵'];

const field = document.getElementById('sticker-field');

for (let i = 0; i < 26; i++) {

  const s = document.createElement('span');

  s.textContent = symbols[i % symbols.length];

  const size = 16 + Math.random() * 20;

  s.style.left = Math.random() * 100 + '%';

  s.style.top = Math.random() * 100 + '%';

  s.style.fontSize = size + 'px';

  s.style.opacity = (0.12 + Math.random() * 0.18).toFixed(2);

  s.style.setProperty('--r', (Math.random() * 20 - 10) + 'deg');

  s.className = Math.random() > .5 ? 'float-slow' : 'float';

  s.style.animationDelay = (-Math.random() * 8) + 's';

  field.appendChild(s);

}

</script>

<div class="fixed inset-0 pointer-events-none z-40 overflow-hidden" aria-hidden="true">
  <div class="sticker big top-28 left-3 sm:left-8" style="--rot:-10deg;animation-delay:.3s">🦄</div>
  <div class="sticker small top-[42%] left-3 sm:left-8" style="--rot:8deg;animation-delay:1s">🍭</div>
  <div class="sticker top-[72%] right-3 sm:right-8" style="--rot:-7deg;animation-delay:1.7s">🛹</div>
  <div class="sticker small top-[86%] left-[8%]" style="--rot:6deg;animation-delay:2.2s">🦋</div>
  <div class="sparkle top-36 left-[17%]" style="animation-delay:.4s"></div>
  <div class="sparkle top-[55%] right-[12%]" style="animation-delay:1.1s"></div>
  <div class="sparkle top-[78%] left-[28%]" style="animation-delay:1.8s"></div>
</div>

</body>

</html>