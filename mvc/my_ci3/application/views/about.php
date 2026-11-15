<!DOCTYPE html>
<html lang="en" class="scroll-smooth [scroll-padding-top:90px]">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="description" content="Arezoo Roshani — Computer Engineer and ASP.NET Core Developer">
<title>Arezoo Roshani | ASP.NET Core Developer</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Poppins:wght@400;500;600;700&family=Caveat:wght@600;700&display=swap" rel="stylesheet">
<link rel="stylesheet"
      href="<?php echo site_url('portfolio/css'); ?>">
</head>

<body class="overflow-x-hidden bg-[#fff5f9] font-sans leading-[1.65] text-[#4a2545] pt-[env(safe-area-inset-top,0px)] pb-[env(safe-area-inset-bottom,0px)]">

<div class="fixed inset-0 z-[-3] bg-dot-grid [background-size:26px_26px] opacity-50"></div>
<div class="fixed left-[-10%] top-[-8%] z-[-2] h-[460px] w-[460px] rounded-full bg-[#f9a8d4]/[0.67] blur-[90px]"></div>
<div class="fixed right-[-12%] top-[20%] z-[-2] h-[420px] w-[420px] rounded-full bg-[#c4b5fd]/[0.67] blur-[90px]"></div>
<div class="fixed bottom-[-10%] left-[20%] z-[-2] h-[440px] w-[440px] rounded-full bg-[#fde68a]/[0.63] blur-[90px]"></div>

<div class="fixed left-4 top-4 z-[60]">
  <a href="<?php echo site_url('portfolio'); ?>" class="inline-flex items-center gap-1.5 rounded-full border border-[#f6d9ea] bg-white/80 px-4 py-2 text-xs font-semibold text-[#8d7391] shadow-sm backdrop-blur transition hover:border-[#ec4899] hover:text-[#ec4899]">← Back to Home</a>
</div>

<header class="fixed left-0 right-0 top-0 z-50 border-b border-[#f6d9ea] bg-[#fff5f9]/[0.93] py-4 backdrop-blur-[10px]">
  <nav class="mx-auto flex max-w-[1160px] items-center justify-between px-[26px]">
    <a href="#home" class="font-head text-[22px] font-semibold text-[#ec4899]">arez<span class="text-[#4a2545]">✿</span></a>
    <div class="hidden min-[900px]:flex min-[900px]:gap-[30px] text-[14.5px] font-medium text-[#8d7391]">
      <a href="#about" class="transition hover:text-[#ec4899]">About</a>
      <a href="#expertise" class="transition hover:text-[#ec4899]">Expertise</a>
      <a href="#architecture" class="transition hover:text-[#ec4899]">Architecture</a>
      <a href="#journey" class="transition hover:text-[#ec4899]">Journey</a>
    </div>
    <a href="#contact" class="inline-block rounded-full bg-cta-grad px-6 py-2.5 text-sm font-semibold text-white shadow-[0_8px_20px_-6px_rgba(236,72,153,0.53)] transition duration-300 hover:-translate-y-[3px] hover:scale-[1.03] hover:shadow-[0_12px_26px_-6px_rgba(236,72,153,0.67)]">Say Hi ✨</a>
  </nav>
</header>

