## Form Input

Form input terdiri dari minimal empat elemen input: teks, checkbox, radio button, dan dropdown. Berikut adalah contoh kode HTML untuk form input:

```html
<form action="submit.php" method="POST">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required><br><br>
    
    <label for="alamat">Alamat:</label>
    <textarea id="alamat" name="alamat" required></textarea><br><br>

    <label for="jenis_kelamin">Jenis Kelamin:</label>
    <input type="radio" id="pria" name="jenis_kelamin" value="L" required>
    <label for="pria">Pria</label>
    <input type="radio" id="wanita" name="jenis_kelamin" value="P" required>
    <label for="wanita">Wanita</label><br><br>

    <label for="jurusan">Jurusan:</label>
    <select id="jurusan" name="jurusan">
        <option value="Informatika">Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Teknik Elektro">Teknik Elektro</option>
    </select><br><br>

    <label for="mata_kuliah">Mata Kuliah:</label>
    <input type="checkbox" name="mata_kuliah[]" value="Matematika"> Matematika
    <input type="checkbox" name="mata_kuliah[]" value="Fisika"> Fisika
    <input type="checkbox" name="mata_kuliah[]" value="Kimia"> Kimia<br><br>

    <button type="submit">Kirim</button>
</form>

```

### Manipulasi DOM dengan JavaScript

```markdown
## 2. Manipulasi DOM dengan JavaScript

JavaScript digunakan untuk menampilkan data yang dimasukkan dalam form ke dalam tabel HTML setelah pengguna mengklik tombol kirim.

```javascript
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();  // Menghentikan pengiriman form agar tidak reload

    const nama = document.getElementById('nama').value;
    const alamat = document.getElementById('alamat').value;
    const jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked').value;
    const jurusan = document.getElementById('jurusan').value;

    // Menampilkan data ke tabel
    const table = document.getElementById('data-mahasiswa');
    const newRow = table.insertRow();
    newRow.innerHTML = `
        <td>${nama}</td>
        <td>${alamat}</td>
        <td>${jenisKelamin}</td>
        <td>${jurusan}</td>
    `;
});

```

### Event Handling

```markdown
## 3. Event Handling

Aplikasi menangani event untuk memvalidasi dan memproses form sebelum data dikirim ke server. Berikut adalah contoh validasi form menggunakan event `submit` dan `change`:

```javascript
// Event handler untuk form validation
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();  // Menghentikan form untuk dikirim

    const nama = document.getElementById('nama').value;
    const alamat = document.getElementById('alamat').value;

    // Validasi nama dan alamat
    if (!nama || !alamat) {
        alert('Nama dan Alamat harus diisi!');
        return;
    }

    // Proses pengiriman data jika valid
    this.submit();
});

// Event handler untuk validasi perubahan di input
document.getElementById('nama').addEventListener('change', function() {
    if (this.value.length < 3) {
        alert('Nama harus lebih dari 2 karakter');
    }
});

```
### Penggunaan PHP Berbasis OOP

```markdown
## 5. Penggunaan PHP Berbasis OOP

Menggunakan objek PHP untuk menangani data mahasiswa. Berikut adalah contoh class PHP untuk mengelola data mahasiswa:

```php
// Mahasiswa.php
class Mahasiswa {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function simpanData($nama, $alamat, $jenis_kelamin, $jurusan) {
        $stmt = $this->db->prepare("INSERT INTO mahasiswa (nama, alamat, jenis_kelamin, jurusan) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $alamat, $jenis_kelamin, $jurusan);
        $stmt->execute();
        $stmt->close();
    }

