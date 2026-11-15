<?php
require_once __DIR__ . "/config.php";
session_start();

$schoolName    = "Tiffany School";
$schoolTagline = "LEARN · PLAY · SHINE ✨";
$currentYear   = date("Y");

$contactEmail  = "tifani99@gmail.com";
$contactPhone  = "021 99994499";
$phoneLink     = "tel:02199994499";
$address       = "Valiasr St, Tehran";
$workingHours  = "Sat – Wed · 7:30 AM – 4:00 PM";

$registrationOpen = true;

if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

// "Register another child" → start with a completely fresh form
if (isset($_GET['new'])) {
    unset(
        $_SESSION['old'],
        $_SESSION['errors'],
        $_SESSION['done'],
        $_SESSION['doneCode'],
        $_SESSION['doneName'],
        $_SESSION['done_code'],
        $_SESSION['done_name']
    );
}

$gradeGroups = [
    "Pre-K 🧸 (Ages 4–6)" => [
        "prek4" => "Pre-K · Age 4",
        "prek5" => "Pre-K · Age 5",
        "prek6" => "Pre-K · Age 6",
    ],
    "Elementary 🖍️ (Ages 7–11)" => [
        "g1" => "1st Grade",
        "g2" => "2nd Grade",
        "g3" => "3rd Grade",
        "g4" => "4th Grade",
        "g5" => "5th Grade",
    ],
    "Middle School 🔬 (Ages 12–14)" => [
        "g6" => "6th Grade",
        "g7" => "7th Grade",
        "g8" => "8th Grade",
    ],
];

$gradeLabels = [];

foreach ($gradeGroups as $group) {
    foreach ($group as $key => $value) {
        $gradeLabels[$key] = $value;
    }
}

$relations = [
    "mother"   => "Mother",
    "father"   => "Father",
    "guardian" => "Legal guardian",
];

$heardOptions = [
    ""          => "Choose one…",
    "friends"   => "Friends or family",
    "instagram" => "Instagram / social media",
    "google"    => "Google search",
    "visit"     => "Passed by the school",
    "other"     => "Other",
];

function old($key) {
    $value = $_SESSION['old'][$key] ?? '';

    if (!is_scalar($value)) {
        return '';
    }

    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES,
        'UTF-8'
    );
}

function err($key) {
    $errors = $_SESSION['errors'] ?? [];

    if (!is_array($errors)) {
        return '';
    }

    $value = $errors[$key] ?? '';

    return is_string($value) ? $value : '';
}

function oldChecked($key, $value) {
    return (($_SESSION['old'][$key] ?? '') === $value)
        ? 'checked'
        : '';
}


function oldGrade($value) {
    return (($_SESSION['old']['grade'] ?? '') === $value)
        ? 'checked'
        : '';
}


$done = !empty($_SESSION['done']);

$doneCode = $_SESSION['doneCode']
    ?? $_SESSION['done_code']
    ?? '';

$doneName = $_SESSION['doneName']
    ?? $_SESSION['done_name']
    ?? '';

$sessionErrors = $_SESSION['errors'] ?? [];

$hasErrors = is_array($sessionErrors)
    && !empty($sessionErrors);


$generalErr = '';

if (is_array($sessionErrors)) {
    if (!empty($sessionErrors['general'])) {
        $generalErr = (string)$sessionErrors['general'];
    } elseif (!empty($sessionErrors)) {
        $firstError = reset($sessionErrors);

        if (is_string($firstError)) {
            $generalErr = $firstError;
        }
    }
}

unset(
    $_SESSION['done'],
    $_SESSION['doneCode'],
    $_SESSION['doneName'],
    $_SESSION['done_code'],
    $_SESSION['done_name']
);

// After a successful registration, forget the old input so the next form is empty
if ($done) {
    unset($_SESSION['old'], $_SESSION['errors']);
}

$genderOld = $_SESSION['old']['gender'] ?? 'female';

$maxBirth = date('Y-m-d');
$minBirth = date('Y-m-d', strtotime('-16 years'));

$faqs = [
    [
        "q" => "Is pre-registration free?",
        "a" => "Yes, completely free! Pre-registering does not oblige you to enroll. It simply lets our team reach out to you."
    ],
    [
        "q" => "What happens after I submit the form?",
        "a" => "You get a tracking code right away, and our office will contact you by phone or email to arrange a friendly meeting and a school tour."
    ],
    [
        "q" => "Can I register more than one child?",
        "a" => "Yes! Please submit a separate pre-registration form for each child."
    ],
    [
        "q" => "Can I change my information later?",
        "a" => "Of course. Call us on $contactPhone or write to $contactEmail and mention your tracking code."
    ],
];
?>
<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

<meta name="description" content="Pre-register your child at Tiffany School — free, quick and friendly">