<main id="home">
<section class="relative flex min-h-screen items-center pb-[70px] pt-[130px]">
  <span class="absolute left-[6%] top-[14%] text-xl opacity-70 animate-float-y">✨</span>
  <span class="absolute left-[3%] top-[70%] text-xl opacity-70 animate-float-y [animation-delay:1s]">🎀</span>
  <span class="absolute right-[4%] top-[20%] text-xl opacity-70 animate-float-y [animation-delay:2s]">💫</span>

  <div class="mx-auto grid max-w-[1160px] grid-cols-1 items-center gap-[50px] px-[26px] min-[980px]:grid-cols-[1.1fr_0.9fr]">
    <div>
      <p class="mb-2 font-script text-2xl text-[#ec4899]">hi, i'm</p>
      <h1 class="text-[clamp(44px,7vw,76px)] font-bold leading-[1] font-head text-[#4a2545]">Arezoo<br><span class="bg-name-grad bg-clip-text text-transparent">Roshani.</span></h1>
      <p class="mt-5 text-lg font-medium text-[#8d7391]">Computer Engineer <b class="text-[#ec4899]">·</b> ASP.NET Core Developer</p>
      <p class="mt-[22px] max-w-[540px] text-[16.5px] leading-[1.8] text-[#8d7391]">I design and build scalable backend systems with modern .NET, grounded in <b class="font-semibold text-[#4a2545]">Clean Architecture</b>, <b class="font-semibold text-[#4a2545]">Microservices</b>, and domain-driven development that holds up as products grow.</p>

      <div class="mt-8 flex flex-wrap gap-3.5">
        <a href="#expertise" class="inline-block rounded-full bg-cta-grad px-6 py-2.5 text-sm font-semibold text-white shadow-[0_8px_20px_-6px_rgba(236,72,153,0.53)] transition duration-300 hover:-translate-y-[3px] hover:scale-[1.03] hover:shadow-[0_12px_26px_-6px_rgba(236,72,153,0.67)]">Explore My Work</a>
        <a href="#contact" class="rounded-full border-2 border-[#fbcfe8] bg-white px-6 py-2.5 text-sm font-semibold text-[#ec4899] transition hover:bg-[#fbcfe8]">Let's Talk 💌</a>
      </div>

      <div class="mt-[34px] flex flex-wrap gap-2.5">
        <span class="rounded-full border-[1.5px] border-[#fbcfe8] bg-white px-4 py-1.5 text-[13px] font-medium text-[#ec4899]">ASP.NET Core</span>
        <span class="rounded-full border-[1.5px] border-[#fbcfe8] bg-white px-4 py-1.5 text-[13px] font-medium text-[#ec4899]">Clean Architecture</span>
        <span class="rounded-full border-[1.5px] border-[#fbcfe8] bg-white px-4 py-1.5 text-[13px] font-medium text-[#ec4899]">Microservices</span>
        <span class="rounded-full border-[1.5px] border-[#fbcfe8] bg-white px-4 py-1.5 text-[13px] font-medium text-[#ec4899]">CQRS · DDD</span>
      </div>
    </div>

    <div class="relative rounded-[32px] border border-[#f6d9ea] bg-white p-2 shadow-[0_30px_70px_-25px_rgba(236,72,153,0.27)]">
      <div class="rounded-[26px] bg-card-grad px-7 py-[34px]">
        <div class="relative h-[150px] w-[150px]">
          <span class="absolute inset-[-9px] rounded-full border-[2.5px] border-dashed border-[#fbcfe8] animate-avatar-spin"></span>
          <div class="relative h-[150px] w-[150px] overflow-hidden rounded-full border-4 border-white bg-avatar-grad shadow-[0_14px_32px_-10px_rgba(236,72,153,0.4)]">
           <img src="<?php echo site_url('portfolio/image/blind.jpg'); ?>"
     alt="Arezoo Roshani" class="h-full w-full object-cover" onerror="this.style.display='none'; this.parentElement.classList.add('flex','items-center','justify-center','font-head','text-[44px]','font-semibold','text-white'); this.parentElement.textContent='AR';">
          </div>
        </div>
        <h3 class="mt-[18px] font-head text-[22px] text-[#4a2545]">Arezoo Roshani</h3>
        <p class="mt-1 text-sm text-[#8d7391]">ASP.NET Core Developer</p>
        <span class="mt-4 inline-flex items-center gap-1.5 rounded-full bg-[#dcfce7] px-3.5 py-1.5 text-[12.5px] font-semibold text-[#16a34a] before:inline-block before:h-1.5 before:w-1.5 before:rounded-full before:bg-[#16a34a] before:content-['']">Open to opportunities</span>
        <div class="mt-[22px] flex flex-wrap gap-2">
          <span class="rounded-lg border border-[#f6d9ea] bg-white px-[11px] py-[5px] text-[11.5px] font-semibold text-[#ec4899]">C#</span>
          <span class="rounded-lg border border-[#f6d9ea] bg-white px-[11px] py-[5px] text-[11.5px] font-semibold text-[#ec4899]">.NET</span>
          <span class="rounded-lg border border-[#f6d9ea] bg-white px-[11px] py-[5px] text-[11.5px] font-semibold text-[#ec4899]">EF Core</span>
          <span class="rounded-lg border border-[#f6d9ea] bg-white px-[11px] py-[5px] text-[11.5px] font-semibold text-[#ec4899]">Docker</span>
          <span class="rounded-lg border border-[#f6d9ea] bg-white px-[11px] py-[5px] text-[11.5px] font-semibold text-[#ec4899]">Redis</span>
        </div>
        <p class="mt-[26px] border-t border-dashed border-[#fbcfe8] pt-5 font-script text-lg leading-[1.4] text-[#a78bfa]">"every judgment is shaped by a story we were never fully told."🌷</p>
      </div>
    </div>
  </div>
</section>

<div class="h-4 bg-scallop bg-[length:20px_16px] bg-repeat-x bg-top opacity-80"></div>

