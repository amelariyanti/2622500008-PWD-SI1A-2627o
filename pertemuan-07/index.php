<?php
session_start();

// Mencegah error "Undefined variable" pada fungsi in_array()
$minat = isset($_POST['minat']) ? $_POST['minat'] : [];
$error = ""; // Variabel untuk menampung pesan error jika ada

// P7: penggunaan POST
$nama = trim((string) ($_POST['nama'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$semesterForm = trim((string) ($_POST['semester'] ?? ''));
$jenisPesan = trim((string) ($_POST['jenis_pesan'] ?? ''));
$prodi = trim((string) ($_POST['prodi'] ?? ''));
$pesan = trim((string) ($_POST['pesan'] ?? ''));
$tanggal = trim((string) ($_POST['tanggal'] ?? ''));
$minat = $_POST['minat'] ?? [];

$pesanKesalahan = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($nama === '') {
        $pesanKesalahan .= 'Nama Lengkap wajib diisi. ';
    }
    if ($email === '') {
        $pesanKesalahan .= 'Email wajib diisi. ';
    }
    if ($semesterForm === '') {
        $pesanKesalahan .= 'Semester wajib diisi. ';
    }
    if ($tanggal === '') {
        $pesanKesalahan .= 'Tanggal kunjungan wajib diisi. ';
    }
    if ($jenisPesan === '') {
        $pesanKesalahan .= 'Jenis pesan wajib diisi. ';
    }
    if ($prodi === '') {
        $pesanKesalahan .= 'Program studi wajib dipilih. ';
    }
    if ($pesan === '') {
        $pesanKesalahan .= 'Pesan wajib diisi. ';
    }
    if (empty($minat)) {
        $pesanKesalahan .= 'Minat wajib dipilih minimal satu. ';
    }

    if ($semesterForm !== '') {
        $semesterValid = filter_var($semesterForm, FILTER_VALIDATE_INT);

        if ($semesterValid === false || $semesterValid < 1 || $semesterValid > 14) {
            $pesanKesalahan .= 'Semester harus berupa bilangan bulat antara 1-14. ';
        }
    }

    if ($email !== '') {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $pesanKesalahan .= 'Format email tidak valid. ';
        }
    }

    if (!in_array($jenisPesan, ['pertanyaan', 'saran'], true)) {
        $pesanKesalahan .= 'Jenis pesan tidak valid. ';
    }

    if (!in_array($prodi, ['SI', 'TI', 'BD'], true)) {
        $pesanKesalahan .= 'Program studi tidak valid. ';
    }

    $minatDiizinkan = ['HTML', 'CSS'];

    if (!is_array($minat)) {
        $pesanKesalahan .= 'Format pilihan topik tidak valid. ';
    } else {
        foreach ($minat as $topik) {
            if (!in_array($topik, $minatDiizinkan, true)) {
                $pesanKesalahan .= 'Topik tidak valid. ';
                break;
            }
        }
    }
}

// P6: PHP dasar dan pemrograman sisi peladen
// Bagian 1: Variabel dan konstanta
$nim = "2622500008";
$namaMahasiswa = "Amel Aryanti";
$programStudi = "SI";
$tahunAkademik = "2026/2027";
$semester = 1;
$ipk = 3.75;
$statusAktif = true;
$catatanTambahan = null;

const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "amelariyanti";

// Bagian 2: Operator
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif) ? "Sesuai rentang" : "Perlu diperiksa";

// Bagian 3: Percabangan if-elseif-else
if ($semester < 3) {
    $keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
    $keteranganSemester = "Semester menengah";
} else {
    $keteranganSemester = "Semester akhir";
}

$namaProdi = ($programStudi == "SI") ? "Sistem Informasi" : (($programStudi == "TI") ? "Teknik Informatika" : "Lainnya");

// Bagian 4: Percabangan switch-case-default
switch ($programStudi) {
    case "SI":
        $fokusProgramStudi = "Sistem informasi dan proses bisnis";
        break;
    case "TI":
        $fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
        break;
    default:
        $fokusProgramStudi = "Belum ditentukan";
}

// P7 Redirection & Session
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['pesanKesalahan'] = $pesanKesalahan;
    $_SESSION['nama'] = $nama;
    $_SESSION['email'] = $email;
    $_SESSION['semester'] = $semesterForm;
    $_SESSION['tanggal'] = $tanggal;
    $_SESSION['jenis_pesan'] = $jenisPesan;
    $_SESSION['prodi'] = $prodi;
    $_SESSION['minat'] = $minat;
    $_SESSION['pesan'] = $pesan;

    header('Location: index.php');
    exit;
}

