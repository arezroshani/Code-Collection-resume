<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$show      = is_array($book);
$cardTitle = $show ? $book['title']           : 'Your Book Title';
$cardPub   = $show ? $book['publisher']       : 'Publisher Name';
$cardPrice = $show ? $book['price_formatted'] : '—';
$cardCover = $show ? (int) $book['cover']     : 0;
if ($cardCover < 0 || $cardCover > 5) { $cardCover = 0; }

$ink      = '#2b2118';
$cream    = '#fff4dc';
$coverBg  = array('#1f6f6a', '#26355d', '#f4b5b0', '#f2e3c0', '#3d2c5e', '#f2b134');
$palette  = array('#e2725b', '#f2b134', '#1f6f6a', '#26355d', '#f4b5b0', '#8fb996', '#7a4e8c', '#d9534f', '#2f8f9d', '#f7c8a0');

$bkCls    = 'bk cursor-pointer transition-transform duration-[350ms] ease-[cubic-bezier(.3,1.6,.5,1)] hover:-translate-y-4';

$drawBook = function ($x, $base, $w, $h, $col, $pat, $tilt) use ($ink, $cream, $bkCls) {
    $y = $base - $h;
    $o = '<g class="' . $bkCls . '">';
    if ($tilt) { $o .= '<g transform="rotate(' . $tilt . ' ' . ($x + $w) . ' ' . $base . ')">'; }
    $o .= '<rect x="' . $x . '" y="' . $y . '" width="' . $w . '" height="' . $h . '" rx="4" fill="' . $col . '" stroke="' . $ink . '" stroke-width="2.5"/>';
    $o .= '<rect x="' . ($x + 5) . '" y="' . ($y + 3) . '" width="4" height="' . ($h - 6) . '" rx="2" fill="#fff" opacity=".28"/>';
    switch ($pat) {
        case 0:
            $o .= '<rect x="' . $x . '" y="' . ($y + 16) . '" width="' . $w . '" height="7" fill="' . $cream . '" opacity=".9"/>';
            $o .= '<rect x="' . $x . '" y="' . ($base - 34) . '" width="' . $w . '" height="7" fill="' . $cream . '" opacity=".9"/>';
            break;
        case 1:
            $o .= '<rect x="' . ($x + 7) . '" y="' . ($y + $h * 0.28) . '" width="' . ($w - 14) . '" height="36" rx="3" fill="' . $cream . '" stroke="' . $ink . '" stroke-width="1.8"/>';
            $o .= '<path d="M' . ($x + 12) . ' ' . ($y + $h * 0.28 + 12) . 'h' . ($w - 24) . 'M' . ($x + 12) . ' ' . ($y + $h * 0.28 + 24) . 'h' . ($w - 32) . '" stroke="' . $ink . '" stroke-width="2" stroke-linecap="round"/>';
            break;
        case 2:
            for ($i = 0; $i < 4; $i++) {
                $o .= '<rect x="' . ($x + 12 + $i * (($w - 18) / 4)) . '" y="' . ($y + 14) . '" width="3" height="' . ($h - 28) . '" fill="' . $cream . '" opacity=".75"/>';
            }
            break;
        case 3:
            for ($i = 0; $i < 4; $i++) {
                $o .= '<circle cx="' . ($x + $w / 2 + 2) . '" cy="' . ($y + 26 + $i * 22) . '" r="5" fill="' . $cream . '" stroke="' . $ink . '" stroke-width="1.6"/>';
            }
            break;
        default:
            $cx = $x + $w / 2 + 2; $cy = $y + 34;
            $o .= '<path d="M' . $cx . ' ' . ($cy - 14) . 'L' . ($cx + 5) . ' ' . ($cy - 4) . 'L' . ($cx + 15) . ' ' . $cy . 'L' . ($cx + 5) . ' ' . ($cy + 5) . 'L' . $cx . ' ' . ($cy + 16) . 'L' . ($cx - 5) . ' ' . ($cy + 5) . 'L' . ($cx - 15) . ' ' . $cy . 'L' . ($cx - 5) . ' ' . ($cy - 4) . 'Z" fill="' . $cream . '" stroke="' . $ink . '" stroke-width="1.6" stroke-linejoin="round"/>';
            $o .= '<rect x="' . $x . '" y="' . ($base - 26) . '" width="' . $w . '" height="6" fill="' . $cream . '" opacity=".85"/>';
    }
    if ($tilt) { $o .= '</g>'; }
    return $o . '</g>';
};

$drawCat = function ($x, $base) use ($ink) {
    return '<g transform="translate(' . $x . ' ' . ($base - 70) . ')">'
        . '<path class="origin-[92px_62px] animate-tailsway" d="M92 62c26 2 34-22 18-30" fill="none" stroke="' . $ink . '" stroke-width="9" stroke-linecap="round"/>'
        . '<path d="M92 62c26 2 34-22 18-30" fill="none" stroke="#f2a65a" stroke-width="4.5" stroke-linecap="round"/>'
        . '<path d="M8 70c-6-30 14-52 46-52s54 20 46 52z" fill="#f2a65a" stroke="' . $ink . '" stroke-width="2.5" stroke-linejoin="round"/>'
        . '<path d="M30 28L24 4l22 12M62 24l10-22 14 18" fill="#f2a65a" stroke="' . $ink . '" stroke-width="2.5" stroke-linejoin="round"/>'
        . '<path d="M30 36q5 5 10 0M54 34q5 5 10 0" fill="none" stroke="' . $ink . '" stroke-width="2.5" stroke-linecap="round"/>'
        . '<path d="M44 42l3 3 3-3z" fill="#e2725b" stroke="' . $ink . '" stroke-width="1.6" stroke-linejoin="round"/>'
        . '<path d="M22 46h-14M24 50l-12 5M74 44h14M72 49l12 5" stroke="' . $ink . '" stroke-width="1.6" stroke-linecap="round"/>'
        . '<path d="M30 70q4-14 0-24M60 70q-2-12 2-22" fill="none" stroke="#c9803a" stroke-width="3" stroke-linecap="round"/>'
        . '<text class="animate-zz" x="104" y="10" font-size="16" font-weight="800" fill="' . $ink . '">z</text>'
        . '<text class="animate-zz [animation-delay:-1.4s]" x="118" y="-4" font-size="12" font-weight="800" fill="' . $ink . '">z</text>'
        . '</g>';
};