<section id="about" class="relative py-[100px]">
  <span class="absolute right-[6%] top-[6%] text-xl opacity-70 animate-float-y">🌷</span>
  <span class="absolute bottom-[8%] left-[2%] text-xl opacity-70 animate-float-y [animation-delay:2.2s]">💻</span>
  <div class="mx-auto grid max-w-[1160px] grid-cols-1 gap-[38px] px-[26px] min-[900px]:grid-cols-[0.85fr_1.15fr]">
    <div>
      <p class="mb-2 font-script text-xl text-[#ec4899]">about me</p>
      <h2 class="font-head text-[clamp(30px,4vw,42px)] font-bold text-[#4a2545]">Engineering with purpose 🌸</h2>
    </div>
    <div>
      <p class="mb-[18px] text-[16.5px] leading-[1.85] text-[#8d7391]">I'm a <b class="font-semibold text-[#4a2545]">Computer Engineering student</b> focused on backend development and software architecture, mainly working on maintainable, scalable applications built with ASP.NET Core.</p>
      <p class="mb-[18px] text-[16.5px] leading-[1.85] text-[#8d7391]">My approach centers on <b class="font-semibold text-[#4a2545]">separation of concerns</b>, domain-driven design, and clean code: patterns that let a system keep evolving without becoming harder to maintain over time.</p>
      <div class="mt-1.5 grid grid-cols-2 gap-3.5">
        <div class="rounded-2xl border border-[#f6d9ea] bg-white p-5 transition hover:-translate-y-[3px] hover:border-[#ec4899]">
          <p class="font-script text-base text-[#ec4899]">focus</p>
          <p class="mt-1.5 text-[15px] font-semibold text-[#4a2545]">Backend Engineering</p>
        </div>
        <div class="rounded-2xl border border-[#f6d9ea] bg-white p-5 transition hover:-translate-y-[3px] hover:border-[#ec4899]">
          <p class="font-script text-base text-[#ec4899]">specialty</p>
          <p class="mt-1.5 text-[15px] font-semibold text-[#4a2545]">.NET Architecture</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="h-4 bg-scallop bg-[length:20px_16px] bg-repeat-x bg-top opacity-80"></div>

<section id="expertise" class="relative py-[100px]">
  <span class="absolute left-[4%] top-[2%] text-xl opacity-70 animate-float-y [animation-delay:.8s]">💻</span>
  <span class="absolute bottom-[4%] right-[3%] text-xl opacity-70 animate-float-y [animation-delay:1.6s]">🌟</span>
  <div class="mx-auto max-w-[1160px] px-[26px]">
    <div class="mb-[50px] max-w-[640px]">
      <p class="mb-2 font-script text-xl text-[#ec4899]">what i do</p>
      <h2 class="font-head text-[clamp(30px,4vw,42px)] font-bold text-[#4a2545]">Backend &amp; architecture</h2>
      <p class="mt-3.5 text-base leading-[1.75] text-[#8d7391]">Technologies and architectural approaches I rely on to design reliable, maintainable software systems.</p>
    </div>
    <div class="grid grid-cols-1 gap-[18px] min-[800px]:grid-cols-2">
      <div class="rounded-[22px] border border-[#f6d9ea] bg-white p-[30px] transition duration-300 hover:-translate-y-[5px] hover:border-[#fbcfe8] hover:shadow-[0_20px_40px_-18px_rgba(236,72,153,0.33)]">
        <div class="flex h-[46px] w-[46px] items-center justify-center rounded-2xl bg-ico-grad text-xl">🌐</div>
        <h3 class="mt-4 font-head text-[21px] font-semibold text-[#4a2545]">ASP.NET Core</h3>
        <p class="mt-[9px] text-[14.5px] leading-[1.7] text-[#8d7391]">Designing RESTful APIs, backend services, and scalable application architectures.</p>
        <div class="mt-[15px] flex flex-wrap gap-[7px]">
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">C#</span>
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">Web API</span>
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">EF Core</span>
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">REST</span>
        </div>
      </div>
      <div class="rounded-[22px] border border-[#f6d9ea] bg-white p-[30px] transition duration-300 hover:-translate-y-[5px] hover:border-[#fbcfe8] hover:shadow-[0_20px_40px_-18px_rgba(236,72,153,0.33)]">
        <div class="flex h-[46px] w-[46px] items-center justify-center rounded-2xl bg-ico-grad text-xl">🧩</div>
        <h3 class="mt-4 font-head text-[21px] font-semibold text-[#4a2545]">Clean Architecture</h3>
        <p class="mt-[9px] text-[14.5px] leading-[1.7] text-[#8d7391]">Structuring applications around separation of concerns and independent business logic.</p>
        <div class="mt-[15px] flex flex-wrap gap-[7px]">
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">Domain</span>
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">Application</span>
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">Infrastructure</span>
        </div>
      </div>
      <div class="rounded-[22px] border border-[#f6d9ea] bg-white p-[30px] transition duration-300 hover:-translate-y-[5px] hover:border-[#fbcfe8] hover:shadow-[0_20px_40px_-18px_rgba(236,72,153,0.33)]">
        <div class="flex h-[46px] w-[46px] items-center justify-center rounded-2xl bg-ico-grad text-xl">🔗</div>
        <h3 class="mt-4 font-head text-[21px] font-semibold text-[#4a2545]">Microservices</h3>
        <p class="mt-[9px] text-[14.5px] leading-[1.7] text-[#8d7391]">Building independently deployable services with clear boundaries and communication patterns.</p>
        <div class="mt-[15px] flex flex-wrap gap-[7px]">
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">Docker</span>
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">Redis</span>
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">REST</span>
        </div>
      </div>
      <div class="rounded-[22px] border border-[#f6d9ea] bg-white p-[30px] transition duration-300 hover:-translate-y-[5px] hover:border-[#fbcfe8] hover:shadow-[0_20px_40px_-18px_rgba(236,72,153,0.33)]">
        <div class="flex h-[46px] w-[46px] items-center justify-center rounded-2xl bg-ico-grad text-xl">🧠</div>
        <h3 class="mt-4 font-head text-[21px] font-semibold text-[#4a2545]">DDD &amp; CQRS</h3>
        <p class="mt-[9px] text-[14.5px] leading-[1.7] text-[#8d7391]">Applying domain-driven concepts and separating read and write responsibilities for complex systems.</p>
        <div class="mt-[15px] flex flex-wrap gap-[7px]">
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">MediatR</span>
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">Aggregates</span>
          <span class="rounded-full bg-[#e9d8fd] px-3 py-[5px] text-[11.5px] font-semibold text-[#a78bfa]">Commands</span>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="h-4 bg-scallop bg-[length:20px_16px] bg-repeat-x bg-top opacity-80"></div>

