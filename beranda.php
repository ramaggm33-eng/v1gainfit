<?php
require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/helpers.php';
$user  = require_login();
$judul = 'Beranda';
$aktif = 'beranda';

$olahraga = [
    ['GYM',          'barbell'],
    ['YOGA',         'yoga'],
    ['SENAM',        'stretching'],
    ['CALISTHENICS', 'karate'],
];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/topbar.php';
?>
<div class="row mt-4">
    <h2>Target Mingguan</h2>
    <span class="num">0/4</span>
</div>
<div class="week">
    <?php foreach (minggu_ini() as $h): ?>
        <span class="<?= $h['hari_ini'] ? 'dot-today' : '' ?>"><?= $h['tgl'] ?></span>
    <?php endforeach; ?>
</div>

<h2 class="mt-5">Jenis Olahraga</h2>
<div class="tiles mt-4" data-filter-list>
    <?php foreach ($olahraga as [$nama, $ikon]): ?>
        <button type="button" class="tile" data-cari="<?= e(strtolower($nama)) ?>">
            <?= icon($ikon, 72, 'icon-grad') ?>
            <span class="tile-name<?= strlen($nama) > 8 ? ' is-long' : '' ?>"><?= e($nama) ?></span>
        </button>
    <?php endforeach; ?>
</div>
<p class="empty" hidden>Latihan tidak ditemukan.</p>
<?php require __DIR__ . '/includes/footer.php'; ?>
