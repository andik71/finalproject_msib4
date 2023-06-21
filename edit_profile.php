<?php

// Tangkap ID berdasarkan URL
$id_user = (int)$_GET['id'];

$data_user = select("SELECT * FROM user WHERE id_user = '$id_user'")[0];

if (isset($_POST['submit'])) {
    if (edit_user($_POST) > 0) {
        echo "
<script>
alert('Data Berhasil Diubah');
window.location.href = 'index.php?page=home';
</script>";
    } else {
        echo "
<script>
alert('Data Gagal Diubah');
window.location.href = 'index.php?page=home';
</script>";
    }
}
?>

?>
<section class="after-head d-flex section-text-white pt-5" style="background-image: url('images/image1.png');">
    <div class="d-background bg-black-50"></div>
    <div class="top-block top-inner container">
        <div class="top-block-content">
            <h1 class="section-title">Edit Profile</h1>
            <div class="page-breadcrumbs">
                <a class="content-link" href="index.php?page=home">Home</a>
                <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                <a class="content-link" href="index.php?page=edit_profile">Profile</a>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container mt-5 mb-5">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100 mt-5">
                    <div class="card-body ">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="./admin_panel/<?= $data_user['img'] ?>" class="img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100 mt-5">
                    <div class="card-body">
                        <form action="" method="post">
                            <input class="form-control" id="id_user" type="hidden" name="id_user" value="<?= $id_user ?>">
                            <input class="form-control" id="password" type="hidden" name="password" value="<?= $data_user['password'] ?>">
                            <input class="form-control" id="user_role" type="hidden" name="user_role" value="<?= $data_user['user_role'] ?>">
                            <!-- Form-->
                            <h4 class="form-title text-uppercase">MY
                                <span class="text-theme">account</span>
                            </h4>
                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" id="username" name="username" type="text" value="<?= $data_user['username'] ?>" placeholder="Username" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="username:required">userame is required.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" id="name" name="name" type="text" value="<?= $data_user['name'] ?>" placeholder="Name" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="text" value="<?= $data_user['email'] ?>" placeholder="Email" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">Name is required.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formFile">Image</label>
                                <input class="form-control-file" id="formFile" name="img" type="file" accept="image/png, image/jpg, image/jpeg" data-sb-validations="required" onchange="previewImage(event)" />
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="submit" id="submit" name="submit" class="btn-theme btn mt-3">Update</button>
                                        <a href="index.php" class="btn btn-secondary mt-3">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</section>