<section id="architecture" class="relative py-[100px]">
  <span class="absolute right-[8%] top-[4%] text-xl opacity-70 animate-float-y [animation-delay:.4s]">🧷</span>
  <span class="absolute bottom-[6%] left-[6%] text-xl opacity-70 animate-float-y [animation-delay:2.8s]">🎈</span>
  <div class="mx-auto max-w-[1160px] px-[26px]">
    <div class="mx-auto mb-[50px] max-w-[640px] text-center">
      <p class="mb-2 font-script text-xl text-[#ec4899]">how i think</p>
      <h2 class="font-head text-[clamp(30px,4vw,42px)] font-bold text-[#4a2545]">Layers of a system</h2>
      <p class="mx-auto mt-3.5 text-base leading-[1.75] text-[#8d7391]">A layered approach that keeps business logic independent from frameworks, infrastructure, and delivery mechanisms.</p>
    </div>
    <div class="rounded-[28px] border border-[#f6d9ea] bg-white p-5 min-[600px]:p-10">
      <svg class="block w-full" viewBox="0 0 900 460" xmlns="http://www.w3.org/2000/svg">
        <rect x="330" y="20" width="240" height="90" rx="18" fill="#fce7f3" stroke="#ec4899" stroke-width="1.5"/>
        <text x="450" y="52" text-anchor="middle" fill="#ec4899" font-family="Poppins" font-weight="600" font-size="11">CORE</text>
        <text x="450" y="76" text-anchor="middle" fill="#4a2545" font-family="Fredoka" font-size="19" font-weight="600">DOMAIN</text>
        <text x="450" y="96" text-anchor="middle" fill="#8d7391" font-family="Poppins" font-size="10">Entities · Value Objects · Aggregates</text>
        <line x1="450" y1="110" x2="450" y2="150" stroke="#f6d9ea" stroke-width="2.5"/>
        <path d="M443 148 L450 160 L457 148" fill="none" stroke="#ec4899" stroke-width="2.5" stroke-linecap="round"/>
        <rect x="280" y="160" width="340" height="90" rx="18" fill="#ede9fe" stroke="#a78bfa" stroke-width="1.5"/>
        <text x="450" y="192" text-anchor="middle" fill="#a78bfa" font-family="Poppins" font-weight="600" font-size="11">USE CASES</text>
        <text x="450" y="216" text-anchor="middle" fill="#4a2545" font-family="Fredoka" font-size="19" font-weight="600">APPLICATION</text>
        <text x="450" y="236" text-anchor="middle" fill="#8d7391" font-family="Poppins" font-size="10">CQRS · MediatR · Commands · Queries</text>
        <line x1="450" y1="250" x2="450" y2="290" stroke="#f6d9ea" stroke-width="2.5"/>
        <path d="M443 288 L450 300 L457 288" fill="none" stroke="#ec4899" stroke-width="2.5" stroke-linecap="round"/>
        <line x1="330" y1="300" x2="330" y2="330" stroke="#f6d9ea" stroke-width="2.5"/>
        <line x1="330" y1="300" x2="570" y2="300" stroke="#f6d9ea" stroke-width="2.5"/>
        <line x1="570" y1="300" x2="570" y2="330" stroke="#f6d9ea" stroke-width="2.5"/>
        <rect x="150" y="330" width="330" height="100" rx="18" fill="#fff7e6" stroke="#f6ad55" stroke-width="1.5"/>
        <text x="315" y="362" text-anchor="middle" fill="#dd8a2e" font-family="Poppins" font-weight="600" font-size="11">INFRASTRUCTURE</text>
        <text x="315" y="386" text-anchor="middle" fill="#4a2545" font-family="Fredoka" font-size="17" font-weight="600">DATA &amp; SERVICES</text>
        <text x="315" y="406" text-anchor="middle" fill="#8d7391" font-family="Poppins" font-size="10">EF Core · Redis · External APIs</text>
        <rect x="420" y="330" width="330" height="100" rx="18" fill="#fff7e6" stroke="#f6ad55" stroke-width="1.5"/>
        <text x="585" y="362" text-anchor="middle" fill="#dd8a2e" font-family="Poppins" font-weight="600" font-size="11">PRESENTATION</text>
        <text x="585" y="386" text-anchor="middle" fill="#4a2545" font-family="Fredoka" font-size="17" font-weight="600">ASP.NET CORE</text>
        <text x="585" y="406" text-anchor="middle" fill="#8d7391" font-family="Poppins" font-size="10">REST API · Auth · HTTP</text>
      </svg>
      <div class="mt-5 flex flex-wrap justify-center gap-5 text-[13px] font-medium text-[#8d7391]">
        <span class="flex items-center gap-2"><i class="inline-block h-[11px] w-[11px] rounded [background:#ec4899]"></i>Domain — core rules</span>
        <span class="flex items-center gap-2"><i class="inline-block h-[11px] w-[11px] rounded [background:#a78bfa]"></i>Application — orchestration</span>
        <span class="flex items-center gap-2"><i class="inline-block h-[11px] w-[11px] rounded [background:#f6ad55]"></i>Infrastructure &amp; delivery</span>
      </div>
    </div>
  </div>
