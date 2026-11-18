# GAINFIT

Aplikasi pencatatan olahraga. Hanya HTML, PHP, CSS, dan JavaScript — tanpa database dan tanpa build.

## Menjalankan
Butuh PHP 7.4 atau lebih baru.

    php -S localhost:8000

Buka http://localhost:8000 — akun demo: `demo@gainfit.com` / `gainfit123`.
Untuk hosting biasa (Apache/XAMPP/cPanel), cukup salin foldernya ke `htdocs` / `public_html`.

## Struktur
- `login.php`, `logout.php`, `index.php` — masuk, keluar, pengalih awal
- `beranda.php`, `pencarian.php`, `laporan.php`, `profil.php` — empat halaman aplikasi
- `includes/` — konfigurasi & akun (`config.php`), sesi/CSRF (`auth.php`), ikon, header/footer
- `assets/` — `css/style.css`, `js/app.js`, ikon aplikasi
- `manifest.json` — agar bisa ditambahkan ke layar utama di Android

## Ganti akun / kata sandi
Edit `includes/config.php`. Buat hash baru dengan:

    php -r "echo password_hash('KATA_SANDI_BARU', PASSWORD_DEFAULT);"

## Tampilan
Mobile (Android) pakai menu bawah; tablet (≥768px) kartu jadi 4 kolom; desktop (≥1024px) menu pindah ke atas.
