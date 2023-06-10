<?php

// Tangkap ID berdasarkan URL
$id_genre = (int)$_GET['id'];

$data_genre = select("SELECT * FROM genre WHERE id_genre = '$id_genre'")[0];

if (isset($_POST['save'])) {
    if (edit_genre($_POST) > 0) {
        echo "
<script>
alert('Data Berhasil Diubah');
window.location.href = 'index.php?page=genre';
</script>";
    } else {
        echo "
<script>
alert('Data Gagal Diubah');
window.location.href = 'index.php?page=genre';
</script>";
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">Edit Data genre</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Edit Data</h4>
        </div>
        <div class="card-body">

            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="hidden" name="id_genre" value="<?= $data_genre['id_genre'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="genre">genre Name</label>
                    <input class="form-control" id="genre" name="genre" type="text" value="<?= $data_genre['genre'] ?>" placeholder="genre Name" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="genre:required">genre Name is required.</div>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-sm" id="submitButton" name="save" type="submit">Submit</button>
                    <button class="btn btn-secondary btn-sm" id="resetButton" type="reset">Reset</button>
                    <a class="btn btn-warning btn-sm" id="resetButton" href="index.php?page=genre">Go Back</a>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->