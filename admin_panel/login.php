<?php
session_start();

include_once 'config/app.php';

if (isset($_POST['login'])) {
    // Menghindari serangan SQL Injection dengan menggunakan fungsi mysqli_real_escape_string()
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Melakukan query ke database untuk mendapatkan data user dengan username yang sesuai
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Memeriksa apakah password yang dimasukkan cocok dengan password yang tersimpan di database
        if (password_verify($password, $row['password'])) {
            // Jika cocok, mengatur variabel session dengan data user yang valid
            $_SESSION['login']      = true;
            $_SESSION['id_user']    = $row['id_user'];
            $_SESSION['username']   = $row['username'];
            $_SESSION['name']       = $row['name'];
            $_SESSION['email']      = $row['email'];
            $_SESSION['password']   = $row['password'];
            $_SESSION['img']        = $row['img'];
            $_SESSION['user_role']  = $row['user_role'];

            // Mengarahkan pengguna ke halaman utama setelah berhasil login
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
} elseif (isset($_SESSION['login'])) {
    echo "
        <script>
        window.location.href = 'index.php';
        </script>";
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Film Kita</title>

    <!-- Mengimpor font kustom untuk template ini -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Mengimpor gaya kustom untuk template ini -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container py-4 my-4">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="card o-hidden border-0 shadow-lg me-auto mx-auto">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Admin Panel - FilmKita</h1>
                            </div>
                            <form class="user" action="" method="POST">
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Username atau Password Salah!
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username..." required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="showPassword">
                                        <label class="custom-control-label" for="showPassword">Show Password</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit" name="login">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var showPasswordCheckbox = document.getElementById('showPassword');
        var passwordInput = document.getElementById('exampleInputPassword');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                // Mengubah tipe input password menjadi text untuk menampilkan password
                passwordInput.setAttribute('type', 'text');
            } else {
                // Mengubah tipe input password menjadi password untuk menyembunyikan password
                passwordInput.setAttribute('type', 'password');
            }
        });
    </script>

    <!-- Mengimpor skrip JavaScript inti -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Mengimpor skrip kustom untuk semua halaman -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>