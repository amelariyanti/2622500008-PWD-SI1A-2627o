<?php
// pertemuan-08 - Amel ariyanti - 2622500008
// Bagian 1: Variabel dan konstanta
$nim = "2622500008";
$namaMahasiswa = "Amelariyanti";
$programStudi = "Sistem Informasi - SI1A";
$tahunAkademik = "2026/2027";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Dapur Manis 07</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dapur Manis 07 by <?= $namaMahasiswa ?></h1>
        <p>Menyediakan berbagai dessert dengan rasa lembut yang bikin kangen dan ketagihan</p>
    </header>
    
    <div class="container">
         <div class="sidebar">
            <nav>
                    <a href="index.html">Home</a>
                    <a href="profil.html">profil</a>
                    <a href="buku-tamu.html">Buku Tamu</a>
                </nav>
            </div>

        <div class="content">

           <section id="home">
            <div class="gambar-dessert">
                <h2>Aneka dessert cocok untuk diberbagai acara</h2>

                <img src="Chocolate-Lava-Cake.jpg">
                <img src="Red-velvet-cake.jpg">
                <img src="Strawberry-shortcake-slice.jpg">
                <img src="Blueberry-mouse-cake.jpg">
                <img src="Dragon-fruit-mousse-cake.jpg">
                <img src="strawberry-cherry-cupcake.jpg">
            </div>

            <p class="deskripsi">
                Dapur Manis 07 menyediakan aneka dessert lembut yang cocok untuk diberbagai acara seperti ulang tahun, arisan, pernikahan,  hampers dll. semua kue dibuat dengan cita rasa yang manis yang pas dan tampilan yang cantik dan lucu.
            </p>

            <h3>Daftar menu best seller</h3>
            <table border="1">
                <tr>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                </tr>
                <tr>
                    <td>Red Velvet Cake</td>
                    <td>Rp 40.000</td>
                </tr>
                <tr>
                    <td>Chocolate Lava Cake</td>
                    <td>Rp 30.000</td>
                </tr>
                <tr>
                    <td>Strawberry Shortcake</td>
                    <td>Rp 35.000</td>
                </tr>
            </table>
                
                <p>ini adalah menu favorit setiap pengunjung ke Dapur Manis 07 yang bikin pengunjung jadi kangen dan ketagihan dengan dessert yg paling the best ini.</p>
            </section>
        </div>
    </div>

                <footer>2622500008_AmelAriyanti_SI1A_UTS pemrograman Web Dasar</footer>
    <footer>
    <script src="script.js"></script>
</body>
</html>