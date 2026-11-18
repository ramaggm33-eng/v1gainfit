// Pencarian latihan (beranda & pencarian): saring kartu berdasarkan teks.
(function () {
    var input = document.getElementById('cari');
    if (input) {
        var kartu = document.querySelectorAll('[data-cari]');
        var kosong = document.querySelector('.empty');
        input.addEventListener('input', function () {
            var q = input.value.trim().toLowerCase();
            var ada = 0;
            kartu.forEach(function (k) {
                var cocok = k.getAttribute('data-cari').indexOf(q) !== -1;
                k.hidden = !cocok;
                if (cocok) ada++;
            });
            if (kosong) kosong.hidden = ada > 0;
        });
    }

    // Tombol "Lihat/Sembunyi" kata sandi di halaman login.
    document.querySelectorAll('.toggle-pass').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var f = document.getElementById(btn.getAttribute('data-target'));
            var tampil = f.type === 'password';
            f.type = tampil ? 'text' : 'password';
            btn.textContent = tampil ? 'Sembunyi' : 'Lihat';
        });
    });
})();
