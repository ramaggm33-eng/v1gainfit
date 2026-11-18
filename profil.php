<?php
require __DIR__ . '/includes/auth.php';
$user  = require_login();
$judul = 'Profil';
$aktif = 'profil';

// 3 baris x 7 kolom: 12 selesai, 1 hari ini, sisanya kosong
$titik = [];
for ($i = 0; $i < 21; $i++) {
    $titik[] = $i < 12 ? 'done' : ($i === 12 ? 'today' : 'empty');
}

require __DIR__ . '/includes/header.php';
?>
<div class="profile-head mt-6">
    <div class="avatar"><?= icon('user', 56) ?></div>
    <div>
        <p class="name"><?= e($user['name']) ?></p>
        <p class="name"><?= (int) $user['activities'] ?> Aktivitas</p>
    </div>
</div>

<div class="two mt-6">
    <button type="button" class="panel btn-panel">Edit Profil</button>
    <button type="button" class="panel btn-panel">Bagikan Profil</button>
</div>

<div class="two mt-6 center">
    <div class="feature"><?= icon('notes', 80, 'icon-grad') ?><span>Kemajuan</span></div>
    <div class="feature"><?= icon('activity', 80, 'icon-grad') ?><span>Aktivitas</span></div>
</div>
<div class="underline"></div>

<div class="panel streak mt-6">
    <div class="two heading"><span>Streak</span><span>Bulan ini</span></div>
    <div class="two mt-3">
        <div class="streak-num"><?= icon('flame', 64, 'icon-pink') ?><b>0</b></div>
        <div class="dots">
            <?php foreach ($titik as $s): ?><span class="d-<?= $s ?>"></span><?php endforeach; ?>
        </div>
    </div>
</div>

<a class="btn-logout mt-6" href="logout.php">Keluar</a>
<?php require __DIR__ . '/includes/footer.php'; ?>