    public function getData() {
        $result = $this->db->query("SELECT * FROM mahasiswa");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

```

### Pengelolaan Database

```markdown
## 6. Pengelolaan Database

Database digunakan untuk menyimpan data mahasiswa. Berikut adalah contoh SQL untuk membuat tabel mahasiswa:

```sql
CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    alamat TEXT NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    jurusan VARCHAR(255) NOT NULL
);

```
### State Management dengan Session

```markdown
## 7. State Management dengan Session

Session digunakan untuk menyimpan informasi pengguna setelah login. Berikut adalah contoh penggunaan session dalam PHP:

```php
// session_handler.php
session_start();

// Menyimpan data ke dalam session
$_SESSION['username'] = 'john_doe';

// Mengambil data dari session
echo $_SESSION['username'];

```

### Pengelolaan State dengan Cookie dan Browser Storage

```markdown
## 8. Pengelolaan State dengan Cookie dan Browser Storage

**Cookie** digunakan untuk menyimpan data di sisi klien. Berikut adalah contoh untuk menetapkan dan mendapatkan cookie:

```javascript
// Menetapkan cookie
document.cookie = "user=nama_user; expires=Thu, 18 Dec 2024 12:00:00 UTC; path=/";

// Mendapatkan cookie
function getCookie(name) {
    let value = "; " + document.cookie;
    let parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
}

console.log(getCookie("user"));

```
# Bagian Bonus: Hosting Aplikasi Web (Bobot: 20%)

## Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda? (5%)

Langkah-langkah yang saya lakukan untuk meng-host aplikasi web adalah sebagai berikut:

1. **Konfigurasi dan Upload Database**  
   Langkah pertama adalah mengonfigurasi database pada server yang sesuai dengan konfigurasi yang ada pada lingkungan lokal. Saya membuat database baru dan mengekspor file SQL dari database lokal untuk diimpor ke server hosting.

2. **Upload File Aplikasi**  
   Setelah database dikonfigurasi, saya meng-upload semua file aplikasi yang terdiri dari PHP, JavaScript, dan CSS menggunakan FTP atau File Manager di cPanel ke direktori yang sesuai di server.

3. **Periksa Koneksi Database**  
   Setelah file dan database di-upload, saya melakukan uji coba koneksi antara aplikasi dan database untuk memastikan aplikasi dapat mengakses data dengan benar.

4. **Uji Aplikasi di Server**  
   Setelah semua file dan database tersedia di server, saya melakukan pengujian aplikasi untuk memastikan semua fitur berfungsi seperti yang diharapkan, termasuk form input, pengiriman data, dan pemrosesan dengan PHP.

5. **Aktifkan HTTPS**  
   Saya mengonfigurasi SSL (Secure Sockets Layer) untuk mengenkripsi komunikasi antara pengguna dan server. Hal ini penting untuk melindungi data sensitif yang dikirimkan melalui aplikasi.

## Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda. (5%)

Saya memilih **Infinity Hosting** sebagai penyedia hosting untuk aplikasi web ini karena beberapa alasan berikut:

- **Fitur Lengkap**: Infinity Hosting menyediakan berbagai fitur yang mendukung pengembangan web, seperti PHP, MySQL, FTP, dan pengelolaan database yang mudah.
  
- **Harga Gratis**: Infinity Hosting menawarkan layanan hosting gratis dengan kapasitas yang cukup untuk kebutuhan aplikasi kecil, yang sangat berguna untuk proyek-proyek pribadi dan pengembangan aplikasi berbasis web.

- **Support yang Baik**: Layanan hosting ini juga dilengkapi dengan dukungan teknis yang cukup responsif, yang sangat penting bagi pengelolaan aplikasi web.

## Bagaimana Anda memastikan keamanan aplikasi web yang Anda host? (5%)

Keamanan aplikasi web adalah aspek yang sangat penting. Meskipun aplikasi ini sudah dikerjakan dengan beberapa langkah dasar, ada beberapa area yang perlu diperbaiki untuk meningkatkan keamanannya. Beberapa langkah yang sudah dan belum dilakukan adalah:

- **Sanitasi Input**  
  Sejauh ini, input dari pengguna belum disanitasi dengan benar, yang membuka potensi risiko terhadap serangan **SQL Injection** dan **Cross-site Scripting (XSS)**. Sanitasi input penting untuk memastikan data yang dimasukkan oleh pengguna tidak membahayakan aplikasi dan database.

## Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda. (5%)

Konfigurasi server yang saya terapkan untuk mendukung aplikasi web adalah sebagai berikut:

1. **Server Web (Apache)**  
   Menggunakan server Apache untuk menangani permintaan HTTP. Apache adalah server web yang sangat populer dan mendukung berbagai modul PHP yang diperlukan untuk menjalankan aplikasi web berbasis PHP.

2. **PHP dan MySQL**  
   Untuk memproses permintaan dinamis dan menyimpan data, server diatur untuk mendukung **PHP 7.x atau lebih tinggi** dan **MySQL** sebagai sistem manajemen basis data yang digunakan untuk menyimpan informasi aplikasi.

3. **SSL/TLS**  
   Menggunakan sertifikat SSL untuk mengenkripsi data yang dikirimkan antara pengguna dan server, guna menjaga keamanan data yang sensitif (seperti password dan informasi pribadi).

4. **Backup Rutin**  
   Mengonfigurasi server untuk melakukan backup secara rutin terhadap file aplikasi dan database untuk memastikan data tidak hilang jika terjadi kegagalan sistem atau masalah lainnya.

5. **Pengaturan Firewall**  
   Server dilindungi dengan firewall untuk mencegah akses yang tidak sah dan melindungi aplikasi dari potensi serangan seperti DDoS (Distributed Denial-of-Service).

