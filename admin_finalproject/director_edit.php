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
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">Edit Data director</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Edit Data</h4>
        </div>
        <div class="card-body">

            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="hidden" name="id_director" value="<?= $data_director['id_director'] ?>">
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
                    <label class="form-label" for="formFile">Image</label>
                    <input class="form-control" id="formFile" name="img" type="file" data-sb-validations="required" />
                </div>
                <div class="mb-3">
                    <img src="<?= $data_director['img'] ?>" width="200" alt="">
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-sm" id="submitButton" name="save" type="submit">Submit</button>
                    <button class="btn btn-secondary btn-sm" id="resetButton" type="reset">Reset</button>
                    <a class="btn btn-warning btn-sm" id="resetButton" href="index.php?page=director">Go Back</a>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->