<title>Pre-Registration | <?= htmlspecialchars($schoolName) ?> ✨</title>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="./dist/output.css">

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
    background:rgba(255,255,255,.85);
    backdrop-filter:blur(14px); -webkit-backdrop-filter:blur(14px);
  }

  .highlight{
    background:linear-gradient(transparent 58%, rgba(255,216,102,.75) 58%);
    padding:0 .15em; border-radius:4px;
  }

  .icon-bob{ animation:bob 3.6s ease-in-out infinite; }
  @keyframes bob{ 0%,100%{ transform:translateY(0) rotate(-2deg);} 50%{ transform:translateY(-10px) rotate(3deg);} }

  .reveal{ opacity:0; transform:translateY(34px); transition:opacity .8s ease, transform .8s cubic-bezier(.2,.8,.2,1); }
  .reveal.show{ opacity:1; transform:none; }

  @keyframes shine{ 0%{ left:-70%; } 60%,100%{ left:130%; } }

  .field{
    width:100%; background:#fff; border:3px solid #ece0ff; border-radius:1.1rem;
    padding:.95rem 1.1rem; font-weight:600; color:#241b4d; outline:none;
    transition:border-color .25s, box-shadow .25s, transform .25s;
  }
  .field::placeholder{ color:rgba(36,27,77,.35); font-weight:500; }
  .field:focus{ border-color:#a06bff; box-shadow:0 0 0 6px rgba(160,107,255,.18); transform:translateY(-1px); }
  .field.is-error{ border-color:#ff6b88; background:#fff7f9; box-shadow:0 0 0 5px rgba(255,107,136,.12); }
  .field.is-ok{ border-color:#5fd3a3; }

  .err-text{ color:#ef4463; font-size:.8rem; font-weight:700; margin-top:.4rem; }
  .err-text:empty{ display:none; }

  .step-title{ display:flex; align-items:center; gap:.8rem; }
  .step-num{
    width:2.6rem; height:2.6rem; border-radius:1rem; display:grid; place-items:center;
    font-family:'Baloo 2',cursive; font-weight:800; color:#fff;
    background:linear-gradient(135deg,#8438f5,#5f1cb8); box-shadow:0 10px 24px -8px rgba(95,28,184,.55);
  }

  .gender-opt input{ position:absolute; opacity:0; pointer-events:none; }
  .gender-opt span.box{
    display:flex; align-items:center; justify-content:center; gap:.6rem;
    border:3px solid #ece0ff; background:#fff; border-radius:1.2rem; padding:.9rem 1rem;
    font-family:'Baloo 2',cursive; font-weight:800; cursor:pointer; transition:all .25s ease;
  }
  .gender-opt span.box:hover{ transform:translateY(-3px); border-color:#bd97ff; }
  .gender-opt input:checked + span.box.girl{ background:linear-gradient(135deg,#ffb3c0,#ff8fa3); border-color:#ff6b88; color:#fff; box-shadow:0 14px 28px -12px rgba(239,68,99,.6); }
  .gender-opt input:checked + span.box.boy{ background:linear-gradient(135deg,#9fd8ff,#6fc0ff); border-color:#3fa6f7; color:#fff; box-shadow:0 14px 28px -12px rgba(63,166,247,.6); }
  .gender-opt input:focus-visible + span.box{ outline:4px solid rgba(160,107,255,.35); }

  .grade-box{
    max-height:290px; overflow-y:auto; padding:.9rem; border:3px solid #ece0ff; border-radius:1.4rem;
    background:linear-gradient(180deg,#fff,#fbf7ff); scrollbar-width:thin; scrollbar-color:#bd97ff #f6f2ff;
  }
  .grade-box.is-error{ border-color:#ff6b88; background:#fff7f9; }
  .grade-box::-webkit-scrollbar{ width:10px; }
  .grade-box::-webkit-scrollbar-track{ background:#f6f2ff; border-radius:99px; }
  .grade-box::-webkit-scrollbar-thumb{ background:#bd97ff; border-radius:99px; border:2px solid #f6f2ff; }
  .grade-group{ font-family:'Baloo 2',cursive; font-weight:800; font-size:.78rem; letter-spacing:.12em; text-transform:uppercase; color:#7226dd; margin:.8rem .3rem .45rem; }
  .grade-group:first-child{ margin-top:.1rem; }
  .grade-item input{ position:absolute; opacity:0; pointer-events:none; }
  .grade-item .row{
    display:flex; align-items:center; gap:.8rem; padding:.7rem .9rem; border-radius:1rem;
    border:2px solid transparent; background:#fff; cursor:pointer; font-weight:700; margin-bottom:.4rem;
    box-shadow:0 2px 0 rgba(189,151,255,.25); transition:all .2s ease;
  }
  .grade-item .row:hover{ border-color:#d9c4ff; transform:translateX(4px); }
  .grade-item .tick{
    width:1.55rem; height:1.55rem; border-radius:.55rem; border:3px solid #d9c4ff; display:grid; place-items:center;
    color:transparent; transition:all .2s ease; flex-shrink:0;
  }
  .grade-item input:checked + .row{ background:linear-gradient(90deg,#ece0ff,#fff); border-color:#a06bff; color:#4e1a93; }
  .grade-item input:checked + .row .tick{ background:#8438f5; border-color:#8438f5; color:#fff; }
  .grade-item input:focus-visible + .row{ outline:4px solid rgba(160,107,255,.35); }

  .chip{ display:inline-flex; align-items:center; gap:.35rem; background:#ece0ff; color:#4e1a93; font-weight:800; font-size:.75rem; padding:.3rem .7rem; border-radius:99px; font-family:'Baloo 2',cursive; animation:chipIn .3s ease both; }
  @keyframes chipIn{ from{ transform:scale(.6); opacity:0; } to{ transform:scale(1); opacity:1; } }

  .check-line input{ position:absolute; opacity:0; pointer-events:none; }
  .check-line .tick{
    width:1.7rem; height:1.7rem; border-radius:.6rem; border:3px solid #d9c4ff; background:#fff; display:grid; place-items:center;
    color:transparent; transition:all .2s ease; flex-shrink:0; margin-top:.1rem;
  }
  .check-line input:checked + .tick{ background:#8438f5; border-color:#8438f5; color:#fff; }
  .check-line input:focus-visible + .tick{ outline:4px solid rgba(160,107,255,.35); }

  .send-btn{ position:relative; overflow:hidden; }
  .send-btn::after{
    content:""; position:absolute; top:0; left:-70%; width:40%; height:100%;
    background:linear-gradient(100deg,transparent,rgba(255,255,255,.4),transparent);
    transform:skewX(-20deg); animation:shine 3.5s ease-in-out infinite;
  }
  .send-btn:disabled{ opacity:.7; cursor:wait; }

  .success-pop{ animation:successPop .7s cubic-bezier(.2,1.4,.4,1) both; }
  @keyframes successPop{ 0%{ transform:scale(.6); opacity:0;} 100%{ transform:scale(1); opacity:1;} }

  .check-draw{ stroke-dasharray:60; stroke-dashoffset:60; animation:drawCheck .7s .35s ease forwards; }
  @keyframes drawCheck{ to{ stroke-dashoffset:0; } }

  .confetti{ position:absolute; width:10px; height:14px; border-radius:3px; animation:confettiFall 2.6s ease-in infinite; opacity:0; }
  @keyframes confettiFall{
    0%{ transform:translateY(-20px) rotate(0); opacity:0; }
    15%{ opacity:1; }
    100%{ transform:translateY(200px) rotate(540deg); opacity:0; }
  }

  .ticket{
    background:
      radial-gradient(circle at 0 50%, #f0fdf7 0 14px, transparent 15px),
      radial-gradient(circle at 100% 50%, #f0fdf7 0 14px, transparent 15px),
      #fff;
    border:3px dashed #9ee8c8;
  }

  .faq-item summary{ list-style:none; cursor:pointer; }
  .faq-item summary::-webkit-details-marker{ display:none; }
  .faq-item[open] .faq-plus{ transform:rotate(45deg); }
  .faq-plus{ transition:transform .3s ease; }

  .pill-nav a{ transition:all .25s ease; }
  .pill-nav a:hover{ transform:translateY(-3px); }

  .step-line{ background:repeating-linear-gradient(90deg,#bd97ff 0 10px,transparent 10px 20px); height:3px; }

  @media (prefers-reduced-motion:reduce){
    *{ animation:none !important; transition:none !important; }
    .reveal{ opacity:1; transform:none; }
    .check-draw{ stroke-dashoffset:0; }
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

<a href="about.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">About Us</a>

<a href="contact.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">Contact</a>

<a href="pre-registration.php" class="px-5 py-2.5 rounded-full bg-white text-brand-700 shadow-sm">Pre-Registration</a>
<a href="students.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">Students</a>

</div>

<a href="#form" class="hidden sm:inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-navy font-bold text-sm px-6 py-3 rounded-full shadow-glow transition baloo">

      Enroll Now 🎉

</a>

</nav>

</header>

<main>

<section class="relative max-w-7xl mx-auto px-5 lg:px-8 pt-16 pb-14 text-center">

<span class="absolute top-6 left-6 text-4xl float wiggle" style="--r:-10deg">🎒</span>
<span class="absolute top-28 left-[12%] text-3xl float-slow" style="--r:6deg">⭐</span>
<span class="absolute top-8 right-8 text-4xl float-fast">✏️</span>
<span class="absolute top-32 right-[14%] text-3xl float">🌈</span>

<span class="inline-flex items-center gap-2 bg-white border-2 border-brand-200 shadow-sm rounded-full px-4 py-2 text-xs font-bold text-brand-600 baloo">
<span class="w-2 h-2 rounded-full <?= $registrationOpen ? 'bg-mint-500 animate-pulse' : 'bg-coral-500' ?>"></span>
      <?= $registrationOpen ? 'NEW SCHOOL YEAR REGISTRATION IS OPEN 🎉' : 'REGISTRATION IS CURRENTLY CLOSED' ?>
</span>

<h1 class="mt-7 text-4xl sm:text-5xl lg:text-7xl font-extrabold leading-[1.1] max-w-4xl mx-auto">
      Join the <span class="relative inline-block grad-text">Tiffany Family
<svg class="absolute -bottom-2 left-0 w-full" height="14" viewBox="0 0 200 14" fill="none"><path d="M3 10C40 2 160 2 197 10" stroke="#FFC531" stroke-width="7" stroke-linecap="round"/></svg>
</span> 🌟
</h1>

<p class="mt-8 text-navy/60 text-lg sm:text-xl leading-9 max-w-2xl mx-auto font-quick">
      Pre-registration is <span class="highlight font-bold text-navy/80">free</span>, takes about <span class="highlight font-bold text-navy/80">3 minutes</span>, and doesn't oblige you to anything. Our team will contact you very soon!
</p>

<div class="pill-nav mt-10 flex flex-wrap justify-center gap-3 baloo text-sm font-bold">
<a href="#steps" class="px-5 py-3 rounded-full bg-brand-100 text-brand-700 border-2 border-brand-200 shadow-sm">🗺️ How it works</a>
<a href="#form" class="px-5 py-3 rounded-full bg-coral-300/40 text-coral-600 border-2 border-coral-300 shadow-sm">✏️ Register now</a>
<a href="#faq" class="px-5 py-3 rounded-full bg-sun-100 text-sun-600 border-2 border-sun-300 shadow-sm">❓ FAQ</a>
</div>

</section>

<section id="steps" class="max-w-7xl mx-auto px-5 lg:px-8 pb-20 scroll-mt-24">

<div class="grid md:grid-cols-3 gap-6 relative">

<div class="card-tilt reveal rounded-[2rem] bg-white border-4 border-brand-100 shadow-sm hover:shadow-soft p-7 text-center">
<span class="mx-auto w-20 h-20 rounded-[1.6rem] bg-gradient-to-br from-brand-500 to-brand-700 grid place-items-center text-4xl shadow-soft icon-bob">📝</span>
<p class="mt-5 inline-block bg-sun-400 text-navy font-extrabold text-xs px-3 py-1 rounded-full baloo">STEP 1</p>
<h3 class="mt-3 font-bold text-lg baloo">Fill in the form</h3>
<p class="mt-2 text-sm text-navy/55 leading-7 font-quick">Tell us about your child and how we can reach you.</p>
</div>

<div class="card-tilt reveal rounded-[2rem] bg-white border-4 border-coral-300/60 shadow-sm hover:shadow-soft p-7 text-center">
<span class="mx-auto w-20 h-20 rounded-[1.6rem] bg-gradient-to-br from-coral-400 to-coral-600 grid place-items-center text-4xl shadow-soft icon-bob" style="animation-delay:.5s">📞</span>
<p class="mt-5 inline-block bg-sun-400 text-navy font-extrabold text-xs px-3 py-1 rounded-full baloo">STEP 2</p>
<h3 class="mt-3 font-bold text-lg baloo">We call you</h3>
<p class="mt-2 text-sm text-navy/55 leading-7 font-quick">Our office contacts you to answer questions and plan a tour.</p>
</div>

<div class="card-tilt reveal rounded-[2rem] bg-white border-4 border-mint-300/70 shadow-sm hover:shadow-soft p-7 text-center">
<span class="mx-auto w-20 h-20 rounded-[1.6rem] bg-gradient-to-br from-mint-400 to-mint-500 grid place-items-center text-4xl shadow-soft icon-bob" style="animation-delay:1s">🎉</span>
<p class="mt-5 inline-block bg-sun-400 text-navy font-extrabold text-xs px-3 py-1 rounded-full baloo">STEP 3</p>
<h3 class="mt-3 font-bold text-lg baloo">Welcome to Tiffany!</h3>
<p class="mt-2 text-sm text-navy/55 leading-7 font-quick">Complete enrollment and get ready for the first day of school.</p>
</div>

</div>

</section>

<svg viewBox="0 0 1440 60" class="w-full -mb-1 text-navy"><path fill="currentColor" d="M0 30C240 70 480 0 720 20S1200 60 1440 20V60H0Z"/></svg>

<div class="bg-navy py-4 overflow-hidden">

<div class="marquee text-white/90 text-sm font-bold tracking-wide gap-10 whitespace-nowrap baloo">

<span class="flex gap-10 pl-10">
<span>✦ Free pre-registration</span><span>✦ Limited spots</span><span>✦ Friendly office team</span><span>✦ School tours every week</span><span>✦ School bus service</span><span>✦ Healthy meals</span>
</span>

<span class="flex gap-10 pl-10" aria-hidden="true">
<span>✦ Free pre-registration</span><span>✦ Limited spots</span><span>✦ Friendly office team</span><span>✦ School tours every week</span><span>✦ School bus service</span><span>✦ Healthy meals</span>
</span>

</div>

</div>

<section id="form" class="max-w-7xl mx-auto px-5 lg:px-8 py-24 scroll-mt-24">

<div class="text-center max-w-2xl mx-auto">
<span class="text-brand-600 font-bold text-sm tracking-widest baloo">PRE-REGISTRATION FORM</span>
<h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-extrabold">Let's Get Your Child <span class="grad-text">Started</span> 🚀</h2>
<p class="mt-4 text-navy/55 font-quick text-lg">Fields marked <span class="text-coral-500 font-bold">*</span> are required.</p>
</div>

<div class="mt-14 grid lg:grid-cols-3 gap-10 items-start">

<div class="lg:col-span-2 relative reveal">

<?php if ($done): ?>

<div id="success" class="success-pop relative overflow-hidden rounded-[2.5rem] bg-white border-4 border-mint-300 shadow-soft p-8 sm:p-14 text-center">

<div class="blob w-64 h-64 bg-mint-300/40 -top-20 -left-16"></div>
<div class="blob w-64 h-64 bg-sun-300/40 -bottom-24 -right-16"></div>

<span class="confetti bg-coral-400" style="left:8%;top:0;animation-delay:0s"></span>
<span class="confetti bg-sun-400" style="left:22%;top:0;animation-delay:.5s"></span>
<span class="confetti bg-brand-400" style="left:38%;top:0;animation-delay:1.1s"></span>
<span class="confetti bg-mint-400" style="left:55%;top:0;animation-delay:.3s"></span>
<span class="confetti bg-sky-400" style="left:70%;top:0;animation-delay:.9s"></span>
<span class="confetti bg-coral-300" style="left:84%;top:0;animation-delay:1.4s"></span>
<span class="confetti bg-sun-300" style="left:93%;top:0;animation-delay:.7s"></span>

<div class="relative">

<span class="mx-auto w-28 h-28 rounded-full bg-gradient-to-br from-mint-400 to-mint-500 grid place-items-center shadow-soft border-4 border-white">
<svg viewBox="0 0 52 52" class="w-16 h-16" fill="none" stroke="#fff" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"><path class="check-draw" d="M12 27l10 10 19-21"/></svg>
</span>

<h3 class="mt-7 text-3xl sm:text-4xl font-extrabold baloo text-mint-500">Registration complete! 🎉</h3>

<p class="mt-4 text-navy/60 text-lg font-quick leading-8 max-w-md mx-auto">
Thank you<?= $doneName !== '' ? ', parent of <span class="font-extrabold text-navy/80">' . htmlspecialchars($doneName) . '</span>' : '' ?>! Your pre-registration was received. Our team will contact you very soon. ✨
</p>

<div class="ticket mt-8 max-w-sm mx-auto rounded-3xl px-6 py-5">
<p class="text-xs font-bold text-navy/45 tracking-widest baloo">YOUR TRACKING CODE</p>
<p id="codeText" class="mt-1 text-2xl sm:text-3xl font-extrabold text-brand-700 baloo tracking-wider"><?= htmlspecialchars($doneCode) ?></p>
<button type="button" id="copyBtn" class="mt-3 inline-flex items-center gap-2 text-xs font-bold text-mint-500 bg-mint-300/30 px-4 py-2 rounded-full hover:bg-mint-300/50 transition baloo">📋 Copy code</button>
</div>

<p class="mt-5 text-sm text-navy/50 font-quick">Please keep this code. You'll need it if you call us.</p>

<div class="mt-8 flex flex-wrap justify-center gap-3 baloo font-bold">
<a href="pre-registration.php?new=1#form" class="inline-flex items-center gap-2 bg-gradient-to-r from-brand-600 to-brand-800 text-white px-7 py-3.5 rounded-2xl shadow-soft hover:-translate-y-1 transition">Register another child ✏️</a>
<a href="index.php" class="inline-flex items-center gap-2 bg-white border-2 border-brand-200 text-navy px-7 py-3.5 rounded-2xl hover:border-brand-400 hover:-translate-y-1 transition">Back to Home 🏠</a>
</div>

</div>

</div>

<?php elseif (!$registrationOpen): ?>

<div class="relative overflow-hidden rounded-[2.5rem] bg-white border-4 border-sun-300 shadow-soft p-10 text-center">
<p class="text-6xl">⏳</p>
<h3 class="mt-4 text-2xl font-extrabold baloo">Pre-registration is closed for now</h3>
<p class="mt-3 text-navy/60 font-quick leading-8">Please call us on <?= htmlspecialchars($contactPhone) ?> or write to <?= htmlspecialchars($contactEmail) ?> and we'll help you.</p>
</div>

<?php else: ?>

<form id="regForm" action="insert_student.php" method="POST" novalidate
class="relative overflow-hidden rounded-[2.5rem] bg-white/90 backdrop-blur border-4 border-brand-100 shadow-soft p-6 sm:p-10">

<div class="blob w-64 h-64 bg-brand-200/50 -top-24 -right-16"></div>
<div class="blob w-64 h-64 bg-sun-300/30 -bottom-24 -left-16"></div>

<div class="relative">

<?php if ($generalErr): ?>
<div class="mb-7 rounded-2xl bg-[#fff1f4] border-2 border-coral-300 text-coral-600 font-bold text-sm px-5 py-4 flex items-center gap-3">
<span class="text-xl">⚠️</span> <?= htmlspecialchars($generalErr) ?>
</div>
<?php elseif ($hasErrors): ?>
<div class="mb-7 rounded-2xl bg-[#fff1f4] border-2 border-coral-300 text-coral-600 font-bold text-sm px-5 py-4 flex items-center gap-3">
<span class="text-xl">⚠️</span> Oops! Please fix the highlighted fields and try again.
</div>
<?php endif; ?>

<input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">

<div style="position:absolute;left:-9999px;top:-9999px;" aria-hidden="true">
<label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
</div>

<div class="step-title">
<span class="step-num">1</span>
<div>
<p class="font-extrabold text-xl baloo leading-tight">About the student 🎒</p>
<p class="text-xs text-navy/45 font-quick">Tell us who the little star is</p>
</div>
</div>

<div class="mt-6 grid sm:grid-cols-2 gap-5">

<div>
<label for="first_name" class="block mb-2 text-sm font-bold baloo">First name <span class="text-coral-500">*</span></label>
<input id="first_name" name="first_name" type="text" maxlength="40" autocomplete="off" placeholder="e.g. Sara"
value="<?= old('first_name') ?>" class="field <?= err('first_name') ? 'is-error' : '' ?>">
<p class="err-text" data-err="first_name"><?= err('first_name') ? '⚠️ ' . htmlspecialchars(err('first_name')) : '' ?></p>
</div>

<div>
<label for="last_name" class="block mb-2 text-sm font-bold baloo">Last name <span class="text-coral-500">*</span></label>
<input id="last_name" name="last_name" type="text" maxlength="40" autocomplete="off" placeholder="e.g. Ahmadi"
value="<?= old('last_name') ?>" class="field <?= err('last_name') ? 'is-error' : '' ?>">
<p class="err-text" data-err="last_name"><?= err('last_name') ? '⚠️ ' . htmlspecialchars(err('last_name')) : '' ?></p>
</div>

<div>
<span class="block mb-2 text-sm font-bold baloo">Gender <span class="text-coral-500">*</span></span>
<div class="grid grid-cols-2 gap-3">
<label class="gender-opt relative">
<input type="radio" name="gender" value="female" <?= $genderOld === 'female' ? 'checked' : '' ?>>
<span class="box girl"><span class="text-2xl">👧</span> Girl</span>
</label>
<label class="gender-opt relative">
<input type="radio" name="gender" value="male" <?= $genderOld === 'male' ? 'checked' : '' ?>>
<span class="box boy"><span class="text-2xl">👦</span> Boy</span>
</label>
</div>
<p class="err-text" data-err="gender"><?= err('gender') ? '⚠️ ' . htmlspecialchars(err('gender')) : '' ?></p>
</div>

<div>
<label for="birth_date" class="block mb-2 text-sm font-bold baloo">Date of birth <span class="text-coral-500">*</span></label>
<input id="birth_date" name="birth_date" type="date" min="<?= $minBirth ?>" max="<?= $maxBirth ?>"
value="<?= old('birth_date') ?>" class="field <?= err('birth_date') ? 'is-error' : '' ?>">
<p class="err-text" data-err="birth_date"><?= err('birth_date') ? '⚠️ ' . htmlspecialchars(err('birth_date')) : '' ?></p>
</div>

</div>

<div class="mt-6">
<div class="flex items-end justify-between gap-3">
<label class="block mb-2 text-sm font-bold baloo">Grade level <span class="text-coral-500">*</span> <span class="text-navy/35 font-semibold text-xs">(scroll &amp; tap to choose one)</span></label>
<span class="mb-2 text-xs font-bold text-brand-600 font-quick whitespace-nowrap"><span id="gradeCount">0</span> selected</span>
</div>

<div id="gradeBox" class="grade-box <?= err('grades') ? 'is-error' : '' ?>" role="radiogroup" aria-label="Grade level">
<?php foreach ($gradeGroups as $groupName => $items): ?>
<p class="grade-group"><?= htmlspecialchars($groupName) ?></p>
<?php foreach ($items as $key => $label): ?>
<label class="grade-item block relative">
<input type="radio" name="grade" value="<?= $key ?>" <?= oldGrade($key) ?>>
<span class="row">
<span class="tick"><svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></span>
<span><?= htmlspecialchars($label) ?></span>
</span>
</label>
<?php endforeach; ?>
<?php endforeach; ?>
</div>

<div id="gradeChips" class="mt-3 flex flex-wrap gap-2"></div>
<p class="err-text" data-err="grades"><?= err('grades') ? '⚠️ ' . htmlspecialchars(err('grades')) : '' ?></p>
</div>

<div class="mt-5">
<label for="prev_school" class="block mb-2 text-sm font-bold baloo">Previous school <span class="text-navy/35 font-semibold">(optional)</span></label>
<input id="prev_school" name="prev_school" type="text" maxlength="80" placeholder="Name of the school your child attended before"
value="<?= old('prev_school') ?>" class="field <?= err('prev_school') ? 'is-error' : '' ?>">
<p class="err-text" data-err="prev_school"><?= err('prev_school') ? '⚠️ ' . htmlspecialchars(err('prev_school')) : '' ?></p>
</div>

<div class="mt-5">
<label for="address" class="block mb-2 text-sm font-bold baloo">Student's address <span class="text-coral-500">*</span></label>
<input id="address" name="address" type="text" maxlength="160" autocomplete="street-address" placeholder="e.g. No. 12, Valiasr St, Tehran"
value="<?= old('address') ?>" class="field <?= err('address') ? 'is-error' : '' ?>">
<p class="err-text" data-err="address"><?= err('address') ? '⚠️ ' . htmlspecialchars(err('address')) : '' ?></p>
</div>

<div class="step-line my-9 rounded-full opacity-60"></div>

<div class="step-title">
<span class="step-num" style="background:linear-gradient(135deg,#ff8fa3,#ef4463)">2</span>
<div>
<p class="font-extrabold text-xl baloo leading-tight">Parent / guardian 💌</p>
<p class="text-xs text-navy/45 font-quick">So we know who to contact</p>
</div>
</div>

<div class="mt-6 grid sm:grid-cols-2 gap-5">

<div>
<label for="parent_name" class="block mb-2 text-sm font-bold baloo">Parent's full name <span class="text-coral-500">*</span></label>
<input id="parent_name" name="parent_name" type="text" maxlength="60" autocomplete="name" placeholder="e.g. Reza Ahmadi"
value="<?= old('parent_name') ?>" class="field <?= err('parent_name') ? 'is-error' : '' ?>">
<p class="err-text" data-err="parent_name"><?= err('parent_name') ? '⚠️ ' . htmlspecialchars(err('parent_name')) : '' ?></p>
</div>

<div>
<label for="relation" class="block mb-2 text-sm font-bold baloo">Relation to student <span class="text-coral-500">*</span></label>
<select id="relation" name="relation" class="field <?= err('relation') ? 'is-error' : '' ?>">
<option value="">Choose one…</option>
<?php foreach ($relations as $k => $label): ?>
<option value="<?= $k ?>" <?= (($_SESSION['old']['relation'] ?? '') === $k) ? 'selected' : '' ?>><?= htmlspecialchars($label) ?></option>
<?php endforeach; ?>
</select>
<p class="err-text" data-err="relation"><?= err('relation') ? '⚠️ ' . htmlspecialchars(err('relation')) : '' ?></p>
</div>

<div>
<label for="phone" class="block mb-2 text-sm font-bold baloo">Phone number <span class="text-coral-500">*</span></label>
<input id="phone" name="phone" type="tel" autocomplete="tel" placeholder="0912 345 6789"
value="<?= old('phone') ?>" class="field <?= err('phone') ? 'is-error' : '' ?>">
<p class="err-text" data-err="phone"><?= err('phone') ? '⚠️ ' . htmlspecialchars(err('phone')) : '' ?></p>
</div>

<div>
<label for="email" class="block mb-2 text-sm font-bold baloo">Email address <span class="text-coral-500">*</span></label>
<input id="email" name="email" type="email" autocomplete="email" placeholder="you@example.com"
value="<?= old('email') ?>" class="field <?= err('email') ? 'is-error' : '' ?>">
<p class="err-text" data-err="email"><?= err('email') ? '⚠️ ' . htmlspecialchars(err('email')) : '' ?></p>
</div>

<div class="sm:col-span-2">
<label for="city" class="block mb-2 text-sm font-bold baloo">City / neighborhood <span class="text-coral-500">*</span></label>
<input id="city" name="city" type="text" maxlength="80" autocomplete="address-level2" placeholder="e.g. Tehran, Valiasr"
value="<?= old('city') ?>" class="field <?= err('city') ? 'is-error' : '' ?>">
<p class="err-text" data-err="city"><?= err('city') ? '⚠️ ' . htmlspecialchars(err('city')) : '' ?></p>
</div>

</div>

<div class="step-line my-9 rounded-full opacity-60"></div>

<div class="step-title">
<span class="step-num" style="background:linear-gradient(135deg,#5fd3a3,#2bb787)">3</span>
<div>
<p class="font-extrabold text-xl baloo leading-tight">A few extras ✨</p>
<p class="text-xs text-navy/45 font-quick">Helps us prepare for your visit</p>
</div>
</div>

<div class="mt-6 grid sm:grid-cols-2 gap-5">

<div>
<label for="heard" class="block mb-2 text-sm font-bold baloo">How did you hear about us? <span class="text-navy/35 font-semibold">(optional)</span></label>
<select id="heard" name="heard" class="field <?= err('heard') ? 'is-error' : '' ?>">
<?php foreach ($heardOptions as $k => $label): ?>
<option value="<?= $k ?>" <?= (($_SESSION['old']['heard'] ?? '') === (string)$k) ? 'selected' : '' ?>><?= htmlspecialchars($label) ?></option>
<?php endforeach; ?>
</select>
<p class="err-text" data-err="heard"><?= err('heard') ? '⚠️ ' . htmlspecialchars(err('heard')) : '' ?></p>
</div>

<div class="flex items-end">
<label class="check-line relative flex items-start gap-3 cursor-pointer rounded-2xl bg-sun-50 border-2 border-sun-300 px-4 py-3.5 w-full">
<input type="checkbox" name="bus" value="1" <?= (($_SESSION['old']['bus'] ?? '') === '1') ? 'checked' : '' ?>>
<span class="tick"><svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></span>
<span class="font-bold text-sm leading-6">🚌 We need the school bus service</span>
</label>
</div>

</div>

<div class="mt-5">
<div class="flex items-end justify-between">
<label for="notes" class="block mb-2 text-sm font-bold baloo">Anything we should know? <span class="text-navy/35 font-semibold">(optional)</span></label>
<span class="mb-2 text-xs font-bold text-navy/40 font-quick"><span id="counter">0</span> / 500</span>
</div>
<textarea id="notes" name="notes" rows="4" maxlength="500" placeholder="Allergies, special needs, other children, or questions… 🧸"
class="field resize-none <?= err('notes') ? 'is-error' : '' ?>"><?= old('notes') ?></textarea>
<p class="err-text" data-err="notes"><?= err('notes') ? '⚠️ ' . htmlspecialchars(err('notes')) : '' ?></p>
</div>

<div class="mt-6">
<label class="check-line relative flex items-start gap-3 cursor-pointer">
<input id="agree" type="checkbox" name="agree" value="1" <?= !empty($_SESSION['old']['agree']) ? 'checked' : '' ?>>
<span class="tick"><svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></span>
<span class="text-sm font-semibold text-navy/70 leading-6">I confirm the information is correct and I agree to be contacted by Tiffany School about this pre-registration. <span class="text-coral-500">*</span></span>
</label>
<p class="err-text" data-err="agree"><?= err('agree') ? '⚠️ ' . htmlspecialchars(err('agree')) : '' ?></p>
</div>

<button type="submit" id="sendBtn" class="send-btn mt-9 w-full inline-flex items-center justify-center gap-3 bg-gradient-to-r from-brand-600 to-brand-800 text-white font-bold text-lg px-10 py-5 rounded-2xl shadow-soft hover:-translate-y-1 hover:shadow-glow transition baloo">
<span id="sendText">Register Now</span>
<span class="text-2xl">🎉</span>
</button>

<p class="mt-5 text-xs text-navy/45 font-quick text-center">🔒 Your information is safe with us and is only used for this registration.</p>

</div>

</form>

<?php endif; ?>

</div>

<aside class="lg:col-span-1 space-y-7 lg:sticky lg:top-28">

<div class="reveal relative glass rounded-[2rem] border-4 border-brand-100 shadow-soft p-6">
<span class="kid-badge -top-4 -right-2 bg-sun-300">Good to know 💡</span>
<p class="font-extrabold baloo text-lg">📁 Documents for the visit</p>
<ul class="mt-4 space-y-3 text-sm font-quick font-semibold text-navy/70">
<li class="flex gap-3"><span class="text-mint-500">✔</span> Student's birth certificate copy</li>
<li class="flex gap-3"><span class="text-mint-500">✔</span> Parent's ID card copy</li>
<li class="flex gap-3"><span class="text-mint-500">✔</span> Two passport-size photos</li>
<li class="flex gap-3"><span class="text-mint-500">✔</span> Last report card (if any)</li>
<li class="flex gap-3"><span class="text-mint-500">✔</span> Vaccination record</li>
</ul>
<p class="mt-4 text-xs text-navy/45 font-quick">You don't need them now. Bring them when we meet.</p>
</div>

<div class="reveal relative rounded-[2rem] bg-gradient-to-br from-brand-600 to-brand-800 text-white shadow-soft p-6 overflow-hidden">
<span class="absolute top-3 right-4 text-3xl float">🌟</span>
<p class="font-extrabold baloo text-lg">Why families love Tiffany 🧸 </p>
<ul class="mt-4 space-y-3 text-sm font-quick font-semibold text-white/85">
<li>🛡️ Safe, caring campus</li>
<li>🤖 Robotics &amp; coding from 1st grade</li>
<li>🎵 Music room &amp; school band</li>
<li>🍎 Fresh, healthy daily meals</li>
</ul>
</div>

<div class="reveal glass rounded-[2rem] border-4 border-coral-300/60 shadow-soft p-6">
<p class="font-extrabold baloo text-lg">Need help? 📞</p>
<p class="mt-1 text-sm text-navy/55 font-quick leading-7">Our office team is happy to fill the form with you.</p>
<a href="<?= $phoneLink ?>" class="mt-4 flex items-center gap-3 font-extrabold text-coral-600 baloo text-lg hover:underline">☎️ <?= htmlspecialchars($contactPhone) ?></a>
<a href="mailto:<?= $contactEmail ?>" class="mt-2 flex items-center gap-3 font-bold text-brand-700 text-sm break-all hover:underline">✉️ <?= htmlspecialchars($contactEmail) ?></a>
<p class="mt-3 text-xs text-navy/45 font-quick">🕒 <?= htmlspecialchars($workingHours) ?></p>
</div>

</aside>

</div>

</section>


<section id="faq" class="relative bg-white/60 backdrop-blur border-y-4 border-brand-100 py-24 overflow-hidden scroll-mt-24">

<div class="blob w-[360px] h-[360px] bg-brand-200/50 -top-20 -left-20"></div>
<div class="blob w-[320px] h-[320px] bg-sun-300/40 bottom-0 right-0"></div>

<div class="max-w-3xl mx-auto px-5 lg:px-8 relative">

<div class="text-center">
<span class="text-brand-600 font-bold text-sm tracking-widest baloo">GOOD TO KNOW</span>
<h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-extrabold">Quick <span class="grad-text">Answers</span> ❓</h2>
</div>

<div class="mt-12 space-y-4">
<?php foreach ($faqs as $f): ?>
<details class="faq-item reveal group rounded-[1.6rem] bg-white border-4 border-brand-100 shadow-sm open:shadow-soft open:border-brand-300 transition">
<summary class="flex items-center justify-between gap-4 px-6 py-5 font-bold baloo text-lg">
<span><?= htmlspecialchars($f["q"]) ?></span>
<span class="faq-plus w-9 h-9 shrink-0 rounded-full bg-brand-100 text-brand-700 grid place-items-center text-2xl leading-none">+</span>
</summary>
<p class="px-6 pb-6 -mt-1 text-navy/60 font-quick leading-8"><?= htmlspecialchars($f["a"]) ?></p>
</details>
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

<h2 class="relative text-3xl sm:text-4xl font-bold text-white">Want to See the School First? 🏫</h2>

<p class="relative mt-4 text-brand-100 max-w-xl mx-auto font-quick">Book a visit, meet our teachers, taste our lunch, and watch your child fall in love with school.</p>

<a href="contact.php" class="relative mt-8 inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-navy font-bold px-8 py-4 rounded-2xl shadow-lg transition hover:-translate-y-1 baloo">

      Book a Visit 💌

</a>

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

<p class="text-white font-bold mb-5 text-sm baloo tracking-wide uppercase">Help</p>

<ul class="space-y-3 text-sm font-quick">

<li><a href="#steps" class="hover:text-sun-400 transition">How it works</a></li>

<li><a href="#form" class="hover:text-sun-400 transition">Register now</a></li>

<li><a href="#faq" class="hover:text-sun-400 transition">FAQ</a></li>

</ul>

</div>


<div class="lg:col-span-4">

<p class="text-white font-bold mb-5 text-sm baloo tracking-wide uppercase">Contact Us</p>

<ul class="space-y-4 text-sm font-quick">

<li class="flex items-start gap-3">
<span class="mt-0.5 w-8 h-8 shrink-0 rounded-lg bg-white/10 grid place-items-center text-sun-300">
<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-6.2 7-11.5A7 7 0 0 0 5 9.5C5 14.8 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.5"/></svg>
</span>
<span><?= htmlspecialchars($address) ?></span>
</li>

<li class="flex items-start gap-3">
<span class="mt-0.5 w-8 h-8 shrink-0 rounded-lg bg-white/10 grid place-items-center text-sun-300">
<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>
</span>
<a href="<?= $phoneLink ?>" class="hover:text-sun-400 transition"><?= htmlspecialchars($contactPhone) ?></a>
</li>

<li class="flex items-start gap-3">
<span class="mt-0.5 w-8 h-8 shrink-0 rounded-lg bg-white/10 grid place-items-center text-sun-300">
<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2.5"/><path d="m3.5 7 8.5 6 8.5-6"/></svg>
</span>
<a href="mailto:<?= $contactEmail ?>" class="hover:text-sun-400 transition"><?= htmlspecialchars($contactEmail) ?></a>
</li>

<li class="flex items-start gap-3">
<span class="mt-0.5 w-8 h-8 shrink-0 rounded-lg bg-white/10 grid place-items-center text-sun-300">
<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
</span>
<span><?= htmlspecialchars($workingHours) ?></span>
</li>

</ul>

</div>

</div>

<div class="mt-14 border-t border-white/10 pt-6 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-white/45 font-quick">

<p>© <?= $currentYear ?> <?= htmlspecialchars($schoolName) ?> ✨</p>

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

const copyBtn = document.getElementById('copyBtn');
if (copyBtn) {
  copyBtn.addEventListener('click', () => {
    const code = document.getElementById('codeText').textContent.trim();
    const done = () => { copyBtn.textContent = '✅ Copied!'; setTimeout(() => copyBtn.textContent = '📋 Copy code', 1800); };
    if (navigator.clipboard) { navigator.clipboard.writeText(code).then(done); }
    else {
      const t = document.createElement('textarea'); t.value = code; document.body.appendChild(t); t.select();
      document.execCommand('copy'); t.remove(); done();
    }
  });
}

const form = document.getElementById('regForm');

if (form) {

  const nameRe = /^[\p{L}\s'\-\.]+$/u;

  const q = (sel) => form.querySelector(sel);

  const inputs = {
    first_name:  q('#first_name'),
    last_name:   q('#last_name'),
    birth_date:  q('#birth_date'),
    prev_school: q('#prev_school'),
    address:     q('#address'),
    parent_name: q('#parent_name'),
    relation:    q('#relation'),
    phone:       q('#phone'),
    email:       q('#email'),
    city:        q('#city'),
    notes:       q('#notes'),
  };

  const rules = {
    first_name(v){
      v = v.trim();
      if (!v) return "Please enter the student's first name.";
      if (v.length < 2) return "First name must be at least 2 characters.";
      if (v.length > 40 || !nameRe.test(v)) return "Use letters only (max 40 characters).";
      return "";
    },
    last_name(v){
      v = v.trim();
      if (!v) return "Please enter the student's last name.";
      if (v.length < 2) return "Last name must be at least 2 characters.";
      if (v.length > 40 || !nameRe.test(v)) return "Use letters only (max 40 characters).";
      return "";
    },
    birth_date(v){
      if (!v) return "Please choose the date of birth.";
      const d = new Date(v + 'T00:00:00');
      if (isNaN(d)) return "That date doesn't look right.";
      const today = new Date(); today.setHours(0,0,0,0);
      if (d > today) return "Date of birth can't be in the future.";
      let age = today.getFullYear() - d.getFullYear();
      const m = today.getMonth() - d.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < d.getDate())) age--;
      if (age < 3 || age > 16) return "Student age must be between 3 and 16 years.";
      return "";
    },
    prev_school(v){ return v.trim().length > 80 ? "Too long (max 80 characters)." : ""; },
    address(v){
      v = v.trim();
      if (!v) return "Please enter the student's address.";
      if (v.length < 5 || v.length > 160) return "Enter 5–160 characters.";
      return "";
    },
    parent_name(v){
      v = v.trim();
      if (!v) return "Please enter the parent's full name.";
      if (v.length < 3) return "Name must be at least 3 characters.";
      if (v.length > 60 || !nameRe.test(v)) return "Use letters only (max 60 characters).";
      return "";
    },
    relation(v){ return v ? "" : "Please choose your relation to the student."; },
    phone(v){
      v = v.trim();
      const digits = v.replace(/\D/g, '');
      if (!v) return "Please enter a phone number.";
      if (!/^[0-9+\-\s()]+$/.test(v) || digits.length < 10 || digits.length > 14) return "Enter a valid phone number (10–14 digits).";
      return "";
    },
    email(v){
      v = v.trim();
      if (!v) return "Please enter an email address.";
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v)) return "That email doesn't look right.";
      return "";
    },
    city(v){
      v = v.trim();
      if (!v) return "Please enter your city or neighborhood.";
      if (v.length < 2 || v.length > 80) return "Enter 2–80 characters.";
      return "";
    },
    notes(v){ return v.trim().length > 500 ? "Notes are too long (max 500 characters)." : ""; },
  };

  function showErr(key, msg){
    const out = form.querySelector('[data-err="' + key + '"]');
    if (out) out.textContent = msg ? '⚠️ ' + msg : '';
  }

  function show(key, msg){
    showErr(key, msg);
    const input = inputs[key];
    if (input) {
      input.classList.toggle('is-error', !!msg);
      input.classList.toggle('is-ok', !msg && input.value.trim() !== '');
    }
  }

  Object.keys(inputs).forEach(key => {
    const el = inputs[key];
    el.addEventListener('blur', () => show(key, rules[key](el.value)));
    el.addEventListener('input', () => { if (el.classList.contains('is-error')) show(key, rules[key](el.value)); });
    el.addEventListener('change', () => show(key, rules[key](el.value)));
  });

  const gradeBox   = document.getElementById('gradeBox');
  const gradeCount = document.getElementById('gradeCount');
  const gradeChips = document.getElementById('gradeChips');
  const gradeInputs = Array.from(form.querySelectorAll('input[name="grade"]'));

  function updateGrades(validate){
    const checked = gradeInputs.filter(i => i.checked);
    gradeCount.textContent = checked.length;
    gradeChips.innerHTML = '';
    checked.forEach(i => {
      const label = i.closest('label').querySelector('.row span:last-child').textContent.trim();
      const chip = document.createElement('span');
      chip.className = 'chip';
      chip.textContent = '🎓 ' + label;
      gradeChips.appendChild(chip);
    });
    if (validate) {
      const bad = checked.length === 0;
      gradeBox.classList.toggle('is-error', bad);
      showErr('grades', bad ? "Please select a grade." : "");
    }
  }
  gradeInputs.forEach(i => i.addEventListener('change', () => updateGrades(true)));
  updateGrades(false);

  const agree = document.getElementById('agree');
  agree.addEventListener('change', () => showErr('agree', agree.checked ? "" : "You need to accept the terms to continue."));

  const counter = document.getElementById('counter');
  const updateCounter = () => { counter.textContent = inputs.notes.value.length; };
  inputs.notes.addEventListener('input', updateCounter);
  updateCounter();

  
  form.addEventListener('submit', (e) => {
    let firstBad = null;

    Object.keys(inputs).forEach(key => {
      const msg = rules[key](inputs[key].value);
      show(key, msg);
      if (msg && !firstBad) firstBad = inputs[key];
    });

    if (gradeInputs.every(i => !i.checked)) {
      gradeBox.classList.add('is-error');
      showErr('grades', "Please select a grade.");
      if (!firstBad) firstBad = gradeBox;
    }

    if (!agree.checked) {
      showErr('agree', "You need to accept the terms to continue.");
      if (!firstBad) firstBad = agree;
    }

    if (firstBad) {
      e.preventDefault();
      if (firstBad === gradeBox) { gradeBox.scrollIntoView({ behavior: 'smooth', block: 'center' }); }
      else { firstBad.focus(); firstBad.scrollIntoView({ behavior: 'smooth', block: 'center' }); }
      return;
    }

    const btn = document.getElementById('sendBtn');
    btn.disabled = true;
    document.getElementById('sendText').textContent = 'Sending…';
  });
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