</section>

<div class="h-4 bg-scallop bg-[length:20px_16px] bg-repeat-x bg-top opacity-80"></div>

<section id="journey" class="relative py-[100px]">
  <span class="absolute right-[5%] top-[3%] text-xl opacity-70 animate-float-y [animation-delay:1.1s]">🌸</span>
  <span class="absolute bottom-[10%] right-[14%] text-xl opacity-70 animate-float-y [animation-delay:3s]">🪄</span>
  <div class="mx-auto max-w-[1160px] px-[26px]">
    <div class="mb-[50px] max-w-[640px]">
      <p class="mb-2 font-script text-xl text-[#ec4899]">my story</p>
      <h2 class="font-head text-[clamp(30px,4vw,42px)] font-bold text-[#4a2545]">The journey so far 🌷</h2>
      <p class="mt-3.5 text-base leading-[1.75] text-[#8d7391]">A few milestones that shaped how I build software today.</p>
    </div>
    <div class="relative border-l-[3px] border-dashed border-[#fbcfe8] pl-7">
      <div class="relative pb-[38px]">
        <span class="absolute left-[-38px] top-0.5 h-4 w-4 rounded-full bg-avatar-grad shadow-[0_0_0_5px_#fff5f9,0_0_0_6px_#fbcfe8]"></span>
        <h4 class="font-head text-[19px] text-[#4a2545]">Started Computer Engineering</h4>
        <p class="mt-1.5 max-w-[520px] text-[14.5px] text-[#8d7391]">Exploring the logic behind systems, understanding not only how they work, but why they're designed the way they are.</p>
        <span class="mt-2 inline-block rounded-full bg-[#fff7e6] px-[11px] py-1 text-[11.5px] font-semibold text-[#f6ad55]">Foundations</span>
      </div>
      <div class="relative pb-[38px]">
        <span class="absolute left-[-38px] top-0.5 h-4 w-4 rounded-full bg-avatar-grad shadow-[0_0_0_5px_#fff5f9,0_0_0_6px_#fbcfe8]"></span>
        <h4 class="font-head text-[19px] text-[#4a2545]">Discovered Clean Architecture</h4>
        <p class="mt-1.5 max-w-[520px] text-[14.5px] text-[#8d7391]">Realized good architecture isn't about following rules, it's about giving code room to grow without breaking.</p>
        <span class="mt-2 inline-block rounded-full bg-[#fff7e6] px-[11px] py-1 text-[11.5px] font-semibold text-[#f6ad55]">Turning point</span>
      </div>
      <div class="relative pb-[38px]">
        <span class="absolute left-[-38px] top-0.5 h-4 w-4 rounded-full bg-avatar-grad shadow-[0_0_0_5px_#fff5f9,0_0_0_6px_#fbcfe8]"></span>
        <h4 class="font-head text-[19px] text-[#4a2545]">Built my first CQRS project</h4>
        <p class="mt-1.5 max-w-[520px] text-[14.5px] text-[#8d7391]">Separated reads from writes for the first time and never looked back, everything felt clearer.</p>
        <span class="mt-2 inline-block rounded-full bg-[#fff7e6] px-[11px] py-1 text-[11.5px] font-semibold text-[#f6ad55]">Hands-on</span>
      </div>
      <div class="relative">
        <span class="absolute left-[-38px] top-0.5 h-4 w-4 rounded-full bg-avatar-grad shadow-[0_0_0_5px_#fff5f9,0_0_0_6px_#fbcfe8]"></span>
        <h4 class="font-head text-[19px] text-[#4a2545]">Exploring microservices</h4>
        <p class="mt-1.5 max-w-[520px] text-[14.5px] text-[#8d7391]">Currently deep in Docker, Redis, and service boundaries, learning to think in distributed systems.</p>
        <span class="mt-2 inline-block rounded-full bg-[#fff7e6] px-[11px] py-1 text-[11.5px] font-semibold text-[#f6ad55]">Right now</span>
      </div>
    </div>
  </div>
