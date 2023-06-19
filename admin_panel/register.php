<?php
include_once 'config/app.php';

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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="col-xl-8 col-lg-10 col-md-12 me-auto mx-auto">
            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
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
                                    <input type="password" class="form-control form-control-user" id="confirmPassword" name="confirmPassword" placeholder="Repeat Password" required>
                                </div>
                            </div>
                            <button type="submit" id="register" name="register" class="btn btn-primary btn-user btn-block">
                                Sign Up
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.php">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.php">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>