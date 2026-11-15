<?php
session_start();
require_once __DIR__ . '/config.php';

$flash = $_SESSION['flash'] ?? null;
$old   = $_SESSION['old'] ?? [];
unset($_SESSION['flash'], $_SESSION['old']);

function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
$total = (int)$conn->query('SELECT COUNT(*) FROM cars')->fetch_row()[0];

$result = $conn->query(
    'SELECT car_id, car_name, car_model_year, car_color, car_price, car_status, car_mileage
     FROM cars
     ORDER BY car_id DESC
     LIMIT 6'
);
$cars = $result->fetch_all(MYSQLI_ASSOC);

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
    ['🚗', 'text-5xl', 'bottom-10', 14,   0],
    ['🏍️', 'text-4xl', 'bottom-9',  22,  -9],
    ['🚙', 'text-5xl', 'bottom-10', 18,  -4],
    ['🚌', 'text-5xl', 'bottom-10', 28, -15],
    ['🛵', 'text-4xl', 'bottom-9',  16, -11],
    ['🏎️', 'text-5xl', 'bottom-10', 10,  -6],
    ['🚚', 'text-5xl', 'bottom-10', 25, -20],
    ['🚓', 'text-4xl', 'bottom-9',  20,  -2],
    ['🛻', 'text-5xl', 'bottom-10', 24, -13],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mint Garage — Add your car</title>
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
        @keyframes pop     { 0% { transform: scale(.9); opacity: 0; } 100% { transform: scale(1); opacity: 1; } }
        .drive   { animation: drive 18s linear infinite; }
        .float-a { animation: float 5s ease-in-out infinite; }
        .float-b { animation: float 6.5s ease-in-out infinite; animation-delay: -2s; }
        .float-c { animation: float 7.5s ease-in-out infinite; animation-delay: -4s; }
        .cloud-a { animation: cloud 70s linear infinite; }
        .cloud-b { animation: cloud 95s linear infinite; animation-delay: -40s; }
        .pop-in  { animation: pop .5s ease-out both; }
        .flip    { transform: scaleX(-1); display: inline-block; }
        @media (prefers-reduced-motion: reduce) {
            .drive,.float-a,.float-b,.float-c,.cloud-a,.cloud-b,.pop-in { animation: none; }
        }
    </style>
</head>

<body class="min-h-screen overflow-x-hidden bg-gradient-to-b from-[#effaf2] via-[#d6f1df] to-[#b5e3c6] text-[#24533c] antialiased">


<div class="pointer-events-none fixed inset-0 -z-0 overflow-hidden" aria-hidden="true">
    <div class="absolute -top-16 -right-10 h-56 w-56 rounded-full bg-[#fff6c9] opacity-90 blur-[2px]"></div>
    <div class="absolute top-24 left-0 text-7xl opacity-70 cloud-a">☁️</div>
    <div class="absolute top-52 left-0 text-5xl opacity-60 cloud-b">☁️</div>
    <div class="absolute top-1/3 -left-24 h-72 w-72 rounded-full bg-[#c4ead2]/70 blur-3xl"></div>
    <div class="absolute bottom-40 -right-24 h-80 w-80 rounded-full bg-[#a6dcb8]/60 blur-3xl"></div>
</div>