$drawPlant = function ($x, $base) use ($ink) {
    return '<g transform="translate(' . $x . ' ' . ($base - 118) . ')">'
        . '<path class="origin-[41px_70px] animate-sway" d="M40 70C36 40 10 38 4 14c26 0 38 20 36 56z" fill="#5aa469" stroke="' . $ink . '" stroke-width="2.5" stroke-linejoin="round"/>'
        . '<path class="origin-[41px_70px] animate-sway [animation-delay:-2s]" d="M42 70C46 36 72 30 80 4c-28 4-42 30-38 66z" fill="#78bd7e" stroke="' . $ink . '" stroke-width="2.5" stroke-linejoin="round"/>'
        . '<path class="origin-[41px_70px] animate-sway" d="M41 70C38 50 44 24 44 8c-12 14-14 40-3 62z" fill="#3f8a55" stroke="' . $ink . '" stroke-width="2.5" stroke-linejoin="round"/>'
        . '<path d="M14 70h54l-7 48H21z" fill="#e2725b" stroke="' . $ink . '" stroke-width="2.5" stroke-linejoin="round"/>'
        . '<rect x="10" y="64" width="62" height="14" rx="4" fill="#f08a6f" stroke="' . $ink . '" stroke-width="2.5"/>'
        . '<circle cx="41" cy="96" r="5" fill="' . '#fff4dc' . '"/>'
        . '</g>';
};

$drawStack = function ($x, $base) use ($ink, $cream, $bkCls) {
    $o = '<g class="' . $bkCls . '">';
    $o .= '<rect x="' . $x . '" y="' . ($base - 30) . '" width="150" height="30" rx="4" fill="#26355d" stroke="' . $ink . '" stroke-width="2.5"/><rect x="' . ($x + 10) . '" y="' . ($base - 22) . '" width="130" height="5" fill="' . $cream . '" opacity=".85"/>';
    $o .= '<rect x="' . ($x + 12) . '" y="' . ($base - 58) . '" width="128" height="28" rx="4" fill="#f2b134" stroke="' . $ink . '" stroke-width="2.5"/><rect x="' . ($x + 26) . '" y="' . ($base - 50) . '" width="30" height="12" rx="2" fill="' . $cream . '" stroke="' . $ink . '" stroke-width="1.6"/>';
    $o .= '<rect x="' . ($x + 4) . '" y="' . ($base - 84) . '" width="124" height="26" rx="4" fill="#e2725b" stroke="' . $ink . '" stroke-width="2.5"/><circle cx="' . ($x + 100) . '" cy="' . ($base - 71) . '" r="6" fill="' . $cream . '" stroke="' . $ink . '" stroke-width="1.6"/>';
    // cup
    $o .= '<path d="M' . ($x + 40) . ' ' . ($base - 118) . 'h40l-4 34h-32z" fill="#fff4dc" stroke="' . $ink . '" stroke-width="2.5" stroke-linejoin="round"/>';
    $o .= '<path d="M' . ($x + 80) . ' ' . ($base - 110) . 'q16 2 10 14q-4 8-12 6" fill="none" stroke="' . $ink . '" stroke-width="2.5" stroke-linecap="round"/>';
    $o .= '<path d="M' . ($x + 46) . ' ' . ($base - 104) . 'h28" stroke="#e2725b" stroke-width="5"/>';
    $o .= '<path class="animate-steam" d="M' . ($x + 52) . ' ' . ($base - 126) . 'q-8-10 0-18" fill="none" stroke="#b9a58a" stroke-width="3" stroke-linecap="round"/>';
    $o .= '<path class="animate-steam [animation-delay:-1.3s]" d="M' . ($x + 66) . ' ' . ($base - 126) . 'q-8-10 0-18" fill="none" stroke="#b9a58a" stroke-width="3" stroke-linecap="round"/>';
    return $o . '</g>';
};


$spineTitle = $show
    ? (function_exists('mb_strimwidth') ? mb_strimwidth($book['title'], 0, 17, '…', 'UTF-8') : substr($book['title'], 0, 16))
    : '';

$formCls  = 'relative rounded-[22px] border-[3px] border-ink bg-[#fffaf0] bg-[repeating-linear-gradient(180deg,transparent_0_35px,rgba(31,111,106,.1)_35px_36px)] px-7 pb-8 pt-11 shadow-[9px_9px_0_theme(colors.ink)] sm:px-10 sm:pb-[38px] sm:pt-[50px]';
$inpWrap  = 'flex h-[60px] items-center gap-3 rounded-2xl border-[3px] border-ink bg-white px-4 shadow-[4px_4px_0_rgba(43,33,24,.18)] transition duration-200 focus-within:-translate-x-0.5 focus-within:-translate-y-0.5 focus-within:bg-[#f3fbf6] focus-within:shadow-[6px_6px_0_theme(colors.teal)] [&.bad]:bg-[#ffe9e4] [&.bad]:shadow-[4px_4px_0_theme(colors.terra)]';
$inpCls   = 'h-full min-w-0 flex-1 border-0 bg-transparent text-[1.08rem] font-bold text-ink outline-none placeholder:font-semibold placeholder:text-[#b6a58c]';
$errCls   = 'mt-[9px] text-[.86rem] font-extrabold text-[#c2452e] empty:hidden before:content-[\'✎_\']';
$lblCls   = 'mb-2 block font-title text-[1.02rem]';
$iconCls  = 'h-[26px] w-[26px] flex-none';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth overflow-x-hidden">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BookNest · Add a book</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Nunito:wght@500;600;700;800&family=Young+Serif&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/output.css') ?>">
</head>

<body class="min-h-screen overflow-x-clip bg-paper font-body leading-normal text-ink selection:bg-mustard selection:text-ink bg-[radial-gradient(circle_at_12%_8%,rgba(242,177,52,.28),transparent_32%),radial-gradient(circle_at_92%_18%,rgba(244,181,176,.5),transparent_30%),radial-gradient(rgba(43,33,24,.07)_1.3px,transparent_1.6px)] [background-size:auto,auto,26px_26px]">

