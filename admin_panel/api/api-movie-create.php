<?php
header('Content-Type: application/json');

require_once '../config/app.php';

// Validasi apakah semua data telah diisi
if (empty($_POST['title']) || empty($_POST['synopsis']) || empty($_POST['release_date']) || empty($_POST['id_category']) || empty($_POST['id_director']) || empty($_POST['id_actor']) || empty($_POST['img'])) {
    echo json_encode(['message' => 'All fields are required']); // Kirim pesan error jika ada data yang kosong
    exit;
}

$title          = $_POST['title'];        // Ambil nilai judul dari form
$synopsis       = $_POST['synopsis'];     // Ambil nilai sinopsis dari form
$release_date   = $_POST['release_date']; // Ambil nilai tanggal rilis dari form
$category       = $_POST['id_category'];  // Ambil nilai kategori dari form
$director_name  = $_POST['id_director'];  // Ambil nilai direktor dari form
$actor_name     = $_POST['id_actor'];     // Ambil nilai aktor dari form
$img            = $_POST['img'];          // Ambil nilai gambar dari form

$query = "INSERT INTO movie VALUES (NULL, '$title', '$synopsis', '$img', '$release_date', '$category', '$director_name', '$actor_name')";

$result = mysqli_query($koneksi, $query); // Eksekusi query menggunakan koneksi database

if ($result) {
    echo json_encode(['message' => 'New Data Added Successfully']);
} else {
    echo json_encode(['message' => 'Failed To Add New Data']);
}
