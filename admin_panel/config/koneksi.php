<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'finalproject_msib4';

$koneksi = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}
