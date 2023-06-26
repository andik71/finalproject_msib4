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
    <h1 class="h3 mb-2 text-gray-800">Update Data Genre</h1>
    <p class="mb-4">Halaman ini merupakan halaman untuk Update. atau edit data genre</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Genre</h6>
        </div>
        <div class="card-body">

            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                <div class="mb-0">
                    <input type="hidden" name="id_genre" value="<?= $data_genre['id_genre'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="genre">Genre Name</label>
                    <input class="form-control" id="genre" name="genre" type="text" value="<?= $data_genre['genre'] ?>" placeholder="genre Name" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="genre:required">Genre Name is required.</div>
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
                    <a class="btn btn-danger btn-icon-split btn-sm" id="resetButton" href="index.php?page=genre">
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