<?php
session_start();
$_self = $_SERVER["PHP_SELF"];
if (stripos($_self, 'index.php')) {
    if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_user']) && $_SESSION['id_user'] <= 0)) {
        header('location: login.php');
    }
} elseif (stripos($_self, 'login.php') || stripos($_self, './auth/reset-password.php') || stripos($_self, './auth/forgot-password.php')) {
    if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
        header('location: index.php');
    }
}
