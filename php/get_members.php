<?php
require_once 'config.php'; // Memuat konfigurasi database
require_once 'member.php'; // Memuat class Member untuk operasi database

header('Content-Type: application/json'); // Menetapkan header sebagai JSON

$member = new Member();
$members = $member->getAllMembers(); // Mendapatkan semua data anggota
echo json_encode($members); // Mengembalikan data dalam format JSON
?>
