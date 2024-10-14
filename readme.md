# Aplikasi Web Kurs Mata Uang

Ini adalah aplikasi web sederhana yang memungkinkan Anda untuk melihat, menambah, dan memperbarui kurs mata uang. Aplikasi web ini dibuat menggunakan **PHP**, **SQLite3**, **HTML**, dan **CSS**. Fitur utamanya adalah tabel yang menampilkan kurs mata uang dan formulir untuk memasukkan atau memperbarui kurs tersebut.

## Fitur
- Menampilkan kurs mata uang saat ini dalam bentuk tabel.
- Menambahkan kurs mata uang baru untuk berbagai mata uang.
- Memperbarui kurs mata uang yang sudah ada.
- Penyimpanan data yang persisten menggunakan database **SQLite3**.

### Struktur Proyek
├── database.db          # File database SQLite3
├── main.php             # Halaman utama yang menampilkan kurs mata uang
├── insert.php           # Skrip untuk menambah/memperbarui kurs mata uang
├── input.html           # Formulir untuk memasukkan kurs mata uang baru
├── style.css            # Gaya sederhana untuk halaman web
└── README.md            # Dokumentasi proyek (file ini)

## Penjelasan File

- main.php: Menampilkan kurs mata uang yang tersimpan dalam database SQLite3 dalam format tabel. Pengguna dapat menavigasi ke input.html dari sini untuk menambah atau memperbarui kurs.
- input.html: Sebuah formulir yang memungkinkan pengguna untuk memasukkan kurs mata uang baru atau memperbarui kurs yang sudah ada. Data dikirimkan ke insert.php untuk diproses.
- insert.php: Memproses input formulir dari input.html. Skrip ini akan menambah kurs mata uang baru ke dalam database atau memperbarui kurs yang sudah ada, berdasarkan kode mata uang yang diberikan.
- database.db: Database SQLite3 yang menyimpan kurs mata uang.
- style.css: File CSS sederhana untuk memberikan gaya pada tampilan halaman web.

## Cara Menggunakan
1. Kloning repositori atau salin file ke dalam direktori server web Anda (misalnya, htdocs untuk XAMPP).
2. Pastikan Anda memiliki PHP dan SQLite3 yang terinstal di server Anda. Jika Anda menggunakan XAMPP, kedua perangkat ini sudah tersedia secara default.
3. Setel database:
    - File database SQLite3 (database.db) seharusnya berada di folder root proyek.
    - Jika tabel belum dibuat, jalankan perintah SQL berikut untuk membuat tabel exchange_rates
4. Akses aplikasi:
    - Buka main.php di browser Anda untuk melihat kurs mata uang saat ini.
    - Klik tautan "Tambah atau Perbarui Kurs Mata Uang" untuk mengakses formulir dan memasukkan kurs baru.
    - Setelah mengirimkan data, kurs akan ditambahkan atau diperbarui dalam database, dan Anda akan melihat pesan sukses.

## Persyaratan
1. PHP: Versi 7.x atau lebih tinggi.
2. SQLite3: Pastikan SQLite sudah diaktifkan dalam instalasi PHP Anda (secara default sudah aktif di XAMPP dan sebagian besar setup PHP).
3. Server Web: Apache (atau server lain yang kompatibel dengan PHP).

### Lisensi
Proyek ini dilisensikan di bawah MIT License.

Silakan copy seluruh isi `README.md` di atas ke file di proyek Anda.

### Catatan Tambahan

- Pastikan file `database.db` memiliki izin yang memungkinkan server web untuk menulis ke dalamnya (atur izin file dengan benar jika diperlukan).
- Jika Anda menghadapi masalah dengan database, pastikan struktur tabel sesuai dengan perintah SQL yang disebutkan di atas.

Dengan `README.md` ini, pengguna lain dapat memahami bagaimana cara menggunakan dan menyiapkan proyek ini dengan mudah!
