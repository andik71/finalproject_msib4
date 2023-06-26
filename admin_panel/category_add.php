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

$data_genre = select("SELECT * FROM genre ORDER BY id_genre DESC");
$data_tag = select("SELECT * FROM tag ORDER BY id_tag DESC");

if (isset($_POST['save'])) {
    if (add_category($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            window.location.href = 'index.php?page=category';
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan');
            window.location.href = 'index.php?page=category';
        </script>";
    }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create Data Category</h1>
    <p class="mb-4">Halaman ini merupakan halaman untuk Create atau tambah data dari category</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Category</h6>
        </div>
        <div class="card-body">

            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" for="genreName">Genre Name</label>
                    <select class="form-control form-select" id="genreName" name="id_genre" aria-label="Genre Name" required>
                        <?php
                        foreach ($data_genre as $dg) { ?>
                            <option value="<?= $dg['id_genre'] ?>"><?= $dg['genre'] ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tagsName">Tags Name</label>
                    <select class="form-control form-select" id="tagsName" name="id_tag" aria-label="Tags Name" required>
                        <?php
                        foreach ($data_tag as $dt) { ?>
                            <option value="<?= $dt['id_tag'] ?>"><?= $dt['tags'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-sm" id="submitButton" name="save" type="submit">Submit</button>
                    <button class="btn btn-secondary btn-sm" id="resetButton" type="reset">Reset</button>
                    <a class="btn btn-warning btn-sm" id="resetButton" href="index.php?page=category">Go Back</a>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->