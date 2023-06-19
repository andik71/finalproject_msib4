<?php

// Render Halaman menjadi JSON
header('Content-Type: application/json');

require_once '../config/app.php';

$query = select("SELECT * FROM movie"); // Ambil data dari tabel movie

echo json_encode(['data_movie' => $query]); // Mengirimkan data movie dalam format JSON
?>
