<?php
session_start();

// Cek apakah pengguna belum login
if (!isset($_SESSION['login'])) {
    echo "
        <script>
        alert('Login terlebih dahulu');
        window.location.href = 'login.php';
        </script>";
    exit;
}

// Cek apakah pengguna belum login
if ($_SESSION['user_role'] === 'viewer') {
    echo "
        <script>
        alert('Anda tidak memiliki hak akses');
        window.location.href = 'login.php';
        </script>";
    exit;
}

$page = $_GET['page'] ?? ''; // Mendapatkan nilai parameter "page"

if ($page === 'search') {
    // Pemrosesan pencarian
    $keyword = $_GET['keyword'] ?? ''; // Mendapatkan kata kunci pencarian

    // Panggil fungsi pencarian atau lakukan operasi pencarian di sini

    // Tampilkan hasil pencarian
    require_once 'header.php';
    require_once 'sidebar.php';
    require_once 'navbar.php';
    require_once 'search_results.php'; // Halaman hasil pencarian
    require_once 'footer.php';
    exit;
}

require_once 'header.php';
require_once 'sidebar.php';
require_once 'navbar.php';

if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];

    if (!empty($page)) {
        require_once $page . '.php';
    } else {
        require_once 'dashboard.php';
    }
} else {
    $page = 'dashboard';
    require_once 'dashboard.php';
}

require_once 'footer.php';