<?php
$flyer = '<svg class="absolute left-[-100px] z-[1] pointer-events-none %s" viewBox="0 0 80 60" aria-hidden="true">'
  . '<g class="origin-[40px_34px] animate-[flap_.55s_ease-in-out_infinite_alternate]"><path d="M36 34C26 14 8 12 2 20c4 12 14 20 34 18z" fill="#fff4dc" stroke="#2b2118" stroke-width="2.5" stroke-linejoin="round"/><path d="M30 31c-8-8-16-10-22-9" fill="none" stroke="#2b2118" stroke-width="2" stroke-linecap="round"/></g>'
  . '<g class="origin-[40px_34px] animate-[flap_.55s_ease-in-out_infinite_alternate]"><path d="M44 34C54 14 72 12 78 20c-4 12-14 20-34 18z" fill="#fff4dc" stroke="#2b2118" stroke-width="2.5" stroke-linejoin="round"/><path d="M50 31c8-8 16-10 22-9" fill="none" stroke="#2b2118" stroke-width="2" stroke-linecap="round"/></g>'
  . '<rect x="29" y="26" width="22" height="28" rx="3" fill="%s" stroke="#2b2118" stroke-width="2.5"/><rect x="33" y="30" width="3.5" height="20" fill="#fff" opacity=".35"/><rect x="29" y="36" width="22" height="4" fill="#fff4dc" opacity=".85"/>'
  . '</svg>';
echo sprintf($flyer, 'top-[4%] w-[78px] animate-[cross_34s_linear_infinite,bob_2.6s_ease-in-out_infinite]', '#e2725b'),
     sprintf($flyer, 'top-[42%] w-14 animate-[cross_26s_linear_-12s_infinite,bob_2.1s_ease-in-out_infinite]', '#1f6f6a'),
     sprintf($flyer, 'top-[18%] w-16 animate-[cross_40s_linear_-24s_infinite,bob_3s_ease-in-out_-1s_infinite]', '#f2b134');
?>

<div class="relative z-[2] mx-auto max-w-[1160px] px-[22px]">


<header class="flex items-center justify-between py-[22px]">
<a href="<?= site_url('book') ?>" class="group flex items-center gap-2.5 text-ink no-underline">
<svg class="h-11 w-11 transition-transform duration-[400ms] ease-[cubic-bezier(.3,1.6,.5,1)] group-hover:-rotate-[10deg] group-hover:scale-110" viewBox="0 0 48 48" aria-hidden="true"><rect x="9" y="6" width="26" height="36" rx="4" fill="#e2725b" stroke="#2b2118" stroke-width="3"/><rect x="14" y="6" width="4" height="36" fill="#fff" opacity=".3"/><rect x="9" y="14" width="26" height="5" fill="#fff4dc"/><path d="M36 14l8 22" stroke="#2b2118" stroke-width="3" stroke-linecap="round"/><rect x="31" y="9" width="14" height="30" rx="3" fill="#f2b134" stroke="#2b2118" stroke-width="3" transform="rotate(14 38 24)"/></svg>
<b class="font-title text-[1.7rem] font-normal tracking-[-.01em]">Book<span class="text-terra">Nest</span></b>
</a>
<span class="hidden rotate-2 rounded-full border-[2.5px] border-ink bg-mustard px-4 py-[7px] font-hand text-[.85rem] font-extrabold shadow-[3px_3px_0_theme(colors.ink)] sm:inline-block">my cozy little library</span>
</header>

<section class="relative pb-[30px] pt-[34px] text-center">
<div class="absolute left-[3%] top-[34px] hidden font-hand text-[1.5rem] font-bold text-teal min-[1400px]:block"><span>write it down!</span>
<svg class="block h-[46px] w-[60px]" viewBox="0 0 60 46" fill="none" stroke="#1f6f6a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M6 6c20 0 38 8 44 32M42 30l8 8 4-12"/></svg></div>
<div class="absolute right-[3%] top-20 hidden font-hand text-[1.5rem] font-bold text-[#c9543f] min-[1400px]:block"><span>and watch it land!</span>
<svg class="block h-[46px] w-[60px] -scale-x-100" viewBox="0 0 60 46" fill="none" stroke="#c9543f" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M6 6c20 0 38 8 44 32M42 30l8 8 4-12"/></svg></div>

<h1 class="mx-auto max-w-[820px] font-title text-[clamp(2.5rem,7vw,5rem)] font-normal leading-[1.02] tracking-[-.02em]">Every book holds a world of its <em class="relative whitespace-nowrap not-italic text-terra">own.<svg class="absolute -bottom-3.5 -left-[2%] h-5 w-[104%] overflow-visible" viewBox="0 0 200 20" preserveAspectRatio="none"><path d="M3 12C30 2 50 18 80 9s55 6 80-1 30 5 37 2" fill="none" stroke="#f2b134" stroke-width="7" stroke-linecap="round"/></svg></em></h1>
<p class="mx-auto mt-[26px] max-w-[520px] text-[1.12rem] font-semibold text-soft">Type the title, the publisher and the price. Your book gets a cover and finds its place on the shelf.</p>
</section>

<div class="relative mb-14 mt-2 drop-shadow-[0_26px_22px_rgba(43,33,24,.22)]" aria-hidden="true">
<svg class="block h-auto w-full" viewBox="0 0 1200 450">

<rect x="0" y="0" width="1200" height="450" rx="18" fill="#efd7a6" stroke="<?= $ink ?>" stroke-width="4"/>
<g opacity=".35" stroke="#c9a56a" stroke-width="3"><path d="M60 0v450M180 0v450M300 0v450M420 0v450M540 0v450M660 0v450M780 0v450M900 0v450M1020 0v450M1140 0v450"/></g>
<rect x="0" y="0" width="22" height="450" rx="10" fill="#a8683f" stroke="<?= $ink ?>" stroke-width="4"/>
<rect x="1178" y="0" width="22" height="450" rx="10" fill="#a8683f" stroke="<?= $ink ?>" stroke-width="4"/>

<?php

