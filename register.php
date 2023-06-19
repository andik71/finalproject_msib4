<?php
include_once 'admin_panel/config/app.php';

if (isset($_POST['register'])) {
    $fullname        = $_POST['fullname'];
    $username        = $_POST['username'];
    $email           = $_POST['email'];
    $password        = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password != $confirmPassword) {
        echo "
        <script>
            alert('Password tidak sesuai');
            window.location.href = 'register.php';
        </script>";
        exit;
    }

    // Panggil fungsi untuk memeriksa apakah akun atau email sudah ada
    if (is_user_exists($username, $email)) {
        echo "
        <script>
            alert('Akun atau email sudah ada');
            window.location.href = 'register.php';
        </script>";
        exit;
    }

    if (add_user($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            window.location.href = 'login.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan');
            window.location.href = 'login.php';
        </script>";
    }
}

// Fungsi untuk memeriksa apakah akun atau email sudah ada
function is_user_exists($username, $email)
{
    // Koneksi database
    global $koneksi;

    $stmt = mysqli_prepare($koneksi, "SELECT username, email FROM user WHERE username = ? OR email = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $rowCount = mysqli_stmt_num_rows($stmt);

    mysqli_stmt_close($stmt);

    return $rowCount > 0;
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
                <div class="card col-xl-8 col-lg-7 col-md-10 mx-auto">
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
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="fullname" name="fullname" placeholder="Fullname" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password1" name="confirmPassword" placeholder="Repeat Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="showPassword">
                                    <label class="custom-control-label text-dark" for="showPassword">Show Password</label>
                                </div>
                            </div>
                            <button type="submit" id="register" name="register" class="btn btn-theme btn-block">
                                Sign Up
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="login.php"><strong>Already have an Account?</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var showPasswordCheckbox = document.getElementById('showPassword');
        var passwordInput = document.getElementById('password');
        var passwordInput1 = document.getElementById('password1');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                // Mengubah tipe input password menjadi text untuk menampilkan password
                passwordInput.setAttribute('type', 'text');
                passwordInput1.setAttribute('type', 'text');
            } else {
                // Mengubah tipe input password menjadi password untuk menyembunyikan password
                passwordInput.setAttribute('type', 'password');
                passwordInput1.setAttribute('type', 'password');
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