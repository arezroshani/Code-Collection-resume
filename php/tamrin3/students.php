<?php

require __DIR__ . "/config.php";

$schoolName    = "Tiffany School";
$schoolTagline = "LEARN · PLAY · SHINE ✨";
$currentYear   = date("Y");
$perPage       = 6;


$q = trim((string)($_GET['q'] ?? ''));

if (function_exists('mb_substr')) {
    $q = mb_substr($q, 0, 60, 'UTF-8');
} else {
    $q = substr($q, 0, 60);
}

$page = max(1, (int)($_GET['page'] ?? 1));

$students = [];
$total    = 0;
$pages    = 1;
$dbError  = false;


try {
    if (!isset($conn) || !($conn instanceof mysqli)) {
        throw new RuntimeException('MySQLi connection is not available.');
    }

    
    $like = '%' . addcslashes($q, '\\%_') . '%';

    if ($q !== '') {
       
        $count = $conn->prepare(
            "SELECT COUNT(*)
             FROM students
             WHERE CONCAT(first_name, ' ', last_name) LIKE ?
                OR CONCAT(last_name, ' ', first_name) LIKE ?
                OR tracking_code LIKE ?"
        );

        $count->bind_param("sss", $like, $like, $like);
    } else {
        $count = $conn->prepare(
            "SELECT COUNT(*) FROM students"
        );
    }

    $count->execute();
    $count->bind_result($totalResult);
    $count->fetch();
    $count->close();

    $total = (int)$totalResult;

    
    $pages = max(1, (int)ceil($total / $perPage));
    $page = min($page, $pages);
    $offset = ($page - 1) * $perPage;

    
    if ($q !== '') {
        $stmt = $conn->prepare(
            "SELECT *
             FROM students
             WHERE CONCAT(first_name, ' ', last_name) LIKE ?
                OR CONCAT(last_name, ' ', first_name) LIKE ?
                OR tracking_code LIKE ?
             ORDER BY created_at DESC, id DESC
             LIMIT ? OFFSET ?"
        );

        $stmt->bind_param(
            "sssii",
            $like,
            $like,
            $like,
            $perPage,
            $offset
        );
    } else {
        $stmt = $conn->prepare(
            "SELECT *
             FROM students
             ORDER BY created_at DESC, id DESC
             LIMIT ? OFFSET ?"
        );

        $stmt->bind_param("ii", $perPage, $offset);
    }

    $stmt->execute();

    $result = $stmt->get_result();
    $students = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

} catch (Throwable $e) {
    $dbError = true;
    error_log("Students page error: " . $e->getMessage());
}