$base = 206; $x = 44;
$top = array(
  array('b', 36, 150, 0, 0, 0), array('b', 46, 166, 2, 1, 0), array('b', 32, 128, 1, 2, 0), array('b', 42, 158, 3, 3, 0),
  array('b', 38, 142, 6, 4, 0), array('b', 34, 160, 4, 0, 0), array('b', 48, 148, 7, 1, 0), array('b', 36, 120, 5, 2, -9),
  array('cat'), array('b', 40, 154, 8, 3, 0), array('b', 34, 138, 9, 0, 0), array('b', 44, 162, 0, 4, 0),
  array('b', 32, 130, 2, 2, 0), array('b', 40, 150, 1, 1, 0), array('plant'),
  array('b', 36, 156, 3, 3, 0), array('b', 44, 140, 5, 0, 0), array('b', 34, 164, 7, 4, 0), array('b', 40, 126, 9, 2, 8)
);
foreach ($top as $it) {
    if ($it[0] === 'b') {
        echo $drawBook($x, $base, $it[1], $it[2], $palette[$it[3]], $it[4], $it[5]);
        $x += $it[1] + 5 + ($it[5] ? 14 : 0);
    } elseif ($it[0] === 'cat') {
        echo $drawCat($x + 6, $base); $x += 140;
    } else {
        echo $drawPlant($x + 14, $base); $x += 110;
    }
}
?>

<rect x="14" y="206" width="1172" height="22" rx="5" fill="#a8683f" stroke="<?= $ink ?>" stroke-width="4"/>
<rect x="22" y="210" width="1156" height="5" rx="2.5" fill="#fff" opacity=".22"/>

<?php

$base = 424; $x = 44;
$bottom = array(
  array('b', 42, 168, 3, 1, 0), array('b', 34, 140, 5, 0, 0), array('b', 46, 160, 8, 3, 0), array('b', 36, 150, 1, 2, 0),
  array('b', 40, 126, 6, 4, -8), array('b', 44, 164, 0, 0, 0), array('b', 34, 146, 9, 1, 0), array('b', 38, 158, 2, 3, 0),
  array('slot'),
  array('b', 36, 152, 7, 2, 0), array('b', 44, 140, 4, 4, 0), array('b', 32, 166, 3, 0, 0), array('b', 40, 132, 5, 1, 0),
  array('stack'), array('b', 38, 156, 1, 3, 0), array('b', 34, 142, 6, 2, 0), array('b', 44, 164, 0, 4, 0),
  array('b', 36, 150, 8, 1, 0), array('b', 42, 134, 2, 0, 0), array('b', 32, 168, 4, 2, 0)
);
foreach ($bottom as $it) {
    if ($it[0] === 'b') {
        echo $drawBook($x, $base, $it[1], $it[2], $palette[$it[3]], $it[4], $it[5]);
        $x += $it[1] + 5 + ($it[5] ? 14 : 0);
    } elseif ($it[0] === 'stack') {
        echo $drawStack($x + 4, $base); $x += 168;
    } else {
        
        $sw = 58; $sh = 176; $sy = $base - $sh; $cx = $x + $sw / 2;
        if ($show) {
            echo '<g class="animate-dropin"><g class="' . $bkCls . '">'
               . '<rect x="' . $x . '" y="' . $sy . '" width="' . $sw . '" height="' . $sh . '" rx="4" fill="' . $coverBg[$cardCover] . '" stroke="' . $ink . '" stroke-width="2.5"/>'
               . '<rect x="' . ($x + 6) . '" y="' . ($sy + 3) . '" width="4" height="' . ($sh - 6) . '" rx="2" fill="#fff" opacity=".28"/>'
               . '<rect x="' . $x . '" y="' . ($sy + 14) . '" width="' . $sw . '" height="6" fill="#f2d98a"/><rect x="' . $x . '" y="' . ($base - 20) . '" width="' . $sw . '" height="6" fill="#f2d98a"/>'
               . '<text transform="translate(' . ($cx + 5) . ' ' . ($base - 32) . ') rotate(-90)" font-family="Young Serif, Georgia, serif" font-size="15" fill="' . ($cardCover === 2 || $cardCover === 3 || $cardCover === 5 ? $ink : '#fff4dc') . '">' . html_escape($spineTitle) . '</text>'
               . '<g transform="translate(' . ($x + $sw - 6) . ' ' . ($sy - 6) . ') rotate(12)"><circle r="19" fill="#f2b134" stroke="' . $ink . '" stroke-width="2.5"/><text text-anchor="middle" y="5" font-family="Young Serif, Georgia, serif" font-size="13" fill="' . $ink . '">NEW</text></g>'
               . '</g></g>';
        } else {
            echo '<g class="animate-pulse2"><rect x="' . $x . '" y="' . $sy . '" width="' . $sw . '" height="' . $sh . '" rx="5" fill="rgba(255,255,255,.35)" stroke="' . $ink . '" stroke-width="3" stroke-dasharray="9 8"/>'
               . '<path d="M' . $cx . ' ' . ($sy + 68) . 'v34M' . ($cx - 17) . ' ' . ($sy + 85) . 'h34" stroke="' . $ink . '" stroke-width="5" stroke-linecap="round"/>'
               . '<text x="' . $cx . '" y="' . ($sy + 134) . '" text-anchor="middle" font-family="Caveat, cursive" font-weight="700" font-size="22" fill="' . $ink . '">yours</text></g>';
        }
        $x += $sw + 8;
    }
}
?>

<rect x="14" y="424" width="1172" height="22" rx="5" fill="#a8683f" stroke="<?= $ink ?>" stroke-width="4"/>
<rect x="22" y="428" width="1156" height="5" rx="2.5" fill="#fff" opacity=".22"/>
</svg>
</div>

<div class="grid items-start gap-12 pb-[90px] min-[980px]:grid-cols-2 min-[980px]:gap-[60px]">

<section>

<?= form_open('book', array('id' => 'bookForm', 'novalidate' => 'novalidate', 'class' => $formCls)) ?>

<span class="absolute -top-4 left-[9%] h-8 w-24 -rotate-[5deg] border-2 border-ink bg-mustard/85"></span>
<span class="absolute -top-4 right-[9%] h-8 w-24 rotate-[4deg] border-2 border-ink bg-pink/90"></span>

<div>
<h2 class="font-title text-[1.9rem] font-normal leading-[1.1]">Book details</h2>
<p class="mt-1.5 font-hand text-[1.35rem] font-bold text-teal">all three fields are required. ✎</p>
</div>

