<?php

// Tangkap ID berdasarkan URL
$id_director = (int)$_GET['id'];

$data_director = select("SELECT * FROM director WHERE id_director = '$id_director'")[0];

if (isset($_POST['save'])) {
    if (edit_director($_POST) > 0) {
        echo "
<script>
alert('Data Berhasil Diubah');
window.location.href = 'index.php?page=director';
</script>";
    } else {
        echo "
<script>
alert('Data Gagal Diubah');
window.location.href = 'index.php?page=director';
</script>";
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Director</h1>
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
                            <img src="<?= $data_director['img'] ?>" class="img-thumbnail" alt="">
                        </div>
                    </div>
                    <!-- Right Grid -->
                    <div class="col-lg-8 col-md-6">
                        <div class="mb-0">
                            <input class="form-control" id="id_director" type="hidden" name="id_director" value="<?= $data_director['id_director'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" name="name" type="text" value="<?= $data_director['name'] ?>" placeholder="Name" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="birth">Birth</label>
                            <input class="form-control" id="birth" name="birth" type="date" value="<?= $data_director['birth'] ?>" placeholder="Birth" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="birth:required">Birth is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bio">Bio</label>
                            <textarea class="form-control" id="bio" name="bio" type="text" placeholder="Bio" style="height: 10rem;" data-sb-validations="required"><?= $data_director['bio'] ?></textarea>
                            <div class="invalid-feedback" data-sb-feedback="bio:required">Bio is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="formFile">Replace Image</label>
                            <input class="form-control-file" id="formFile" name="img" type="file" accept="image/png, image/jpg, image/jpeg" data-sb-validations="required" onchange="previewImage(event)" />
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
                            <a class="btn btn-danger btn-icon-split btn-sm" id="resetButton" href="index.php?page=director">
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

<script>
    // Fungsi untuk preview gambar
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var imgPreview = document.querySelector('.img-thumbnail');
            imgPreview.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    var fileInput = document.querySelector('#formFile');
    fileInput.addEventListener('change', previewImage);
</script>