</section>

<div class="h-4 bg-scallop bg-[length:20px_16px] bg-repeat-x bg-top opacity-80"></div>

<section class="relative py-[100px]">
  <span class="absolute left-[5%] top-[4%] text-xl opacity-70 animate-float-y [animation-delay:.6s]">🍩</span>
  <span class="absolute left-[6%] top-[2%] text-xl opacity-70 animate-float-y [animation-delay:1.4s]">🧸</span>
  <span class="absolute left-[86%] top-[5%] text-xl opacity-70 animate-float-y [animation-delay:1.4s]">🧸</span>
  <span class="absolute right-[6%] top-[6%] text-xl opacity-70 animate-float-y [animation-delay:2.1s]">🎧</span>
  <span class="absolute left-[68%] top-[2%] text-xl opacity-70 animate-float-y [animation-delay:1.4s]">🧸</span>
  <span class="absolute z-[5] flex h-[92px] w-[92px] items-center justify-center rounded-full bg-white text-[44px] shadow-[0_16px_34px_-10px_rgba(167,139,250,0.47),0_0_0_6px_#fff,0_0_0_8px_#fbcfe8] animate-wiggle" style="top:-30px; left:calc(50% - 46px);">🌸</span>
  <span class="absolute left-[50%] top-[2%] text-xl opacity-70 animate-float-y [animation-delay:1.4s]">🧸</span>
  <div class="mx-auto max-w-[1160px] px-[26px]">
    <div class="mx-auto mb-[50px] max-w-[640px] text-center">
      <p class="mb-2 font-script text-xl text-[#ec4899]">a little extra</p>
      <h2 class="font-head text-[clamp(30px,4vw,42px)] font-bold text-[#4a2545]">Beyond the code</h2>
    </div>
    <div class="grid grid-cols-1 gap-4 min-[700px]:grid-cols-3"> 
      <div class="rounded-[20px] border border-[#f6d9ea] bg-white p-[26px] text-center transition duration-200 hover:-translate-y-1 hover:-rotate-1 hover:shadow-[0_16px_30px_-16px_rgba(167,139,250,0.33)]">
        <div class="text-[30px]">☕</div>
        <h4 class="mt-3 font-head text-base font-semibold text-[#4a2545]">Fuel of choice</h4>
        <p class="mt-1.5 text-[13.5px] text-[#8d7391]">Coffee first, commits second.</p>
      </div> 
    
      <div class="rounded-[20px] border border-[#f6d9ea] bg-white p-[26px] text-center transition duration-200 hover:-translate-y-1 hover:-rotate-1 hover:shadow-[0_16px_30px_-16px_rgba(167,139,250,0.33)]">
        <div class="text-[30px]">📐</div>
        <h4 class="mt-3 font-head text-base font-semibold text-[#4a2545]">Favorite pattern</h4>
        <p class="mt-1.5 text-[13.5px] text-[#8d7391]">CQRS — clarity in every request.</p>
      </div> 
    
      <div class="rounded-[20px] border border-[#f6d9ea] bg-white p-[26px] text-center transition duration-200 hover:-translate-y-1 hover:-rotate-1 hover:shadow-[0_16px_30px_-16px_rgba(167,139,250,0.33)]">
        <div class="text-[30px]">🎧</div>
        <h4 class="mt-3 font-head text-base font-semibold text-[#4a2545]">Coding soundtrack</h4>
        <p class="mt-1.5 text-[13.5px] text-[#8d7391]">Lo-fi beats while refactoring.</p>
      </div> 
    
      <div class="rounded-[20px] border border-[#f6d9ea] bg-white p-[26px] text-center transition duration-200 hover:-translate-y-1 hover:-rotate-1 hover:shadow-[0_16px_30px_-16px_rgba(167,139,250,0.33)]">
        <div class="text-[30px]">📚</div>
        <h4 class="mt-3 font-head text-base font-semibold text-[#4a2545]">Currently reading</h4>
        <p class="mt-1.5 text-[13.5px] text-[#8d7391]">Domain-Driven Design, chapter by chapter.</p>
      </div> 
    
      <div class="rounded-[20px] border border-[#f6d9ea] bg-white p-[26px] text-center transition duration-200 hover:-translate-y-1 hover:-rotate-1 hover:shadow-[0_16px_30px_-16px_rgba(167,139,250,0.33)]">
        <div class="text-[30px]">🌙</div>
        <h4 class="mt-3 font-head text-base font-semibold text-[#4a2545]">Best focus hours</h4>
        <p class="mt-1.5 text-[13.5px] text-[#8d7391]">Late nights, quiet mind, clean commits.</p>
      </div> 
    
      <div class="rounded-[20px] border border-[#f6d9ea] bg-white p-[26px] text-center transition duration-200 hover:-translate-y-1 hover:-rotate-1 hover:shadow-[0_16px_30px_-16px_rgba(167,139,250,0.33)]">
        <div class="text-[30px]">💡</div>
        <h4 class="mt-3 font-head text-base font-semibold text-[#4a2545]">Motto</h4>
        <p class="mt-1.5 text-[13.5px] text-[#8d7391]">Make it work, then make it beautiful.</p>
      </div> 
    </div>