function e($value)
{
    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

function pageUrl($pageNumber, $search)
{
    $params = ['page' => $pageNumber];

    if ($search !== '') {
        $params['q'] = $search;
    }

    return 'students.php?' . http_build_query($params);
}

function ageFrom($date)
{
    if (empty($date)) {
        return '?';
    }

    try {
        return (new DateTime('today'))
            ->diff(new DateTime($date))
            ->y;
    } catch (Throwable $e) {
        return '?';
    }
}

function displayDate($value, $format)
{
    if (empty($value)) {
        return '—';
    }

    try {
        return (new DateTime($value))->format($format);
    } catch (Throwable $e) {
        return '—';
    }
}


function pageWindow($current, $last)
{
    $result = [1];

    for ($i = $current - 2; $i <= $current + 2; $i++) {
        if ($i > 1 && $i < $last) {
            $result[] = $i;
        }
    }

    if ($last > 1) {
        $result[] = $last;
    }

    $result = array_values(array_unique($result));
    sort($result);

    return $result;
}

$from = $total > 0 ? (($page - 1) * $perPage + 1) : 0;
$to   = $total > 0 ? min($total, $page * $perPage) : 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

<title>Registered Students | <?= e($schoolName) ?> ✨</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./dist/output.css">
<script src="https://cdn.tailwindcss.com"></script>

<script>
tailwind.config = {
  theme: {
    extend: {
      fontFamily: {
        baloo: ['"Baloo 2"', 'cursive'],
        quick: ['Quicksand', 'sans-serif']
      },
      colors: {
        navy: '#241b4d',
        brand: {
          50:'#f6f2ff',100:'#ece0ff',200:'#d9c4ff',
          300:'#bd97ff',400:'#a06bff',500:'#8438f5',
          600:'#7226dd',700:'#5f1cb8',800:'#4e1a93',
          900:'#3c1670'
        },
        sun: {
          50:'#fff9eb',100:'#ffefc3',300:'#ffd866',
          400:'#ffc531',500:'#f7a712',600:'#dc8a08'
        },
        coral: {
          300:'#ffb3c0',400:'#ff8fa3',
          500:'#ff6b88',600:'#ef4463'
        },
        mint: {
          300:'#9ee8c8',400:'#5fd3a3',500:'#2bb787'
        },
        sky: {
          300:'#9fd8ff',400:'#6fc0ff',500:'#3fa6f7'
        }
      },
      boxShadow: {
        soft:'0 20px 50px -20px rgba(36,27,77,.3)',
        glow:'0 0 0 10px rgba(255,197,49,.18)'
      }
    }
  }
};
</script>

<style>
body{font-family:'Quicksand',sans-serif}
h1,h2,h3,.baloo{font-family:'Baloo 2',cursive}
html{scroll-behavior:smooth}

.blob{
  position:absolute;
  border-radius:50%;
  filter:blur(70px);
  pointer-events:none
}

.float{animation:float 5s ease-in-out infinite}
.float-slow{animation:float 8s ease-in-out infinite}

@keyframes float{
  0%,100%{transform:translateY(0) rotate(var(--r,0deg))}
  50%{transform:translateY(-16px) rotate(calc(var(--r,0deg) + 8deg))}
}

.wiggle{animation:wiggle 2.6s ease-in-out infinite}

@keyframes wiggle{
  0%,100%{transform:rotate(-6deg)}
  50%{transform:rotate(6deg) scale(1.08)}
}

::selection{background:#ffd866;color:#241b4d}

.brand-title,.grad-text{
  background:linear-gradient(90deg,#7226dd 0%,#ff6b88 55%,#f7a712 100%);
  -webkit-background-clip:text;
  background-clip:text;
  color:transparent;
  -webkit-text-fill-color:transparent
}

.brand-title{
  letter-spacing:.01em;
  filter:drop-shadow(0 2px 0 rgba(255,255,255,.9))
}

.glass{
  background:rgba(255,255,255,.85);
  backdrop-filter:blur(14px);
  -webkit-backdrop-filter:blur(14px)
}

.field{
  width:100%;
  background:#fff;
  border:3px solid #ece0ff;
  border-radius:1.1rem;
  padding:.95rem 1.1rem;
  font-weight:600;
  color:#241b4d;
  outline:none;
  transition:border-color .25s,box-shadow .25s
}

.field::placeholder{
  color:rgba(36,27,77,.35);
  font-weight:500
}

.field:focus{
  border-color:#a06bff;
  box-shadow:0 0 0 6px rgba(160,107,255,.18)
}

.student-card{
  transition:transform .35s ease,box-shadow .35s ease;
  animation:cardIn .6s ease both
}

.student-card:hover{
  transform:translateY(-8px);
  box-shadow:0 22px 45px rgba(36,27,77,.16)
}

@keyframes cardIn{
  from{opacity:0;transform:translateY(24px)}
  to{opacity:1;transform:none}
}

.info-row{
  display:flex;
  gap:.7rem;
  align-items:flex-start;
  font-size:.85rem;
  font-weight:600;
  color:rgba(36,27,77,.7);
  overflow-wrap:anywhere
}

.info-row .ic{
  width:1.9rem;
  height:1.9rem;
  border-radius:.7rem;
  background:#f6f2ff;
  display:grid;
  place-items:center;
  flex-shrink:0;
  font-size:.95rem
}

.pg{
  min-width:2.9rem;
  height:2.9rem;
  padding:0 .9rem;
  display:inline-flex;
  align-items:center;
  justify-content:center;
  border-radius:1rem;
  border:3px solid #ece0ff;
  background:#fff;
  font-family:'Baloo 2',cursive;
  font-weight:800;
  color:#4e1a93;
  transition:all .25s ease
}

.pg:hover{
  transform:translateY(-3px);
  border-color:#a06bff;
  background:#f6f2ff
}

.pg.active{
  background:linear-gradient(135deg,#8438f5,#5f1cb8);
  border-color:#8438f5;
  color:#fff;
  box-shadow:0 12px 24px -10px rgba(95,28,184,.6);
  pointer-events:none
}

.pg.disabled{
  opacity:.4;
  pointer-events:none
}

.pg-dots{
  display:inline-flex;
  align-items:center;
  padding:0 .3rem;
  font-weight:800;
  color:#bd97ff
}

@media(prefers-reduced-motion:reduce){
  *{animation:none!important;transition:none!important}
}
</style>
</head>

<body class="bg-[#fbf7ff] text-navy antialiased overflow-x-hidden" id="top">

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

    <svg viewBox="0 0 24 24" class="w-7 h-7 text-sun-300" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
      <path d="M3 9.5L12 4l9 5.5-9 5.5-9-5.5Z"/>
      <path d="M7 12v5c0 1.5 2.5 3 5 3s5-1.5 5-3v-5"/>
      <path d="M20 9.5v6"/>
    </svg>

  </span>

  <span class="leading-none baloo">

    <span class="flex items-center gap-1.5">
      <span class="brand-title block font-extrabold text-2xl sm:text-[28px] tracking-tight"><?= e($schoolName) ?></span>
      <span class="text-lg sm:text-xl wiggle inline-block">✨</span>
    </span>

    <span class="block mt-1 text-[10px] font-bold text-brand-500 tracking-[0.28em]"><?= e($schoolTagline) ?></span>

  </span>

</a>

<div class="hidden lg:flex items-center gap-1 bg-brand-50/70 rounded-full p-1.5 baloo text-sm font-semibold">

  <a href="index.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">Home</a>
  <a href="about.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">About Us</a>
  <a href="contact.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">Contact</a>
  <a href="pre-registration.php" class="px-5 py-2.5 rounded-full text-navy/70 hover:text-brand-700 transition">Pre-Registration</a>
  <a href="students.php" class="px-5 py-2.5 rounded-full bg-white text-brand-700 shadow-sm">Students</a>

</div>

<a href="pre-registration.php" class="hidden sm:inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-navy font-bold text-sm px-6 py-3 rounded-full shadow-glow transition baloo">
  Enroll Now 🎉
</a>

</nav>
</header>

<main>


<section class="relative max-w-7xl mx-auto px-5 lg:px-8 pt-16 pb-10 text-center">

  <span class="absolute top-6 left-6 text-4xl float wiggle" style="--r:-10deg">🎒</span>
  <span class="absolute top-8 right-8 text-4xl float-slow">📚</span>

  <span class="inline-flex items-center gap-2 bg-white border-2 border-brand-200 shadow-sm rounded-full px-4 py-2 text-xs font-bold text-brand-600 baloo">
    <span class="w-2 h-2 rounded-full bg-mint-500 animate-pulse"></span>
    PRE-REGISTERED STUDENTS 🌟
  </span>

  <h1 class="mt-7 text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] max-w-4xl mx-auto">
    Our Little <span class="grad-text">Stars</span> 🌟
  </h1>

  <p class="mt-5 text-navy/60 text-lg leading-8 max-w-2xl mx-auto font-quick">
    Every student who pre-registered through the form appears here. Search by name or tracking code.
  </p>

  <form action="students.php" method="GET" class="mt-9 max-w-2xl mx-auto flex flex-col sm:flex-row gap-3">

    <div class="relative flex-1">
      <span class="absolute left-4 top-1/2 -translate-y-1/2 text-xl">🔎</span>
      <input
        type="text"
        name="q"
        value="<?= e($q) ?>"
        maxlength="60"
        placeholder="Search student name or tracking code…"
        class="field pl-12"
      >
    </div>

    <button type="submit" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-brand-600 to-brand-800 text-white font-bold px-8 py-4 rounded-2xl shadow-soft hover:-translate-y-1 transition baloo">
      Search
    </button>

    <?php if ($q !== ''): ?>
      <a href="students.php" class="inline-flex items-center justify-center gap-2 bg-white border-2 border-brand-200 text-navy font-bold px-6 py-4 rounded-2xl hover:border-brand-400 transition baloo">
        ✖ Clear
      </a>
    <?php endif; ?>

  </form>

</section>



<section class="max-w-7xl mx-auto px-5 lg:px-8 pb-24">

<?php if ($dbError): ?>

  <div class="max-w-xl mx-auto rounded-[2rem] bg-white border-4 border-coral-300 shadow-soft p-10 text-center">
    <p class="text-6xl">🔌</p>
    <h2 class="mt-4 text-2xl font-extrabold baloo text-coral-600">Can't reach the database</h2>
    <p class="mt-3 text-navy/60 font-quick leading-8">
      Please check that MySQL is running in XAMPP, that the settings in
      <code class="font-bold">config.php</code> are correct, and that the database table contains the required columns.
    </p>
  </div>

<?php else: ?>

  <div class="flex flex-wrap items-center justify-between gap-3 mb-8">

    <p class="font-bold baloo text-lg">
      <?php if ($q !== ''): ?>
        🔎 <?= $total ?> result<?= $total === 1 ? '' : 's' ?> for “<span class="text-brand-700"><?= e($q) ?></span>”
      <?php else: ?>
        👧👦 <?= $total ?> registered student<?= $total === 1 ? '' : 's' ?>
      <?php endif; ?>
    </p>

    <?php if ($total > 0): ?>
      <p class="text-sm font-bold text-navy/45 font-quick">
        Showing <?= $from ?>–<?= $to ?> · Page <?= $page ?> of <?= $pages ?>
      </p>
    <?php endif; ?>

  </div>

  <?php if (!$students): ?>

    <div class="max-w-xl mx-auto rounded-[2rem] bg-white border-4 border-brand-100 shadow-soft p-10 text-center">

      <p class="text-6xl float">🧸</p>

      <h2 class="mt-4 text-2xl font-extrabold baloo">
        <?= $q !== '' ? 'No student found' : 'No students yet' ?>
      </h2>

      <p class="mt-3 text-navy/60 font-quick leading-8">
        <?= $q !== '' ? 'Try another name or check the spelling.' : 'When parents fill in the pre-registration form, their children will show up here.' ?>
      </p>

      <a href="<?= $q !== '' ? 'students.php' : 'pre-registration.php#form' ?>" class="mt-6 inline-flex items-center gap-2 bg-gradient-to-r from-brand-600 to-brand-800 text-white font-bold px-7 py-3.5 rounded-2xl shadow-soft hover:-translate-y-1 transition baloo">
        <?= $q !== '' ? 'Show all students' : 'Go to the form ✏️' ?>
      </a>

    </div>

  <?php else: ?>

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-7">

    <?php foreach ($students as $i => $s):

      $girl = (($s['gender'] ?? '') === 'female');
      $ring = $girl ? 'border-coral-300/70' : 'border-sky-300';
      $avatar = $girl ? 'from-coral-300 to-coral-500' : 'from-sky-300 to-sky-500';
      $fullName = trim(($s['first_name'] ?? '') . ' ' . ($s['last_name'] ?? ''));

    ?>

      <article class="student-card rounded-[2rem] bg-white border-4 <?= $ring ?> shadow-sm p-6 relative overflow-hidden" style="animation-delay:<?= (int)$i * 0.07 ?>s">

        <div class="absolute -top-10 -right-10 w-32 h-32 rounded-full bg-sun-300/25"></div>

        <div class="relative flex items-center gap-4">

          <span class="w-16 h-16 rounded-[1.4rem] bg-gradient-to-br <?= $avatar ?> grid place-items-center text-4xl shadow-soft">
            <?= $girl ? '👧' : '👦' ?>
          </span>

          <div class="min-w-0">

            <h3 class="font-extrabold text-xl baloo leading-tight truncate">
              <?= e($fullName) ?>
            </h3>

            <p class="text-xs font-bold text-navy/45 font-quick">
              <?= e(ageFrom($s['birth_date'] ?? '')) ?> years old ·
              <?= e(displayDate($s['birth_date'] ?? '', 'M j, Y')) ?>
            </p>

          </div>

        </div>

        <div class="relative mt-4 flex flex-wrap gap-2">

          <span class="bg-brand-100 text-brand-700 text-xs font-extrabold px-3 py-1 rounded-full baloo">
            🎓 <?= e($s['grade'] ?? '') ?>
          </span>

          <span class="bg-sun-100 text-sun-600 text-xs font-extrabold px-3 py-1 rounded-full baloo">
            # <?= e($s['tracking_code'] ?? '') ?>
          </span>

          <?php if (!empty($s['bus'])): ?>
            <span class="bg-mint-300/40 text-mint-500 text-xs font-extrabold px-3 py-1 rounded-full baloo">
              🚌 Bus
            </span>
          <?php endif; ?>

        </div>

        <div class="relative mt-5 space-y-3">

          <div class="info-row">
            <span class="ic">👪</span>
            <span>
              <?= e($s['parent_name'] ?? '') ?>
              <span class="text-navy/40">(<?= e($s['relation'] ?? '') ?>)</span>
            </span>
          </div>

          <div class="info-row">
            <span class="ic">📞</span>
            <a href="tel:<?= e(preg_replace('/[^0-9+]/', '', (string)($s['phone'] ?? ''))) ?>" class="hover:underline">
              <?= e($s['phone'] ?? '') ?>
            </a>
          </div>

          <div class="info-row">
            <span class="ic">✉️</span>
            <a href="mailto:<?= e($s['email'] ?? '') ?>" class="hover:underline break-all">
              <?= e($s['email'] ?? '') ?>
            </a>
          </div>

          <div class="info-row">
            <span class="ic">📍</span>
            <span><?= e($s['city'] ?? '') ?> — <?= e($s['address'] ?? '') ?></span>
          </div>

          <?php if (!empty($s['previous_school'])): ?>
            <div class="info-row">
              <span class="ic">🏫</span>
              <span>Previous: <?= e($s['previous_school']) ?></span>
            </div>
          <?php endif; ?>

          <?php if (!empty($s['notes'])): ?>
            <div class="info-row">
              <span class="ic">📝</span>
              <span><?= e($s['notes']) ?></span>
            </div>
          <?php endif; ?>

        </div>

        <p class="relative mt-5 pt-4 border-t-2 border-dashed border-brand-100 text-xs font-bold text-navy/40 font-quick">

          🕒 Registered
          <?= e(displayDate($s['created_at'] ?? '', 'M j, Y · g:i A')) ?>

          <?php if (!empty($s['heard_about'])): ?>
            · via <?= e($s['heard_about']) ?>
          <?php endif; ?>

        </p>

      </article>

    <?php endforeach; ?>

    </div>

    <?php if ($pages > 1): ?>

      <nav class="mt-14 flex flex-wrap items-center justify-center gap-2" aria-label="Pagination">

        <a
          href="<?= e(pageUrl(1, $q)) ?>"
          class="pg <?= $page === 1 ? 'disabled' : '' ?>"
          title="First page"
          aria-label="First page"
        >« First</a>

        <a
          href="<?= e(pageUrl(max(1, $page - 1), $q)) ?>"
          class="pg <?= $page === 1 ? 'disabled' : '' ?>"
          aria-label="Previous page"
        >‹ Prev</a>

        <?php
        $prevShown = 0;

        foreach (pageWindow($page, $pages) as $p):

          if ($prevShown && $p - $prevShown > 1):
        ?>
            <span class="pg-dots">…</span>
        <?php
          endif;
        ?>

          <a
            href="<?= e(pageUrl($p, $q)) ?>"
            class="pg <?= $p === $page ? 'active' : '' ?>"
            <?= $p === $page ? 'aria-current="page"' : '' ?>
          ><?= $p ?></a>

        <?php
          $prevShown = $p;
        endforeach;
        ?>

        <a
          href="<?= e(pageUrl(min($pages, $page + 1), $q)) ?>"
          class="pg <?= $page === $pages ? 'disabled' : '' ?>"
          aria-label="Next page"
        >Next ›</a>

        <a
          href="<?= e(pageUrl($pages, $q)) ?>"
          class="pg <?= $page === $pages ? 'disabled' : '' ?>"
          title="Last page"
          aria-label="Last page"
        >Last »</a>

      </nav>

    <?php endif; ?>

  <?php endif; ?>

<?php endif; ?>

</section>
</main>

<footer class="relative bg-navy text-white/70 overflow-hidden">

  <div class="h-1.5 w-full bg-gradient-to-r from-brand-500 via-coral-400 to-sun-400"></div>

  <div class="max-w-7xl mx-auto px-5 lg:px-8 py-8 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-white/45 font-quick">

    <p>© <?= e($currentYear) ?> <?= e($schoolName) ?> ✨</p>

    <div class="flex items-center gap-6">
      <a href="index.php" class="hover:text-sun-400 transition">Home</a>
      <a href="pre-registration.php" class="hover:text-sun-400 transition">Pre-Registration</a>
      <a href="#top" class="hover:text-sun-400 transition">Back to top ↑</a>
    </div>

  </div>

</footer>

</body>
</html>