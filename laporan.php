<?php
require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/helpers.php';
$user  = require_login();
$judul = 'Laporan';
$aktif = 'laporan';

$sumbuY = [0];
$sumbuX = [];

require __DIR__ . '/includes/header.php';
?>
<div class="panel stats">
    <div><?= icon('trophy', 48, 'icon-pink') ?><b></b><small>Latihan</small></div>
    <div><?= icon('clock', 48, 'icon-pink') ?><b></b><small>Menit</small></div>
</div>

<div class="cols">
    <section>
        <div class="row mt-5">
            <h2>Riwayat</h2>
            <button type="button" class="link">Semua catatan</button>
        </div>
        <div class="panel mt-3">
            <div class="cal">
                <?php foreach (minggu_ini() as $h): ?><span><?= $h['nama'] ?></span><?php endforeach; ?>
                <?php foreach (minggu_ini() as $h): ?>
                    <span class="<?= $h['hari_ini'] ? 'dot-today' : '' ?>"><?= $h['tgl'] ?></span>
                <?php endforeach; ?>
            </div>
            <hr>
            <div class="streak-grid">
                <div>
                    <p>Hari Beruntun</p>
                    <p class="big"><?= icon('flame', 40, 'icon-pink') ?> </p>
                </div>
                <div>
                    <p>Terbaik Personal</p>
                    <p class="big">0 hari</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row mt-5">
            <h2>Berat Badan</h2>
            <button type="button" class="link">Catat</button>
        </div>
        <div class="panel mt-3">
            <div class="weight-top">
                <div><p>Saat ini</p><p class="big">0 kg</p></div>
                <div class="weight-minmax">
                    <span>Terberat</span><b>0</b>
                    <span>Teringan</span><b>0</b>
                </div>
            </div>
            <div class="chart">
                <?php foreach ($sumbuY as $i => $y): ?>
                    <div class="chart-line" style="top: <?= $i * 22 ?>px"><span><?= $y ?></span><i></i></div>
                <?php endforeach; ?>
                <svg viewBox="0 0 266 87" preserveAspectRatio="none" aria-hidden="true">
                    <path d="M11.6 20.6C6 17.6 7.3 6.4 0 0V86.5H266C129.7 66.9 150.1 97 113.6 47.8c-4.2-5.6-4.2-10.7-9.6-15.1-7.7-6.2-21.2-9.6-24.7-5.5-3.5 4-1.5 3-9.1 9.5-7.6 6.6-1.5-25.6-11.6-19.6-10.1 6-41.4 6.5-47 3.5Z" fill="#FF007F" fill-opacity=".6"/>
                </svg>
            </div>
            <div class="chart-x">
                <?php foreach ($sumbuX as $x): ?><span><?= e($x) ?></span><?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
