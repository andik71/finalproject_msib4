<?php
// Tangkap ID berdasarkan URL
$id_user = (int)$_GET['id'];

$data_user = select("SELECT * FROM user WHERE id_user = '$id_user'")[0];

if (isset($_POST['save'])) {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];

    if (validateOldPassword($id_user, $oldPassword)) {
        if (changePassword($id_user, $newPassword)) {
            echo "
<script>
alert('Password Berhasil Diubah');
window.location.href = 'index.php?page=dashboard';
</script>";
        } else {
            echo "
<script>
alert('Gagal mengubah password');
</script>";
        }
    } else {
        echo "
<script>
alert('Password lama tidak valid');
</script>";
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

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
        </div>
        <div class="card-body">
            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                <div class="mb-0">
                    <input type="hidden" name="id_user" value="<?= $data_user['id_user'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="old_password">Old Password</label>
                    <div class="form-group">
                        <input class="form-control" id="old_password" name="old_password" type="password" placeholder="Old Password" data-sb-validations="required" />
                    </div>
                    <div class="invalid-feedback" data-sb-feedback="old_password:required">Can't be empty!</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="new_password">New Password</label>
                    <div class="form-group">
                        <input class="form-control" id="new_password" name="new_password" type="password" placeholder="New Password" data-sb-validations="required" />
                    </div>
                    <div class="invalid-feedback" data-sb-feedback="new_password:required">Can't be empty!</div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="showPassword">
                            <label class="custom-control-label" for="showPassword">Show Password</label>
                        </div>
                    </div>
                </div>
                <!-- Tombol -->
                <div class="d-grid">
                    <button class="btn btn-success btn-icon-split btn-sm" id="submitButton" name="save" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Submit</span>
                    </button>
                    <button class="btn btn-secondary btn-icon-split btn-sm" id="resetButton" type="reset">
                        <span class="icon text-white-50">
                            <i class="fas fa-undo"></i>
                        </span>
                        <span class="text">Reset</span>
                    </button>
                    <a class="btn btn-danger btn-icon-split btn-sm" id="resetButton" href="index.php?page=dashboard">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text">Cancel</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script>
    var showPasswordCheckbox = document.getElementById('showPassword');
    var passwordInput = document.getElementById('new_password');
    var passwordInput1 = document.getElementById('old_password');

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