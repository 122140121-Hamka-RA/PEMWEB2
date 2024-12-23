Bagian 1: Client-side Programming
1.1 Manipulasi DOM dengan JavaScript
Form HTML

Formulir input memiliki elemen:
Teks (contoh: username dan email).
Checkbox (gameTypes[]).
Radio button (experience).
Tampilkan Data dari Server ke Tabel HTML

Fungsi loadMembers menggunakan fetch untuk mengambil data dari server via php/get_members.php dan menampilkan data dalam tabel HTML dinamis.
Bukti implementasi: Fungsi ini membuat tabel dengan data anggota, seperti callsign, email, pengalaman, jenis permainan, browser, dan alamat IP.
Manipulasi DOM

Manipulasi dilakukan untuk menampilkan pesan error jika validasi gagal, atau menampilkan data dari server di tabel HTML (kode dalam file script.js).
1.2 Event Handling
Event Handling
Submit Form: Validasi dilakukan dengan event listener untuk mencegah pengiriman form jika data tidak valid (lihat submit handler pada form).
Cookie Management: Fungsi setCookie, getCookie, dan deleteCookie menangani event cookie. Misalnya, nilai cookie ditampilkan setiap kali diatur.
Local Storage: Fungsi saveToLocalStorage, showFromLocalStorage, dan clearLocalStorage menangani penyimpanan dan penghapusan data dalam penyimpanan lokal browser.
Form Validation
Validasi JavaScript pada file script.js memastikan:
Username memiliki minimal 3 karakter.
Email memiliki format yang valid.
Radio button dan checkbox dipilih sebelum form dikirim.
Bagian 2: Server-side Programming
2.1 Pengelolaan Data dengan PHP
Metode POST: Form dikirimkan ke process.php untuk diproses.
Validasi di Server:
process.php melakukan parsing variabel global POST, validasi data, dan menyimpan data yang valid ke database (contoh: callsign, email, jenis permainan).
Simpan Browser & IP:
Data browser dan IP pengguna disimpan menggunakan header PHP (contoh: $_SERVER['HTTP_USER_AGENT'] dan $_SERVER['REMOTE_ADDR']).
2.2 Objek PHP Berbasis OOP
Class Mahasiswa:
Contoh metode:
save() untuk menyimpan data mahasiswa ke database.
fetchAll() untuk mengambil semua data mahasiswa.
Bagian 3: Database Management
3.1 Pembuatan Tabel Database
Tabel untuk menyimpan data anggota dibuat (contoh: CREATE TABLE members (...)).
3.2 Konfigurasi Koneksi Database
File config.php berisi koneksi ke database MySQL dengan PDO.
3.3 Manipulasi Data pada Database
Fungsi OOP (Class Mahasiswa) digunakan untuk:
Menyimpan data ke tabel (via save()).
Mengambil data dari tabel (via fetchAll()).
Bagian 4: State Management
4.1 State Management dengan Session
session_start() digunakan di process.php untuk menyimpan informasi pengguna dalam session.
4.2 Pengelolaan State dengan Cookie dan Browser Storage
Cookie:

Fungsi setCookie, getCookie, dan deleteCookie di script.js menangani manipulasi cookie.
Demo cookie: demoKey.
Browser Storage:

Penyimpanan callsign menggunakan Local Storage:
Simpan dengan saveToLocalStorage.
Hapus dengan clearLocalStorage.
