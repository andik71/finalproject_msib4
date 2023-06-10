<?php

include_once 'config/app.php';

$id = (int)$_GET['id'];

if (delete_director($id) > 0) {
    echo "<script>
    alert('Data Berhasil Dihapus');
    window.location.href = 'index.php?page=director';
    </script>";
} else {
    echo "<script>
    alert('Data Berhasil Dihapus');
    window.location.href = 'index.php?page=director';
    </script>";
}
