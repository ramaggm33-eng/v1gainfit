<?php
// Variabel yang dibutuhkan: $judul (string), $aktif (beranda|pencarian|laporan|profil)
require_once __DIR__ . '/icons.php';

$menu = [
    'beranda'   => ['Beranda',   'home'],
    'pencarian' => ['Pencarian', 'search'],
    'laporan'   => ['Laporan',   'chart'],
    'profil'    => ['Profil',    'user'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#211638">
    <title><?= e($judul) ?> · <?= e(APP_NAME) ?></title>
    <link rel="manifest" href="manifest.json">
    <link rel="icon" type="image/png" href="assets/img/icon-192.png">
    <link rel="apple-touch-icon" href="assets/img/icon-192.png">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="app">
<svg width="0" height="0" class="defs" aria-hidden="true">
    <defs>
        <linearGradient id="gf-accent" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#FF007F"/><stop offset="1" stop-color="#7B2CBF"/>
        </linearGradient>
    </defs>
</svg>

<nav class="nav" aria-label="Menu utama">
    <a class="nav-brand" href="beranda.php"><?= e(APP_NAME) ?></a>
    <?php foreach ($menu as $kunci => [$label, $ikon]): ?>
        <a href="<?= $kunci ?>.php" class="nav-item<?= $aktif === $kunci ? ' is-active' : '' ?>"
           <?= $aktif === $kunci ? 'aria-current="page"' : '' ?>>
            <?= icon($ikon, 30) ?>
            <span><?= $label ?></span>
        </a>
    <?php endforeach; ?>
    <a class="nav-logout" href="logout.php">Keluar</a>
</nav>

<main class="page">
