<?php
// Class Database untuk menghubungkan ke database
class Database {
    private $host = "localhost"; // Host database
    private $username = "root"; // Username database
    private $password = ""; // Password database
    private $database = "airsoft_club"; // Nama database
    private $conn;

    // Fungsi untuk membuat koneksi ke database
    public function connect() {
        try {
            // Membuat koneksi menggunakan PDO
            $this->conn = new PDO(
                "mysql:host=$this->host;dbname=$this->database",
                $this->username,
                $this->password
            );
            // Mengatur mode error menjadi exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            // Menangani error koneksi
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }
}
?>