$pesanKesalahan = $_SESSION['pesanKesalahan'] ?? '';
$nama = $_SESSION['nama'] ?? '';
$email = $_SESSION['email'] ?? '';
$semesterForm = $_SESSION['semester'] ?? '';
$tanggal = $_SESSION['tanggal'] ?? date("Y-m-d");
$jenisPesan = $_SESSION['jenis_pesan'] ?? '';
$prodi = $_SESSION['prodi'] ?? '';
$minat = $_SESSION['minat'] ?? [];
$pesan = $_SESSION['pesan'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi apakah minimal satu checkbox pada 'minat' dipilih
    if (!isset($_POST['minat']) || empty($_POST['minat'])) {
        $error = "Pilih minimal satu topik yang diminati.";
    } else {
        $minat = $_POST['minat']; 
        
        // TODO: Lanjutkan proses simpan ke database di sini
        // Contoh: mysqli_query($koneksi, "INSERT INTO ...");
        
        // Jika berhasil, Anda bisa mengalihkan halaman atau menampilkan pesan sukses
    }
}

?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Mahasiswa</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <div class="header-top">
            <h1>PROFIL SAYA</h1>
            <button
                class="nav-toggle"
                id="navToggle"
                type="button"
                aria-label="Buka navigasi"
                aria-controls="navMenu"
                aria-expanded="false">
                &#9776;
            </button>
        </div>
        <nav aria-label="Navigasi utama">
            <ul id="navMenu">
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <h2>Halo! Selamat Datang 😊</h2>
            <p>
                Hai teman-teman, perkenalkan nama saya <strong><?= $namaMahasiswa ?></strong>.
                Asal daerah saya adalah Kota <i>Pangkalpinang</i>, Provinsi <i>Bangka Belitung</i>.
            </p>
            <div class="bingkai-foto">
                <img
                    src="../Foto.jpeg"
                    alt="Foto Profil Amel Aryanti"
                    width="200" />
            </div>
        </section>

        <section id="about">
            <h2>TENTANG SAYA</h2>
            <article>
                <h3>Profil Singkat</h3>
                <p>Program Studi: <?= $namaProdi . " (" . $programStudi . ")" ?></p>
                <p>Fokus program studi: <?= $fokusProgramStudi ?></p>
                <p>Status mahasiswa: <?= $statusAktif ? "Aktif" : "Tidak aktif" ?></p>
                <p>Semester: <?= $semester . " (" . $keteranganSemester . ")" ?></p>
                <p>Sisa semester hingga batas: <?= $sisaSemester ?></p>
                <p>Pemeriksaan rentang semester: <?= $statusSemester ?></p>
                <p>IPK: <?= number_format($ipk, 2, '.', '') ?></p>
                <p>Catatan tambahan: <?= $catatanTambahan === null ? "Belum ada" : $catatanTambahan ?></p>
                
                <h3>Target Belajar (Perulangan for)</h3>
                <ol>
                    <?php
                    for ($i = 1; $i <= 3; $i++) {
                        echo "<li>";
                        switch ($i) {
                            case 1:
                                echo "Memahami dasar-dasar HTML, CSS, dan JavaScript.";
                                break;
                            case 2:
                                echo "Memahami cara menambahkan fungsi dan interaksi sederhana ke halaman web.";
                                break;
                            case 3:
                                echo "Mampu menyusun halaman web yang rapi dan terstruktur.";
                                break;
                        }
                        echo "</li>";
                    }
                    ?>
                </ol>

                <h3>Hobi</h3>
                <ol>
                    <?php
                    $daftarHobi = ["Membaca buku novel", "Memasak"];
                    foreach ($daftarHobi as $hobi) {
                        echo "<li>" . htmlspecialchars($hobi) . "</li>";
                    }
                    ?>
                </ol>

                <h3>Motto Hidup</h3>
                <p><i>"Setiap hari adalah kesempatan untuk belajar dan tumbuh."</i></p>
                <h3>Semester (Perulangan while)</h3>
                <ol>
                    <?php
                    $nomorSemester = 1;
                    while ($nomorSemester <= 3) {
                        echo "<li>Semester " . $nomorSemester . "</li>";
                        $nomorSemester++; // Operator Penugasan
                    }
                    ?>
                </ol>
            </article>
        </section>

        <section id="contact">
            <h2>KONTAK</h2>
            <p>
                Kunjungi
                <a target="_blank" rel="noopener noreferrer" href="https://github.com/<?= PROFIL_GITHUB ?>">profil GitHub saya</a>.
            </p>

            <?php if (!empty($pesanKesalahan)): ?>
                <p style="color: red;"><?= htmlspecialchars($pesanKesalahan, ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>

            <?php if (!empty($error)): ?>
                <div style="color: red; margin-bottom: 10px;"><?php echo $error; ?></div>
            <?php endif; ?>

            <form id="contactForm" action="index.php" method="post" novalidate>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input
                        class="input-form"
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan nama lengkap Anda"
                        minlength="3"
                        maxlength="50"
                        value="<?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>"
                        required />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        class="input-form"
                        type="email"
                        id="email"
                        name="email"
                        placeholder="nama@email.com"
                        value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>"
                        required />
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input
                        class="input-form"
                        type="number"
                        id="semester"
                        name="semester"
                        min="1"
                        max="8"
                        value="<?= htmlspecialchars($semesterForm, ENT_QUOTES, 'UTF-8') ?>"
                        required />
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Kunjungan</label>
                    <input
                        class="input-form"
                        type="date"
                        id="tanggal"
                        name="tanggal"
                        value="<?= htmlspecialchars($tanggal, ENT_QUOTES, 'UTF-8') ?>"
                        required />
                </div>
                
                <fieldset class="form-group">
                    <legend>Jenis Pesan</legend>
                    <input
                        type="radio"
                        id="pertanyaan"
                        name="jenis_pesan"
                        value="pertanyaan"
                        <?= $jenisPesan === 'pertanyaan' ? 'checked' : '' ?>
                        required />
                    <label for="pertanyaan">Pertanyaan</label>
                    <input
                        type="radio"
                        id="saran"
                        name="jenis_pesan"
                        value="saran"
                        <?= $jenisPesan === 'saran' ? 'checked' : '' ?> />
                    <label for="saran">Saran</label>
                </fieldset>

                <fieldset class="form-group">
                    <legend>Topik yang Diminati</legend>
                    <input
                        type="checkbox"
                        id="minat-html"
                        name="minat[]"
                        value="HTML"
                        <?= in_array('HTML', $minat) ? 'checked' : '' ?> />
                    <label for="minat-html">HTML</label>
                    <input
                        type="checkbox"
                        id="minat-css"
                        name="minat[]"
                        value="CSS"
                        <?= in_array('CSS', $minat) ? 'checked' : '' ?> />
                    <label for="minat-css">CSS</label>
                </fieldset>

                <div class="form-group">
                    <label for="prodi">Program Studi</label>
                    <select class="input-form" id="prodi" name="prodi" required>
                        <option value="">-- Pilih Program Studi --</option>
                        <option value="SI" <?= $prodi === 'SI' ? 'selected' : '' ?>>Sistem Informasi</option>
                        <option value="TI" <?= $prodi === 'TI' ? 'selected' : '' ?>>Teknik Informatika</option>
                        <option value="BD" <?= $prodi === 'BD' ? 'selected' : '' ?>>Bisnis Digital</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pesan">Pesan</label>
                    <textarea
                        class="input-form"
                        id="pesan"
                        name="pesan"
                        maxlength="300"
                        placeholder="Tulis pesan Anda"
                        required><?= htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8') ?></textarea>
                </div>
                <p id="formFeedback" aria-live="polite"></p>
                <button type="submit">Kirim</button>
                <button type="reset">Batal</button>
            </form>

            <?php if (!empty($nama) && empty($pesanKesalahan)): ?>
                <h3>Data yang Diterima Peladen</h3>
                <p>Nama: <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?></p>
                <p>Email: <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></p>
                <p>Semester: <?= htmlspecialchars($semesterForm, ENT_QUOTES, 'UTF-8') ?></p>
                <p>Tanggal kunjungan: <?= htmlspecialchars($tanggal, ENT_QUOTES, 'UTF-8') ?></p>
                <p>Jenis pesan: <?= htmlspecialchars($jenisPesan, ENT_QUOTES, 'UTF-8') ?></p>
                <p>Program studi: <?= htmlspecialchars($prodi, ENT_QUOTES, 'UTF-8') ?></p>
                <p>Minat:</p>
                <?php if (is_array($minat) && count($minat) > 0): ?>
                    <ul>
                    <?php foreach ($minat as $topik): ?>
                        <li><?= htmlspecialchars((string) $topik, ENT_QUOTES, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Tidak ada minat yang dipilih.</p>
                <?php endif; ?>
                <p>Pesan:</p>
                <p><?= nl2br(htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8')) ?></p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; <?= date("Y") ?> <?= $namaMahasiswa ?> [<?= $nim ?>]</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>