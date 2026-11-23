
<!-- Section Pesan Berhasil dari Sisi Peladen -->
<?php if (!empty($pesanBerhasil)): ?>
    <section class="pesan-berhasil">
        <h3>BERHASIL!</h3>
        <p>
            <?= htmlspecialchars($pesanBerhasil, ENT_QUOTES, 'UTF-8') ?>
        </p>
        <p>Terima kasih, data formulir Anda berhasil diterima oleh peladen.</p>
    </section>
<?php endif; ?>

<!-- Section Pesan Kesalahan -->
<?php if (!empty($pesanKesalahan)): ?>
    <section class="pesan-error">
        <h3>TERJADI KESALAHAN!</h3>
        <p>
            <?= htmlspecialchars($pesanKesalahan, ENT_QUOTES, 'UTF-8') ?>
        </p>
    </section>
<?php endif; ?>
