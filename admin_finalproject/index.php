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
?>
