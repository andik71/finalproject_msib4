<?php

// Cek Hak Akses
if ($_SESSION['user_role'] != 'admin') {
    echo "
        <script>
        alert('Maaf. hanya Admin yang berhak');
        window.location.href = 'index.php?page=dashboard';
        </script>";
    exit;
}

include_once 'config/app.php';

$id = (int)$_GET['id'];

if (delete_tag($id) > 0) {
    echo "<script>
    alert('Data Berhasil Dihapus');
    window.location.href = 'index.php?page=tag';
    </script>";
} else {
    echo "<script>
    alert('Data Berhasil Dihapus');
    window.location.href = 'index.php?page=tag';
    </script>";
}
