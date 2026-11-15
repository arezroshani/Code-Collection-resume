<?php
$schoolName = "Tiffany School";
$schoolTagline = "LEARN · PLAY · SHINE ✨";
$currentYear = date("Y");

$schoolInfo = [
    "experience" => "+24 ⭐",
    "students" => "+1800 🎈",
    "satisfaction" => "98% ✨"
];


$sections = [
    [
        "id" => "classes",
        "tag" => "ACADEMICS",
        "title" => "Our Classrooms 📚",
        "text" => "Bright, smart, and cozy classrooms where every child is heard. Small groups, interactive boards, and teachers who turn every lesson into a little adventure.",
        "points" => ["Small class sizes (max 18 students)", "Math, Science, English & Persian", "Robotics and coding from 1st grade", "Weekly projects and show-and-tell days"],
        "image" => "./images/classj.jpg",
        "color" => "brand",
    ],
    [
        "id" => "music",
        "tag" => "CREATIVITY",
        "title" => "Music Classes 🎵",
        "text" => "From piano to drums, violin to singing. Every child picks an instrument and joins the school band. Music builds confidence, focus, and a whole lot of joy.",
        "points" => ["Piano, guitar, violin, drums & tombak", "School choir and band", "Seasonal concerts for parents", "Private practice rooms"],
        "image" => "./images/musicn.jpg",
        "color" => "coral",
    ],
    [
        "id" => "sports",
        "tag" => "ACTIVE LIFE",
        "title" => "Sports Classes ⚽",
        "text" => "Strong bodies, happy hearts! Our indoor gym and outdoor fields give children space to play, grow, and enjoy every activity.",
        "points" => ["Football, basketball & volleyball", "Swimming and gymnastics", "Outdoor Adventure Activities", "Certified coaches & first-aid staff"],
        "image" => "./images/sport.png",
        "color" => "mint",
    ],
    [
        "id" => "cafeteria",
        "tag" => "HEALTHY MEALS",
        "title" => "School Cafeteria 🍎",
        "text" => "Fresh, balanced, and delicious! Our kitchen prepares every meal daily with a nutritionist's plan, so kids eat well and focus better throughout the day.",
        "points" => ["Daily fresh hot meals", "Nutritionist-approved weekly menu", "Allergy-aware kitchen", "Bright, clean, friendly dining hall"],
        "image" => "./images/coffeep.jpg",
        "color" => "sun",
    ],
];

$menu = [
    ["day" => "Saturday",  "emoji" => "🍗", "meal" => "Grilled chicken, rice & salad"],
    ["day" => "Sunday",    "emoji" => "🍝", "meal" => "Pasta with veggie sauce & fruit"],
    ["day" => "Monday",    "emoji" => "🥘", "meal" => "Khoresh with saffron rice"],
    ["day" => "Tuesday",   "emoji" => "🐟", "meal" => "Baked fish, potatoes & greens"],
    ["day" => "Wednesday", "emoji" => "🍕", "meal" => "Homemade pizza & fresh juice"],
];

$values = [
    ["emoji" => "🛡️", "title" => "Safety First",  "text" => "Secure campus, trained staff, and a caring environment every single day.", "bg" => "bg-brand-100", "ring" => "border-brand-200"],
    ["emoji" => "💡", "title" => "Curiosity",     "text" => "We celebrate questions and turn wonder into lifelong learning.",          "bg" => "bg-sun-100",   "ring" => "border-sun-300"],
    ["emoji" => "🤝", "title" => "Kindness",      "text" => "Respect, empathy, and teamwork are part of every lesson.",                "bg" => "bg-coral-300/30", "ring" => "border-coral-300"],
    ["emoji" => "🎨", "title" => "Creativity",    "text" => "Art, music, and imagination are given as much space as math.",            "bg" => "bg-mint-300/30", "ring" => "border-mint-300"],
    ["emoji" => "🌍", "title" => "Global Mindset","text" => "Languages and cultures that prepare children for a connected world.",     "bg" => "bg-sky-300/30",  "ring" => "border-sky-300"],
    ["emoji" => "💪", "title" => "Confidence",    "text" => "Every child learns to believe in their own voice and abilities.",         "bg" => "bg-brand-100", "ring" => "border-brand-200"],
];

$schedule = [
    ["time" => "7:30",  "emoji" => "🚌", "title" => "Arrival & Welcome",  "text" => "Friendly greetings at the gate and bus drop-off."],
    ["time" => "8:15",  "emoji" => "📖", "title" => "Morning Lessons",    "text" => "Core subjects in small, focused groups."],
    ["time" => "10:30", "emoji" => "🍎", "title" => "Snack & Play",       "text" => "A healthy snack and a splash of outdoor fun."],
    ["time" => "12:00", "emoji" => "🍽️", "title" => "Lunch Time",         "text" => "Fresh hot meals in our cheerful dining hall."],
    ["time" => "1:00",  "emoji" => "🎶", "title" => "Music & Sports",     "text" => "Creative and active classes, rotating daily."],
    ["time" => "3:00",  "emoji" => "🎒", "title" => "Wrap-up & Home",     "text" => "Reflection circle, then safe pick-up."],
];

$team = [
    ["name" => "Ms. Sara Ahmadi",  "role" => "Head of Academics",  "emoji" => "👩‍🏫", "bg" => "from-brand-400 to-brand-600"],
    ["name" => "Mr. Reza Karimi",  "role" => "Sports Coach",       "emoji" => "🏅",   "bg" => "from-mint-400 to-mint-500"],
    ["name" => "Ms. Nina Hashemi", "role" => "Music Director",     "emoji" => "🎻",   "bg" => "from-coral-400 to-coral-600"],
    ["name" => "Ms. Mina Rahimi",  "role" => "Head Nutritionist",  "emoji" => "🥗",   "bg" => "from-sun-400 to-sun-600"],
];


