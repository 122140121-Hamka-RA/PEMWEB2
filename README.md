# Form Handling and Data Management Project

## Deskripsi Proyek
Proyek ini merupakan implementasi sistem manajemen data berbasis web yang mencakup pemrograman sisi klien (Client-side), pemrograman sisi server (Server-side), pengelolaan basis data, dan manajemen state aplikasi menggunakan session, cookie, dan browser storage.

---

## Fitur Utama

### 1. Client-side Programming
- **Form Input dengan Validasi**
  - Memiliki elemen input seperti teks, radio button, dan checkbox.
  - Validasi dilakukan menggunakan JavaScript untuk memastikan:
    - Callsign minimal 3 karakter.
    - Email valid sesuai format.
    - Radio button dan checkbox dipilih sebelum pengiriman form.
  - Pesan error ditampilkan jika validasi gagal.

- **Event Handling**
  - Submit form dengan validasi.
  - Pengelolaan cookie menggunakan JavaScript (set, get, delete).
  - Penyimpanan data secara lokal menggunakan Local Storage.

- **Manipulasi DOM**
  - Menampilkan data dari server ke tabel HTML dinamis menggunakan `fetch`.

### 2. Server-side Programming
- **Pengelolaan Data dengan PHP**
  - Formulir menggunakan metode POST untuk mengirim data.
  - Data yang diterima divalidasi sebelum disimpan ke basis data.
  - Informasi browser dan alamat IP pengguna disimpan ke database.

- **Objek PHP Berbasis OOP**
  - Kelas PHP (contoh: `Class Mahasiswa`) digunakan untuk:
    - Menyimpan data ke database.
    - Mengambil data dari database untuk ditampilkan ke pengguna.

### 3. Database Management
- **Pembuatan Tabel Database**
  - Struktur tabel mendukung penyimpanan callsign, email, pengalaman, jenis permainan, browser, dan alamat IP pengguna.
  
- **Koneksi Database**
  - File `config.php` mengatur koneksi database menggunakan PDO.

- **Manipulasi Data**
  - Menyimpan dan mengambil data menggunakan metode OOP dalam PHP.

### 4. State Management
- **Session**
  - Informasi pengguna disimpan menggunakan `$_SESSION` di server.
  
- **Cookie**
  - Cookie dikelola untuk menyimpan informasi pengguna di sisi klien.
  
- **Browser Storage**
  - Local Storage digunakan untuk menyimpan data pengguna seperti callsign.

---

## Struktur Proyek
