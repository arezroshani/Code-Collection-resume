<?php
require_once __DIR__ . '/config.php';   

function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

$result = $conn->query(
    "SELECT car_id, car_name, car_model_year, car_color, car_price, car_status, car_mileage
     FROM cars
     WHERE car_model_year = '2025'
     ORDER BY car_id DESC"
);
$cars  = $result->fetch_all(MYSQLI_ASSOC);
$count = count($cars);

$avgPrice = 0;
$minMileage = null;
if ($count) {
    $avgPrice = array_sum(array_map(fn($c) => (float)$c['car_price'], $cars)) / $count;
    $mileages = array_filter(array_column($cars, 'car_mileage'), fn($m) => $m !== null);
    $minMileage = $mileages ? min($mileages) : null;
}

$icons = ['🚗', '🏍️', '🚙', '🛵', '🛻', '🚕', '🏎️', '🚐', '🚓', '🚜', '🚚', '🛺'];

$statuses = [
    'Available'  => 'bg-[#d3f1de] text-[#1f5c3b]',
    'Reserved'   => 'bg-[#fff3bf] text-[#7a6414]',
    'Sold'       => 'bg-[#ffe3df] text-[#8a3a30]',
    'In service' => 'bg-[#dcecf9] text-[#2f5f86]',
    'New'        => 'bg-[#e6f7c9] text-[#4a6b17]',
    'Used'       => 'bg-[#eadff5] text-[#5b3f7a]',
];

