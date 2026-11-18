<?php
require __DIR__ . '/includes/auth.php';
$user  = require_login();
$judul = 'Pencarian';
$aktif = 'pencarian';

$program = [
    ['PENURUAN BB', 'scale'],
    ['KEBUGARAN',   'flame'],
];
$pilihan = ['BICEP', 'ABS', 'LEG', 'CHEST'];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/topbar.php';
?>
<div data-filter-list>
    <h2 class="mt-6">Program Olahraga</h2>
    <div class="tiles mt-5">
        <?php foreach ($program as [$nama, $ikon]): ?>
            <div class="tile" data-cari="<?= e(strtolower($nama)) ?>">
                <?= icon($ikon, 64, 'icon-grad') ?>
                <span class="tile-name is-long"><?= e($nama) ?></span>
            </div>
        <?php endforeach; ?>
    </div>

    <h2 class="mt-6">Olahraga Pilihan</h2>
    <div class="tiles mt-5">
        <?php foreach ($pilihan as $nama): ?>
            <div class="tile" data-cari="<?= e(strtolower($nama)) ?>">
                <span class="tile-name is-big"><?= e($nama) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<p class="empty" hidden>Latihan tidak ditemukan.</p>
<?php require __DIR__ . '/includes/footer.php'; ?>