function sectionTheme($c) {
    $map = [
        "brand" => ["chip" => "bg-brand-100 text-brand-700 border-brand-200", "title" => "text-brand-700", "ring" => "from-brand-400 via-brand-500 to-coral-400", "dot" => "bg-brand-500", "soft" => "bg-brand-50", "icon" => "from-brand-500 to-brand-700"],
        "coral" => ["chip" => "bg-coral-300/40 text-coral-600 border-coral-300", "title" => "text-coral-600", "ring" => "from-coral-400 via-coral-500 to-sun-400", "dot" => "bg-coral-500", "soft" => "bg-[#fff1f4]", "icon" => "from-coral-400 to-coral-600"],
        "mint"  => ["chip" => "bg-mint-300/40 text-mint-500 border-mint-300", "title" => "text-mint-500", "ring" => "from-mint-400 via-mint-500 to-sky-400", "dot" => "bg-mint-500", "soft" => "bg-[#effcf6]", "icon" => "from-mint-400 to-mint-500"],
        "sun"   => ["chip" => "bg-sun-100 text-sun-600 border-sun-300", "title" => "text-sun-600", "ring" => "from-sun-400 via-sun-500 to-coral-400", "dot" => "bg-sun-500", "soft" => "bg-sun-50", "icon" => "from-sun-400 to-sun-600"],
    ];
    return $map[$c];
}
?>
<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

<meta name="description" content="About Tiffany School — classrooms, music, sports and a cafeteria designed for happy kids">

