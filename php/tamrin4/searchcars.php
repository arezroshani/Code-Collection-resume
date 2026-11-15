<?php
require_once __DIR__ . "/config.php";

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

$self = basename($_SERVER['SCRIPT_NAME']);

function toLatinDigits($s) {
    $fa = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    $ar = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];
    $en = ['0','1','2','3','4','5','6','7','8','9'];
    return str_replace($ar, $en, str_replace($fa, $en, $s));
}

function colorDot($name) {
    $map = [
        'white' => '#f1f5f9', 'سفید' => '#f1f5f9',
        'black' => '#334155', 'مشکی' => '#334155',
        'red' => '#f87171',   'قرمز' => '#f87171',
        'blue' => '#60a5fa',  'آبی' => '#60a5fa',
        'green' => '#4ade80', 'سبز' => '#4ade80',
        'yellow' => '#fde047','زرد' => '#fde047',
        'silver' => '#cbd5e1','نقره‌ای' => '#cbd5e1', 'نقره ای' => '#cbd5e1',
        'gray' => '#94a3b8', 'grey' => '#94a3b8', 'خاکستری' => '#94a3b8',
        'orange' => '#fdba74','نارنجی' => '#fdba74',
        'brown' => '#a16207', 'قهوه‌ای' => '#a16207', 'قهوه ای' => '#a16207',
        'purple' => '#c084fc','بنفش' => '#c084fc',
        'pink' => '#f9a8d4',  'صورتی' => '#f9a8d4',
        'gold' => '#facc15',  'طلایی' => '#facc15',
        'beige' => '#e7d9b5', 'کرم' => '#e7d9b5',
    ];
    $key = mb_strtolower(trim($name));
    return $map[$key] ?? '#4fd69b';
}

$maxYear = (int)date('Y') + 1;

$searched = isset($_GET['production_year']) || isset($_GET['price']);

$yearRaw  = trim(toLatinDigits($_GET['production_year'] ?? ''));
$priceRaw = trim(toLatinDigits($_GET['price'] ?? ''));
$priceRaw = str_replace([',', '٬', ' '], '', $priceRaw);
$mode     = (($_GET['mode'] ?? 'exact') === 'max') ? 'max' : 'exact';

$errors  = [];
$cars    = [];
$dbError = false;

$totalCars = 0;
$totalYears = 0;

try {
    $stats = $conn->query(
        "SELECT COUNT(*) AS c,
                COUNT(DISTINCT car_model_year) AS y
         FROM cars"
    );

    $row = $stats->fetch_assoc();
    $totalCars = (int)$row['c'];
    $totalYears = (int)$row['y'];

} catch (mysqli_sql_exception $ex) {
    $dbError = true;
}

if ($searched && empty($errors)) {

    try {
        $op = ($mode === 'max') ? '<=' : '=';

        $sql = "SELECT
                    car_id AS id,
                    car_name AS name,
                    car_model_year AS production_year,
                    car_color AS color,
                    car_price AS price
                FROM cars
                WHERE car_model_year = ?
                  AND CAST(car_price AS DECIMAL(15,2)) $op ?
                ORDER BY CAST(car_price AS DECIMAL(15,2)) ASC,
                         car_id DESC";

        $stmt = $conn->prepare($sql);

        $yearValue = (string)$yearRaw;
        $priceValue = (float)$priceRaw;

        $stmt->bind_param("sd", $yearValue, $priceValue);
        $stmt->execute();

        $result = $stmt->get_result();
        $cars = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

    } catch (mysqli_sql_exception $ex) {
        $dbError = true;
    }
}

$validSearch = $searched && empty($errors) && !$dbError;

function gaugeTicks() {
    $out = '';
    for ($i = 0; $i <= 30; $i++) {
        $a   = deg2rad(-210 + $i * 8);
        $big = ($i % 5 === 0);
        $r1  = $big ? 146 : 156;
        $r2  = 168;
        $out .= sprintf(
            '<line x1="%.1F" y1="%.1F" x2="%.1F" y2="%.1F" class="%s"/>',
            200 + cos($a) * $r1, 200 + sin($a) * $r1,
            200 + cos($a) * $r2, 200 + sin($a) * $r2,
            $big ? 'tick big' : 'tick'
        );
        if ($big) {
            $out .= sprintf(
                '<text x="%.1F" y="%.1F" class="tnum" text-anchor="middle" dominant-baseline="middle">%d</text>',
                200 + cos($a) * 126, 200 + sin($a) * 126, $i / 5
            );
        }
    }
    return $out;
}

