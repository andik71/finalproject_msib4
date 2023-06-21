<?php

// Tangkap ID berdasarkan URL
$id_user = (int)$_GET['id'];

$data_user = select("SELECT * FROM user WHERE id_user = '$id_user'")[0];

if (isset($_POST['save'])) {
    if (edit_user($_POST) > 0) {
        echo "
<script>
alert('Data Berhasil Diubah');
window.location.href = 'index.php?page=dashboard';
</script>";
    } else {
        echo "
<script>
alert('Data Gagal Diubah');
window.location.href = 'index.php?page=dashboard';
</script>";
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data User</h1>
    <p class="mb-4">Master Data</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Edit Data</h4>
        </div>
        <div class="card-body">
            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <!-- Left Grid -->
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <img src="<?= $data_user['img'] ?>" class="img-thumbnail" alt="">
                        </div>
                    </div>
                    <!-- Right Grid -->
                    <div class="col-lg-8 col-md-6">
                        <div class="mb-0">
                            <input class="form-control" id="id_user" type="hidden" name="id_user" value="<?= $data_user['id_user'] ?>">
                            <input class="form-control" id="password" type="hidden" name="password" value="<?= $data_user['password'] ?>" placeholder="" data-sb-validations="required" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" name="name" type="text" value="<?= $data_user['name'] ?>" placeholder="" data-sb-validations="required" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="email" value="<?= $data_user['email'] ?>" placeholder="" data-sb-validations="required" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input class="form-control" id="username" name="username" type="text" value="<?= $data_user['username'] ?>" placeholder="" data-sb-validations="required" />
                        </div>

                        <?php if ($_SESSION['user_role'] === 'admin') : ?>
                            <div class="mb-3">
                                <label class="form-label" for="user_role">User Role</label>
                                <select class="form-control form-select" id="user_role" name="user_role" aria-label="User Role">
                                    <option value="admin" <?= ($data_user['user_role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                                    <option value="user" <?= ($data_user['user_role'] == 'user') ? 'selected' : '' ?>>User</option>
                                    <option value="viewer" <?= ($data_user['user_role'] == 'viewer') ? 'selected' : '' ?>>Viewer</option>
                                </select>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label class="form-label" for="formFile">Replace Image</label>
                            <input class="form-control-file" id="formFile" name="img" type="file" accept="image/png, image/jpg, image/jpeg" data-sb-validations="required" onchange="previewImage(event)" />
                        </div>
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
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->