<?php if (validation_errors()): ?>
<div class="mt-[18px] rounded-[14px] border-[2.5px] border-ink bg-[#ffd9d2] px-4 py-3 text-[.92rem] font-extrabold">Oops! Please fix the highlighted fields and try again.</div>
<?php endif; ?>

<div class="mt-6">
<label for="title" class="<?= $lblCls ?>">Book title <span class="text-terra">*</span></label>
<div class="<?= $inpWrap ?> <?= form_error('title') ? 'bad' : '' ?>">
<svg class="<?= $iconCls ?>" viewBox="0 0 32 32" fill="none" stroke="#2b2118" stroke-width="2.4" stroke-linejoin="round" stroke-linecap="round"><rect x="6" y="3" width="19" height="26" rx="3" fill="#f4b5b0"/><path d="M11 3v26M15 10h6M15 15h5"/></svg>
<input id="title" name="title" type="text" maxlength="100" placeholder="e.g. The Little Prince" value="<?= $show ? '' : set_value('title') ?>" autocomplete="off" class="<?= $inpCls ?>">
</div>
<p class="<?= $errCls ?>" data-err="title"><?= form_error('title') ? strip_tags(form_error('title')) : '' ?></p>
</div>

<div class="mt-6">
<label for="publisher" class="<?= $lblCls ?>">Publisher <span class="text-terra">*</span></label>
<div class="<?= $inpWrap ?> <?= form_error('publisher') ? 'bad' : '' ?>">
<svg class="<?= $iconCls ?>" viewBox="0 0 32 32" fill="none" stroke="#2b2118" stroke-width="2.4" stroke-linejoin="round" stroke-linecap="round"><path d="M4 28h24M7 28V13l9-8 9 8v15" fill="#f2b134"/><rect x="13" y="18" width="6" height="10" fill="#fff4dc"/></svg>
<input id="publisher" name="publisher" type="text" maxlength="80" placeholder="e.g. Green Leaf Press" value="<?= $show ? '' : set_value('publisher') ?>" autocomplete="off" class="<?= $inpCls ?>">
</div>
<p class="<?= $errCls ?>" data-err="publisher"><?= form_error('publisher') ? strip_tags(form_error('publisher')) : '' ?></p>
</div>

<div class="mt-6">
<label for="price" class="<?= $lblCls ?>">Price <span class="text-terra">*</span></label>
<div class="<?= $inpWrap ?> <?= form_error('price') ? 'bad' : '' ?>">
<svg class="<?= $iconCls ?>" viewBox="0 0 32 32" fill="none" stroke="#2b2118" stroke-width="2.4" stroke-linejoin="round" stroke-linecap="round"><path d="M4 16L16 4h11v11L15 27z" fill="#8fb996"/><circle cx="21" cy="10" r="2.2" fill="#fff4dc"/></svg>
<input id="price" name="price" type="text" inputmode="decimal" placeholder="e.g. 250000" value="<?= $show ? '' : set_value('price') ?>" autocomplete="off" class="<?= $inpCls ?>">
</div>
<p class="<?= $errCls ?>" data-err="price"><?= form_error('price') ? strip_tags(form_error('price')) : '' ?></p>
</div>

<button type="submit" id="sendBtn" class="group relative mt-[34px] flex h-16 w-full cursor-pointer items-center justify-center gap-3 rounded-[18px] border-[3px] border-ink bg-terra font-title text-[1.2rem] text-white shadow-[6px_6px_0_theme(colors.ink)] transition duration-150 hover:translate-x-[3px] hover:translate-y-[3px] hover:shadow-[3px_3px_0_theme(colors.ink)] active:translate-x-1.5 active:translate-y-1.5 active:shadow-none disabled:cursor-wait disabled:opacity-70">
<svg class="h-7 w-7 transition-transform duration-300 ease-[cubic-bezier(.3,1.6,.5,1)] group-hover:-rotate-12 group-hover:scale-[1.15]" viewBox="0 0 32 32" fill="none" stroke="#2b2118" stroke-width="2.4" stroke-linejoin="round" stroke-linecap="round"><rect x="7" y="4" width="18" height="24" rx="3" fill="#fff4dc"/><path d="M12 4v24M16 11h5"/></svg>
<span id="sendText">Show my book</span>
</button>

<p class="mt-[18px] text-center font-hand text-[1.2rem] font-bold text-soft">Careful… some books change you forever.-</p>

<?= form_close() ?>

</section>

<section id="result" class="scroll-mt-6">

<?php if ($show): ?>
<div class="inline-flex animate-pop items-center gap-3 rounded-full border-[3px] border-ink bg-[#bfe8c8] py-2.5 pl-3 pr-5 font-extrabold shadow-[4px_4px_0_theme(colors.ink)]"><span class="grid h-[30px] w-[30px] place-items-center rounded-full border-[2.5px] border-ink bg-white text-[.95rem]">✓</span> Your book was saved successfully!</div>
<?php else: ?>
<div class="inline-flex items-center gap-3 rounded-full border-[3px] border-dashed border-ink bg-cream py-2.5 pl-3 pr-5 font-extrabold"><span class="grid h-[30px] w-[30px] place-items-center rounded-full border-[2.5px] border-ink bg-white text-[.95rem]">←</span> Fill in the form and your book will show up here.</div>
<?php endif; ?>

<div id="table" class="relative mt-1.5 grid place-items-center pt-[54px] [&.ghost_.bookwrap]:opacity-50 [&.ghost_.bookwrap]:saturate-[.6] <?= $show ? '' : 'ghost' ?>">
<div class="absolute left-1/2 top-10 aspect-square w-[min(440px,92%)] -translate-x-1/2 rounded-full bg-[radial-gradient(circle,#ffe29a_0%,#ffd57a_55%,rgba(255,213,122,0)_72%)] after:absolute after:inset-[12%] after:animate-spin50 after:rounded-full after:border-[3px] after:border-dashed after:border-terra/55 after:content-['']"></div>
<span class="absolute left-[8%] top-[60px] animate-tw text-[1.7rem] text-terra">✦</span>
<span class="absolute right-[6%] top-[30px] animate-tw text-[1.7rem] text-teal [animation-delay:-1s]">✦</span>
<span class="absolute right-[14%] top-[250px] animate-tw text-[1.2rem] text-terra [animation-delay:-2s]">✦</span>

