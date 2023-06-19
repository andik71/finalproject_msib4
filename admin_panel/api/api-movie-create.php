<?php
header('Content-Type: application/json');

require_once '../config/app.php';

// Validasi apakah semua data telah diisi
if (empty($_POST['title']) || empty($_POST['synopsis']) || empty($_POST['release_date']) || empty($_POST['category_id']) || empty($_POST['director_id']) || empty($_POST['actor_id']) || empty($_POST['img'])) {
    echo json_encode(['message' => 'All fields are required']); // Kirim pesan error jika ada data yang kosong
    exit;
}

$title          = $_POST['title'];
$synopsis       = $_POST['synopsis'];
$release_date   = $_POST['release_date'];
$duration       = $_POST['duration'];
$production     = $_POST['production'];
$video          = $_POST['video'];
$country        = $_POST['country'];
$category       = $_POST['category_id'];
$director_name  = $_POST['director_id'];
$actor_name     = $_POST['actor_id'];
$img            = $_POST['img'];

$query = "INSERT INTO movie VALUES ('$title', '$synopsis', '$img', '$release_date', '$duration', '$production', '$video', '$country', '$category', '$director_name', '$actor_name')";

$result = mysqli_query($koneksi, $query); // Eksekusi query menggunakan koneksi database

if ($result) {
    echo json_encode(['message' => 'New Data Added Successfully']);
} else {
    echo json_encode(['message' => 'Failed To Add New Data']);
}
