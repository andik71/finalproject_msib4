<?php
header('Content-Type: application/json');

require_once '../config/app.php';

parse_str(file_get_contents('php://input'), $PUT);

// Validasi apakah semua data telah diisi
if (empty($PUT['id_movie']) || empty($PUT['title']) || empty($PUT['synopsis']) || empty($PUT['release_date']) || empty($PUT['id_category']) || empty($PUT['id_director']) || empty($PUT['id_actor']) || empty($PUT['img'])) {
    echo json_encode(['message' => 'All fields are required']); // Kirim pesan error jika ada data yang kosong
    exit;
}

// Menerima Input
$id_movie       = $PUT['id_movie'];
$title          = $PUT['title'];        // Ambil nilai judul dari form
$synopsis       = $PUT['synopsis'];     // Ambil nilai sinopsis dari form
$release_date   = $PUT['release_date']; // Ambil nilai tanggal rilis dari form
$category       = $PUT['id_category'];  // Ambil nilai kategori dari form
$director_name  = $PUT['id_director'];  // Ambil nilai direktor dari form
$actor_name     = $PUT['id_actor'];     // Ambil nilai aktor dari form
$img            = $PUT['img'];          // Ambil nilai gambar dari form

$query = "UPDATE movie SET title = '$title', synopsis = '$synopsis', release_date = '$release_date', id_category = '$category', id_director = '$director_name', id_actor = '$actor_name', img = '$img' WHERE id_movie = '$id_movie'";
// Isi dengan query yang sesuai untuk update data

$result = mysqli_query($koneksi, $query); // Eksekusi query menggunakan koneksi database

if ($result) {
    echo json_encode(['message' => 'Data Updated Successfully']);
} else {
    echo json_encode(['message' => 'Failed To Update Data']);
}
