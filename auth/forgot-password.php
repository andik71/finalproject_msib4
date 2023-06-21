<?php
require_once('../auth.php');
require_once('db-connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    extract($_POST);
    $stmt = $conn->prepare("SELECT * FROM `user` where `email` = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $email = $data['email'];

        $subject = "Sample Website - Reset Password";
        $message = "";
        ob_start();
        include("reset_mail-template.php");
        $message = ob_get_clean();
        // echo $message;exit;
        $eol = "\r\n";
        // Mail Main Header
        $headers = "From: info@sample.com" . $eol;
        $headers .= "Reply-To: noreply@sample.com" . $eol;
        $headers .= "To: <{$email}>" . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-Type: text/html; charset=iso-8859-1" . $eol;
        try {
            mail($email, $subject, $message, $headers);
            $_SESSION['msg']['success'] = "We have sent you an email to reset your password.";
            header('location: ../login.php');
            exit;
        } catch (Exception $e) {
            throw new ErrorException($e->getMessage());
            exit;
        }
    } else {
        $error = "Email is not registered.";
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
            <div class="d-inline ms-auto">
                <a class="btn btn-sm btn-theme" href="../login.php">Go Back to Login</a>
            </div>
        </div>
    </div>


    <div class="card-body">
        <div class="text-muted"><small><em>Please Fill all the required fields</em></small></div>
        <?php if (isset($error) && !empty($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form class="user" action="" method="POST">
            <div class="form-group">
                <input type="text" name="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email..." value="<?= $_POST['email'] ?? "" ?>" required="required">
            </div>
            <button class="btn btn-theme btn-block">Reset Password</button>
        </form>
        <hr>
        <div class="text-center d-inline d-block">
            <a class="small" href="../index.php">Back to Main Page</a>
        </div>
    </div>

</div>

<?php include_once('footer.php') ?>