$flagColors = ['#6ee0a8', '#ffd470', '#ff9f9f', '#8ccbff', '#c5e86a', '#c3a8ff'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Car Finder · Search by year &amp; price</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Unbounded:wght@500;700;800;900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="./dist/output.css">
</head>

<body class="relative min-h-screen overflow-x-hidden antialiased">

<svg width="0" height="0" class="absolute" aria-hidden="true">
<defs>
<symbol id="car-sil" viewBox="0 0 200 90">
<path d="M10 62c0-10 6-14 16-16l22-22c4-4 9-6 15-6h59c7 0 13 3 17 8l17 18c14 2 34 6 34 18v6c0 3-2 5-5 5H15c-3 0-5-2-5-5Z" fill="currentColor" stroke="#1d6b4b" stroke-width="3" stroke-linejoin="round"/>
<path d="M56 28 40 46h52V26H62c-3 0-4 1-6 2Zm46-2v20h44l-16-16c-2-2-4-4-8-4Z" fill="#f4fffa" stroke="#1d6b4b" stroke-width="2" stroke-linejoin="round"/>
<rect x="176" y="50" width="12" height="7" rx="3.5" fill="#ffe08a"/>
<rect x="12" y="52" width="8" height="6" rx="3" fill="#ffa3a3"/>
<circle cx="54" cy="73" r="14" fill="#2f4f42"/><circle cx="54" cy="73" r="6.5" fill="#bff0d4"/>
<circle cx="150" cy="73" r="14" fill="#2f4f42"/><circle cx="150" cy="73" r="6.5" fill="#bff0d4"/>
</symbol>
</defs>
</svg>

<div class="bg-dots fixed inset-0 -z-20"></div>
<div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
<div class="glow g1"></div><div class="glow g2"></div><div class="glow g3"></div><div class="glow g4"></div>
</div>

<div class="bunting" aria-hidden="true">
<?php for ($i = 0; $i < 70; $i++): ?>
<span style="background:<?= $flagColors[$i % count($flagColors)] ?>;animation-delay:<?= -($i % 7) * 0.35 ?>s"></span>
<?php endfor; ?>
</div>

<div class="rails" aria-hidden="true">

<div class="stk l" style="top:12%;--r:-8deg;--bg:#b8f0d3;animation-delay:-.4s">
<svg viewBox="0 0 48 48"><circle cx="24" cy="24" r="17" fill="none" stroke="#1d6b4b" stroke-width="4"/><circle cx="24" cy="24" r="4.5" fill="#1d6b4b"/><path d="M24 7v12.5M9.3 32.5l10.8-6.3M38.7 32.5l-10.8-6.3" stroke="#1d6b4b" stroke-width="4" stroke-linecap="round"/></svg>
</div>

<div class="stk l sm" style="top:27%;--r:9deg;--bg:#ffe9a8;animation-delay:-1.6s">
<svg viewBox="0 0 48 48"><circle cx="15" cy="24" r="9" fill="#ffd98a" stroke="#c9922f" stroke-width="3"/><circle cx="15" cy="24" r="3" fill="#fff"/><path d="M24 24h18M35 24v7M41 24v5" stroke="#c9922f" stroke-width="4" stroke-linecap="round"/></svg>
</div>

<div class="stk l big" style="top:40%;--r:-5deg;--bg:#ffd6c0;animation-delay:-2.4s">
<svg viewBox="0 0 48 48"><path d="M24 5l11 32H13Z" fill="#ffb487"/><path d="M19.5 18h9l2 6h-13zM16 29h16l1.5 5h-19z" fill="#fff"/><rect x="8" y="37" width="32" height="6" rx="3" fill="#e98c5a"/></svg>
</div>

<div class="stk l sm" style="top:57%;--r:7deg;--bg:#c9e6ff;animation-delay:-3.1s">
<svg viewBox="0 0 48 48"><rect x="9" y="8" width="20" height="33" rx="4" fill="#6fdba8" stroke="#1d6b4b" stroke-width="3"/><rect x="13" y="13" width="12" height="9" rx="2" fill="#fff"/><path d="M29 18h4c3 0 5 2 5 5v10c0 2 3 2 3 0V19l-5-5" fill="none" stroke="#1d6b4b" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/><rect x="6" y="41" width="26" height="4" rx="2" fill="#1d6b4b"/></svg>
</div>

<div class="stk l" style="top:72%;--r:-9deg;--bg:#ddd0ff;animation-delay:-.9s">
<svg viewBox="0 0 48 48"><path d="M10 6v38" stroke="#1d6b4b" stroke-width="4" stroke-linecap="round"/><rect x="14" y="8" width="26" height="20" fill="#fff" stroke="#1d6b4b" stroke-width="2.5"/><path d="M14 8h6.5v6.67H14zM27 8h6.5v6.67H27zM20.5 14.67H27v6.66h-6.5zM33.5 14.67H40v6.66h-6.5zM14 21.33h6.5V28H14zM27 21.33h6.5V28H27z" fill="#1d6b4b"/></svg>
</div>

<div class="stk l sm" style="top:86%;--r:6deg;--bg:#b8f0d3;animation-delay:-2s">
<svg viewBox="0 0 48 48"><path d="M8 38C8 18 20 8 40 8c0 20-10 32-30 32Z" fill="#6fdba8" stroke="#1d8f5f" stroke-width="3" stroke-linejoin="round"/><path d="M10 38C18 28 26 20 34 14" stroke="#1d8f5f" stroke-width="3" stroke-linecap="round" fill="none"/></svg>
</div>

<!-- RIGHT -->
<div class="stk r sm" style="top:16%;--r:8deg;--bg:#ffe9a8;animation-delay:-1s">
<svg viewBox="0 0 48 48"><path d="M24 4l5.5 13.5L44 19l-11 9.5L36.5 43 24 35l-12.5 8L15 28.5 4 19l14.5-1.5Z" fill="#ffe08a" stroke="#c9922f" stroke-width="2.5" stroke-linejoin="round"/></svg>
</div>

<div class="stk r big" style="top:30%;--r:-7deg;--bg:#b8f0d3;animation-delay:-2.8s">
<svg viewBox="0 0 48 48"><circle cx="24" cy="24" r="18" fill="#2f4f42"/><circle cx="24" cy="24" r="11" fill="#9fe8c4"/><circle cx="24" cy="24" r="4" fill="#2f4f42"/><path d="M24 13v7M24 28v7M13 24h7M28 24h7" stroke="#2f4f42" stroke-width="2.5" stroke-linecap="round"/></svg>
</div>

<div class="stk r" style="top:46%;--r:6deg;--bg:#ffd0d0;animation-delay:-.2s">
<svg viewBox="0 0 48 48"><path d="M24 3l19 19-19 19L5 22Z" fill="#ffe08a" stroke="#c9922f" stroke-width="3" stroke-linejoin="round"/><path d="M17 26l7-8 7 8M24 18v14" stroke="#7a5a12" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
</div>

<div class="stk r wide" style="top:62%;--r:-6deg;--bg:#c9e6ff;animation-delay:-1.9s">
<svg viewBox="0 0 200 90" style="color:#6fdba8"><use href="#car-sil"/></svg>
</div>

<div class="stk r sm" style="top:78%;--r:10deg;--bg:#ddd0ff;animation-delay:-3.4s">
<svg viewBox="0 0 48 48"><circle cx="24" cy="24" r="17" fill="none" stroke="#6a4cc0" stroke-width="4"/><circle cx="24" cy="24" r="4.5" fill="#6a4cc0"/><path d="M24 7v12.5M9.3 32.5l10.8-6.3M38.7 32.5l-10.8-6.3" stroke="#6a4cc0" stroke-width="4" stroke-linecap="round"/></svg>
</div>

<div class="stk r" style="top:90%;--r:-8deg;--bg:#ffe9a8;animation-delay:-.7s">
<svg viewBox="0 0 48 48"><path d="M8 38C8 18 20 8 40 8c0 20-10 32-30 32Z" fill="#ffd98a" stroke="#c9922f" stroke-width="3" stroke-linejoin="round"/><path d="M10 38C18 28 26 20 34 14" stroke="#c9922f" stroke-width="3" stroke-linecap="round" fill="none"/></svg>
</div>

</div>

<header class="relative z-20">
<nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-6 lg:px-8">

<a href="<?= e($self) ?>" class="group flex items-center gap-3">
<span class="logo-mark grid h-12 w-12 place-items-center rounded-2xl">
<svg viewBox="0 0 200 90" class="h-7 w-9" style="color:#fff"><use href="#car-sil"/></svg>
</span>
<span class="f-display text-lg font-extrabold leading-none tracking-tight" style="color:var(--ink)">CAR<span class="accent">FINDER</span></span>
</a>

<div class="flex items-center gap-2 text-sm font-bold">
<a href="<?= e($self) ?>" class="nav-pill active">🔎 Search</a>
<a href="cars.php" class="nav-pill">＋ Add a car</a>
</div>

</nav>
</header>

<section class="relative mx-auto grid max-w-7xl items-center gap-10 px-5 pb-16 pt-6 lg:grid-cols-2 lg:px-8 lg:pt-10">

<span class="deco plus" style="left:2%;top:8%">+</span>
<span class="deco plus" style="left:46%;top:2%;animation-delay:-2s;color:#ff9f9f">+</span>
<span class="deco ring" style="left:-2%;top:52%"></span>
<span class="deco hexo" style="left:40%;top:70%"></span>
<span class="deco star" style="right:4%;top:6%">✦</span>

<div class="relative z-10">

<span class="eyebrow">
<span class="dot"></span> LIVE INVENTORY SEARCH
</span>

<h1 class="f-display mt-7 text-4xl font-black leading-[1.05] sm:text-5xl xl:text-6xl" style="color:var(--ink)">
FIND THE CAR<br>
THAT FITS YOUR<br>
<span class="grad">YEAR &amp; BUDGET</span><span class="accent">.</span>
</h1>

<p class="mt-6 max-w-lg text-lg leading-8" style="color:var(--soft)">
Type a production year and a price. We scan the whole garage and pull out every car that matches, in one click.
</p>

<div class="mt-9 flex flex-wrap gap-4">
<div class="stat"><p class="num" data-count="<?= $totalCars ?>">0</p><p class="lbl">CARS IN GARAGE</p></div>
<div class="stat"><p class="num" data-count="<?= $totalYears ?>">0</p><p class="lbl">MODEL YEARS</p></div>
<div class="stat"><p class="num">2</p><p class="lbl">SMART FILTERS</p></div>
</div>

</div>

<div class="relative mx-auto w-full max-w-[460px]">

<div class="gauge-wrap">
<div class="orbit o1"></div>
<div class="orbit o2"></div>

<svg viewBox="0 0 400 400" class="relative z-10 h-auto w-full">
<defs>
<linearGradient id="arc" x1="0" y1="1" x2="1" y2="0">
<stop offset="0" stop-color="#12b36f"/><stop offset=".55" stop-color="#7fd02f"/><stop offset="1" stop-color="#ffb703"/>
</linearGradient>
<radialGradient id="face" cx=".5" cy=".42" r=".62">
<stop offset="0" stop-color="#f4fff9"/><stop offset=".55" stop-color="#c4f3da"/><stop offset="1" stop-color="#8fe3b7"/>
</radialGradient>
<filter id="soft" x="-20%" y="-20%" width="140%" height="140%">
<feDropShadow dx="0" dy="5" stdDeviation="6" flood-color="#0e8a52" flood-opacity=".42"/>
</filter>
</defs>

<circle cx="200" cy="200" r="188" fill="url(#face)" stroke="#2fc486" stroke-width="5" filter="url(#soft)"/>
<circle cx="200" cy="200" r="176" fill="none" stroke="#1fb877" stroke-opacity=".85" stroke-dasharray="3 9" stroke-width="2.5"/>
<path d="M 59.8 307.8 A 176 176 0 1 1 340.2 307.8" fill="none" stroke="url(#arc)" stroke-width="15" stroke-linecap="round"/>

<?= gaugeTicks() ?>

<g transform="translate(130 228)" style="color:#3fcf8f"><svg width="140" height="63" viewBox="0 0 200 90"><use href="#car-sil"/></svg></g>

<text x="200" y="318" text-anchor="middle" class="gtitle">YEAR · PRICE</text>
<text x="200" y="338" text-anchor="middle" class="gsub">MATCH ENGINE</text>

<g class="needle">
<polygon points="195,200 205,200 200,50" fill="#0e9f5f" filter="url(#soft)"/>
</g>
<circle cx="200" cy="200" r="17" fill="#fff" stroke="#0e9f5f" stroke-width="5"/>
<circle cx="200" cy="200" r="6" fill="#0e9f5f"/>
</svg>
</div>

<span class="chip c1">⚡ INSTANT</span>
<span class="chip c2">🌿 EXACT MATCH</span>
<span class="chip c3">🔒 SAFE SQL</span>

</div>

</section>

<div class="ticker">
<div class="ticker-track f-display">
<?php for ($k = 0; $k < 2; $k++): ?>
<span>✦ FILTER BY YEAR</span><span>✦ FILTER BY PRICE</span><span>✦ INSTANT RESULTS</span><span>✦ PREPARED QUERIES</span><span>✦ MYSQL POWERED</span><span>✦ PHP BACKEND</span>
<?php endfor; ?>
</div>
</div>

<section class="relative z-10 mx-auto max-w-6xl px-5 pt-14 lg:px-8">

<form action="<?= e($self) ?>" method="GET" novalidate class="panel">

<span class="panel-corner tl"></span><span class="panel-corner br"></span>

<div class="mb-7 flex flex-wrap items-center justify-between gap-3">
<div>
<p class="f-display text-xl font-extrabold sm:text-2xl" style="color:var(--ink)">Search the garage</p>
<p class="mt-1 text-sm" style="color:var(--soft)">Both values are required.</p>
</div>
<span class="tag-live"><span class="dot"></span> ONLINE</span>
</div>

<div class="grid gap-5 lg:grid-cols-12">

<div class="lg:col-span-3">
<label for="production_year" class="lab">📅 Production year</label>
<div class="inp-wrap <?= isset($errors['production_year']) ? 'bad' : '' ?>">
<input id="production_year" name="production_year" type="text" inputmode="numeric" maxlength="4" placeholder="2020" value="<?= e($yearRaw) ?>" autocomplete="off">
</div>
<?php if (isset($errors['production_year'])): ?><p class="err">⚠ <?= e($errors['production_year']) ?></p><?php endif; ?>
</div>

<div class="lg:col-span-4">
<label for="price" class="lab">💰 Price</label>
<div class="inp-wrap <?= isset($errors['price']) ? 'bad' : '' ?>">
<input id="price" name="price" type="text" inputmode="decimal" placeholder="850000000" value="<?= e($priceRaw) ?>" autocomplete="off">
</div>
<?php if (isset($errors['price'])): ?><p class="err">⚠ <?= e($errors['price']) ?></p><?php endif; ?>
</div>

<div class="lg:col-span-3">
<span class="lab">🎯 Price match</span>
<div class="seg">
<label><input type="radio" name="mode" value="exact" <?= $mode === 'exact' ? 'checked' : '' ?>><span>＝ Exact</span></label>
<label><input type="radio" name="mode" value="max" <?= $mode === 'max' ? 'checked' : '' ?>><span>≤ Or less</span></label>
</div>
</div>

<div class="flex items-end gap-2 lg:col-span-2">
<button type="submit" class="go">
<span>SEARCH</span>
<svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
</button>
</div>

</div>

<?php if ($searched): ?>
<div class="mt-6 text-right">
<a href="<?= e($self) ?>" class="clear">✖ Clear search</a>
</div>
<?php endif; ?>

</form>

</section>

<main id="results" class="relative z-10 mx-auto max-w-7xl scroll-mt-6 px-5 pb-24 pt-16 lg:px-8">

<?php if ($dbError): ?>

<div class="state">
<div class="state-ico">🔌</div>
<h2 class="f-display">Can't reach the database</h2>
<p>Check that MySQL is running and that <code>config.php</code> and the <code>cars</code> table are correct.</p>
</div>

<?php elseif ($validSearch): ?>

<div class="flex flex-wrap items-end justify-between gap-5">
<div>
<p class="f-display text-sm font-bold tracking-[0.25em]" style="color:var(--mid)">SEARCH RESULTS</p>
<h2 class="f-display mt-2 text-3xl font-black sm:text-5xl" style="color:var(--ink)">
<?php if ($cars): ?>
<span class="grad" data-count="<?= count($cars) ?>">0</span> car<?= count($cars) === 1 ? '' : 's' ?> found
<?php else: ?>
Nothing found
<?php endif; ?>
</h2>
</div>
<div class="flex flex-wrap gap-3">
<span class="pill">📅 <b><?= e($yearRaw) ?></b></span>
<span class="pill">💰 <b><?= $mode === 'max' ? '≤ ' : '＝ ' ?><?= e(number_format((float)$priceRaw)) ?></b></span>
</div>
</div>

<?php if (!$cars): ?>

<div class="state mt-10">
<div class="state-ico float-y">🚙</div>
<h2 class="f-display">No car matches these values</h2>
<p>Try another year, or switch to <b class="accent">“Or less”</b> to see more cars.</p>
<a href="cars.php" class="go mt-7 inline-flex w-auto px-8"><span>ADD A CAR</span></a>
</div>

<?php else: ?>

<div class="mt-12 grid gap-8 sm:grid-cols-2 xl:grid-cols-3">
<?php foreach ($cars as $i => $c):
    $dot = colorDot($c['color']);
    $img = 'images/cars/' . (int)$c['id'] . '.jpg';
?>

<article class="car-card reveal" style="--d:<?= $i * 0.08 ?>s">
<div class="card-edge">
<div class="card-in" data-tilt>

<span class="shine-mouse"></span>

<div class="photo">

<div class="photo-fallback">
<div class="pf-grid"></div>
<svg viewBox="0 0 200 90" class="pf-car" style="color:<?= e($dot) ?>"><use href="#car-sil"/></svg>
<p class="pf-hint">📷 <?= e($img) ?></p>
</div>

<img src="<?= e($img) ?>" alt="<?= e($c['name']) ?>" loading="lazy" onerror="this.remove()">

<div class="photo-shade"></div>

<span class="badge-id">#<?= e(str_pad((string)$c['id'], 3, '0', STR_PAD_LEFT)) ?></span>
<span class="badge-year">📅 <?= e($c['production_year']) ?></span>
<span class="idx f-display"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
</div>

<div class="body">

<h3 class="f-display name"><?= e($c['name']) ?></h3>

<div class="specs">
<div class="spec">
<span class="k">YEAR</span>
<span class="v"><?= e($c['production_year']) ?></span>
</div>
<div class="spec">
<span class="k">COLOR</span>
<span class="v"><i class="swatch" style="background:<?= e($dot) ?>"></i><?= e($c['color']) ?></span>
</div>
</div>

<div class="price-row">
<div>
<p class="k">PRICE</p>
<p class="price f-display"><?= e(number_format((float)$c['price'])) ?></p>
</div>
<span class="arrow">
<svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7M8 7h9v9"/></svg>
</span>
</div>

</div>

</div>
</div>
</article>

<?php endforeach; ?>
</div>

<?php endif; ?>

<?php else: ?>

<div class="state dashed">
<div class="state-ico float-y">🌿</div>
<h2 class="f-display">Ready when you are</h2>
<p>Enter a year and a price above, then press <b class="accent">SEARCH</b> and the matching cars will appear here.</p>
</div>

<?php endif; ?>

</main>

<div class="road" aria-hidden="true">
<span class="cloud" style="left:8%;top:6px"></span>
<span class="cloud small" style="left:46%;top:14px"></span>
<span class="cloud" style="left:78%;top:4px;animation-delay:-4s"></span>
<span class="bush" style="left:5%"></span>
<span class="bush two" style="left:33%"></span>
<span class="bush" style="left:62%"></span>
<span class="bush two" style="left:91%"></span>
<div class="asphalt"><div class="lane"></div></div>
<svg viewBox="0 0 200 90" class="road-car" style="color:#ff9f9f"><use href="#car-sil"/></svg>
<svg viewBox="0 0 200 90" class="road-car two" style="color:#8ccbff"><use href="#car-sil"/></svg>
</div>

<footer class="relative z-10 py-8 text-center text-sm" style="color:var(--soft);background:#d3f5e3">
 PHP + MySQL + Tailwind
</footer>

<script>

const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
document.querySelectorAll('[data-count]').forEach(el => {
  const to = parseInt(el.dataset.count, 10) || 0;
  if (reduce || to === 0) { el.textContent = to.toLocaleString(); return; }
  const t0 = performance.now(), dur = 1200;
  const tick = (t) => {
    const p = Math.min(1, (t - t0) / dur);
    el.textContent = Math.round(to * (1 - Math.pow(1 - p, 3))).toLocaleString();
    if (p < 1) requestAnimationFrame(tick);
  };
  requestAnimationFrame(tick);
});

const io = new IntersectionObserver((list) => {
  list.forEach(en => { if (en.isIntersecting) { en.target.classList.add('show'); io.unobserve(en.target); } });
}, { threshold: .12 });
document.querySelectorAll('.reveal').forEach(el => io.observe(el));

if (!reduce && window.matchMedia('(hover: hover)').matches) {
  document.querySelectorAll('[data-tilt]').forEach(card => {
    card.addEventListener('mousemove', (ev) => {
      const r = card.getBoundingClientRect();
      const x = (ev.clientX - r.left) / r.width;
      const y = (ev.clientY - r.top) / r.height;
      card.style.setProperty('--mx', (x * 100) + '%');
      card.style.setProperty('--my', (y * 100) + '%');
      card.style.transform = 'perspective(900px) rotateX(' + ((.5 - y) * 8) + 'deg) rotateY(' + ((x - .5) * 10) + 'deg) translateZ(0)';
    });
    card.addEventListener('mouseleave', () => { card.style.transform = ''; });
  });
}

if (location.search.indexOf('production_year') !== -1) {
  const r = document.getElementById('results');
  if (r) setTimeout(() => r.scrollIntoView({ behavior: 'smooth', block: 'start' }), 150);
}
</script>

<style>
  :root{
    --bg:#eefaf3;
    --ink:#0f4a31;       
    --soft:#3f7a62;      
    --mid:#14925c;       
    --mint:#6ee0a8;
    --mint2:#3fcf8f;
    --mint3:#1fb877;
    --lime:#b7e35a;
    --butter:#ffe08a;
    --peach:#ff9f9f;
    --sky:#8ccbff;
    --line:#a9e8c8;
  }

  html{ scroll-behavior:smooth; }
  body{ font-family:'Outfit',system-ui,sans-serif; background:var(--bg); color:var(--ink); }
  .f-display{ font-family:'Unbounded','Outfit',sans-serif; }
  ::selection{ background:#6ee0a8; color:#0f4a31; }

  .accent{ color:#17a468; }
  .grad{
    background:linear-gradient(90deg,#12b36f,#7fc72d 55%,#f5a623);
    -webkit-background-clip:text; background-clip:text; color:transparent; -webkit-text-fill-color:transparent;
  }

  .bg-dots{
    background:
      radial-gradient(circle at 1px 1px, rgba(63,207,143,.38) 1.4px, transparent 1.6px) 0 0/30px 30px,
      linear-gradient(180deg,#f4fcf8 0%, #e1f7ec 45%, #f1fbf6 100%);
  }
  .glow{ position:absolute; border-radius:50%; filter:blur(80px); }
  .g1{ width:520px; height:520px; left:-160px; top:-120px; background:rgba(63,207,143,.5); }
  .g2{ width:440px; height:440px; right:-140px; top:30%; background:rgba(255,224,138,.55); }
  .g3{ width:420px; height:420px; left:28%; bottom:-120px; background:rgba(140,203,255,.5); }
  .g4{ width:340px; height:340px; right:12%; top:-90px; background:rgba(255,159,159,.4); }

  
  .bunting{ position:relative; z-index:30; display:flex; justify-content:center; gap:12px; height:52px; overflow:hidden; pointer-events:none;
    border-top:5px solid transparent; }
  .bunting::before{ content:""; position:absolute; top:0; left:0; right:0; height:4px; background:#3fcf8f; border-radius:99px; }
  .bunting span{ flex:0 0 34px; height:40px; margin-top:4px; clip-path:polygon(0 0,100% 0,50% 100%); transform-origin:50% 0; animation:swing 3.2s ease-in-out infinite; filter:drop-shadow(0 3px 2px rgba(29,107,75,.25)); }
  @keyframes swing{ 0%,100%{ transform:rotate(-7deg);} 50%{ transform:rotate(7deg);} }

  
  .rails{ display:none; }
  @media (min-width:1360px){
    .rails{ display:block; position:fixed; inset:0; z-index:5; pointer-events:none; }
  }
  .stk{ position:absolute; width:68px; height:68px; display:grid; place-items:center; border-radius:22px; background:var(--bg,#fff);
    border:3px solid #fff; box-shadow:0 14px 28px -10px rgba(29,107,75,.45), 0 0 0 4px rgba(63,207,143,.45);
    transform:rotate(var(--r,0deg)); animation:stkFloat 5.5s ease-in-out infinite; }
  .stk::after{ content:""; position:absolute; inset:5px; border:2px dashed rgba(29,107,75,.28); border-radius:16px; }
  .stk svg{ width:62%; height:62%; position:relative; z-index:1; }
  .stk.l{ left:max(10px, calc((100vw - 1280px) / 2 - 98px)); }
  .stk.r{ right:max(10px, calc((100vw - 1280px) / 2 - 98px)); }
  .stk.sm{ width:56px; height:56px; border-radius:18px; }
  .stk.big{ width:84px; height:84px; border-radius:26px; }
  .stk.wide{ width:96px; height:62px; }
  .stk.wide svg{ width:84%; }
  @keyframes stkFloat{
    0%,100%{ transform:translateY(0) rotate(var(--r,0deg)); }
    50%{ transform:translateY(-14px) rotate(calc(var(--r,0deg) + 7deg)); }
  }

  
  .logo-mark{ background:linear-gradient(135deg,#3fcf8f,#17b26f); box-shadow:0 10px 26px -8px rgba(23,178,111,.75); transition:transform .4s; }
  a:hover .logo-mark{ transform:rotate(-8deg) scale(1.08); }
  .nav-pill{ padding:.65rem 1.2rem; border-radius:999px; border:2px solid var(--line); color:var(--soft); background:rgba(255,255,255,.85); backdrop-filter:blur(8px); transition:all .25s; }
  .nav-pill:hover{ border-color:#3fcf8f; color:var(--ink); transform:translateY(-2px); }
  .nav-pill.active{ background:linear-gradient(135deg,#6ee0a8,#3fcf8f); color:#0f4a31; border-color:transparent; box-shadow:0 10px 22px -8px rgba(23,178,111,.85); }

  
  .eyebrow{ display:inline-flex; align-items:center; gap:.6rem; padding:.55rem 1.1rem; border-radius:999px; font-size:.72rem; font-weight:800; letter-spacing:.22em; color:var(--mid); border:2px solid var(--line); background:rgba(255,255,255,.9); }
  .dot{ width:.55rem; height:.55rem; border-radius:50%; background:#1fb877; box-shadow:0 0 0 0 rgba(31,184,119,.6); animation:ping 1.8s infinite; }
  @keyframes ping{ 70%{ box-shadow:0 0 0 10px rgba(31,184,119,0);} 100%{ box-shadow:0 0 0 0 rgba(31,184,119,0);} }

  .stat{ min-width:9.5rem; padding:1rem 1.3rem; border-radius:1.3rem; border:3px solid #fff; background:linear-gradient(160deg,#ffffff,#c7f3dc); box-shadow:0 16px 30px -14px rgba(23,178,111,.6); }
  .stat .num{ font-family:'Unbounded',sans-serif; font-size:2rem; font-weight:900; color:var(--ink); line-height:1; }
  .stat .lbl{ margin-top:.45rem; font-size:.64rem; font-weight:800; letter-spacing:.2em; color:var(--mid); }

  
  .deco{ position:absolute; pointer-events:none; z-index:0; }
  .plus{ font-family:'Unbounded'; font-size:2.2rem; color:#3fcf8f; animation:spin 12s linear infinite; }
  .ring{ width:150px; height:150px; border-radius:50%; border:3px dashed rgba(31,184,119,.6); animation:spin 30s linear infinite; }
  .hexo{ width:90px; height:100px; background:rgba(255,208,102,.8); clip-path:polygon(50% 0,100% 25%,100% 75%,50% 100%,0 75%,0 25%); animation:floaty 7s ease-in-out infinite; }
  .star{ font-size:2rem; color:#f5a623; animation:floaty 5s ease-in-out infinite; }
  @keyframes spin{ to{ transform:rotate(360deg);} }
  @keyframes floaty{ 0%,100%{ transform:translateY(0) rotate(0);} 50%{ transform:translateY(-16px) rotate(8deg);} }
  .float-y{ animation:floaty 5s ease-in-out infinite; }

  .gauge-wrap{ position:relative; }
  .orbit{ position:absolute; inset:-6%; border-radius:50%; border:2px solid rgba(31,184,119,.7); }
  .orbit.o1{ border-style:dashed; animation:spin 40s linear infinite; }
  .orbit.o2{ inset:-14%; border-color:rgba(255,159,159,.9); animation:spin 60s linear infinite reverse; }
  .orbit.o2::after{ content:""; position:absolute; top:-7px; left:50%; width:14px; height:14px; border-radius:50%; background:#ff7a7a; border:3px solid #fff; box-shadow:0 4px 10px rgba(239,68,68,.4); }
  .tick{ stroke:#1fb877; stroke-width:2.5; }
  .tick.big{ stroke:#0b7a4a; stroke-width:4.5; }
  .tnum{ font-family:'Unbounded'; font-size:13px; font-weight:800; fill:#0b6b42; }
  .gtitle{ font-family:'Unbounded'; font-weight:800; font-size:15px; fill:#0b4a30; letter-spacing:.12em; }
  .gsub{ font-family:'Outfit'; font-weight:800; font-size:11px; fill:#0e8a52; letter-spacing:.35em; }
  .needle{ transform-origin:200px 200px; animation:sweep 4.6s ease-in-out infinite; }
  @keyframes sweep{ 0%,100%{ transform:rotate(-105deg);} 45%{ transform:rotate(62deg);} 60%{ transform:rotate(48deg);} 80%{ transform:rotate(80deg);} }

  .chip{ position:absolute; z-index:20; padding:.5rem .95rem; border-radius:999px; font-size:.72rem; font-weight:800; letter-spacing:.08em; color:#0f4a31; background:#fff; border:3px solid var(--mint); box-shadow:0 12px 24px -10px rgba(29,107,75,.55); animation:floaty 5s ease-in-out infinite; }
  .chip.c1{ left:-2%; top:14%; background:#a6efc9; border-color:#3fcf8f; }
  .chip.c2{ right:-3%; top:46%; animation-delay:-1.5s; background:#ffe9a8; border-color:#ffd05a; }
  .chip.c3{ left:6%; bottom:6%; animation-delay:-3s; background:#c9e6ff; border-color:#8ccbff; }

  .ticker{ overflow:hidden; border-block:3px solid #fff; background:linear-gradient(90deg,#8fe6b9,#c4ec85,#8fe6b9); transform:rotate(-1.2deg); margin-inline:-2%; box-shadow:0 14px 26px -14px rgba(23,178,111,.6); }
  .ticker-track{ display:flex; width:max-content; gap:3rem; padding:1rem 0; font-size:.85rem; font-weight:800; letter-spacing:.2em; color:#0b5f3b; animation:mq 28s linear infinite; white-space:nowrap; }
  @keyframes mq{ to{ transform:translateX(-50%);} }

  .panel{ position:relative; padding:2rem; border-radius:2rem; border:3px solid #fff; background:linear-gradient(160deg,rgba(255,255,255,.96),rgba(208,246,226,.96)); backdrop-filter:blur(14px); box-shadow:0 40px 70px -34px rgba(23,178,111,.6), 0 0 0 5px rgba(63,207,143,.5); }
  @media(min-width:640px){ .panel{ padding:2.6rem; } }
  .panel-corner{ position:absolute; width:46px; height:46px; border:5px solid #1fb877; pointer-events:none; }
  .panel-corner.tl{ top:-3px; left:-3px; border-right:0; border-bottom:0; border-top-left-radius:2rem; }
  .panel-corner.br{ bottom:-3px; right:-3px; border-left:0; border-top:0; border-bottom-right-radius:2rem; }
  .tag-live{ display:inline-flex; align-items:center; gap:.5rem; padding:.45rem .9rem; border-radius:999px; font-size:.68rem; font-weight:800; letter-spacing:.2em; color:var(--mid); border:2px solid var(--line); background:#fff; }

  .lab{ display:block; margin-bottom:.6rem; font-size:.8rem; font-weight:800; letter-spacing:.06em; color:var(--ink); }
  .inp-wrap{ border-radius:1.1rem; padding:3px; background:var(--line); transition:all .3s; }
  .inp-wrap:focus-within{ background:linear-gradient(90deg,#3fcf8f,#b7e35a,#ffd05a); box-shadow:0 12px 28px -10px rgba(23,178,111,.7); }
  .inp-wrap.bad{ background:linear-gradient(90deg,#ffb3b3,#ff8f8f); }
  .inp-wrap input{ width:100%; padding:1rem 1.1rem; border-radius:calc(1.1rem - 3px); border:0; outline:0; background:#fff; color:var(--ink); font-size:1.05rem; font-weight:700; }
  .inp-wrap input::placeholder{ color:rgba(63,122,98,.4); font-weight:500; }
  .err{ margin-top:.5rem; font-size:.82rem; font-weight:700; color:#e0556b; }

  .seg{ display:grid; grid-template-columns:1fr 1fr; gap:.4rem; padding:.35rem; border-radius:1.1rem; background:#fff; border:3px solid var(--line); }
  .seg input{ position:absolute; opacity:0; pointer-events:none; }
  .seg span{ display:flex; align-items:center; justify-content:center; padding:.8rem .4rem; border-radius:.8rem; font-size:.85rem; font-weight:800; color:var(--mid); cursor:pointer; transition:all .25s; white-space:nowrap; }
  .seg input:checked + span{ background:linear-gradient(135deg,#6ee0a8,#2fc486); color:#0b3d28; box-shadow:0 10px 20px -8px rgba(23,178,111,.9); }
  .seg input:focus-visible + span{ outline:3px solid rgba(31,184,119,.5); }

  .go{ position:relative; overflow:hidden; display:inline-flex; width:100%; align-items:center; justify-content:center; gap:.7rem; padding:1.05rem 1.4rem; border:0; border-radius:1.1rem; cursor:pointer; font-family:'Unbounded'; font-size:.85rem; font-weight:800; letter-spacing:.08em; color:#07331f; background:linear-gradient(135deg,#7be8b2,#3fcf8f 55%,#1fb877); box-shadow:0 16px 30px -10px rgba(23,178,111,.85); transition:transform .25s, box-shadow .25s; text-decoration:none; }
  .go:hover{ transform:translateY(-4px); box-shadow:0 22px 38px -10px rgba(23,178,111,.95); }
  .go::after{ content:""; position:absolute; top:0; left:-70%; width:40%; height:100%; background:linear-gradient(100deg,transparent,rgba(255,255,255,.7),transparent); transform:skewX(-20deg); animation:shine 3.4s ease-in-out infinite; }
  @keyframes shine{ 0%{ left:-70%;} 60%,100%{ left:130%;} }
  .clear{ font-size:.85rem; font-weight:800; color:var(--mid); border-bottom:2px dashed rgba(20,146,92,.5); padding-bottom:2px; transition:color .2s; }
  .clear:hover{ color:var(--ink); }

  .pill{ padding:.7rem 1.2rem; border-radius:999px; font-size:.9rem; color:var(--soft); border:2px solid #fff; background:#c2f0d9; box-shadow:0 8px 18px -10px rgba(23,178,111,.6); }
  .pill b{ color:var(--ink); }

  .state{ max-width:36rem; margin-inline:auto; padding:3rem 2rem; text-align:center; border-radius:2rem; border:3px solid #fff; background:linear-gradient(160deg,#ffffff,#d0f6e2); box-shadow:0 30px 60px -34px rgba(23,178,111,.6), 0 0 0 4px rgba(63,207,143,.45); }
  .state.dashed{ border:3px dashed #3fcf8f; box-shadow:none; background:rgba(255,255,255,.75); }
  .state-ico{ font-size:4.5rem; line-height:1; }
  .state h2{ margin-top:1.2rem; font-size:1.5rem; font-weight:800; color:var(--ink); }
  .state p{ margin-top:.8rem; color:var(--soft); line-height:1.8; }
  .state code{ color:#17a468; font-weight:700; }

  .reveal{ opacity:0; transform:translateY(40px) scale(.96); transition:opacity .8s ease var(--d,0s), transform .8s cubic-bezier(.2,.8,.2,1) var(--d,0s); }
  .reveal.show{ opacity:1; transform:none; }

  .car-card{ position:relative; }
  .card-edge{ padding:3px; border-radius:2rem; background:linear-gradient(120deg,#3fcf8f,#b7e35a,#8ccbff,#ffd05a,#ff9f9f,#3fcf8f); background-size:300% 300%; animation:flow 8s linear infinite; box-shadow:0 26px 44px -26px rgba(23,178,111,.7); transition:box-shadow .4s; }
  .car-card:hover .card-edge{ box-shadow:0 0 44px -4px rgba(63,207,143,1), 0 30px 50px -26px rgba(23,178,111,.8); }
  @keyframes flow{ to{ background-position:300% 0; } }

  .card-in{ position:relative; overflow:hidden; border-radius:calc(2rem - 3px); background:linear-gradient(180deg,#ffffff,#dcf6e8 80%); transition:transform .25s ease-out; transform-style:preserve-3d; --mx:50%; --my:50%; }
  .shine-mouse{ position:absolute; inset:0; z-index:5; pointer-events:none; opacity:0; transition:opacity .3s; background:radial-gradient(260px circle at var(--mx) var(--my), rgba(255,255,255,.75), transparent 60%); }
  .card-in:hover .shine-mouse{ opacity:1; }

  .photo{ position:relative; height:210px; overflow:hidden; clip-path:polygon(0 0,100% 0,100% 84%,62% 100%,0 90%); background:#bff0d4; }
  .photo img{ position:absolute; inset:0; width:100%; height:100%; object-fit:cover; transition:transform .8s cubic-bezier(.2,.8,.2,1); }
  .card-in:hover .photo img{ transform:scale(1.12); }
  .photo-shade{ position:absolute; inset:0; background:linear-gradient(180deg,rgba(255,255,255,0),rgba(15,74,49,.3)); pointer-events:none; }

  .photo-fallback{ position:absolute; inset:0; display:grid; place-items:center; background:radial-gradient(circle at 50% 40%,#e9fff4,#9fe8c4 80%); }
  .pf-grid{ position:absolute; inset:0; background:linear-gradient(rgba(31,184,119,.2) 1px,transparent 1px) 0 0/26px 26px, linear-gradient(90deg,rgba(31,184,119,.2) 1px,transparent 1px) 0 0/26px 26px; }
  .pf-car{ position:relative; width:62%; filter:drop-shadow(0 14px 14px rgba(23,100,70,.4)); transition:transform .6s cubic-bezier(.2,.8,.2,1); }
  .card-in:hover .pf-car{ transform:translateX(14px) scale(1.06); }
  .pf-hint{ position:absolute; bottom:1.3rem; left:1rem; font-size:.66rem; font-weight:700; letter-spacing:.06em; color:rgba(15,74,49,.6); }

  .badge-id{ position:absolute; z-index:4; top:1rem; left:1rem; padding:.4rem .8rem; border-radius:999px; font-size:.72rem; font-weight:800; letter-spacing:.1em; color:#0f4a31; background:#fff; box-shadow:0 8px 16px -8px rgba(23,100,70,.6); }
  .badge-year{ position:absolute; z-index:4; top:1rem; right:1rem; padding:.4rem .85rem; border-radius:999px; font-size:.75rem; font-weight:800; color:#0f4a31; background:#ffd470; border:2px solid #fff; }
  .idx{ position:absolute; z-index:4; right:1.2rem; bottom:1.5rem; font-size:2.6rem; font-weight:900; color:transparent; -webkit-text-stroke:2px rgba(255,255,255,.95); line-height:1; }

  .body{ position:relative; z-index:2; padding:.3rem 1.6rem 1.6rem; margin-top:-.4rem; }
  .name{ font-size:1.35rem; font-weight:800; color:var(--ink); line-height:1.25; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }

  .specs{ display:grid; grid-template-columns:1fr 1fr; gap:.8rem; margin-top:1.1rem; }
  .spec{ padding:.8rem 1rem; border-radius:1rem; background:#c7f3dc; border:2px solid #fff; box-shadow:0 8px 16px -10px rgba(23,178,111,.7); }
  .k{ display:block; font-size:.62rem; font-weight:800; letter-spacing:.22em; color:var(--mid); }
  .v{ display:flex; align-items:center; gap:.5rem; margin-top:.35rem; font-size:1rem; font-weight:800; color:var(--ink); }
  .swatch{ display:inline-block; width:1.05rem; height:1.05rem; border-radius:50%; border:2px solid #fff; box-shadow:0 0 0 2px rgba(29,107,75,.35); }

  .price-row{ display:flex; align-items:center; justify-content:space-between; gap:1rem; margin-top:1.2rem; padding:1rem 1.2rem; border-radius:1.2rem; background:linear-gradient(135deg,#a6efc9,#d6f58f); border:2px solid #fff; box-shadow:0 12px 22px -12px rgba(23,178,111,.85); }
  .price{ margin-top:.15rem; font-size:1.45rem; font-weight:900; color:#0b7a4a; }
  .arrow{ display:grid; place-items:center; width:2.8rem; height:2.8rem; border-radius:50%; color:#0f4a31; background:#fff; box-shadow:0 8px 16px -8px rgba(23,100,70,.6); transition:transform .35s; }
  .card-in:hover .arrow{ transform:rotate(45deg) scale(1.1); }

  .road{ position:relative; height:150px; overflow:hidden; background:linear-gradient(180deg,transparent 0%, #d3f5e3 100%); }
  .asphalt{ position:absolute; left:0; right:0; bottom:0; height:56px; background:#7fa896; border-top:6px solid #5f8c78; }
  .lane{ position:absolute; left:0; right:0; top:50%; height:5px; margin-top:-2px; background:repeating-linear-gradient(90deg,#fff 0 36px,transparent 36px 72px); animation:lane 2s linear infinite; }
  @keyframes lane{ to{ background-position:72px 0; } }
  .road-car{ position:absolute; bottom:22px; width:112px; animation:drive 14s linear infinite; filter:drop-shadow(0 6px 4px rgba(23,100,70,.45)); }
  .road-car.two{ width:96px; bottom:6px; animation-duration:19s; animation-delay:-8s; }
  @keyframes drive{ from{ left:-140px; } to{ left:105%; } }
  .bush{ position:absolute; bottom:56px; width:64px; height:34px; background:#4fd69b; border-radius:40px 40px 0 0; box-shadow:26px 8px 0 -4px #2fc486, -22px 10px 0 -6px #7ae3b4; }
  .bush.two{ width:50px; height:26px; background:#7ae3b4; box-shadow:22px 6px 0 -3px #4fd69b; }
  .cloud{ position:absolute; width:74px; height:26px; background:#fff; border-radius:40px; box-shadow:22px -10px 0 4px #fff, 46px 0 0 0 #fff; opacity:.95; animation:cloudMove 22s ease-in-out infinite alternate; }
  .cloud.small{ transform:scale(.7); }
  @keyframes cloudMove{ from{ margin-left:-26px; } to{ margin-left:30px; } }

  @media (prefers-reduced-motion:reduce){
    *{ animation:none !important; transition:none !important; }
    .reveal{ opacity:1; transform:none; }
  }
</style>

</body>
</html>