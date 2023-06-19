<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FilmKita</title>
    <link rel="shortcut icon" href="images/svg/logo-film.ico" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="./admin_panel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./admin_panel/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-image: url(images/image1.png);margin:90px">

    <div class="container">
        <div class="col-xl-8 col-lg-10 col-md-12 me-auto mx-auto">
            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center mb-5">
                            <img src="images/svg/logo-kita.png" alt="" srcset="" width="200px">
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
                            <a class="small " href="forgot-password.php">Forgot Password?</a>
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
    <script src="./admin_panel/vendor/jquery/jquery.min.js"></script>
    <script src="./admin_panel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./admin_panel/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./admin_panel/js/sb-admin-2.min.js"></script>

</body>

</html>