<div class="bookwrap relative z-[2] w-[min(66vw,262px)] -rotate-[4deg] animate-float transition-transform duration-500 ease-[cubic-bezier(.3,1.5,.5,1)] hover:rotate-1 hover:scale-[1.04] hover:[animation-play-state:paused]">
<div class="absolute inset-[10px_-12px_-10px_10px] rounded-[6px_16px_16px_6px] border-[3px] border-ink bg-[repeating-linear-gradient(180deg,#fffaf0_0_3px,#e8d9b8_3px_4px)]"></div>
<span class="absolute -top-1.5 right-[46px] z-[1] h-[92px] w-[26px] border-[3px] border-t-0 border-ink bg-[#d9534f] [clip-path:polygon(0_0,100%_0,100%_100%,50%_82%,0_100%)]"></span>

<div class="relative aspect-[260/370] overflow-hidden rounded-[6px_16px_16px_6px] border-[3px] border-ink" style="background-color:<?= $coverBg[$cardCover] ?>">
<?php
$arts = array(

'<ellipse cx="130" cy="150" rx="0" ry="0"/><circle cx="130" cy="150" r="80" fill="none" stroke="#f2b134" stroke-width="9" stroke-dasharray="3 15" stroke-linecap="round"/><circle cx="130" cy="150" r="54" fill="#f7c35a" stroke="#2b2118" stroke-width="3"/><path d="M0 250Q70 190 140 240T260 225V370H0Z" fill="#e2725b" stroke="#2b2118" stroke-width="3"/><path d="M0 292Q90 236 170 282T260 270V370H0Z" fill="#c9543f" stroke="#2b2118" stroke-width="3"/><path d="M0 332Q80 292 150 324T260 314V370H0Z" fill="#14403d" stroke="#2b2118" stroke-width="3"/><path d="M40 60l4 9 9 4-9 4-4 9-4-9-9-4 9-4zM214 76l3 7 7 3-7 3-3 7-3-7-7-3 7-3z" fill="#fff4dc"/>',

'<circle cx="170" cy="92" r="44" fill="#fff4dc" stroke="#2b2118" stroke-width="3"/><circle cx="190" cy="80" r="37" fill="#26355d"/><g fill="#fff4dc"><circle cx="50" cy="60" r="3"/><circle cx="96" cy="112" r="2.5"/><circle cx="224" cy="168" r="3"/><circle cx="30" cy="150" r="2.5"/><circle cx="120" cy="40" r="2.5"/></g><path d="M78 196l22-52 22 52z" fill="#fff4dc" stroke="#2b2118" stroke-width="3" stroke-linejoin="round"/><path d="M64 200h72l-10 22H74z" fill="#e2725b" stroke="#2b2118" stroke-width="3" stroke-linejoin="round"/><path d="M-10 236q20-22 40 0t40 0 40 0 40 0 40 0 40 0 40 0V370H-10z" fill="#2f8f9d" stroke="#2b2118" stroke-width="3"/><path d="M-10 276q20-22 40 0t40 0 40 0 40 0 40 0 40 0 40 0V370H-10z" fill="#1f6f6a" stroke="#2b2118" stroke-width="3"/><path d="M-10 316q20-22 40 0t40 0 40 0 40 0 40 0 40 0 40 0V370H-10z" fill="#14403d" stroke="#2b2118" stroke-width="3"/>',

'<g stroke="#2b2118" stroke-width="3" stroke-linecap="round" fill="none"><path d="M130 380C130 300 90 240 76 150"/><path d="M130 380C132 290 170 230 176 112"/><path d="M130 380C128 300 130 220 132 186"/></g><g stroke="#2b2118" stroke-width="3" stroke-linejoin="round"><ellipse cx="96" cy="266" rx="14" ry="34" transform="rotate(-48 96 266)" fill="#5aa469"/><ellipse cx="164" cy="254" rx="14" ry="34" transform="rotate(48 164 254)" fill="#78bd7e"/><ellipse cx="108" cy="316" rx="12" ry="30" transform="rotate(-70 108 316)" fill="#3f8a55"/><ellipse cx="154" cy="320" rx="12" ry="30" transform="rotate(70 154 320)" fill="#5aa469"/></g><g stroke="#2b2118" stroke-width="3"><g fill="#f2b134"><circle cx="76" cy="112" r="17"/><circle cx="54" cy="130" r="17"/><circle cx="98" cy="130" r="17"/><circle cx="62" cy="152" r="17"/><circle cx="90" cy="152" r="17"/></g><circle cx="76" cy="132" r="12" fill="#e2725b"/><g fill="#fff4dc"><circle cx="176" cy="76" r="16"/><circle cx="198" cy="92" r="16"/><circle cx="154" cy="92" r="16"/><circle cx="188" cy="116" r="16"/><circle cx="164" cy="116" r="16"/></g><circle cx="176" cy="96" r="11" fill="#f2b134"/><g fill="#e2725b"><circle cx="132" cy="160" r="13"/><circle cx="150" cy="176" r="13"/><circle cx="114" cy="176" r="13"/><circle cx="124" cy="198" r="13"/><circle cx="142" cy="198" r="13"/></g><circle cx="132" cy="180" r="9" fill="#fff4dc"/></g>',

'<path d="M260 150A130 130 0 0 0 130 20H260Z" fill="#1f6f6a" stroke="#2b2118" stroke-width="3"/><circle cx="92" cy="118" r="66" fill="#e2725b" stroke="#2b2118" stroke-width="3"/><path d="M0 370V236L134 370Z" fill="#26355d" stroke="#2b2118" stroke-width="3"/><path d="M130 370a65 65 0 0 1 130 0Z" fill="#f2b134" stroke="#2b2118" stroke-width="3"/><circle cx="196" cy="214" r="26" fill="#f4b5b0" stroke="#2b2118" stroke-width="3"/><path d="M20 210h120M20 224h120M20 238h80" stroke="#2b2118" stroke-width="3" stroke-linecap="round"/><circle cx="92" cy="118" r="26" fill="#fff4dc" stroke="#2b2118" stroke-width="3"/>',

'<g fill="#fff4dc"><circle cx="40" cy="50" r="3"/><circle cx="96" cy="100" r="2.5"/><circle cx="210" cy="40" r="3"/><circle cx="238" cy="130" r="2.5"/><circle cx="60" cy="150" r="2"/><circle cx="150" cy="30" r="2.5"/><path d="M180 84l4 9 9 4-9 4-4 9-4-9-9-4 9-4z"/></g><path d="M120 62a50 50 0 1 0 50 62a40 40 0 1 1-50-62z" fill="#fff4dc" stroke="#2b2118" stroke-width="3" stroke-linejoin="round"/><path d="M0 250l60-70 60 60 50-50 90 70V370H0z" fill="#2c2250" stroke="#2b2118" stroke-width="3" stroke-linejoin="round"/><path d="M60 300h56v-36l-28-24-28 24z" fill="#e2725b" stroke="#2b2118" stroke-width="3" stroke-linejoin="round"/><rect x="80" y="276" width="16" height="24" fill="#f2b134" stroke="#2b2118" stroke-width="2.5"/><path d="M170 300l18-48 18 48zM198 300l14-38 14 38z" fill="#1f6f6a" stroke="#2b2118" stroke-width="3" stroke-linejoin="round"/><rect x="0" y="296" width="260" height="74" fill="#1d1738" stroke="#2b2118" stroke-width="3"/>',

'<g stroke="#2b2118" stroke-width="3"><path d="M30 300V190a100 100 0 0 1 200 0V300Z" fill="#e2725b"/><path d="M50 300V190a80 80 0 0 1 160 0V300Z" fill="#f4b5b0"/><path d="M70 300V190a60 60 0 0 1 120 0V300Z" fill="#fff4dc"/><path d="M90 300V190a40 40 0 0 1 80 0V300Z" fill="#1f6f6a"/><path d="M110 300V190a20 20 0 0 1 40 0V300Z" fill="#26355d"/></g><path d="M0 300h260v70H0z" fill="#d89a1f" stroke="#2b2118" stroke-width="3"/><g fill="#fff4dc"><circle cx="44" cy="56" r="5"/><circle cx="220" cy="48" r="5"/><path d="M214 110l3 7 7 3-7 3-3 7-3-7-7-3 7-3zM32 120l3 7 7 3-7 3-3 7-3-7-7-3 7-3z"/></g>'
);
echo '<svg class="absolute inset-0 h-full w-full" viewBox="0 0 260 370" preserveAspectRatio="none" aria-hidden="true">' . $arts[$cardCover] . '</svg>';
?>
<span class="absolute inset-y-0 left-0 w-5 border-r-[3px] border-ink bg-ink/30 before:absolute before:inset-x-[3px] before:top-[34px] before:h-[3px] before:bg-[#f2d98a] before:content-[''] after:absolute after:inset-x-[3px] after:bottom-[34px] after:h-[3px] after:bg-[#f2d98a] after:content-['']"></span>

