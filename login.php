<?php
session_start();

include_once 'admin_panel/config/app.php';

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
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>FilmKita</title>
    <link rel="shortcut icon" href="images/svg/logo-film.ico" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Animate.css -->
    <link href="animate.css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome iconic font -->
    <link href="fontawesome/css/fontawesome-all.css" rel="stylesheet" type="text/css" />
    <!-- Magnific Popup -->
    <link href="magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- Slick carousel -->
    <link href="slick/slick.css" rel="stylesheet" type="text/css" />
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <!-- Theme styles -->
    <link href="css/dot-icons.css" rel="stylesheet" type="text/css">
    <link href="css/theme.css" rel="stylesheet" type="text/css">

</head>

<body class="body" style="background-image: url(images/image1.png);">

    <section class="section-text-white position-relative">
        <div class="py-5 my-5 container position-relative">
            <div class="container-fluid">

                <div class="card col-xl-8 col-lg-7 col-md-10 justify-content-center mx-auto">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="d-inline">
                                <img src="images/svg/logo-kita.png" alt="" srcset="" width="180">
                            </div>
                            <div class="d-inline ms-auto">
                                <a class="btn btn-sm btn-theme" href="index.php">Go Back</a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <form class="user" action="" method="POST">
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    Username atau Password Salah!
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Enter Username..." required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="showPassword">
                                    <label class="custom-control-label text-dark" for="showPassword">Show Password</label>
                                </div>
                            </div>
                            <button class="btn btn-theme btn-block" type="submit" name="login">Login</button>
                        </form>
                        <hr>
                        <div class="text-center d-inline d-block">
                            <a class="small" href="forgot-password.php">Forgot Password?</a>
                            <a class="small" href="register.php"><strong>Create an Account!</strong></a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>



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
    <script src="./admin_finalproject/vendor/jquery/jquery.min.js"></script>
    <script src="./admin_finalproject/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Mengimpor skrip kustom untuk semua halaman -->
    <script src="./admin_finalproject/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="./admin_finalproject/js/sb-admin-2.min.js"></script>

</body>

</html>