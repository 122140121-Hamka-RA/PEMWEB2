<?php
session_start();
require_once 'config.php'; // Memuat konfigurasi database
require_once 'member.php'; // Memuat class Member untuk operasi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitasi dan validasi input
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING); // Sanitasi username
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); // Sanitasi email
    $experience = filter_input(INPUT_POST, 'experience', FILTER_SANITIZE_STRING); // Sanitasi pengalaman
    $gameTypes = isset($_POST['gameTypes']) ? implode(", ", $_POST['gameTypes']) : ''; // Gabungkan game types menjadi string

    // Mendapatkan informasi browser dari user
    $browser = $_SERVER['HTTP_USER_AGENT'];

    // Mendapatkan IP address (dengan support proxy)
    function getClientIP() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    $ip_address = getClientIP(); // Mendapatkan IP user

    // Validasi server-side
    $errors = [];
    if (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters long";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (empty($experience)) {
        $errors[] = "Experience level is required";
    }
    if (empty($gameTypes)) {
        $errors[] = "At least one game type must be selected";
    }

    if (empty($errors)) {
        // Membuat objek Member dan melakukan pendaftaran
        $member = new Member();
        
        if ($member->register($username, $email, $experience, $gameTypes, $browser, $ip_address)) {
            $_SESSION['success'] = "Welcome to Airsoft Fanclub Indonesia, $username!";
            header("Location: ../index.php"); // Redirect ke halaman utama setelah sukses
            exit();
        } else {
            $_SESSION['error'] = "Registration failed. Please try again.";
            header("Location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['errors'] = $errors; // Menyimpan pesan error untuk ditampilkan di form
        header("Location: ../index.php");
        exit();
    }
}
?>
