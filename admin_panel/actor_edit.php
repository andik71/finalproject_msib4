<?php

// Cek Hak Akses
if ($_SESSION['user_role'] != 'admin') {
    echo "
        <script>
        alert('Maaf. hanya Admin yang berhak');
        window.location.href = 'index.php?page=dashboard';
        </script>";
    exit;
}

// Tangkap ID berdasarkan URL
$id_actor = (int)$_GET['id'];

$data_actor = select("SELECT * FROM actor WHERE id_actor = '$id_actor'")[0];

if (isset($_POST['save'])) {
    if (edit_actor($_POST) > 0) {
        echo "
<script>
alert('Data Berhasil Diubah');
window.location.href = 'index.php?page=actor';
</script>";
    } else {
        echo "
<script>
alert('Data Gagal Diubah');
window.location.href = 'index.php?page=actor';
</script>";
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Data Actor</h1>
    <p class="mb-4">Halaman ini merupakan halaman untuk Update. atau edit data actor</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Actor</h6>
        </div>
        <div class="card-body">


            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <!-- Left Grid -->
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <img src="<?= $data_actor['img'] ?>" class="img-thumbnail" alt="">
                        </div>
                    </div>
                    <!-- Right Grid -->
                    <div class="col-lg-8 col-md-6">
                        <div class="mb-0">
                            <input class="form-control" id="id_actor" type="hidden" name="id_actor" value="<?= $data_actor['id_actor'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" name="name" type="text" value="<?= $data_actor['name'] ?>" placeholder="" data-sb-validations="required" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="birth">Birth</label>
                            <input class="form-control" id="birth" name="birth" type="date" value="<?= $data_actor['birth'] ?>" placeholder="" data-sb-validations="required" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bio">Bio</label>
                            <textarea class="form-control" id="bio" name="bio" type="text" placeholder="" style="height: 10rem;" data-sb-validations="required"><?= $data_actor['bio'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="country">Country</label>
                            <input class="form-control" id="country" name="country" type="text" value="<?= $data_actor['country'] ?>" placeholder="" data-sb-validations="required" />
                        </div>
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
                            <a class="btn btn-danger btn-icon-split btn-sm" id="resetButton" href="index.php?page=actor">
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