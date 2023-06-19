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
    <h1 class="h3 mb-2 text-gray-800">Edit Data Tag</h1>
    <p class="mb-4">Master Data</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
        </div>
        <div class="card-body">

            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                <div class="mb-0">
                    <input type="hidden" name="id_tag" value="<?= $data_tag['id_tag'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tag">Tag Name</label>
                    <input class="form-control" id="tag" name="tags" type="text" value="<?= $data_tag['tags'] ?>" placeholder="Tag Name" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="tag:required">Tag Name is required.</div>
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
                    <a class="btn btn-danger btn-icon-split btn-sm" id="resetButton" href="index.php?page=tag">
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