</section>

<section class="relative py-[100px]">
  <span class="absolute left-[6%] top-[2%] text-xl opacity-70 animate-float-y [animation-delay:1.4s]">🧸</span>
  <span class="absolute bottom-[6%] right-[5%] text-xl opacity-70 animate-float-y [animation-delay:.2s]">✨</span>
  <span class="absolute left-[38%] top-[8%] text-xl opacity-70 animate-float-y [animation-delay:1.4s]">🧸</span>
  <span class="absolute left-[60%] top-[22%] text-xl opacity-70 animate-float-y [animation-delay:1.4s]">🧸</span>
  <span class="absolute left-[90%] top-[2%] text-xl opacity-70 animate-float-y [animation-delay:1.4s]">🧸</span>
  <div class="mx-auto max-w-[1160px] px-[26px]">
    <div class="mx-auto mb-[50px] max-w-[640px] text-center">
      <p class="mb-2 font-script text-xl text-[#ec4899]">toolbox</p>
      <h2 class="font-head text-[clamp(30px,4vw,42px)] font-bold text-[#4a2545]">Technology stack</h2>
    </div>
    <div class="grid grid-cols-2 gap-3 min-[640px]:grid-cols-4 min-[900px]:grid-cols-5">
      <div class="rounded-2xl border border-[#f6d9ea] bg-white p-5 text-center transition hover:-translate-y-[3px] hover:border-[#ec4899]"><b class="font-head text-base text-[#ec4899]">C#</b><span class="mt-1.5 block text-[11px] text-[#8d7391]">Language</span></div>
      <div class="rounded-2xl border border-[#f6d9ea] bg-white p-5 text-center transition hover:-translate-y-[3px] hover:border-[#ec4899]"><b class="font-head text-base text-[#ec4899]">.NET</b><span class="mt-1.5 block text-[11px] text-[#8d7391]">Framework</span></div>
      <div class="rounded-2xl border border-[#f6d9ea] bg-white p-5 text-center transition hover:-translate-y-[3px] hover:border-[#ec4899]"><b class="font-head text-base text-[#ec4899]">Docker</b><span class="mt-1.5 block text-[11px] text-[#8d7391]">Containers</span></div>
      <div class="rounded-2xl border border-[#f6d9ea] bg-white p-5 text-center transition hover:-translate-y-[3px] hover:border-[#ec4899]"><b class="font-head text-base text-[#ec4899]">Redis</b><span class="mt-1.5 block text-[11px] text-[#8d7391]">Caching</span></div>
      <div class="rounded-2xl border border-[#f6d9ea] bg-white p-5 text-center transition hover:-translate-y-[3px] hover:border-[#ec4899]"><b class="font-head text-base text-[#ec4899]">SQL</b><span class="mt-1.5 block text-[11px] text-[#8d7391]">Database</span></div>
      <div class="rounded-2xl border border-[#f6d9ea] bg-white p-5 text-center transition hover:-translate-y-[3px] hover:border-[#ec4899]"><b class="font-head text-base text-[#ec4899]">EF Core</b><span class="mt-1.5 block text-[11px] text-[#8d7391]">ORM</span></div>
      <div class="rounded-2xl border border-[#f6d9ea] bg-white p-5 text-center transition hover:-translate-y-[3px] hover:border-[#ec4899]"><b class="font-head text-base text-[#ec4899]">CQRS</b><span class="mt-1.5 block text-[11px] text-[#8d7391]">Pattern</span></div>
      <div class="rounded-2xl border border-[#f6d9ea] bg-white p-5 text-center transition hover:-translate-y-[3px] hover:border-[#ec4899]"><b class="font-head text-base text-[#ec4899]">DDD</b><span class="mt-1.5 block text-[11px] text-[#8d7391]">Design</span></div>
      <div class="rounded-2xl border border-[#f6d9ea] bg-white p-5 text-center transition hover:-translate-y-[3px] hover:border-[#ec4899]"><b class="font-head text-base text-[#ec4899]">Git</b><span class="mt-1.5 block text-[11px] text-[#8d7391]">Versioning</span></div>
      <div class="rounded-2xl border border-[#f6d9ea] bg-white p-5 text-center transition hover:-translate-y-[3px] hover:border-[#ec4899]"><b class="font-head text-base text-[#ec4899]">REST</b><span class="mt-1.5 block text-[11px] text-[#8d7391]">API</span></div>
    </div>
  </div>
