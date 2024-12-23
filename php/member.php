<?php
// Class Member untuk mengelola operasi database terkait anggota
class Member {
    private $db;

    public function __construct() {
        $database = new Database(); // Membuat objek database
        $this->db = $database->connect(); // Menghubungkan ke database
    }

    // Fungsi untuk mendaftarkan anggota baru
    public function register($username, $email, $experience, $gameTypes, $browser, $ip_address) {
        try {
            // Query untuk memasukkan data anggota ke tabel 'members'
            $stmt = $this->db->prepare("INSERT INTO members (username, email, experience, game_types, browser, ip_address) 
                                      VALUES (:username, :email, :experience, :game_types, :browser, :ip_address)");
            // Eksekusi query dengan data yang diberikan
            return $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':experience' => $experience,
                ':game_types' => $gameTypes,
                ':browser' => $browser,
                ':ip_address' => $ip_address
            ]);
        } catch(PDOException $e) {
            // Menangani error dan mencatat ke log
            error_log("Registration error: " . $e->getMessage());
            return false;
        }
    }

    // Fungsi untuk mendapatkan semua data anggota
    public function getAllMembers() {
        try {
            // Query untuk mendapatkan semua data anggota dari tabel 'members'
            $stmt = $this->db->query("SELECT * FROM members ORDER BY created_at DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            // Menangani error dan mencatat ke log
            error_log("Error fetching members: " . $e->getMessage());
            return [];
        }
    }

    // Fungsi untuk mendapatkan data anggota berdasarkan email
    public function getMemberByEmail($email) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM members WHERE email = :email");
            $stmt->execute([':email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Error fetching member: " . $e->getMessage());
            return null;
        }
    }
}
?>
