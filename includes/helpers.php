<?php
// Tujuh hari pada minggu berjalan (Minggu–Sabtu), hari ini ditandai.
function minggu_ini(): array
{
    $nama   = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
    $today  = new DateTimeImmutable('today');
    $awal   = $today->modify('-' . (int) $today->format('w') . ' days');
    $hasil  = [];
    for ($i = 0; $i < 7; $i++) {
        $d = $awal->modify("+$i days");
        $hasil[] = [
            'nama'     => $nama[$i],
            'tgl'      => (int) $d->format('j'),
            'hari_ini' => $d == $today,
        ];
    }
    return $hasil;
}
