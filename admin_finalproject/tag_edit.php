<?php

// Tangkap ID berdasarkan URL
$id_tag = (int)$_GET['id'];

$data_tag = select("SELECT * FROM tag WHERE id_tag = '$id_tag'")[0];

if (isset($_POST['save'])) {
    if (edit_tag($_POST) > 0) {
        echo "
<script>
alert('Data Berhasil Diubah');
window.location.href = 'index.php?page=tag';
</script>";
    } else {
        echo "
<script>
alert('Data Gagal Diubah');
window.location.href = 'index.php?page=tag';
</script>";
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">Edit Data tag</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Edit Data</h4>
        </div>
        <div class="card-body">

            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="hidden" name="id_tag" value="<?= $data_tag['id_tag'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tag">Tag Name</label>
                    <input class="form-control" id="tag" name="tags" type="text" value="<?= $data_tag['tags'] ?>" placeholder="Tag Name" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="tag:required">Tag Name is required.</div>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-sm" id="submitButton" name="save" type="submit">Submit</button>
                    <button class="btn btn-secondary btn-sm" id="resetButton" type="reset">Reset</button>
                    <a class="btn btn-warning btn-sm" id="resetButton" href="index.php?page=tag">Go Back</a>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->