# pertemuan-11
### B. persiapan pengembangan P11
# pertemuan-10
1.  git add .
    git commit -m "menyalin artefak pertemuan-07 ke pertemuan-10 sebagai baseline"
    git push
2. aktifin phpMyAdmin 
###  C.1 (Data apa saja yg ada di formulir)
3. dari formulir p7 data formulir yang ada diformulir p7
    saya sudah cek file index.php`. pada formulir kontak ternyata ada 8 data yg dikirim kalau saya pencet tombol kirim itu ada 8 data yg muncul dibagian data pladen.

    ini buktinya dari hasil yang tampil di web sesui yg saya cek:
    1. Nama : amel
    2. Email : amelariyanti13@gmail.com
    3. Semester : 1
    4. Tanggal  kunjungan : 2026-11-24
    5. Jenis pesan :  saran
    6. Program studi : SI
    7. Minat : CSS
    8. Pesan : cobacoba
jadi, ada 8 data yang dikirim dari formulir. semuanya sudah sesuai dengan yg ada dikode index.php`.

### C.2 (data mana yg disimpan ke database?)
data yg disimpan ke database itu cuma 8 data dari formulir diatas saja.
yaitu nama, email, semester, tanggal, jenis_pesan, minat, prodi, dan pesan. 

Data profil  yang diatas halaman, seperti NIM, itu tidak disimpan karena itu bukan isi formulir.

### C.3 (kalau pada bagian minatnya dipilih lebih dari 1, bagaimana?)
didlm formuir saya, pada bagian topik yg minat bisa dicentang lebih dari 1. ada HTM  dan CSS.

Kalau yang dicentang cuma 1, contohnya seperti punya saya tadi yg  disimpan itu cuma : CSS
kalau yg dicentang 2-duanya, yg disimpan itu digabung jadi 1 teks 
jadi di database, minat itu cuman cuma jadi 1 kolom saja, isinya teks gabungan

## D. Rancangan Struktur Tabel

### D.1. Nama Database dan Tabel
- Nama database : db_pwd_2622500008
- Nama Tabel : tbl_kontak_2622500008
    (alasan pakai nim supaya berbeda dengan pnya teman yg lain)

### D.2. Atribut dan Tipe Data (nentuin 8 kolom dari formulir + tipe datanya)
8 data dari formulir, ditambah tipe datanya :

| No | Nama | Tipe data | Artinya |
| --- | --- | --- | --- |
| 1 | nama | VARCHAR(40) Nama, maks 40 huruf |
| 2 | email | VARCHAR(250) | Email |
| 3 | semester | TINYINT | Angka semester yang kecil, contoh: 1 |
| 4 | tanggal | DATE | Tanggal, contoh: 2026-11-24 |
| 5 | jenis_pesan | VARCHAR(15) | jenis pesan, contoh: saran |
| 6 | minat | VARCHAR(40) | Minat, disimpan jadi 1 teks |
| 7 | prodi | VARCHAR(2) | Kode prodi, contoh: SI atau TI |
| 8 | pesan | VARCHAR(300) | Isi pesan, maks 300 huruf |

### D.3. `PRIMARY KEY` dan Auto_INCREMENT
 menambahkan 1 kolom lagi namanya `id`.
 - Nama: `id`
 - Tipe: `INT`
 - Aturan: `PRIMARY KEY` dan `AUTO_INCREMENT`

 Gunanya `id` itu buat nomor urut. jadi kalau ada 2 orang namanya sama-sama Amel, tetap masih bisa dibedakan dari `id` nya. dan karena memakai `AUTO_INCREMENT`. `ID`nya itu nampil otomatis jadi 1, 2, 3, tanpa perlu di ketik manual.

 ### D.4. Rancangan Akhir
 jadi totalnya ada 9 kolom, yaitu 1 `id` + 8 data formulir.

 1. id - INT -PRIMARY KEY, AUTO_INCREMENT
 2. nama - VARCHAR(40)
 3. email - VARCHAR(250)
 4. semester - TINYINT 
 5. tanggal - DATE
 6. jenis_pesan - VARCHAR(15)
 7. minat - VARCHAR(40)
 8. prodi - VARCHAR(2)
 9. pesan - VARCHAR(300)

 Rancangan ini sudah dicek

 ### D. MEMBUAT DAN MENGUJI BERKAS KONEKSI PHP-MYSQL
 ##  D.1 Membuat berkas koneksi.php P11
 - Berkas `koneksi.php` sudah dibuat dan sejajar dengan `index.php`
 - parameter: host `localhost`, username `root`, password `""`, Database `db_pwd_2622500008`

 ## D.2 pemeriksaan parameter koneksi P11
 - File `koneksi.php` sudah diperiksa, 4 parameter sudah benar
 - Host: `localhost` - MySQL berjalan dikomputer lokal
 - Username: `root` - pengguna MySQL lokal
 - Password: `""` - kata sandi dikosongkan sesuai konfigurasi lokal
 - Database: `db_pwd_2622500008` - sudah sesuai dengan database yang dibuat di P10
 - Kesimpulan: tidak ada kesalahan penulisan, siap untuk menghubungkan PHP ke MySQL



## E. Pemeriksaan Kesiapan Basis Data P11
-   Database: `db_pwd_2622500008` - data kontak dapat ditampilkan melalui tab browse,  tidak perlu diimport ulang
-   Tabel: `tbl_kontak_2622500008` - sudah nampil
- Atribut (9): `id,  nama,  email, semester, tanggal, jenis_pesan, minat, prodi, pesan`
-  Hasil tab browse: data kontak dapat ditampilkan
- kesimpulan siap untuk diintegrasi PHP dengan MySQL menggunakan MySQLi