<div class="absolute bottom-[22px] left-[34px] right-[14px] rounded-[10px] border-[3px] border-ink bg-cream px-3 pb-[11px] pt-3 text-center shadow-[3px_3px_0_rgba(43,33,24,.4)]">
<h2 data-pv="title" class="line-clamp-3 font-title text-[1.3rem] font-normal leading-[1.1] [overflow-wrap:anywhere] [&.long]:text-[1.02rem]"><?= html_escape($cardTitle) ?></h2>
<p data-pv="publisher" class="mt-1.5 line-clamp-2 border-t-2 border-dotted border-ink pt-1.5 text-[.72rem] font-extrabold uppercase tracking-[.14em] text-soft [overflow-wrap:anywhere]"><?= html_escape($cardPub) ?></p>
</div>
</div>

<div class="absolute right-[-50px] top-[46px] z-[4] origin-left rotate-[9deg] animate-swing rounded-[8px_18px_18px_8px] border-[3px] border-ink bg-cream pb-2.5 pl-[30px] pr-[18px] pt-3 shadow-[4px_4px_0_theme(colors.ink)] before:absolute before:left-[9px] before:top-1/2 before:-mt-[5px] before:h-[11px] before:w-[11px] before:rounded-full before:border-[3px] before:border-ink before:bg-paper before:content-['']">
<small class="block font-hand text-[1.05rem] font-bold leading-none text-soft">price</small>
<b data-pv="price" class="whitespace-nowrap font-title text-[1.4rem] font-normal leading-[1.1] text-terra"><?= html_escape($cardPrice) ?></b>
</div>
</div>

<svg class="absolute bottom-6 left-[2%] z-[3] w-[84px]" viewBox="0 0 84 100" aria-hidden="true"><g transform="translate(0 -18)"><path class="origin-[41px_70px] animate-sway" d="M40 70C36 40 10 38 4 14c26 0 38 20 36 56z" fill="#5aa469" stroke="#2b2118" stroke-width="2.5" stroke-linejoin="round"/><path class="origin-[41px_70px] animate-sway [animation-delay:-2s]" d="M42 70C46 36 72 30 80 4c-28 4-42 30-38 66z" fill="#78bd7e" stroke="#2b2118" stroke-width="2.5" stroke-linejoin="round"/><path d="M14 70h54l-7 48H21z" fill="#f2b134" stroke="#2b2118" stroke-width="2.5" stroke-linejoin="round"/><rect x="10" y="64" width="62" height="14" rx="4" fill="#f7c35a" stroke="#2b2118" stroke-width="2.5"/></g></svg>
<svg class="absolute bottom-6 right-[2%] z-[3] w-24" viewBox="0 0 96 90" aria-hidden="true"><path d="M20 40h52l-6 40H26z" fill="#fff4dc" stroke="#2b2118" stroke-width="3" stroke-linejoin="round"/><path d="M72 48q18 2 12 18q-4 10-14 8" fill="none" stroke="#2b2118" stroke-width="3" stroke-linecap="round"/><path d="M28 54h36" stroke="#e2725b" stroke-width="6"/><path class="animate-steam" d="M34 28q-9-10 0-20" fill="none" stroke="#b9a58a" stroke-width="3.5" stroke-linecap="round"/><path class="animate-steam [animation-delay:-1.3s]" d="M50 28q-9-10 0-20" fill="none" stroke="#b9a58a" stroke-width="3.5" stroke-linecap="round"/></svg>