<div class="relative z-10 mx-auto max-w-6xl px-5 pb-48 pt-8">


    <header class="flex items-center justify-between">
        <a href="cars.php" class="flex items-center gap-3">
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-[#8fd5a9] text-2xl shadow-[0_6px_0_#6bb98a]">🚘</span>
            <span class="font-display text-2xl font-bold text-[#1f4d37]">Mint Garage</span>
        </a>
        <span class="rounded-full bg-white/70 px-4 py-2 text-sm font-extrabold text-[#2f6b4b] shadow-sm backdrop-blur">
            🅿️ <?= $total ?> <?= $total === 1 ? 'car' : 'cars' ?> parked
        </span>
    </header>

    
    <main class="mt-10 grid items-center gap-10 lg:grid-cols-2">

       
        <section class="relative text-center lg:text-left">
            <h1 class="font-display text-5xl font-bold leading-[1.05] text-[#1f4d37] sm:text-6xl">
                Park your dream ride<br>in our minty garage
            </h1>
            <p class="mx-auto mt-5 max-w-md text-lg font-bold text-[#3f7b5a] lg:mx-0">
                Tell us about your car (name, year, color, price, status and mileage) and we'll keep it safe in the database.
            </p>

            <div class="relative mx-auto mt-10 h-96 max-w-md lg:mx-0">
                <div class="absolute left-0 top-0 grid h-32 w-32 place-items-center rounded-[2.5rem] bg-white/80 text-7xl shadow-[0_10px_0_#a9dcbc] float-a">🚗</div>
                <div class="absolute left-40 top-6 grid h-24 w-24 place-items-center rounded-[1.75rem] bg-[#c8eed6] text-5xl shadow-[0_8px_0_#9fd8b4] float-b">🏍️</div>
                <div class="absolute right-0 top-0 grid h-28 w-28 place-items-center rounded-[2rem] bg-[#e4f7ea] text-6xl shadow-[0_8px_0_#b3e2c4] float-c">🏎️</div>

                <div class="absolute left-4 top-40 grid h-24 w-24 place-items-center rounded-[1.75rem] bg-[#fff3bf] text-5xl shadow-[0_8px_0_#efdc8a] float-c">🚕</div>
                <div class="absolute left-36 top-44 grid h-28 w-28 place-items-center rounded-[2rem] bg-white/80 text-6xl shadow-[0_8px_0_#a9dcbc] float-a">🚙</div>
                <div class="absolute right-2 top-36 grid h-24 w-24 place-items-center rounded-[1.75rem] bg-[#c8eed6] text-5xl shadow-[0_8px_0_#9fd8b4] float-b">🛵</div>

                <div class="absolute bottom-0 left-2 grid h-20 w-20 place-items-center rounded-3xl bg-[#e4f7ea] text-4xl shadow-[0_6px_0_#b3e2c4] float-b">🚐</div>
                <div class="absolute bottom-2 left-28 grid h-20 w-20 place-items-center rounded-3xl bg-[#ffe3df] text-4xl shadow-[0_6px_0_#f2bdb5] float-a">🚓</div>
                <div class="absolute bottom-0 left-52 grid h-20 w-20 place-items-center rounded-3xl bg-white/80 text-4xl shadow-[0_6px_0_#a9dcbc] float-c">🛻</div>
                <div class="absolute bottom-3 right-4 grid h-20 w-20 place-items-center rounded-3xl bg-[#dcecf9] text-4xl shadow-[0_6px_0_#b3cfe6] float-b">🛺</div>
            </div>
        </section>

       
        <section class="rounded-[2.5rem] bg-white/80 p-7 shadow-[0_14px_0_#9fd8b4,0_30px_60px_-20px_rgba(36,83,60,.35)] ring-4 ring-white backdrop-blur sm:p-9">

            <div class="mb-6 flex items-center gap-3">
                <span class="grid h-12 w-12 place-items-center rounded-2xl bg-[#d3f1de] text-2xl">🔑</span>
                <div>
                    <h2 class="font-display text-2xl font-bold text-[#1f4d37]">New car</h2>
                    <p class="text-sm font-bold text-[#5c9477]">All six fields are required</p>
                </div>
            </div>

          
<?php if ($flash): ?>
    <div class="pop-in mb-6 rounded-2xl px-5 py-4 text-sm font-extrabold
        <?= ($flash['type'] ?? '') === 'success'
            ? 'bg-[#d3f1de] text-[#1f5c3b] ring-2 ring-[#8fd5a9]'
            : 'bg-[#ffe3df] text-[#8a3a30] ring-2 ring-[#f5b8af]' ?>"
        role="alert">

        <span class="mr-1">
            <?= ($flash['type'] ?? '') === 'success' ? '🎉' : '⚠️' ?>
        </span>

        <?php
        $messages = $flash['message'] ?? [];

        if (is_array($messages)):
            foreach ($messages as $m):
        ?>
                <div><?= e($m) ?></div>
        <?php
            endforeach;
        else:
        ?>
            <div><?= e($messages) ?></div>
        <?php endif; ?>

    </div>
<?php endif; ?>


            <form action="insert_cars.php" method="post" class="space-y-5">

                <label class="block">
                    <span class="mb-2 block text-sm font-extrabold text-[#2f6b4b]">Car name</span>
                    <div class="flex items-center gap-3 rounded-2xl bg-[#effaf2] px-4 ring-2 ring-[#cdeed9] transition focus-within:bg-white focus-within:ring-[#74c69d]">
                        <span class="text-xl">🚗</span>
                        <input type="text" name="car_name" maxlength="50" required
                               value="<?= e($old['name'] ?? '') ?>" placeholder="e.g. Toyota Corolla"
                               class="w-full bg-transparent py-3.5 font-bold text-[#1f4d37] placeholder-[#8fb8a1] outline-none">
                    </div>
                </label>

                <div class="grid gap-5 sm:grid-cols-2">
                    <label class="block">
                        <span class="mb-2 block text-sm font-extrabold text-[#2f6b4b]">Production year</span>
                        <div class="flex items-center gap-3 rounded-2xl bg-[#effaf2] px-4 ring-2 ring-[#cdeed9] transition focus-within:bg-white focus-within:ring-[#74c69d]">
                            <span class="text-xl">📅</span>
                            <input type="number" name="car_model_year" min="1886" max="<?= date('Y') + 1 ?>" required
                                   value="<?= e($old['year'] ?? '') ?>" placeholder="2022"
                                   class="w-full bg-transparent py-3.5 font-bold text-[#1f4d37] placeholder-[#8fb8a1] outline-none">
                        </div>
                    </label>

                    <label class="block">
                        <span class="mb-2 block text-sm font-extrabold text-[#2f6b4b]">Price</span>
                        <div class="flex items-center gap-3 rounded-2xl bg-[#effaf2] px-4 ring-2 ring-[#cdeed9] transition focus-within:bg-white focus-within:ring-[#74c69d]">
                            <span class="text-xl">💰</span>
                            <input type="number" name="car_price" min="0" required
                                   value="<?= e($old['price'] ?? '') ?>" placeholder="25000"
                                   class="w-full bg-transparent py-3.5 font-bold text-[#1f4d37] placeholder-[#8fb8a1] outline-none">
                        </div>
                    </label>
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <label class="block">
                        <span class="mb-2 block text-sm font-extrabold text-[#2f6b4b]">Status</span>
                        <div class="flex items-center gap-3 rounded-2xl bg-[#effaf2] px-4 ring-2 ring-[#cdeed9] transition focus-within:bg-white focus-within:ring-[#74c69d]">
                            <span class="text-xl">🚦</span>
                            <select name="car_status" required
                                    class="w-full bg-transparent py-3.5 font-bold text-[#1f4d37] outline-none">
                                <option value="" disabled <?= empty($old['status']) ? 'selected' : '' ?>>Choose status</option>
                                <?php foreach (array_keys($statuses) as $s): ?>
                                    <option value="<?= e($s) ?>" <?= ($old['status'] ?? '') === $s ? 'selected' : '' ?>><?= e($s) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </label>

                    <label class="block">
                        <span class="mb-2 block text-sm font-extrabold text-[#2f6b4b]">Mileage (km)</span>
                        <div class="flex items-center gap-3 rounded-2xl bg-[#effaf2] px-4 ring-2 ring-[#cdeed9] transition focus-within:bg-white focus-within:ring-[#74c69d]">
                            <span class="text-xl">🛣️</span>
                            <input type="number" name="car_mileage" min="0" required
                                   value="<?= e($old['mileage'] ?? '') ?>" placeholder="45000"
                                   class="w-full bg-transparent py-3.5 font-bold text-[#1f4d37] placeholder-[#8fb8a1] outline-none">
                        </div>
                    </label>
                </div>

                <div>
                    <label for="car_color" class="mb-2 block text-sm font-extrabold text-[#2f6b4b]">Color</label>
                    <div class="flex items-center gap-3 rounded-2xl bg-[#effaf2] px-4 ring-2 ring-[#cdeed9] transition focus-within:bg-white focus-within:ring-[#74c69d]">
                        <span class="text-xl">🎨</span>
                        <input type="text" id="car_color" name="car_color" maxlength="10" required
                               value="<?= e($old['color'] ?? '') ?>" placeholder="Pick one or type your own"
                               class="w-full bg-transparent py-3.5 font-bold text-[#1f4d37] placeholder-[#8fb8a1] outline-none">
                    </div>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <?php
                        $chips = ['White' => '#ffffff', 'Black' => '#3a3f3c', 'Silver' => '#cfd6d2', 'Red' => '#f28b82',
                                  'Blue' => '#8ec5f0', 'Yellow' => '#ffe08a', 'Mint' => '#9fe0b8', 'Gray' => '#9aa5a0'];
                        foreach ($chips as $label => $hex): ?>
                            <button type="button" data-color="<?= $label ?>"
                                    class="color-chip flex items-center gap-2 rounded-full bg-white px-3 py-1.5 text-sm font-extrabold text-[#2f6b4b] ring-2 ring-[#cdeed9] transition hover:-translate-y-0.5 hover:ring-[#74c69d]">
                                <span class="h-4 w-4 rounded-full ring-2 ring-black/10" style="background: <?= $hex ?>"></span>
                                <?= $label ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <button type="submit"
                        class="group mt-2 flex w-full items-center justify-center gap-3 rounded-2xl bg-[#74c69d] px-6 py-4 font-display text-xl font-bold text-white shadow-[0_8px_0_#4fa77b] transition hover:-translate-y-0.5 hover:bg-[#68bd93] active:translate-y-1.5 active:shadow-[0_2px_0_#4fa77b]">
                    <span class="transition group-hover:translate-x-1">🏁</span>
                    Save to garage
                </button>
            </form>
        </section>
    </main>

    <section class="mt-20">
        <h2 class="font-display text-3xl font-bold text-[#1f4d37]">Recently parked</h2>

        <?php if (!$cars): ?>
            <div class="mt-6 rounded-[2rem] bg-white/70 p-10 text-center shadow-sm">
                <div class="text-5xl">🅿️</div>
                <p class="mt-3 text-lg font-extrabold text-[#3f7b5a]">The garage is empty. Add your first car above.</p>
            </div>
        <?php else: ?>
            <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($cars as $i => $car):
                    $safeColor  = preg_match('/^[a-zA-Z]+$/', $car['car_color']) ? strtolower($car['car_color']) : '#c8eed6';
                    $badgeClass = $statuses[$car['car_status']] ?? 'bg-[#effaf2] text-[#3f7b5a]';
                ?>
                    <article class="rounded-[2rem] bg-white/85 p-6 shadow-[0_8px_0_#b3e2c4] ring-2 ring-white transition hover:-translate-y-1">
                        <div class="flex items-start justify-between">
                            <span class="grid h-16 w-16 place-items-center rounded-2xl bg-[#d3f1de] text-4xl"><?= $icons[$i % count($icons)] ?></span>
                            <span class="rounded-full bg-[#effaf2] px-3 py-1 text-sm font-extrabold text-[#3f7b5a]"><?= e($car['car_model_year']) ?></span>
                        </div>
                        <h3 class="mt-4 font-display text-2xl font-bold text-[#1f4d37]"><?= e($car['car_name']) ?></h3>
                        <div class="mt-3 flex items-center justify-between text-sm font-extrabold">
                            <span class="flex items-center gap-2 text-[#5c9477]">
                                <span class="h-4 w-4 rounded-full ring-2 ring-black/10" style="background: <?= e($safeColor) ?>"></span>
                                <?= e($car['car_color']) ?>
                            </span>
                            <span class="text-[#2f6b4b]">$<?= e(number_format((float)$car['car_price'])) ?></span>
                        </div>
                        <div class="mt-4 flex items-center justify-between text-sm font-extrabold">
                            <?php if ($car['car_status'] !== null && $car['car_status'] !== ''): ?>
                                <span class="rounded-full px-3 py-1 <?= $badgeClass ?>"><?= e($car['car_status']) ?></span>
                            <?php else: ?>
                                <span></span>
                            <?php endif; ?>
                            <?php if ($car['car_mileage'] !== null): ?>
                                <span class="text-[#5c9477]">🛣️ <?= e(number_format((int)$car['car_mileage'])) ?> km</span>
                            <?php endif; ?>
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

<script>
    document.querySelectorAll('.color-chip').forEach(function (chip) {
        chip.addEventListener('click', function () {
            document.getElementById('car_color').value = chip.dataset.color;
        });
    });
</script>
</body>
</html>