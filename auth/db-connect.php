<?php
$host       = "localhost";
$username   = "root";
$password   = "";
$dbname     = "finalproject_msib4";

try {
    $conn = new MySQLi($host, $username, $password, $dbname);
} catch (Exception $e) {
    die($e->getMessage());
}
