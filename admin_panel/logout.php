<?php

session_start();

// Cek apakah pengguna belum login
if (!isset($_SESSION['login'])) {
    // Jika pengguna belum login, tampilkan pesan peringatan dan arahkan ke halaman login
    echo "
    <script>
    alert('Login terlebih dahulu');
    window.location.href = 'login.php';
    </script>";
    exit;
}

// Hapus semua data pada sesi
$_SESSION = [];

// Hapus semua data yang terkait dengan sesi saat ini
session_unset();

// Hapus sesi yang sedang berlangsung
session_destroy();

// Arahkan pengguna ke halaman login setelah keluar dari sesi
header("Location: login.php");
exit;
