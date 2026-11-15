<?php
session_start();

$schoolName    = "Tiffany School";
$schoolTagline = "LEARN · PLAY · SHINE ✨";
$currentYear   = date("Y");

$contactEmail  = "tifani99@gmail.com";
$contactPhone  = "021 99994499";
$phoneLink     = "tel:02199994499";
$address       = "Valiasr St, Tehran";
$workingHours  = "Sat – Wed · 7:30 AM – 4:00 PM";


if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}


function old($key) {
    return htmlspecialchars($_SESSION['old'][$key] ?? '', ENT_QUOTES, 'UTF-8');
}
function err($key) {
    return $_SESSION['errors'][$key] ?? '';
}

$subjects = [
    "tour"   => "Book a school tour",
    "enroll" => "Enrollment question",
    "fees"   => "Tuition & fees",
    "bus"    => "School bus service",
    "other"  => "Something else",
];


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['new']) && $_GET['new'] === '1') {
    unset($_SESSION['sent'], $_SESSION['sent_name'], $_SESSION['old'], $_SESSION['errors']);
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
    header('Location: contact.php#form');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) {
        $errors['general'] = "Your session expired. Please try again.";
    }

    
    if (!empty($_POST['website'])) {
        $_SESSION['sent'] = true;
        header("Location: contact.php#form");
        exit;
    }

    
    $name    = trim(strip_tags($_POST['name'] ?? ''));
    $email   = trim($_POST['email'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $subject = $_POST['subject'] ?? '';
    $message = trim(strip_tags($_POST['message'] ?? ''));

   
    if ($name === '') {
        $errors['name'] = "Please tell us your name.";
    } elseif (mb_strlen($name) < 3) {
        $errors['name'] = "Name must be at least 3 characters.";
    } elseif (mb_strlen($name) > 60) {
        $errors['name'] = "Name is too long (max 60 characters).";
    }

    
    if ($email === '') {
        $errors['email'] = "Please enter your email address.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "That email doesn't look right.";
    } elseif (preg_match('/[\r\n]/', $email)) {
        $errors['email'] = "Invalid email.";
    }

    
    if ($phone !== '' && !preg_match('/^[0-9+\-\s()]{7,18}$/', $phone)) {
        $errors['phone'] = "Phone can only contain digits, +, - and spaces (7–18 chars).";
    }

   
    if (!array_key_exists($subject, $subjects)) {
        $errors['subject'] = "Please choose a subject.";
    }

    
    if ($message === '') {
        $errors['message'] = "Please write your message.";
    } elseif (mb_strlen($message) < 10) {
        $errors['message'] = "Message must be at least 10 characters.";
    } elseif (mb_strlen($message) > 1000) {
        $errors['message'] = "Message is too long (max 1000 characters).";
    }

    if (empty($errors)) {

      
        $mailSubject = "[Tiffany Contact] " . $subjects[$subject] . " — " . $name;
        $body  = "New message from the website contact form\n";
        $body .= "-------------------------------------------\n";
        $body .= "Name:    $name\n";
        $body .= "Email:   $email\n";
        $body .= "Phone:   " . ($phone !== '' ? $phone : '-') . "\n";
        $body .= "Subject: " . $subjects[$subject] . "\n\n";
        $body .= "Message:\n$message\n";

        $headers  = "From: no-reply@tiffanyschool.ir\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

     
        @mail($contactEmail, $mailSubject, $body, $headers);

        $line = date("Y-m-d H:i:s") . " | $name | $email | $phone | " . $subjects[$subject] . " | " . str_replace(["\r", "\n"], ' ', $message) . PHP_EOL;
        @file_put_contents(__DIR__ . "/messages.txt", $line, FILE_APPEND | LOCK_EX);

       
        unset($_SESSION['old'], $_SESSION['errors']);
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
        $_SESSION['sent'] = true;
        $_SESSION['sent_name'] = $name;

        header("Location: contact.php#form");
        exit;
    }

  
    $_SESSION['old']    = ['name' => $name, 'email' => $email, 'phone' => $phone, 'subject' => $subject, 'message' => $message];
    $_SESSION['errors'] = $errors;
    header("Location: contact.php#form");
    exit;
}

$sent     = !empty($_SESSION['sent']);
$sentName = $_SESSION['sent_name'] ?? '';
$hasErrors = !empty($_SESSION['errors']);
$generalErr = $_SESSION['errors']['general'] ?? '';
unset($_SESSION['sent'], $_SESSION['sent_name']);
?>
<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

<meta name="description" content="Contact Tiffany School — call, email, or send us a message">

<title>Contact Us | <?= htmlspecialchars($schoolName) ?> ✨</title>

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
    background:rgba(255,255,255,.85);
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
    transform:skewX(-20deg); animation:shine 5s ease-in-out infinite; pointer-events:none;
  }
  @keyframes shine{ 0%{ left:-60%; } 60%,100%{ left:130%; } }

  .icon-bob{ animation:bob 3.6s ease-in-out infinite; }
  @keyframes bob{ 0%,100%{ transform:translateY(0) rotate(-2deg);} 50%{ transform:translateY(-10px) rotate(3deg);} }

  .reveal{ opacity:0; transform:translateY(34px); transition:opacity .8s ease, transform .8s cubic-bezier(.2,.8,.2,1); }
  .reveal.show{ opacity:1; transform:none; }

  .field{
    width:100%; background:#fff; border:3px solid #ece0ff; border-radius:1.1rem;
    padding:.95rem 1.1rem; font-weight:600; color:#241b4d; outline:none;
    transition:border-color .25s, box-shadow .25s, transform .25s;
  }
  .field::placeholder{ color:rgba(36,27,77,.35); font-weight:500; }
  .field:focus{ border-color:#a06bff; box-shadow:0 0 0 6px rgba(160,107,255,.18); transform:translateY(-1px); }
  .field.is-error{ border-color:#ff6b88; background:#fff7f9; box-shadow:0 0 0 5px rgba(255,107,136,.12); }
  .field.is-ok{ border-color:#5fd3a3; }

  .err-text{ color:#ef4463; font-size:.8rem; font-weight:700; margin-top:.4rem; display:flex; gap:.35rem; align-items:center; }
  .err-text:empty{ display:none; }

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
    100%{ transform:translateY(160px) rotate(540deg); opacity:0; }
  }

  .pin-pulse{ animation:pinPulse 2s ease-out infinite; transform-box:fill-box; transform-origin:center; }
  @keyframes pinPulse{ 0%{ transform:scale(.4); opacity:.8;} 100%{ transform:scale(2.2); opacity:0;} }

  .faq-item summary{ list-style:none; cursor:pointer; }
  .faq-item summary::-webkit-details-marker{ display:none; }
  .faq-item[open] .faq-plus{ transform:rotate(45deg); }
  .faq-plus{ transition:transform .3s ease; }

  .pill-nav a{ transition:all .25s ease; }
  .pill-nav a:hover{ transform:translateY(-3px); }

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

<a href="contact.php" class="px-5 py-2.5 rounded-full bg-white text-brand-700 shadow-sm">Contact</a>

<a href="pre-registration.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">Pre-Registration</a>

</div>

<a href="pre-registration.php" class="hidden sm:inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-navy font-bold text-sm px-6 py-3 rounded-full shadow-glow transition baloo">

      Enroll Now 🎉

</a>

</nav>

</header>

<main>

<section class="relative max-w-7xl mx-auto px-5 lg:px-8 pt-16 pb-16 text-center">

<span class="absolute top-6 left-6 text-4xl float wiggle" style="--r:-10deg">💌</span>
<span class="absolute top-28 left-[12%] text-3xl float-slow" style="--r:6deg">⭐</span>
<span class="absolute top-8 right-8 text-4xl float-fast">📞</span>
<span class="absolute top-32 right-[14%] text-3xl float">🌈</span>

<span class="inline-flex items-center gap-2 bg-white border-2 border-brand-200 shadow-sm rounded-full px-4 py-2 text-xs font-bold text-brand-600 baloo">
<span class="w-2 h-2 rounded-full bg-mint-500 animate-pulse"></span>
      CONTACT US 🌈
</span>

<h1 class="mt-7 text-4xl sm:text-5xl lg:text-7xl font-extrabold leading-[1.1] max-w-4xl mx-auto">
      Let's Say <span class="relative inline-block grad-text">Hello!
<svg class="absolute -bottom-2 left-0 w-full" height="14" viewBox="0 0 200 14" fill="none"><path d="M3 10C40 2 160 2 197 10" stroke="#FFC531" stroke-width="7" stroke-linecap="round"/></svg>
</span> 👋
</h1>

<p class="mt-8 text-navy/60 text-lg sm:text-xl leading-9 max-w-2xl mx-auto font-quick">
      Questions about <span class="highlight font-bold text-navy/80">enrollment</span>, a school tour, or anything else? Our friendly team is <span class="highlight font-bold text-navy/80">happy to help</span> you.
</p>

<div class="pill-nav mt-10 flex flex-wrap justify-center gap-3 baloo text-sm font-bold">
<a href="#ways" class="px-5 py-3 rounded-full bg-brand-100 text-brand-700 border-2 border-brand-200 shadow-sm">📞 Ways to reach us</a>
<a href="#form" class="px-5 py-3 rounded-full bg-coral-300/40 text-coral-600 border-2 border-coral-300 shadow-sm">✉️ Send a message</a>
<a href="#faq" class="px-5 py-3 rounded-full bg-sun-100 text-sun-600 border-2 border-sun-300 shadow-sm">❓ FAQ</a>
</div>

</section>

<section id="ways" class="max-w-7xl mx-auto px-5 lg:px-8 pb-20 scroll-mt-24">

<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

<a href="mailto:<?= $contactEmail ?>" class="card-tilt reveal group block rounded-[2rem] bg-white border-4 border-brand-100 shadow-sm hover:shadow-soft p-7 text-center">
<span class="mx-auto w-20 h-20 rounded-[1.6rem] bg-gradient-to-br from-brand-500 to-brand-700 grid place-items-center shadow-soft icon-bob">
<svg viewBox="0 0 64 64" class="w-12 h-12" fill="none">
<rect x="8" y="16" width="48" height="34" rx="8" fill="#fff"/>
<path d="M12 22l20 14 20-14" stroke="#8438f5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
<circle cx="50" cy="16" r="7" fill="#ff6b88"/><circle cx="50" cy="16" r="2.4" fill="#fff"/>
</svg>
</span>
<h3 class="mt-5 font-bold text-lg baloo">Email Us</h3>
<p class="mt-1 text-xs text-navy/45 font-quick">We reply within 24 hours</p>
<p class="mt-3 font-extrabold text-brand-700 text-sm break-all group-hover:underline"><?= htmlspecialchars($contactEmail) ?></p>
</a>

<a href="<?= $phoneLink ?>" class="card-tilt reveal group block rounded-[2rem] bg-white border-4 border-coral-300/60 shadow-sm hover:shadow-soft p-7 text-center">
<span class="mx-auto w-20 h-20 rounded-[1.6rem] bg-gradient-to-br from-coral-400 to-coral-600 grid place-items-center shadow-soft icon-bob" style="animation-delay:.4s">
<svg viewBox="0 0 64 64" class="w-12 h-12" fill="none">
<path d="M20 10h10l5 14-7 5c4 8 9 13 17 17l5-7 14 5v10c0 4-3 7-7 7C28 61 3 36 3 15c0-3 3-5 6-5Z" transform="translate(2 -2) scale(.9)" fill="#fff"/>
<path d="M44 14c5 1 9 5 10 10M44 6c9 1 16 8 17 17" stroke="#ffd866" stroke-width="4" stroke-linecap="round"/>
</svg>
</span>
<h3 class="mt-5 font-bold text-lg baloo">Call Us</h3>
<p class="mt-1 text-xs text-navy/45 font-quick">School office phone</p>
<p class="mt-3 font-extrabold text-coral-600 text-lg baloo group-hover:underline"><?= htmlspecialchars($contactPhone) ?></p>
</a>

<div class="card-tilt reveal rounded-[2rem] bg-white border-4 border-mint-300/70 shadow-sm hover:shadow-soft p-7 text-center">
<span class="mx-auto w-20 h-20 rounded-[1.6rem] bg-gradient-to-br from-mint-400 to-mint-500 grid place-items-center shadow-soft icon-bob" style="animation-delay:.8s">
<svg viewBox="0 0 64 64" class="w-12 h-12" fill="none">
<path d="M32 6c-10 0-18 8-18 18 0 14 18 32 18 32s18-18 18-32c0-10-8-18-18-18Z" fill="#fff"/>
<circle cx="32" cy="24" r="7" fill="#2bb787"/>
</svg>
</span>
<h3 class="mt-5 font-bold text-lg baloo">Visit Us</h3>
<p class="mt-1 text-xs text-navy/45 font-quick">Come and see our campus</p>
<p class="mt-3 font-extrabold text-mint-500 text-sm"><?= htmlspecialchars($address) ?></p>
</div>

<div class="card-tilt reveal rounded-[2rem] bg-white border-4 border-sun-300 shadow-sm hover:shadow-soft p-7 text-center">
<span class="mx-auto w-20 h-20 rounded-[1.6rem] bg-gradient-to-br from-sun-400 to-sun-600 grid place-items-center shadow-soft icon-bob" style="animation-delay:1.2s">
<svg viewBox="0 0 64 64" class="w-12 h-12" fill="none">
<circle cx="32" cy="32" r="24" fill="#fff"/>
<path d="M32 17v16l10 6" stroke="#f7a712" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</span>
<h3 class="mt-5 font-bold text-lg baloo">Office Hours</h3>
<p class="mt-1 text-xs text-navy/45 font-quick">We're here for you</p>
<p class="mt-3 font-extrabold text-sun-600 text-sm"><?= htmlspecialchars($workingHours) ?></p>
</div>

</div>

</section>

<svg viewBox="0 0 1440 60" class="w-full -mb-1 text-navy"><path fill="currentColor" d="M0 30C240 70 480 0 720 20S1200 60 1440 20V60H0Z"/></svg>

<div class="bg-navy py-4 overflow-hidden">

<div class="marquee text-white/90 text-sm font-bold tracking-wide gap-10 whitespace-nowrap baloo">

<span class="flex gap-10 pl-10">
<span>✦ We love hearing from you</span><span>✦ Book a school tour</span><span>✦ Replies within 24 hours</span><span>✦ Friendly office team</span><span>✦ Free counseling</span><span>✦ School bus service</span>
</span>

<span class="flex gap-10 pl-10" aria-hidden="true">
<span>✦ We love hearing from you</span><span>✦ Book a school tour</span><span>✦ Replies within 24 hours</span><span>✦ Friendly office team</span><span>✦ Free counseling</span><span>✦ School bus service</span>
</span>

</div>

</div>

<section id="form" class="max-w-7xl mx-auto px-5 lg:px-8 py-24 scroll-mt-24">

<div class="text-center max-w-2xl mx-auto">
<span class="text-brand-600 font-bold text-sm tracking-widest baloo">DROP US A LINE</span>
<h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-extrabold">Send Us a <span class="grad-text">Message</span> 💬</h2>
<p class="mt-4 text-navy/55 font-quick text-lg">Fill in the form and we'll get back to you very soon.</p>
</div>

<div class="mt-14 grid lg:grid-cols-5 gap-10 items-start">

<div class="lg:col-span-2 relative reveal">

<div class="absolute -inset-3 rounded-[2.6rem] bg-gradient-to-br from-brand-400 via-coral-400 to-sun-400 rotate-3 opacity-90"></div>

<div class="photo-shine relative aspect-[4/5] rounded-[2.2rem] overflow-hidden bg-gradient-to-br from-brand-100 to-coral-100 border-4 border-white shadow-soft">

<img src="./images/hi.jpg" alt="Tiffany School office team" class="w-full h-full object-cover"
onerror="this.style.display='none'; this.parentElement.querySelector('.ph-fallback').style.display='flex';">

<div class="ph-fallback absolute inset-0 hidden flex-col items-center justify-center gap-3 text-brand-500">
<svg class="w-14 h-14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2.5"/><circle cx="9" cy="11" r="2.2"/><path d="M21 16l-5.5-5L9 17"/></svg>
<p class="text-sm font-bold baloo">Contact photo goes here</p>
<p class="text-[11px] text-brand-400 font-quick">./images/contact.jpg</p>
</div>

<span class="absolute bottom-4 left-4 bg-white/90 backdrop-blur px-4 py-2 rounded-full text-xs font-bold text-navy shadow baloo">Our friendly team 🌈</span>

</div>

<span class="kid-badge -top-4 -left-3 bg-sun-300">Hi there! 👋</span>
<span class="absolute -bottom-6 -right-3 text-5xl float z-10">💌</span>

<div class="relative mt-10 glass rounded-[2rem] border-4 border-brand-100 shadow-soft p-6">
<p class="font-bold baloo text-lg">Prefer to talk? 📞</p>
<p class="mt-1 text-sm text-navy/55 font-quick leading-7">Call our school office and a team member will answer your questions right away.</p>
<a href="<?= $phoneLink ?>" class="mt-4 inline-flex items-center gap-2 bg-gradient-to-r from-brand-600 to-brand-800 text-white font-bold text-sm px-6 py-3 rounded-2xl shadow-soft hover:-translate-y-1 transition baloo">
<?= htmlspecialchars($contactPhone) ?>
<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
</a>
</div>

</div>

<div class="lg:col-span-3 relative reveal">

<?php if ($sent): ?>

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

<h3 class="mt-7 text-3xl sm:text-4xl font-extrabold baloo text-mint-500">Your message has been sent! 🎉</h3>

<p class="mt-4 text-navy/60 text-lg font-quick leading-8 max-w-md mx-auto">
Thank you<?= $sentName !== '' ? ', <span class="font-extrabold text-navy/80">' . htmlspecialchars($sentName) . '</span>' : '' ?>! Our team received your message and will reply to you as soon as possible. 🌈
</p>

<div class="mt-8 flex flex-wrap justify-center gap-3 baloo font-bold">
<a href="contact.php?new=1#form" class="inline-flex items-center gap-2 bg-gradient-to-r from-brand-600 to-brand-800 text-white px-7 py-3.5 rounded-2xl shadow-soft hover:-translate-y-1 transition">Send another message ✉️</a>
<a href="index.php" class="inline-flex items-center gap-2 bg-white border-2 border-brand-200 text-navy px-7 py-3.5 rounded-2xl hover:border-brand-400 hover:-translate-y-1 transition">Back to Home 🏠</a>
</div>

</div>

</div>

<?php else: ?>

<form id="contactForm" action="contact.php#form" method="POST" novalidate
class="relative overflow-hidden rounded-[2.5rem] bg-white/90 backdrop-blur border-4 border-brand-100 shadow-soft p-6 sm:p-10">

<div class="blob w-64 h-64 bg-brand-200/50 -top-24 -right-16"></div>
<div class="blob w-64 h-64 bg-sun-300/30 -bottom-24 -left-16"></div>

<div class="relative">

<div class="flex items-center gap-3">
<span class="w-12 h-12 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 grid place-items-center text-2xl shadow-soft">✉️</span>
<div>
<p class="font-extrabold text-xl baloo leading-tight">Write to us</p>
<p class="text-xs text-navy/45 font-quick">Fields marked <span class="text-coral-500 font-bold">*</span> are required</p>
</div>
</div>

<?php if ($generalErr): ?>
<div class="mt-6 rounded-2xl bg-[#fff1f4] border-2 border-coral-300 text-coral-600 font-bold text-sm px-5 py-4 flex items-center gap-3">
<span class="text-xl">⚠️</span> <?= htmlspecialchars($generalErr) ?>
</div>
<?php elseif ($hasErrors): ?>
<div class="mt-6 rounded-2xl bg-[#fff1f4] border-2 border-coral-300 text-coral-600 font-bold text-sm px-5 py-4 flex items-center gap-3">
<span class="text-xl">⚠️</span> Oops! Please fix the highlighted fields and try again.
</div>
<?php endif; ?>

<input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">

<div style="position:absolute;left:-9999px;top:-9999px;" aria-hidden="true">
<label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
</div>

<div class="mt-7 grid sm:grid-cols-2 gap-5">

<div>
<label for="name" class="block mb-2 text-sm font-bold baloo">Your name <span class="text-coral-500">*</span></label>
<input id="name" name="name" type="text" maxlength="60" autocomplete="name" placeholder="e.g. Sara Ahmadi"
value="<?= old('name') ?>" class="field <?= err('name') ? 'is-error' : '' ?>">
<p class="err-text" data-err="name"><?= err('name') ? '⚠️ ' . htmlspecialchars(err('name')) : '' ?></p>
</div>

<div>
<label for="email" class="block mb-2 text-sm font-bold baloo">Email address <span class="text-coral-500">*</span></label>
<input id="email" name="email" type="email" autocomplete="email" placeholder="you@example.com"
value="<?= old('email') ?>" class="field <?= err('email') ? 'is-error' : '' ?>">
<p class="err-text" data-err="email"><?= err('email') ? '⚠️ ' . htmlspecialchars(err('email')) : '' ?></p>
</div>

<div>
<label for="phone" class="block mb-2 text-sm font-bold baloo">Phone <span class="text-navy/35 font-semibold">(optional)</span></label>
<input id="phone" name="phone" type="tel" autocomplete="tel" placeholder="0912 345 6789"
value="<?= old('phone') ?>" class="field <?= err('phone') ? 'is-error' : '' ?>">
<p class="err-text" data-err="phone"><?= err('phone') ? '⚠️ ' . htmlspecialchars(err('phone')) : '' ?></p>
</div>

<div>
<label for="subject" class="block mb-2 text-sm font-bold baloo">Subject <span class="text-coral-500">*</span></label>
<select id="subject" name="subject" class="field <?= err('subject') ? 'is-error' : '' ?>">
<option value="">Choose a subject…</option>
<?php foreach ($subjects as $key => $label): ?>
<option value="<?= $key ?>" <?= (($_SESSION['old']['subject'] ?? '') === $key) ? 'selected' : '' ?>><?= htmlspecialchars($label) ?></option>
<?php endforeach; ?>
</select>
<p class="err-text" data-err="subject"><?= err('subject') ? '⚠️ ' . htmlspecialchars(err('subject')) : '' ?></p>
</div>

</div>

<div class="mt-5">
<div class="flex items-end justify-between">
<label for="message" class="block mb-2 text-sm font-bold baloo">Your message <span class="text-coral-500">*</span></label>
<span class="mb-2 text-xs font-bold text-navy/40 font-quick"><span id="counter">0</span> / 1000</span>
</div>
<textarea id="message" name="message" rows="6" maxlength="1000" placeholder="Tell us how we can help you… 🌈"
class="field resize-none <?= err('message') ? 'is-error' : '' ?>"><?= old('message') ?></textarea>
<p class="err-text" data-err="message"><?= err('message') ? '⚠️ ' . htmlspecialchars(err('message')) : '' ?></p>
</div>

<button type="submit" id="sendBtn" class="send-btn mt-8 w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-gradient-to-r from-brand-600 to-brand-800 text-white font-bold text-base px-10 py-4 rounded-2xl shadow-soft hover:-translate-y-1 hover:shadow-glow transition baloo">
<span id="sendText">Send Message</span>
<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 11 13M22 2l-7 20-4-9-9-4 20-7Z"/></svg>
</button>

<p class="mt-5 text-xs text-navy/45 font-quick">🔒 Your information is safe with us and is only used to answer your message.</p>

</div>

</form>

<?php endif; ?>

</div>

</div>

</section>


<section class="max-w-7xl mx-auto px-5 lg:px-8 pb-24">

<div class="relative reveal overflow-hidden rounded-[2.8rem] bg-brand-50 border-4 border-white shadow-soft">

<svg viewBox="0 0 1000 380" class="w-full h-auto block" role="img" aria-label="Illustrated map showing Tiffany School location">

<defs>
<pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M40 0H0V40" fill="none" stroke="#d9c4ff" stroke-width="1.2" opacity=".6"/></pattern>
</defs>

<rect width="1000" height="380" fill="#f6f2ff"/>
<rect width="1000" height="380" fill="url(#grid)"/>

<rect x="60" y="50" width="170" height="110" rx="28" fill="#9ee8c8" opacity=".6"/>
<rect x="760" y="230" width="190" height="110" rx="28" fill="#9ee8c8" opacity=".6"/>
<circle cx="130" cy="105" r="9" fill="#2bb787"/><circle cx="170" cy="125" r="7" fill="#2bb787"/><circle cx="105" cy="130" r="6" fill="#2bb787"/>
<circle cx="840" cy="280" r="9" fill="#2bb787"/><circle cx="880" cy="262" r="7" fill="#2bb787"/>

<path d="M0 300 C150 260 260 340 420 300 S700 250 1000 310 V380 H0Z" fill="#9fd8ff" opacity=".55"/>

<path d="M0 190 H1000" stroke="#fff" stroke-width="30"/>
<path d="M500 0 V380" stroke="#fff" stroke-width="30"/>
<path d="M0 190 H1000" stroke="#ffd866" stroke-width="3" stroke-dasharray="14 12"/>
<path d="M500 0 V380" stroke="#ffd866" stroke-width="3" stroke-dasharray="14 12"/>
<path d="M120 0 C200 120 300 140 500 190" stroke="#fff" stroke-width="16" fill="none"/>
<path d="M500 190 C650 240 800 220 1000 130" stroke="#fff" stroke-width="16" fill="none"/>

<g fill="#d9c4ff">
<rect x="300" y="60" width="60" height="60" rx="10"/><rect x="380" y="80" width="50" height="40" rx="10"/>
<rect x="580" y="60" width="70" height="70" rx="10"/><rect x="670" y="90" width="50" height="40" rx="10"/>
<rect x="300" y="230" width="70" height="50" rx="10"/><rect x="590" y="240" width="60" height="60" rx="10"/>
</g>

<g transform="translate(500 190)">
<circle class="pin-pulse" r="22" fill="#8438f5" opacity=".5"/>
<circle class="pin-pulse" style="animation-delay:1s" r="22" fill="#ff6b88" opacity=".4"/>
<g class="float">
<path d="M0 -70 C-26 -70 -42 -52 -42 -30 C-42 -2 0 30 0 30 C0 30 42 -2 42 -30 C42 -52 26 -70 0 -70Z" fill="#8438f5" stroke="#fff" stroke-width="5"/>
<path d="M-18 -34 L0 -48 L18 -34 V-14 H-18Z" fill="#fff"/>
<path d="M-22 -34 L0 -52 L22 -34" fill="none" stroke="#ffc531" stroke-width="5" stroke-linejoin="round" stroke-linecap="round"/>
<rect x="-5" y="-26" width="10" height="12" rx="2" fill="#ff6b88"/>
</g>
</g>

<g transform="translate(560 120)">
<rect width="210" height="64" rx="22" fill="#fff" stroke="#bd97ff" stroke-width="3"/>
<text x="105" y="28" text-anchor="middle" font-family="'Baloo 2',cursive" font-weight="800" font-size="20" fill="#5f1cb8">Tiffany School</text>
<text x="105" y="50" text-anchor="middle" font-family="'Quicksand',sans-serif" font-weight="700" font-size="14" fill="#241b4d" opacity=".6">Valiasr St, Tehran</text>
</g>

<g transform="translate(920 70)">
<circle r="30" fill="#fff" stroke="#d9c4ff" stroke-width="3"/>
<path d="M0 -22 L7 0 L0 22 L-7 0Z" fill="#ff6b88"/>
<path d="M0 -22 L7 0 H-7Z" fill="#8438f5"/>
<text y="-34" text-anchor="middle" font-family="'Baloo 2',cursive" font-weight="800" font-size="13" fill="#8438f5">N</text>
</g>

</svg>

<span class="kid-badge top-5 left-6 bg-sun-300">Find us here 📍</span>

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

<?php
$faqs = [
  ["q" => "How can I book a school tour?", "a" => "Choose “Book a school tour” in the form above, or call us on $contactPhone. We'll set up a visit that suits you."],
  ["q" => "How fast will you reply?", "a" => "We reply to every message within 24 hours on working days. For urgent questions, calling the school office is fastest."],
  ["q" => "When does pre-registration open?", "a" => "Pre-registration for the new school year is open now! You can fill it in from the Pre-Registration page."],
  ["q" => "Do you have a school bus service?", "a" => "Yes! Our school buses cover many areas of the city. Ask us about routes using the contact form."],
];
foreach ($faqs as $f): ?>
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

<h2 class="relative text-3xl sm:text-4xl font-bold text-white">Ready to Join the Tiffany Family? 🌈</h2>

<p class="relative mt-4 text-brand-100 max-w-xl mx-auto font-quick">Fill out the pre-registration form today so our team can reach out to you as soon as possible.</p>

<a href="pre-registration.php" class="relative mt-8 inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-navy font-bold px-8 py-4 rounded-2xl shadow-lg transition hover:-translate-y-1 baloo">

      Start Pre-Registration 🚀

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

<li><a href="#ways" class="hover:text-sun-400 transition">Ways to reach us</a></li>

<li><a href="#form" class="hover:text-sun-400 transition">Send a message</a></li>

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

<p>© <?= $currentYear ?> <?= htmlspecialchars($schoolName) ?> 🌈</p>

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


const form = document.getElementById('contactForm');

if (form) {

  const fields = {
    name:    form.querySelector('#name'),
    email:   form.querySelector('#email'),
    phone:   form.querySelector('#phone'),
    subject: form.querySelector('#subject'),
    message: form.querySelector('#message'),
  };

  const rules = {
    name(v){
      v = v.trim();
      if (!v) return "Please tell us your name.";
      if (v.length < 3) return "Name must be at least 3 characters.";
      if (v.length > 60) return "Name is too long (max 60 characters).";
      return "";
    },
    email(v){
      v = v.trim();
      if (!v) return "Please enter your email address.";
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v)) return "That email doesn't look right.";
      return "";
    },
    phone(v){
      v = v.trim();
      if (v && !/^[0-9+\-\s()]{7,18}$/.test(v)) return "Phone can only contain digits, +, - and spaces (7–18 chars).";
      return "";
    },
    subject(v){
      return v ? "" : "Please choose a subject.";
    },
    message(v){
      v = v.trim();
      if (!v) return "Please write your message.";
      if (v.length < 10) return "Message must be at least 10 characters.";
      if (v.length > 1000) return "Message is too long (max 1000 characters).";
      return "";
    },
  };

  function show(key, msg){
    const input = fields[key];
    const out = form.querySelector('[data-err="' + key + '"]');
    out.textContent = msg ? '⚠️ ' + msg : '';
    input.classList.toggle('is-error', !!msg);
    input.classList.toggle('is-ok', !msg && input.value.trim() !== '');
  }

  Object.keys(fields).forEach(key => {
    const el = fields[key];
    el.addEventListener('blur', () => show(key, rules[key](el.value)));
    el.addEventListener('input', () => { if (el.classList.contains('is-error')) show(key, rules[key](el.value)); });
    el.addEventListener('change', () => show(key, rules[key](el.value)));
  });


  const counter = document.getElementById('counter');
  const updateCounter = () => { counter.textContent = fields.message.value.length; };
  fields.message.addEventListener('input', updateCounter);
  updateCounter();

  form.addEventListener('submit', (e) => {
    let firstBad = null;
    Object.keys(fields).forEach(key => {
      const msg = rules[key](fields[key].value);
      show(key, msg);
      if (msg && !firstBad) firstBad = fields[key];
    });
    if (firstBad) {
      e.preventDefault();
      firstBad.focus();
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
  <div class="sparkle top-[78%] left-[28%]" style="--rot:0;animation-delay:1.8s"></div>
</div>

</body>

</html>