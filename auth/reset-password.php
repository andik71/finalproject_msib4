<?php
require_once('../auth.php');
require_once('db-connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    extract($_POST);
    if ($new_password !== $confirm_password) {
        $error = "Password does not match.";
    } else {
        $uid = $_GET['uid'] ?? "";
        $stmt = $conn->prepare("SELECT * FROM `user` where md5(`id_user`) = ?");
        $stmt->bind_param('s', $uid);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $password = password_hash($new_password, PASSWORD_DEFAULT);
            $update = $conn->query("UPDATE `user` set `password` = '{$password}'");
            if ($update) {
                $_SESSION['msg']['success'] = "New Password has been saved successfully.";
                header('location: ../login.php');
                exit;
            } else {
                $error = 'Password has failed to update.';
            }
        } else {
            $error = "User is registered on this website.";
        }
    }
}
?>


<?php include_once('header.php') ?>

<div class="card col-xl-8 col-lg-7 col-md-10 justify-content-center mx-auto">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="d-inline">
                <img src="../images/svg/logo-kita.png" alt="" srcset="" width="180">
            </div>
        </div>
    </div>


    <div class="card-body">
        <div class="text-muted"><small><em>Please Fill all the required fields</em></small></div>
        <?php if (isset($error) && !empty($error)) : ?>
            <div class="message-error"><?= $error ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['msg']['success']) && !empty($_SESSION['msg']['success'])) : ?>
            <div class="message-success">
                <?php
                echo $_SESSION['msg']['success'];
                unset($_SESSION['msg']);
                ?>
            </div>
        <?php endif; ?>
        <form class="user" action="" method="POST">
            <div class="form-group">
                <input type="password" name="new_password" class="form-control form-control-user" id="new_password" value="<?= $_POST['new_password'] ?? "" ?>" placeholder="New Password" autofocus required="required">
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" class="form-control form-control-user" id="confirm_password" value="<?= $_POST['email'] ?? "" ?>" placeholder="Confirm New Password" required="required">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="showPassword">
                    <label class="custom-control-label text-dark" for="showPassword">Show Password</label>
                </div>
            </div>
            <button class="btn btn-theme btn-block">Change Password</button>
        </form>
    </div>

</div>

<script>
    var showPasswordCheckbox = document.getElementById('showPassword');
    var passwordInput = document.getElementById('new_password');
    var passwordInput1 = document.getElementById('confirm_password');

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

<?php include_once('footer.php') ?>