$traffic = [
    ['🏎️', 'text-5xl', 'bottom-10', 12,  0],
    ['🚗', 'text-5xl', 'bottom-10', 18, -7],
    ['🏍️', 'text-4xl', 'bottom-9',  15, -3],
    ['🚙', 'text-5xl', 'bottom-10', 24, -14],
    ['🛵', 'text-4xl', 'bottom-9',  20, -10],
    ['🚌', 'text-5xl', 'bottom-10', 28, -19],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mint Garage — 2025 Models</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Nunito:wght@500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./dist/output.css">
    <style>
        body { font-family: 'Nunito', sans-serif; }
        .font-display { font-family: 'Fredoka', sans-serif; }
        @keyframes drive   { from { transform: translateX(-20vw); } to { transform: translateX(120vw); } }
        @keyframes float   { 0%,100% { transform: translateY(0) rotate(-3deg); } 50% { transform: translateY(-14px) rotate(3deg); } }
        @keyframes cloud   { from { transform: translateX(-30vw); } to { transform: translateX(130vw); } }
        @keyframes twinkle { 0%,100% { opacity: .25; transform: scale(.8); } 50% { opacity: 1; transform: scale(1.15); } }
        @keyframes rise    { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }
        .drive   { animation: drive 18s linear infinite; }
        .float-a { animation: float 5s ease-in-out infinite; }
        .float-b { animation: float 6.5s ease-in-out infinite; animation-delay: -2s; }
        .float-c { animation: float 7.5s ease-in-out infinite; animation-delay: -4s; }
        .cloud-a { animation: cloud 70s linear infinite; }
        .cloud-b { animation: cloud 95s linear infinite; animation-delay: -40s; }
        .twinkle { animation: twinkle 3s ease-in-out infinite; }
        .rise    { animation: rise .6s ease-out both; }
        .flip    { transform: scaleX(-1); display: inline-block; }
        .shine   { background-image: linear-gradient(110deg, transparent 30%, rgba(255,255,255,.65) 50%, transparent 70%); background-size: 250% 100%; }
        .group:hover .shine { animation: shine 1s ease; }
        @keyframes shine { from { background-position: 150% 0; } to { background-position: -50% 0; } }
        @media (prefers-reduced-motion: reduce) {
            .drive,.float-a,.float-b,.float-c,.cloud-a,.cloud-b,.twinkle,.rise { animation: none; }
        }
    </style>
</head>

<body class="min-h-screen overflow-x-hidden bg-gradient-to-b from-[#effaf2] via-[#d6f1df] to-[#b5e3c6] text-[#24533c] antialiased">


<div class="pointer-events-none fixed inset-0 -z-0 overflow-hidden" aria-hidden="true">
    <div class="absolute -top-16 -right-10 h-56 w-56 rounded-full bg-[#fff6c9] opacity-90 blur-[2px]"></div>
    <div class="absolute top-24 left-0 text-7xl opacity-70 cloud-a">☁️</div>
    <div class="absolute top-60 left-0 text-5xl opacity-60 cloud-b">☁️</div>
    <div class="absolute top-1/3 -left-24 h-72 w-72 rounded-full bg-[#c4ead2]/70 blur-3xl"></div>
    <div class="absolute bottom-40 -right-24 h-80 w-80 rounded-full bg-[#a6dcb8]/60 blur-3xl"></div>
    <span class="absolute left-[12%] top-[14%] text-2xl twinkle">✨</span>
    <span class="absolute left-[46%] top-[9%] text-xl twinkle" style="animation-delay:-1s">✨</span>
    <span class="absolute left-[70%] top-[26%] text-2xl twinkle" style="animation-delay:-2s">✨</span>
    <span class="absolute left-[88%] top-[48%] text-xl twinkle" style="animation-delay:-.5s">✨</span>
</div>

<div class="relative z-10 mx-auto max-w-6xl px-5 pb-48 pt-8">

    <header class="flex flex-wrap items-center justify-between gap-3">
        <a href="cars.php" class="flex items-center gap-3">
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-[#8fd5a9] text-2xl shadow-[0_6px_0_#6bb98a]">🚘</span>
            <span class="font-display text-2xl font-bold text-[#1f4d37]">Mint Garage</span>
        </a>
        <a href="cars.php"
           class="flex items-center gap-2 rounded-full bg-white/80 px-5 py-2.5 text-sm font-extrabold text-[#2f6b4b] shadow-[0_4px_0_#b3e2c4] backdrop-blur transition hover:-translate-y-0.5 active:translate-y-1 active:shadow-none">
            ➕ Add a car
        </a>
    </header>

    <section class="mt-10 grid items-center gap-10 lg:grid-cols-[1.2fr_1fr]">
        <div class="text-center lg:text-left">
            <span class="inline-flex items-center gap-2 rounded-full bg-white/80 px-4 py-2 text-sm font-extrabold text-[#2f6b4b] shadow-sm">
                🏆 Latest model year
            </span>
            <h1 class="mt-5 font-display text-6xl font-bold leading-[1] text-[#1f4d37] sm:text-7xl">
                Fresh from
                <span class="relative inline-block">
                    <span class="relative z-10 text-[#4fa77b]">2025</span>
                    <span class="absolute -bottom-1 left-0 z-0 h-4 w-full rounded-full bg-[#fff1a8]"></span>
                </span>
            </h1>
            <p class="mx-auto mt-5 max-w-md text-lg font-bold text-[#3f7b5a] lg:mx-0">
                Every car in the garage built in 2025: shiny, modern and ready to roll.
            </p>
        </div>

        <div class="relative mx-auto h-60 w-full max-w-sm">
            <div class="absolute left-0 top-4 grid h-32 w-32 place-items-center rounded-[2.5rem] bg-white/85 text-7xl shadow-[0_10px_0_#a9dcbc] float-a">🏎️</div>
            <div class="absolute right-2 top-0 grid h-24 w-24 place-items-center rounded-[1.75rem] bg-[#c8eed6] text-5xl shadow-[0_8px_0_#9fd8b4] float-b">🏍️</div>
            <div class="absolute bottom-0 left-24 grid h-24 w-24 place-items-center rounded-[1.75rem] bg-[#fff3bf] text-5xl shadow-[0_8px_0_#efdc8a] float-c">🚙</div>
            <div class="absolute bottom-2 right-0 grid h-20 w-20 place-items-center rounded-3xl bg-[#e4f7ea] text-4xl shadow-[0_6px_0_#b3e2c4] float-a">🛵</div>
        </div>
    </section>

    <section class="mt-12 grid gap-5 sm:grid-cols-3">
        <div class="rise rounded-[2rem] bg-white/85 p-6 text-center shadow-[0_8px_0_#b3e2c4] ring-2 ring-white">
            <div class="text-3xl">🚗</div>
            <div class="mt-2 font-display text-4xl font-bold text-[#1f4d37]"><?= $count ?></div>
            <div class="text-sm font-extrabold text-[#5c9477]"><?= $count === 1 ? 'car from 2025' : 'cars from 2025' ?></div>
        </div>
        <div class="rise rounded-[2rem] bg-[#d3f1de]/90 p-6 text-center shadow-[0_8px_0_#a9dcbc] ring-2 ring-white" style="animation-delay:.1s">
            <div class="text-3xl">💰</div>
            <div class="mt-2 font-display text-4xl font-bold text-[#1f4d37]"><?= $count ? '$' . e(number_format($avgPrice)) : '—' ?></div>
            <div class="text-sm font-extrabold text-[#5c9477]">average price</div>
        </div>
        <div class="rise rounded-[2rem] bg-[#fff6c9]/90 p-6 text-center shadow-[0_8px_0_#efdc8a] ring-2 ring-white" style="animation-delay:.2s">
            <div class="text-3xl">🛣️</div>
            <div class="mt-2 font-display text-4xl font-bold text-[#1f4d37]"><?= $minMileage !== null ? e(number_format((int)$minMileage)) : '—' ?></div>
            <div class="text-sm font-extrabold text-[#7a6a2a]">lowest mileage (km)</div>
        </div>
    </section>

    <section class="mt-16">
        <h2 class="font-display text-3xl font-bold text-[#1f4d37]">The 2025 lineup</h2>

        <?php if (!$cars): ?>
            <div class="mt-6 rounded-[2.5rem] bg-white/75 p-12 text-center shadow-sm">
                <div class="text-6xl float-a inline-block">🅿️</div>
                <p class="mt-4 font-display text-2xl font-bold text-[#1f4d37]">No 2025 cars yet</p>
                <p class="mt-1 font-bold text-[#5c9477]">Add one and it will show up here automatically.</p>
                <a href="cars.php" class="mt-6 inline-block rounded-2xl bg-[#74c69d] px-6 py-3 font-display text-lg font-bold text-white shadow-[0_6px_0_#4fa77b] transition hover:-translate-y-0.5 active:translate-y-1 active:shadow-none">
                    🏁 Add a car
                </a>
            </div>
        <?php else: ?>
            <div class="mt-6 grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($cars as $i => $car):
                    $safeColor  = preg_match('/^[a-zA-Z]+$/', $car['car_color']) ? strtolower($car['car_color']) : '#c8eed6';
                    $badgeClass = $statuses[$car['car_status']] ?? 'bg-[#effaf2] text-[#3f7b5a]';
                ?>
                    <article class="rise group relative overflow-hidden rounded-[2.25rem] bg-white/90 shadow-[0_10px_0_#b3e2c4] ring-2 ring-white transition hover:-translate-y-1.5"
                             style="animation-delay: <?= min($i, 8) * 0.07 ?>s">

                
                        <div class="relative grid h-36 place-items-center bg-gradient-to-br from-[#cdeed9] to-[#a6dcb8]">
                            <span class="absolute inset-0 shine"></span>
                            <span class="absolute left-4 top-4 rounded-full bg-white/85 px-3 py-1 text-xs font-extrabold text-[#2f6b4b]">#<?= $i + 1 ?></span>
                            <span class="absolute right-4 top-4 rounded-full bg-[#fff1a8] px-3 py-1 text-sm font-extrabold text-[#7a6414]">⭐ <?= e($car['car_model_year']) ?></span>
                            <span class="text-7xl transition duration-300 group-hover:scale-110 group-hover:-rotate-6"><?= $icons[$i % count($icons)] ?></span>
                        </div>

                        <div class="p-6">
                            <h3 class="font-display text-2xl font-bold text-[#1f4d37]"><?= e($car['car_name']) ?></h3>

                            <div class="mt-4 flex items-center justify-between">
                                <span class="flex items-center gap-2 rounded-full bg-[#effaf2] px-3 py-1.5 text-sm font-extrabold text-[#3f7b5a]">
                                    <span class="h-4 w-4 rounded-full ring-2 ring-black/10" style="background: <?= e($safeColor) ?>"></span>
                                    <?= e($car['car_color']) ?>
                                </span>
                                <span class="font-display text-2xl font-bold text-[#2f6b4b]">$<?= e(number_format((float)$car['car_price'])) ?></span>
                            </div>

                            <div class="mt-4 flex items-center justify-between border-t-2 border-dashed border-[#d3ecdc] pt-4 text-sm font-extrabold">
                                <?php if ($car['car_status'] !== null && $car['car_status'] !== ''): ?>
                                    <span class="rounded-full px-3 py-1 <?= $badgeClass ?>"><?= e($car['car_status']) ?></span>
                                <?php else: ?>
                                    <span></span>
                                <?php endif; ?>
                                <?php if ($car['car_mileage'] !== null): ?>
                                    <span class="text-[#5c9477]">🛣️ <?= e(number_format((int)$car['car_mileage'])) ?> km</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</div>

<div class="pointer-events-none fixed inset-x-0 bottom-0 z-0 h-44 overflow-hidden" aria-hidden="true">
    <div class="absolute -bottom-10 -left-10 h-40 w-[60%] rounded-[100%] bg-[#a6dcb8]"></div>
    <div class="absolute -bottom-12 right-0 h-44 w-[65%] rounded-[100%] bg-[#92d1a9]"></div>
    <div class="absolute bottom-0 h-16 w-full bg-[#7cbf97]"></div>
    <div class="absolute bottom-7 h-1 w-full border-t-4 border-dashed border-white/80"></div>
    <?php foreach ($traffic as [$emoji, $size, $offset, $dur, $delay]): ?>
        <div class="absolute <?= $offset ?> left-0 <?= $size ?> drive" style="animation-duration: <?= $dur ?>s; animation-delay: <?= $delay ?>s;">
            <span class="flip"><?= $emoji ?></span>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>