</section>

<section id="contact" class="py-[100px]">
  <div class="mx-auto max-w-[1160px] px-[26px]">
    <div class="relative overflow-hidden rounded-[32px] border border-[#f6d9ea] bg-contact-bg-grad px-[30px] py-[70px] text-center">
      <span class="absolute left-[8%] top-[10%] text-xl opacity-70 animate-float-y">✨</span>
      <span class="absolute left-[6%] top-[15%] text-xl opacity-70 animate-float-y [animation-delay:1.4s]">🧸</span>
      <span class="absolute right-[10%] top-[70%] text-xl opacity-70 animate-float-y [animation-delay:1.5s]">🎀</span>
      <span class="absolute right-[30%] top-[80%] text-xl opacity-70 animate-float-y [animation-delay:1.5s]">🎀</span>
      <h2 class="relative z-[1] font-head text-[clamp(30px,5vw,46px)] font-bold text-[#4a2545]">Let's build <span class="bg-contact-grad bg-clip-text text-transparent">something meaningful.</span></h2>
      <p class="relative z-[1] mx-auto mt-4 max-w-[460px] text-base text-[#8d7391]">Interested in discussing software development, backend engineering, or a new project? I'd like to hear from you.</p>
      <a href="<?php echo site_url('portfolio/contact'); ?>" class="relative z-[1] mt-[34px] inline-flex items-center gap-2.5 rounded-full bg-cta-grad px-10 py-[17px] text-[16.5px] font-bold text-white shadow-[0_16px_34px_-10px_rgba(236,72,153,0.53)] transition duration-300 hover:-translate-y-1 hover:scale-[1.03] hover:shadow-[0_20px_40px_-10px_rgba(236,72,153,0.67)]">Get In Touch 💌</a>
    </div>
  </div>
</section>
</main>

<footer class="border-t border-[#f6d9ea] py-[30px]">
  <div class="mx-auto flex max-w-[1160px] flex-col items-center gap-4 px-[26px] text-center text-[13px] text-[#8d7391] min-[700px]:flex-row min-[700px]:justify-between">

    <div>© 2026 Arezoo Roshani</div>

    <div class="flex gap-5">
      <a href="#" class="font-medium transition hover:text-[#ec4899]">GitHub</a>
      <a href="#" class="font-medium transition hover:text-[#ec4899]">LinkedIn</a>
      <a href="#" class="font-medium transition hover:text-[#ec4899]">Instagram</a>
    </div>

    <a href="#home" class="font-script text-lg text-[#ec4899] transition hover:opacity-70">
      back to top ↑
    </a>

  </div>
</footer>

</body>
</html>
