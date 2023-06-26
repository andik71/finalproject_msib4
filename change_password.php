<?php
// Tangkap ID berdasarkan URL
$id_user = (int)$_GET['id'];

// Notification
$notif    = '';

$data_user = select("SELECT * FROM user WHERE id_user = '$id_user'")[0];

if (isset($_POST['save'])) {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];

    if (validateOldPassword($id_user, $oldPassword)) {
        if (validateNewPasswordLength($newPassword) && validateNewPasswordSymbols($newPassword)) {
            if (changePassword($id_user, $newPassword)) {
                $notif = "
                <div class='alert alert-success'>Berhasil Mengubah Password</div>
                ";
            } else {
                $notif = "
                <div class='alert alert-danger'>Gagal Mengubah Password</div>
                ";
            }
        } elseif (!validateNewPasswordLength($newPassword)) {
            $notif = "
            <div class='alert alert-danger'>Password minimal 8 karakter</div>
            ";
        } elseif (!validateNewPasswordSymbols($newPassword)) {
            $notif = "
            <div class='alert alert-danger'>Passwordharus mengandung angka atau simbol</div>
            ";
        }
    } else {
        $notif = "
        <div class='alert alert-danger'>Password Lama Tidak Valid</div>
        ";
    }
}

// Fungsi untuk validasi password lama
function validateOldPassword($userId, $oldPassword)
{
    global $koneksi;
    // Query untuk mendapatkan password lama dari database berdasarkan ID user
    $query = "SELECT password FROM user WHERE id_user = $userId";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $oldPasswordFromDB = $row['password'];

    // Memeriksa apakah password lama yang dimasukkan sesuai dengan password di database
    if (password_verify($oldPassword, $oldPasswordFromDB)) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk validasi panjang password baru
function validateNewPasswordLength($newPassword)
{
    // Memeriksa panjang password baru
    if (strlen($newPassword) >= 8) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk validasi keberadaan angka atau simbol pada password baru
function validateNewPasswordSymbols($newPassword)
{
    // Memeriksa apakah password baru mengandung kombinasi angka atau simbol
    if (preg_match('/[0-9]/', $newPassword) && preg_match('/[^A-Za-z0-9]/', $newPassword)) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk mengubah password baru
function changePassword($userId, $newPassword)
{
    global $koneksi;
    // Mengenkripsi password baru
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    // Query untuk mengubah password baru di database
    $query = "UPDATE user SET password = '$hashedPassword' WHERE id_user = $userId";
    $result = mysqli_query($koneksi, $query);

    return $result;
}
?>

<section class="after-head d-flex section-text-white pt-5" style="background-image: url('images/image1.png');">
    <div class="d-background bg-black-50"></div>
    <div class="top-block top-inner container">
        <div class="top-block-content">
            <h1 class="section-title">Change Password</h1>
            <div class="page-breadcrumbs">
                <a class="content-link" href="index.php?page=home">Home</a>
                <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                <a class="content-link" href="index.php?page=change_password">Change Password</a>
            </div>
        </div>
    </div>
</section>

<section class="section-text-white position-relative">
    <div class="py-5 my-5 container position-relative">
        <div class="container-fluid">

            <div class="card col-xl-8 col-lg-7 col-md-10 justify-content-center mx-auto">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="d-inline">
                            <img src="images/svg/logo-kita.png" alt="" srcset="" width="180">
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="text-muted"><small><em>Please Fill all the required fields</em></small></div>
                    <div class="mb-0">
                        <input type="hidden" name="id_user" value="<?= $data_user['id_user'] ?>">
                        <?php if (isset($notif)) { ?>
                            <?= $notif ?>
                        <?php } ?>
                    </div>
                    <form class="user" action="" method="POST">
                        <div class="form-group">
                            <input type="password" name="old_password" class="form-control form-control-user" id="old_password" placeholder="Old Password" autofocus required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" name="new_password" class="form-control form-control-user" id="new_password" placeholder="New Password" required="required">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="showPassword">
                                <label class="custom-control-label text-dark" for="showPassword">Show Password</label>
                            </div>
                        </div>
                        <button class="btn btn-theme btn-block" name="save">Change Password</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>

<script>
    var showPasswordCheckbox = document.getElementById('showPassword');
    var passwordInput = document.getElementById('old_password');
    var passwordInput1 = document.getElementById('new_password');

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