<title>About Us | <?= htmlspecialchars($schoolName) ?> ✨</title>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

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

  html{ scroll-behavior:smooth; }

  .blob{ position:absolute; border-radius:50%; filter:blur(70px); pointer-events:none; }

  .float{ animation:float 5s ease-in-out infinite; }
  .float-slow{ animation:float 8s ease-in-out infinite; }
  .float-fast{ animation:float 3.2s ease-in-out infinite; }
  @keyframes float{ 0%,100%{ transform:translateY(0) rotate(var(--r,0deg));} 50%{ transform:translateY(-16px) rotate(calc(var(--r,0deg) + 8deg));} }

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
    position:absolute; z-index:25; display:grid; place-items:center;
    width:58px;height:58px; border-radius:20px;
    background:rgba(255,255,255,.96); border:3px solid rgba(255,255,255,.95);
    box-shadow:0 12px 30px rgba(36,27,77,.14), 0 0 0 5px rgba(132,56,245,.08);
    font-size:30px; transform:rotate(var(--rot,-6deg));
    animation:stickerFloat 4.5s ease-in-out infinite; user-select:none; pointer-events:none;
  }
  .sticker::after{ content:""; position:absolute; inset:5px; border:2px dashed rgba(132,56,245,.16); border-radius:15px; }
  .sticker.small{width:46px;height:46px;border-radius:16px;font-size:23px}
  .sticker.big{width:72px;height:72px;border-radius:24px;font-size:38px}
  @keyframes stickerFloat{
    0%,100%{transform:translateY(0) rotate(var(--rot,-6deg))}
    50%{transform:translateY(-10px) rotate(calc(var(--rot,-6deg) + 6deg))}
  }

  .sparkle{
    position:absolute; width:12px;height:12px; background:#ffc531;
    clip-path:polygon(50% 0,62% 38%,100% 50%,62% 62%,50% 100%,38% 62%,0 50%,38% 38%);
    animation:sparklePulse 2s ease-in-out infinite; pointer-events:none;
  }
  @keyframes sparklePulse{ 0%,100%{transform:scale(.7) rotate(0);opacity:.35} 50%{transform:scale(1.25) rotate(25deg);opacity:1} }

  .kid-badge{
    position:absolute; z-index:30; padding:8px 13px; border-radius:999px;
    font-family:'Baloo 2',cursive; font-weight:800; font-size:12px; color:#241b4d;
    background:#fff; border:3px solid #fff; box-shadow:0 12px 25px rgba(36,27,77,.13);
    transform:rotate(-5deg); animation:badgeWiggle 3s ease-in-out infinite;
  }
  @keyframes badgeWiggle{ 0%,100%{transform:rotate(-5deg) translateY(0)} 50%{transform:rotate(3deg) translateY(-4px)} }

  .rainbow-line{
    height:8px; border-radius:999px;
    background:linear-gradient(90deg,#8438f5 0 20%,#6fc0ff 20% 40%,#5fd3a3 40% 60%,#ffd866 60% 80%,#ff8fa3 80%);
  }

  .sticker-pop{ transition:transform .35s ease, box-shadow .35s ease; }
  .sticker-pop:hover{ transform:translateY(-8px) rotate(2deg) scale(1.03); box-shadow:0 22px 45px rgba(36,27,77,.14); }

  @media (max-width:640px){
    .sticker{transform:scale(.8) rotate(var(--rot,-6deg))}
    .sticker.big{transform:scale(.72) rotate(var(--rot,-6deg))}
  }

  .brand-title{
    background:linear-gradient(90deg,#7226dd 0%,#ff6b88 55%,#f7a712 100%);
    -webkit-background-clip:text; background-clip:text;
    color:transparent; -webkit-text-fill-color:transparent;
    letter-spacing:.01em; filter:drop-shadow(0 2px 0 rgba(255,255,255,.9));
  }

 
  .grad-text{
    background:linear-gradient(90deg,#7226dd 0%,#ff6b88 55%,#f7a712 100%);
    -webkit-background-clip:text; background-clip:text;
    color:transparent; -webkit-text-fill-color:transparent;
  }

  .glass{
    background:rgba(255,255,255,.82);
    backdrop-filter:blur(14px); -webkit-backdrop-filter:blur(14px);
  }

  .highlight{
    background:linear-gradient(transparent 58%, rgba(255,216,102,.75) 58%);
    padding:0 .15em; border-radius:4px;
  }

  .photo-shine{ position:relative; overflow:hidden; }
  .photo-shine::after{
    content:""; position:absolute; top:0; left:-60%; width:40%; height:100%;
    background:linear-gradient(100deg,transparent,rgba(255,255,255,.55),transparent);
    transform:skewX(-20deg); animation:shine 5s ease-in-out infinite;
  }
  @keyframes shine{ 0%{ left:-60%; } 60%,100%{ left:130%; } }

  .icon-bob{ animation:bob 3.6s ease-in-out infinite; }
  @keyframes bob{ 0%,100%{ transform:translateY(0) rotate(-2deg);} 50%{ transform:translateY(-10px) rotate(3deg);} }

  .eye-blink{ animation:blink 5s infinite; transform-box:fill-box; transform-origin:center; }
  @keyframes blink{ 0%,92%,100%{ transform:scaleY(1);} 95%{ transform:scaleY(.1);} }

  .note-pop{ animation:notePop 3s ease-in-out infinite; transform-box:fill-box; transform-origin:center; }
  @keyframes notePop{ 0%,100%{ transform:translateY(0) scale(1); opacity:1;} 50%{ transform:translateY(-8px) scale(1.15); opacity:.7;} }

  .ball-bounce{ animation:ballBounce 1.8s cubic-bezier(.3,.7,.4,1) infinite; transform-box:fill-box; transform-origin:center bottom; }
  @keyframes ballBounce{ 0%,100%{ transform:translateY(0) scaleY(1);} 45%{ transform:translateY(-22px) scaleY(1.05);} 55%{ transform:translateY(-22px);} 90%{ transform:translateY(0) scaleY(.85);} }

  .steam{ animation:steam 2.6s ease-in-out infinite; transform-box:fill-box; transform-origin:center bottom; }
  @keyframes steam{ 0%{ transform:translateY(0) scaleY(.8); opacity:0;} 40%{ opacity:.9;} 100%{ transform:translateY(-14px) scaleY(1.2); opacity:0;} }

  .reveal{ opacity:0; transform:translateY(34px); transition:opacity .8s ease, transform .8s cubic-bezier(.2,.8,.2,1); }
  .reveal.show{ opacity:1; transform:none; }

  .timeline-line{
    background:linear-gradient(to bottom,#bd97ff,#ff8fa3,#ffd866,#5fd3a3);
  }

  .menu-card{ transition:transform .35s ease, box-shadow .35s ease; }
  .menu-card:hover{ transform:translateY(-8px) rotate(-1.5deg); box-shadow:0 22px 40px rgba(36,27,77,.16); }

  .pill-nav a{ transition:all .25s ease; }
  .pill-nav a:hover{ transform:translateY(-3px); }

  @media (prefers-reduced-motion:reduce){
    *{ animation:none !important; transition:none !important; }
    .reveal{ opacity:1; transform:none; }
  }

</style>

</head>

<body class="bg-[#fbf7ff] text-navy antialiased overflow-x-hidden" id="top">

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

<a href="index.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">Home</a>

<a href="about.php" class="px-5 py-2.5 rounded-full bg-white text-brand-700 shadow-sm">About Us</a>

<a href="contact.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">Contact</a>

<a href="pre-registration.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">Pre-Registration</a>

</div>

<a href="pre-registration.php" class="hidden sm:inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-navy font-bold text-sm px-6 py-3 rounded-full shadow-glow transition baloo">

      Enroll Now 🎉

</a>

</nav>

</header>

<main>

<section class="relative max-w-7xl mx-auto px-5 lg:px-8 pt-16 pb-20 text-center">

<span class="absolute top-6 left-6 text-4xl float wiggle" style="--r:-10deg">🎈</span>
<span class="absolute top-28 left-[12%] text-3xl float-slow" style="--r:6deg">⭐</span>
<span class="absolute top-8 right-8 text-4xl float-fast">🚀</span>
<span class="absolute top-32 right-[14%] text-3xl float">🌈</span>

<span class="inline-flex items-center gap-2 bg-white border-2 border-brand-200 shadow-sm rounded-full px-4 py-2 text-xs font-bold text-brand-600 baloo">
<span class="w-2 h-2 rounded-full bg-mint-500 animate-pulse"></span>
      ABOUT TIFFANY SCHOOL ⭐
</span>

<h1 class="mt-7 text-4xl sm:text-5xl lg:text-7xl font-extrabold leading-[1.1] max-w-4xl mx-auto">
      A School Built for <span class="relative inline-block grad-text">Happy Kids
<svg class="absolute -bottom-2 left-0 w-full" height="14" viewBox="0 0 200 14" fill="none"><path d="M3 10C40 2 160 2 197 10" stroke="#FFC531" stroke-width="7" stroke-linecap="round"/></svg>
</span> 🌟
</h1>

<p class="mt-8 text-navy/60 text-lg sm:text-xl leading-9 max-w-2xl mx-auto font-quick">
      For over two decades, Tiffany School has been a place where <span class="highlight font-bold text-navy/80">curiosity is celebrated</span>, friendships grow, and every child discovers what makes them <span class="highlight font-bold text-navy/80">shine</span>.
</p>


<div class="pill-nav mt-10 flex flex-wrap justify-center gap-3 baloo text-sm font-bold">
<a href="#classes" class="px-5 py-3 rounded-full bg-brand-100 text-brand-700 border-2 border-brand-200 shadow-sm">📚 Classes</a>
<a href="#music" class="px-5 py-3 rounded-full bg-coral-300/40 text-coral-600 border-2 border-coral-300 shadow-sm">🎵 Music</a>
<a href="#sports" class="px-5 py-3 rounded-full bg-mint-300/40 text-mint-500 border-2 border-mint-300 shadow-sm">⚽ Sports</a>
<a href="#cafeteria" class="px-5 py-3 rounded-full bg-sun-100 text-sun-600 border-2 border-sun-300 shadow-sm">🍎 Cafeteria</a>
</div>

<div class="mt-14 grid grid-cols-1 sm:grid-cols-3 gap-5 max-w-3xl mx-auto baloo">
<div class="glass rounded-3xl border-4 border-brand-100 shadow-soft py-6 sticker-pop"><p class="text-3xl font-bold text-brand-600"><?= $schoolInfo["experience"] ?></p><p class="text-xs text-navy/50 mt-1 font-semibold">Years of experience</p></div>
<div class="glass rounded-3xl border-4 border-coral-300/60 shadow-soft py-6 sticker-pop"><p class="text-3xl font-bold text-coral-500"><?= $schoolInfo["students"] ?></p><p class="text-xs text-navy/50 mt-1 font-semibold">Happy students</p></div>
<div class="glass rounded-3xl border-4 border-mint-300/70 shadow-soft py-6 sticker-pop"><p class="text-3xl font-bold text-mint-500"><?= $schoolInfo["satisfaction"] ?></p><p class="text-xs text-navy/50 mt-1 font-semibold">Parent satisfaction</p></div>
</div>

</section>

<svg viewBox="0 0 1440 60" class="w-full -mb-1 text-navy"><path fill="currentColor" d="M0 30C240 70 480 0 720 20S1200 60 1440 20V60H0Z"/></svg>

<div class="bg-navy py-4 overflow-hidden">

<div class="marquee text-white/90 text-sm font-bold tracking-wide gap-10 whitespace-nowrap baloo">

<span class="flex gap-10 pl-10">
<span>✦ Smart Classrooms</span><span>✦ Live Music Studio</span><span>✦ Indoor Gym</span><span>✦ Fresh Daily Meals</span><span>✦ Free Counseling</span><span>✦ School Bus Service</span>
</span>

<span class="flex gap-10 pl-10" aria-hidden="true">
<span>✦ Smart Classrooms</span><span>✦ Live Music Studio</span><span>✦ Indoor Gym</span><span>✦ Fresh Daily Meals</span><span>✦ Free Counseling</span><span>✦ School Bus Service</span>
</span>

</div>

</div>

<section class="max-w-7xl mx-auto px-5 lg:px-8 py-24">

<div class="grid lg:grid-cols-2 gap-14 items-center">

<div class="relative reveal">

<div class="absolute -inset-3 rounded-[2.6rem] bg-gradient-to-br from-brand-400 via-coral-400 to-sun-400 rotate-3 opacity-90"></div>

<div class="photo-shine relative aspect-[4/3] rounded-[2.2rem] overflow-hidden bg-gradient-to-br from-brand-100 to-coral-100 border-4 border-white shadow-soft">
<img src="./images/what.jpg" alt="Tiffany School story" class="w-full h-full object-cover"
onerror="this.style.display='none'; this.parentElement.querySelector('.ph-fallback').style.display='flex';">
<div class="ph-fallback absolute inset-0 hidden flex-col items-center justify-center gap-3 text-brand-500">
<svg class="w-14 h-14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2.5"/><circle cx="9" cy="11" r="2.2"/><path d="M21 16l-5.5-5L9 17"/></svg>
<p class="text-sm font-bold baloo">Our story photo goes here</p>
<p class="text-[11px] text-brand-400 font-quick">./images/story.jpg</p>
</div>
</div>

<span class="kid-badge -top-4 -left-3 bg-sun-300">Since 2002 ⭐</span>
<span class="absolute -bottom-6 -right-4 text-5xl float z-10">🏫</span>

</div>

<div class="reveal">

<span class="text-brand-600 font-bold text-sm tracking-widest baloo">OUR STORY</span>

<h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight">It All Started With <span class="grad-text">One Little Spark</span> ✨</h2>

<p class="mt-6 text-navy/60 text-lg leading-8 font-quick">
Tiffany School began with a small classroom and a big idea: that children learn best when they feel safe, happy, and free to explore. Today, thousands of students later, that idea is still at the heart of everything we do.
</p>

<div class="mt-8 grid sm:grid-cols-2 gap-5">

<div class="card-tilt rounded-3xl bg-white border-4 border-brand-100 shadow-sm p-6">
<span class="w-12 h-12 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 grid place-items-center text-2xl shadow-soft">🎯</span>
<h3 class="mt-4 font-bold text-lg baloo">Our Mission</h3>
<p class="mt-2 text-sm text-navy/55 leading-7 font-quick">To nurture confident, kind, and curious learners through joyful education.</p>
</div>

<div class="card-tilt rounded-3xl bg-white border-4 border-coral-300/60 shadow-sm p-6">
<span class="w-12 h-12 rounded-2xl bg-gradient-to-br from-coral-400 to-coral-600 grid place-items-center text-2xl shadow-soft">🔭</span>
<h3 class="mt-4 font-bold text-lg baloo">Our Vision</h3>
<p class="mt-2 text-sm text-navy/55 leading-7 font-quick">A world where every child grows up loving to learn and ready to lead.</p>
</div>

</div>

</div>

</div>

</section>

<svg viewBox="0 0 1440 60" class="w-full -mb-1 text-brand-900"><path fill="currentColor" d="M0 20C240 60 480 0 720 10S1200 50 1440 10V60H0Z"/></svg>

<div class="max-w-7xl mx-auto px-5 lg:px-8"><div class="rainbow-line"></div></div>

<section class="bg-brand-900 text-white py-24 relative overflow-hidden">

<div class="blob w-[400px] h-[400px] bg-brand-600/40 -top-20 right-0"></div>
<div class="blob w-[320px] h-[320px] bg-coral-500/20 bottom-0 -left-20"></div>

<span class="absolute top-10 left-10 text-3xl float">🎒</span>
<span class="absolute bottom-10 right-16 text-3xl float-slow">📚</span>

<div class="max-w-7xl mx-auto px-5 lg:px-8 relative text-center">

<span class="text-sun-400 font-bold text-sm tracking-widest baloo">EXPLORE OUR SCHOOL</span>
<h2 class="mt-3 text-3xl sm:text-5xl font-extrabold">Every Corner Tells a <span class="text-sun-300">Story</span> 🗺️</h2>
<p class="mt-5 text-white/65 max-w-2xl mx-auto font-quick text-lg leading-8">Take a little tour through the places where our students learn, create, move, and eat. Each one is built with love and imagination.</p>

<div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-5 text-left">

<a href="#classes" class="group bg-white/5 border-2 border-white/15 rounded-3xl p-6 backdrop-blur hover:bg-white/10 hover:-translate-y-2 transition">
<span class="text-4xl">📚</span>
<p class="mt-3 font-bold baloo text-lg">Classrooms</p>
<p class="text-sm text-white/55 font-quick mt-1">Smart &amp; cozy learning spaces</p>
</a>

<a href="#music" class="group bg-white/5 border-2 border-white/15 rounded-3xl p-6 backdrop-blur hover:bg-white/10 hover:-translate-y-2 transition">
<span class="text-4xl">🎶</span>
<p class="mt-3 font-bold baloo text-lg">Music Room</p>
<p class="text-sm text-white/55 font-quick mt-1">Instruments, choir &amp; band</p>
</a>

<a href="#sports" class="group bg-white/5 border-2 border-white/15 rounded-3xl p-6 backdrop-blur hover:bg-white/10 hover:-translate-y-2 transition">
<span class="text-4xl">🏅</span>
<p class="mt-3 font-bold baloo text-lg">Sports Hall</p>
<p class="text-sm text-white/55 font-quick mt-1">Gym, pool &amp; outdoor fields</p>
</a>

<a href="#cafeteria" class="group bg-white/5 border-2 border-white/15 rounded-3xl p-6 backdrop-blur hover:bg-white/10 hover:-translate-y-2 transition">
<span class="text-4xl">🍽️</span>
<p class="mt-3 font-bold baloo text-lg">Cafeteria</p>
<p class="text-sm text-white/55 font-quick mt-1">Fresh, healthy daily meals</p>
</a>

</div>

</div>

</section>


<?php foreach ($sections as $i => $s):
    $t = sectionTheme($s["color"]);
    $reverse = ($i % 2 === 1);
?>

<section id="<?= $s['id'] ?>" class="relative max-w-7xl mx-auto px-5 lg:px-8 py-20 scroll-mt-24">

<div class="relative grid lg:grid-cols-2 gap-12 items-center rounded-[2.8rem] <?= $t['soft'] ?> border-4 border-white shadow-soft p-6 sm:p-10 lg:p-14 overflow-visible reveal">


<span class="absolute top-4 <?= $reverse ? 'left-8' : 'right-8' ?> baloo font-extrabold text-[90px] sm:text-[130px] leading-none text-white/80 select-none pointer-events-none"><?= str_pad($i+1, 2, "0", STR_PAD_LEFT) ?></span>


<div class="relative <?= $reverse ? 'lg:order-2' : '' ?>">

<div class="absolute -inset-3 rounded-[2.4rem] bg-gradient-to-br <?= $t['ring'] ?> <?= $reverse ? '-rotate-3' : 'rotate-3' ?> opacity-90"></div>

<div class="photo-shine relative aspect-[4/3] rounded-[2rem] overflow-hidden bg-white border-4 border-white shadow-soft">

<img src="<?= htmlspecialchars($s['image']) ?>" alt="<?= htmlspecialchars($s['title']) ?>" class="w-full h-full object-cover"
onerror="this.style.display='none'; this.parentElement.querySelector('.ph-fallback').style.display='flex';">

<div class="ph-fallback absolute inset-0 hidden flex-col items-center justify-center gap-3 bg-gradient-to-br from-white to-brand-50 text-brand-500">
<svg class="w-14 h-14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2.5"/><circle cx="9" cy="11" r="2.2"/><path d="M21 16l-5.5-5L9 17"/></svg>
<p class="text-sm font-bold baloo">Photo of <?= htmlspecialchars(strip_tags(preg_replace('/[^\p{L}\s]/u','',$s['title']))) ?></p>
<p class="text-[11px] text-brand-400 font-quick"><?= htmlspecialchars($s['image']) ?></p>
</div>

</div>


<div class="absolute -bottom-8 <?= $reverse ? '-left-4 sm:-left-8' : '-right-4 sm:-right-8' ?> w-28 h-28 sm:w-32 sm:h-32 rounded-[2rem] bg-white border-4 border-white shadow-soft grid place-items-center z-10 icon-bob">

<?php if ($s["id"] === "classes"): ?>

<svg viewBox="0 0 100 100" class="w-full h-full p-2">
<path d="M12 28 L50 22 L50 80 L12 86Z" fill="#8438f5"/>
<path d="M88 28 L50 22 L50 80 L88 86Z" fill="#a06bff"/>
<path d="M17 32 L47 27 L47 74 L17 79Z" fill="#fff"/>
<path d="M83 32 L53 27 L53 74 L83 79Z" fill="#f6f2ff"/>
<path d="M22 40l20-3M22 48l20-3M22 56l20-3" stroke="#bd97ff" stroke-width="2.5" stroke-linecap="round"/>
<text x="68" y="52" text-anchor="middle" font-family="'Baloo 2',cursive" font-weight="800" font-size="20" fill="#ff6b88">ABC</text>
<g transform="rotate(35 80 20)"><rect x="70" y="6" width="9" height="34" rx="2" fill="#ffc531"/><path d="M70 40 L74.5 50 L79 40Z" fill="#f2bf99"/><path d="M72.5 46 L74.5 50 L76.5 46Z" fill="#241b4d"/><rect x="70" y="6" width="9" height="6" rx="2" fill="#ff6b88"/></g>
<circle cx="34" cy="14" r="3" fill="#ffc531" class="note-pop"/>
</svg>

<?php elseif ($s["id"] === "music"): ?>

<svg viewBox="0 0 100 100" class="w-full h-full p-2">
<rect x="40" y="22" width="5" height="46" rx="2.5" fill="#4e1a93"/>
<rect x="72" y="14" width="5" height="46" rx="2.5" fill="#4e1a93"/>
<path d="M40 22L77 14V27L40 35Z" fill="#4e1a93"/>
<ellipse cx="30" cy="68" rx="14" ry="11" fill="#ff6b88" transform="rotate(-20 30 68)"/>
<ellipse cx="62" cy="60" rx="14" ry="11" fill="#ffc531" transform="rotate(-20 62 60)"/>
<circle cx="26" cy="66" r="2.4" fill="#fff"/><circle cx="35" cy="66" r="2.4" fill="#fff"/>
<path d="M26 73q4.5 4 9 0" stroke="#fff" stroke-width="2.2" fill="none" stroke-linecap="round"/>
<circle cx="58" cy="58" r="2.4" fill="#241b4d"/><circle cx="67" cy="58" r="2.4" fill="#241b4d"/>
<path d="M58 65q4.5 4 9 0" stroke="#241b4d" stroke-width="2.2" fill="none" stroke-linecap="round"/>
<circle cx="14" cy="28" r="3" fill="#9ee8c8" class="note-pop"/><circle cx="90" cy="40" r="3" fill="#8438f5" class="note-pop" style="animation-delay:.8s"/>
<path d="M12 86h76" stroke="#d9c4ff" stroke-width="2" stroke-dasharray="1 6" stroke-linecap="round"/>
</svg>

<?php elseif ($s["id"] === "sports"): ?>

<svg viewBox="0 0 100 100" class="w-full h-full p-2">
<g>
<path d="M60 20h26v14c0 10-6 17-13 17s-13-7-13-17Z" fill="#ffc531" stroke="#dc8a08" stroke-width="2"/>
<path d="M60 24c-8 0-10 8-4 12M86 24c8 0 10 8 4 12" fill="none" stroke="#dc8a08" stroke-width="3" stroke-linecap="round"/>
<rect x="70" y="51" width="6" height="12" fill="#dc8a08"/>
<rect x="62" y="63" width="22" height="7" rx="3" fill="#8438f5"/>
<path d="M73 27l2 5 5 .5-4 3 1.5 5-4.5-3-4.5 3 1.5-5-4-3 5-.5Z" fill="#fff" opacity=".9"/>
</g>
<g class="ball-bounce">
<circle cx="32" cy="66" r="22" fill="#fff" stroke="#241b4d" stroke-width="3"/>
<path d="M32 50l9 6-3 11H26l-3-11Z" fill="#241b4d"/>
<path d="M32 44v6M41 56l8-3M38 67l5 8M26 67l-5 8M23 56l-8-3" stroke="#241b4d" stroke-width="2.5" stroke-linecap="round"/>
<circle cx="26" cy="60" r="0" fill="none"/>
</g>
<ellipse cx="32" cy="92" rx="18" ry="3.5" fill="#241b4d" opacity=".12"/>
</svg>

<?php else: ?>

<svg viewBox="0 0 100 100" class="w-full h-full p-2">
<ellipse cx="50" cy="72" rx="38" ry="11" fill="#d9c4ff"/>
<ellipse cx="50" cy="68" rx="38" ry="12" fill="#fff" stroke="#bd97ff" stroke-width="3"/>
<ellipse cx="50" cy="66" rx="26" ry="7" fill="#fff9eb" stroke="#ffd866" stroke-width="2"/>
<path d="M30 64c4-14 14-18 20-18s16 4 20 18Z" fill="#ffc531"/>
<circle cx="40" cy="60" r="2.4" fill="#241b4d"/><circle cx="60" cy="60" r="2.4" fill="#241b4d"/>
<path d="M45 64q5 4 10 0" stroke="#241b4d" stroke-width="2.2" fill="none" stroke-linecap="round"/>
<circle cx="35" cy="64" r="3" fill="#ff8fa3" opacity=".7"/><circle cx="65" cy="64" r="3" fill="#ff8fa3" opacity=".7"/>
<g fill="none" stroke="#bd97ff" stroke-width="3" stroke-linecap="round">
<path class="steam" d="M38 38c-5-5 5-8 0-14"/>
<path class="steam" style="animation-delay:.6s" d="M50 34c-5-5 5-8 0-14"/>
<path class="steam" style="animation-delay:1.2s" d="M62 38c-5-5 5-8 0-14"/>
</g>
<circle cx="82" cy="30" r="9" fill="#ef4463"/><path d="M82 22q1-6 6-7" stroke="#5f1cb8" stroke-width="2.5" fill="none" stroke-linecap="round"/><path d="M84 21q6-4 9 0q-4 4-9 0Z" fill="#2bb787"/>
</svg>
<?php endif; ?>

</div>

<span class="kid-badge -top-4 <?= $reverse ? '-right-2' : '-left-2' ?> <?= ['classes'=>'bg-brand-100','music'=>'bg-coral-300','sports'=>'bg-mint-300','cafeteria'=>'bg-sun-300'][$s['id']] ?>">
<?= ['classes'=>'Learn! 📖','music'=>'Sing! 🎤','sports'=>'Go team! 🏆','cafeteria'=>'Yum! 😋'][$s['id']] ?>
</span>

</div>

<div class="relative <?= $reverse ? 'lg:order-1' : '' ?> mt-6 lg:mt-0">

<span class="inline-flex items-center gap-2 border-2 <?= $t['chip'] ?> font-bold text-[11px] sm:text-xs tracking-[0.2em] px-4 py-2 rounded-full baloo"><?= $s['tag'] ?></span>

<h2 class="mt-5 text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight <?= $t['title'] ?>"><?= $s['title'] ?></h2>

<div class="mt-4 flex gap-1.5">
<span class="h-1.5 w-10 rounded-full <?= $t['dot'] ?>"></span>
<span class="h-1.5 w-6 rounded-full bg-sun-400"></span>
<span class="h-1.5 w-3 rounded-full bg-brand-300"></span>
</div>

<p class="mt-6 text-navy/65 text-base sm:text-lg leading-8 font-quick"><?= $s['text'] ?></p>

<ul class="mt-7 space-y-3.5 font-quick">
<?php foreach ($s["points"] as $p): ?>
<li class="flex items-start gap-3">
<span class="mt-0.5 w-7 h-7 shrink-0 rounded-xl bg-white shadow-sm border-2 border-white grid place-items-center <?= $t['title'] ?>">
<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
</span>
<span class="text-navy/70 font-semibold"><?= $p ?></span>
</li>
<?php endforeach; ?>
</ul>

</div>

</div>

</section>

<?php endforeach; ?>

<section class="max-w-7xl mx-auto px-5 lg:px-8 pb-24 pt-8 relative">

<span class="absolute top-0 left-8 text-3xl float">🥕</span>
<span class="absolute top-4 right-10 text-3xl float-slow">🍓</span>

<div class="text-center max-w-2xl mx-auto">
<span class="text-brand-600 font-bold text-sm tracking-widest baloo">THIS WEEK ON THE MENU</span>
<h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-extrabold">Yummy <span class="grad-text">Weekly Menu</span> 🍽️</h2>
<p class="mt-4 text-navy/55 font-quick text-lg">A sample of the fresh meals our kitchen cooks for our students.</p>
</div>

<div class="mt-14 grid sm:grid-cols-2 lg:grid-cols-5 gap-6">
<?php
$menuColors = ["bg-brand-100 border-brand-200", "bg-coral-300/30 border-coral-300", "bg-mint-300/30 border-mint-300", "bg-sky-300/30 border-sky-300", "bg-sun-100 border-sun-300"];
foreach ($menu as $k => $m): ?>
<div class="menu-card rounded-[2rem] border-4 <?= $menuColors[$k % 5] ?> p-6 text-center shadow-sm reveal">
<p class="text-5xl float-slow"><?= $m["emoji"] ?></p>
<p class="mt-4 font-extrabold baloo text-lg text-navy"><?= $m["day"] ?></p>
<p class="mt-2 text-sm text-navy/60 leading-6 font-quick"><?= $m["meal"] ?></p>
</div>
<?php endforeach; ?>
</div>

</section>


<section class="relative bg-white/60 backdrop-blur border-y-4 border-brand-100 py-24 overflow-hidden">

<div class="blob w-[360px] h-[360px] bg-brand-200/50 -top-20 -left-20"></div>
<div class="blob w-[320px] h-[320px] bg-sun-300/40 bottom-0 right-0"></div>

<div class="max-w-7xl mx-auto px-5 lg:px-8 relative">

<div class="text-center max-w-2xl mx-auto">
<span class="text-brand-600 font-bold text-sm tracking-widest baloo">WHAT WE BELIEVE</span>
<h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-extrabold">Our Little <span class="grad-text">Big Values</span> 💎</h2>
</div>

<div class="mt-14 grid sm:grid-cols-2 lg:grid-cols-3 gap-7">
<?php foreach ($values as $v): ?>
<div class="card-tilt rounded-[2rem] <?= $v['bg'] ?> border-4 <?= $v['ring'] ?> p-8 shadow-sm hover:shadow-soft reveal">
<span class="w-16 h-16 rounded-2xl bg-white shadow-soft grid place-items-center text-4xl icon-bob"><?= $v["emoji"] ?></span>
<h3 class="mt-5 font-bold text-xl baloo"><?= $v["title"] ?></h3>
<p class="mt-2 text-sm text-navy/60 leading-7 font-quick"><?= $v["text"] ?></p>
</div>
<?php endforeach; ?>
</div>

</div>

</section>


<section class="max-w-5xl mx-auto px-5 lg:px-8 py-24 relative">

<div class="text-center max-w-2xl mx-auto">
<span class="text-brand-600 font-bold text-sm tracking-widest baloo">DAILY ROUTINE</span>
<h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-extrabold">A Day at <span class="grad-text">Tiffany</span> ⏰</h2>
<p class="mt-4 text-navy/55 font-quick text-lg">From the first hello to the last wave goodbye.</p>
</div>

<div class="relative mt-16">

<div class="timeline-line absolute left-6 sm:left-1/2 top-0 bottom-0 w-1.5 rounded-full -translate-x-1/2"></div>

<?php foreach ($schedule as $n => $row): $left = ($n % 2 === 0); ?>
<div class="relative flex sm:items-center mb-12 last:mb-0 <?= $left ? 'sm:flex-row' : 'sm:flex-row-reverse' ?> reveal">

<span class="absolute left-6 sm:left-1/2 -translate-x-1/2 w-12 h-12 rounded-full bg-white border-4 border-brand-300 shadow-soft grid place-items-center text-xl z-10"><?= $row["emoji"] ?></span>

<div class="w-full sm:w-1/2 pl-20 sm:pl-0 <?= $left ? 'sm:pr-14 sm:text-right' : 'sm:pl-14' ?>">
<div class="sticker-pop inline-block text-left rounded-[1.8rem] bg-white border-4 border-brand-100 shadow-sm p-6 max-w-md">
<span class="inline-block bg-sun-400 text-navy font-extrabold text-xs px-3 py-1 rounded-full baloo"><?= $row["time"] ?></span>
<h3 class="mt-3 font-bold text-lg baloo"><?= $row["title"] ?></h3>
<p class="mt-1 text-sm text-navy/55 leading-7 font-quick"><?= $row["text"] ?></p>
</div>
</div>

</div>
<?php endforeach; ?>

</div>

</section>


<section class="relative bg-brand-900 text-white py-24 overflow-hidden">

<div class="blob w-[420px] h-[420px] bg-brand-600/40 -top-24 left-1/4"></div>
<span class="absolute top-10 right-12 text-3xl float">🌟</span>
<span class="absolute bottom-10 left-12 text-3xl float-slow">✏️</span>

<div class="max-w-7xl mx-auto px-5 lg:px-8 relative">

<div class="text-center max-w-2xl mx-auto">
<span class="text-sun-400 font-bold text-sm tracking-widest baloo">MEET THE TEAM</span>
<h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-extrabold">The People Behind the <span class="text-sun-300">Magic</span> 🪄</h2>
</div>

<div class="mt-14 grid sm:grid-cols-2 lg:grid-cols-4 gap-7">
<?php foreach ($team as $m): ?>
<div class="card-tilt text-center bg-white/5 border-2 border-white/15 rounded-[2rem] p-8 backdrop-blur hover:bg-white/10 reveal">
<span class="mx-auto w-24 h-24 rounded-[2rem] bg-gradient-to-br <?= $m['bg'] ?> grid place-items-center text-5xl shadow-soft border-4 border-white/30 icon-bob"><?= $m["emoji"] ?></span>
<h3 class="mt-5 font-bold text-lg baloo"><?= htmlspecialchars($m["name"]) ?></h3>
<p class="text-sm text-white/55 font-quick mt-1"><?= htmlspecialchars($m["role"]) ?></p>
</div>
<?php endforeach; ?>
</div>

</div>

</section>


<section class="max-w-7xl mx-auto px-5 lg:px-8 py-24">

<div class="relative sticker-pop rounded-[2.5rem] bg-gradient-to-r from-brand-600 to-brand-800 px-8 sm:px-16 py-16 text-center overflow-hidden shadow-soft">

<span class="absolute top-6 left-10 text-3xl float wiggle">🎉</span>
<span class="absolute top-10 right-12 text-3xl float-slow">🎈</span>
<span class="absolute bottom-8 left-16 text-2xl float-fast">⭐</span>
<span class="absolute bottom-10 right-20 text-3xl float">🚀</span>

<h2 class="relative text-3xl sm:text-4xl font-bold text-white">Come and Meet Us in Person! 🚀</h2>

<p class="relative mt-4 text-brand-100 max-w-xl mx-auto font-quick">Book a visit, see our classrooms, taste our lunch, and watch your child fall in love with school.</p>

<div class="relative mt-8 flex flex-wrap justify-center gap-4 baloo font-bold">
<a href="pre-registration.php" class="inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-navy px-8 py-4 rounded-2xl shadow-lg transition hover:-translate-y-1">Start Pre-Registration 🚀</a>
<a href="contact.php" class="inline-flex items-center gap-2 bg-white/10 border-2 border-white/30 text-white px-8 py-4 rounded-2xl hover:bg-white/20 transition hover:-translate-y-1">Book a Visit 🏫</a>
</div>

</div>

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

<p class="mt-6 text-sm leading-7 font-quick max-w-sm">A place to grow, learn, and discover every student's spark , with love and expertise.</p>

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

<p class="text-white font-bold mb-5 text-sm baloo tracking-wide uppercase">Explore</p>

<ul class="space-y-3 text-sm font-quick">

<li><a href="#classes" class="hover:text-sun-400 transition">Classrooms</a></li>

<li><a href="#music" class="hover:text-sun-400 transition">Music Classes</a></li>

<li><a href="#sports" class="hover:text-sun-400 transition">Sports Classes</a></li>

<li><a href="#cafeteria" class="hover:text-sun-400 transition">Cafeteria</a></li>

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

<div class="mt-14 border-t border-white/10 pt-6 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-white/45 font-quick">

<p>© <?= $currentYear ?> <?= htmlspecialchars($schoolName) ?> 🌈 </p>

<div class="flex items-center gap-6">
<a href="#" class="hover:text-sun-400 transition">Privacy Policy</a>
<a href="#" class="hover:text-sun-400 transition">Terms of Use</a>
<a href="#top" class="inline-flex items-center gap-1.5 hover:text-sun-400 transition">
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

const io = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('show'); io.unobserve(e.target); } });
}, { threshold: .12 });
document.querySelectorAll('.reveal').forEach(el => io.observe(el));

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