<?php
require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/icons.php';

if (current_user()) {
    header('Location: beranda.php');
    exit;
}

$error = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim((string) ($_POST['email'] ?? '')));
    $pass  = (string) ($_POST['password'] ?? '');
    $lock  = (int) ($_SESSION['lock_until'] ?? 0);

    if (!csrf_check($_POST['csrf'] ?? null)) {
        $error = 'Sesi kedaluwarsa. Muat ulang halaman lalu coba lagi.';
    } elseif ($lock > time()) {
        $error = 'Terlalu banyak percobaan. Coba lagi dalam ' . ($lock - time()) . ' detik.';
    } else {
        $user = USERS[$email] ?? null;
        // password_verify tetap dijalankan agar waktu respons seragam
        $hash = $user['hash'] ?? array_values(USERS)[0]['hash'];
        $ok   = password_verify($pass, $hash) && $user !== null;

        if ($ok) {
            session_regenerate_id(true);
            $_SESSION['user'] = $email;
            unset($_SESSION['fails'], $_SESSION['lock_until']);
            header('Location: beranda.php');
            exit;
        }

        $_SESSION['fails'] = (int) ($_SESSION['fails'] ?? 0) + 1;
        if ($_SESSION['fails'] >= MAX_LOGIN_FAILS) {
            $_SESSION['lock_until'] = time() + LOCK_SECONDS;
            $_SESSION['fails'] = 0;
        }
        $error = 'Email atau kata sandi salah.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#211638">
    <title>Masuk · <?= e(APP_NAME) ?></title>
    <link rel="manifest" href="manifest.json">
    <link rel="icon" type="image/png" href="assets/img/icon-192.png">
    <link rel="apple-touch-icon" href="assets/img/icon-192.png">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-body">
<svg width="0" height="0" class="defs" aria-hidden="true">
    <defs>
        <linearGradient id="gf-accent" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#FF007F"/><stop offset="1" stop-color="#7B2CBF"/>
        </linearGradient>
    </defs>
</svg>

<main class="login-card">
    <div class="login-logo"><?= icon('barbell', 44) ?></div>
    <h1 class="login-title"><?= e(APP_NAME) ?></h1>
    <p class="login-sub">Catat latihanmu, capai targetmu.</p>

    <?php if ($error !== ''): ?>
        <p class="alert" role="alert"><?= e($error) ?></p>
    <?php endif; ?>

    <form method="post" action="login.php" autocomplete="on" novalidate>
        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">

        <label class="field">
            <span>Email</span>
            <input type="email" name="email" value="<?= e($email) ?>" placeholder="nama@email.com"
                   autocomplete="username" inputmode="email" required autofocus>
        </label>

        <label class="field">
            <span>Kata sandi</span>
            <div class="field-pass">
                <input type="password" name="password" id="password" placeholder="••••••••"
                       autocomplete="current-password" required>
                <button type="button" class="toggle-pass" data-target="password">Lihat</button>
            </div>
        </label>

        <button type="submit" class="btn-primary">Masuk</button>
    </form>
</main>

<script src="assets/js/app.js"></script>
</body>
</html>
