<?php
header('Content-Type: application/json');

require_once '../config/app.php';

// Menerima Rquest PUT/DELETE
parse_str(file_get_contents('php://input'), $DELETE);

// Menerima Input data yang akan dihapus
$id   = $DELETE['id'];
// Query
$query      = "SELECT img FROM movie WHERE id_movie = '$id'";
$result     = mysqli_query($koneksi, $query);

if ($result) {
    echo json_encode(['message' => 'Delete Data Successfully']);
} else {
    echo json_encode(['message' => 'Delete Data Failed']);
}
