## 1. Form Input

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

### 2. Manipulasi DOM dengan JavaScript

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

### 3. Event Handling

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
### 5. Penggunaan PHP Berbasis OOP

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

### 6. Pengelolaan Database

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
### 7. State Management dengan Session

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

### 8. Pengelolaan State dengan Cookie dan Browser Storage

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