<div class="relative z-[1] mt-[34px] h-5 w-full rounded-lg border-[3px] border-ink bg-gradient-to-b from-[#c88955] to-wood shadow-[0_12px_0_-4px_rgba(43,33,24,.18)]"></div>
</div>

<?php if ($show): ?>

<div class="relative mt-10 rounded-[6px_6px_18px_18px] border-[3px] border-ink bg-[#fffaf0] px-[26px] pb-[22px] pt-[34px] shadow-[7px_7px_0_theme(colors.ink)] before:absolute before:-left-[3px] before:-right-[3px] before:-top-[15px] before:h-[14px] before:bg-[radial-gradient(circle_at_10px_14px,#fffaf0_7px,#2b2118_7px_10px,transparent_10.5px)] before:bg-repeat-x before:[background-size:20px_14px] before:content-['']">
<h3 class="mb-1.5 font-hand text-[1.55rem] font-bold leading-none text-teal">library slip</h3>
<div class="flex items-baseline gap-2.5 border-b-[2.5px] border-dotted border-ink py-[11px]"><span class="flex-none text-[.7rem] font-extrabold uppercase tracking-[.2em] text-soft">Book title</span><span class="flex-1 text-right text-[1.05rem] font-extrabold [overflow-wrap:anywhere]"><?= html_escape($book['title']) ?></span></div>
<div class="flex items-baseline gap-2.5 border-b-[2.5px] border-dotted border-ink py-[11px]"><span class="flex-none text-[.7rem] font-extrabold uppercase tracking-[.2em] text-soft">Publisher</span><span class="flex-1 text-right text-[1.05rem] font-extrabold [overflow-wrap:anywhere]"><?= html_escape($book['publisher']) ?></span></div>
<div class="flex items-baseline gap-2.5 py-[11px]"><span class="flex-none text-[.7rem] font-extrabold uppercase tracking-[.2em] text-soft">Price</span><span class="flex-1 text-right font-title text-[1.5rem] font-normal text-terra [overflow-wrap:anywhere]"><?= html_escape($book['price_formatted']) ?> <small class="font-body text-[.78rem] font-bold text-soft">$</small></span></div>
</div>
<?php endif; ?>

</section>

</div>

</div>

<footer class="relative z-[2] px-[22px] pb-9 pt-[26px] text-center font-hand text-[1.3rem] font-bold text-soft">The pages were silent, yet they knew everything.- ☕</footer>

<script>

(function () {
  var form = document.getElementById('bookForm');
  if (!form) return;

  var f = {
    title: form.querySelector('#title'),
    publisher: form.querySelector('#publisher'),
    price: form.querySelector('#price')
  };

  function digits(s) {
    return s.replace(/[۰-۹]/g, function (d) { return d.charCodeAt(0) - 1776; })
            .replace(/[٠-٩]/g, function (d) { return d.charCodeAt(0) - 1632; })
            .replace(/[,٬\s]/g, '');
  }

  var rules = {
    title: function (v) {
      v = v.trim();
      if (!v) return 'Please enter the book title.';
      if (v.length < 2) return 'The book title must be at least 2 characters.';
      if (v.length > 100) return 'The book title can be at most 100 characters.';
      return '';
    },
    publisher: function (v) {
      v = v.trim();
      if (!v) return 'Please enter the publisher.';
      if (v.length < 2) return 'The publisher must be at least 2 characters.';
      if (v.length > 80) return 'The publisher can be at most 80 characters.';
      return '';
    },
    price: function (v) {
      v = digits(v.trim());
      if (!v) return 'Please enter the price.';
      if (!/^\d+(\.\d+)?$/.test(v)) return 'The price must be a number (digits only).';
      if (parseFloat(v) <= 0) return 'The price must be greater than 0.';
      return '';
    }
  };

  function show(key, msg) {
    form.querySelector('[data-err="' + key + '"]').textContent = msg || '';
    f[key].parentNode.classList.toggle('bad', !!msg);
  }

  Object.keys(f).forEach(function (key) {
    f[key].addEventListener('blur', function () { show(key, rules[key](f[key].value)); });
    f[key].addEventListener('input', function () {
      if (f[key].parentNode.classList.contains('bad')) show(key, rules[key](f[key].value));
    });
  });

  form.addEventListener('submit', function (e) {
    var first = null;
    Object.keys(f).forEach(function (key) {
      var msg = rules[key](f[key].value);
      show(key, msg);
      if (msg && !first) first = f[key];
    });
    if (first) { e.preventDefault(); first.focus(); return; }
    document.getElementById('sendBtn').disabled = true;
    document.getElementById('sendText').textContent = 'Saving…';
  });
})();

<?php if ($show): ?>

(function () {
  var r = document.getElementById('result');
  if (r && window.innerWidth < 980) setTimeout(function () { r.scrollIntoView({ behavior: 'smooth', block: 'start' }); }, 150);
})();
<?php endif; ?>

(function () {
  var form = document.getElementById('bookForm');
  if (!form) return;
  var inputs = { title: form.querySelector('#title'), publisher: form.querySelector('#publisher'), price: form.querySelector('#price') };
  var targets = {};
  Object.keys(inputs).forEach(function (k) {
    targets[k] = Array.prototype.slice.call(document.querySelectorAll('[data-pv="' + k + '"]'));
    targets[k].forEach(function (el) { el.setAttribute('data-def', el.textContent); });
  });

  function fmtPrice(v) {
    v = v.replace(/[۰-۹]/g, function (d) { return d.charCodeAt(0) - 1776; })
         .replace(/[٠-٩]/g, function (d) { return d.charCodeAt(0) - 1632; })
         .replace(/[,٬\s]/g, '');
    return /^\d+$/.test(v) ? v.replace(/\B(?=(\d{3})+(?!\d))/g, ',') : v;
  }

  function update(k) {
    var v = inputs[k].value.trim();
    if (k === 'price') v = fmtPrice(v);
    targets[k].forEach(function (el) {
      el.textContent = v || el.getAttribute('data-def');
      if (k === 'title') el.classList.toggle('long', (v || '').length > 28);
    });
    var stage = document.getElementById('table');
    if (stage) stage.classList.remove('ghost');
  }

  Object.keys(inputs).forEach(function (k) { inputs[k].addEventListener('input', function () { update(k); }); });
})();

</script>

</body>
</html>