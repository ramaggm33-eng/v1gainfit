<?php
// Pengaturan dasar GAINFIT.
// Akun demo: demo@gainfit.com / gainfit123
// Ganti hash dengan: php -r "echo password_hash('KATA_SANDI_BARU', PASSWORD_DEFAULT);"

const APP_NAME = 'GAINFIT';

const USERS = [
    'demo@gainfit.com' => [
        'name'       => 'Rayhan Ibrahim',
        'activities' => 99,
        'hash'       => '$6$eIo0oLk4OV7jbkJK$AMgoB/IHy0inLaG0mBaPFbWOluZv57WBUYb2zuk.7Ww3npi/GBUZu2476wydeSx58V/3RTNWA4FEfP.bgC5d3.',
    ],
];

// Batas percobaan login gagal sebelum dikunci sementara
const MAX_LOGIN_FAILS = 5;
const LOCK_SECONDS    = 60;

date_default_timezone_set('Asia/Jakarta');
