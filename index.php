<?php
require __DIR__ . '/includes/auth.php';
header('Location: ' . (current_user() ? 'beranda.php' : 'login.php'));
exit;
