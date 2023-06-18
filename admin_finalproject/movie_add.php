<?php

$data_category  = select("SELECT c.id_category, g.genre, t.tags FROM category as c INNER JOIN genre as g ON g.id_genre = c.genre_id INNER JOIN tag as t ON t.id_tag = c.tag_id ORDER BY id_category DESC");
$data_director  = select("SELECT * FROM director ORDER BY id_director DESC");
$data_actor     = select("SELECT * FROM actor ORDER BY id_actor DESC");
if (isset($_POST['save'])) {
    if (add_movie($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            window.location.href = 'index.php?page=movie';
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan');
            window.location.href = 'index.php?page=movie';
        </script>";
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">Add Data Movie</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Data</h6>
        </div>
        <div class="card-body">

            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input class="form-control" id="title" name="title" type="text" placeholder="Title" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="title:required">Title is required.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="synopsis">Synopsis</label>
                    <textarea class="form-control" id="synopsis" name="synopsis" type="text" placeholder="synopsis" style="height: 10rem;" data-sb-validations="required"></textarea>
                    <div class="invalid-feedback" data-sb-feedback="synopsis:required">Synopis is required.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="formFile">Image</label>
                    <input class="form-control-file" id="formFile" name="img" type="file" accept="image/png, image/jpg, image/jpeg" data-sb-validations="required" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="release_date">Release Date</label>
                    <input class="form-control" id="release_date" name="release_date" type="date" placeholder="Release Date" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="release_date:required">Release Date is required.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="id_category">Category (Genre || Tags)</label>
                    <select class="form-control form-select" id="id_category" name="id_category" aria-label="Tags Name">
                        <?php
                        foreach ($data_category as $dc) { ?>
                            <option value="<?= $dc['id_category'] ?>"><?= $dc['genre'] ?> || <?= $dc['tags'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="id_director">Director Name</label>
                    <select class="form-control form-select" id="id_director" name="id_director" aria-label="Director Name">
                        <?php
                        foreach ($data_director as $dd) { ?>
                            <option value="<?= $dd['id_director'] ?>"> <?= $dd['name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="id_actor">Actor Name</label>
                    <select class="form-control form-select" id="id_actor" name="id_actor" aria-label="Actor Name">
                        <?php
                        foreach ($data_actor as $da) { ?>
                            <option value="<?= $da['id_actor'] ?>"> <?= $da['name'] ?> </option>
                        <?php } ?>
                    </select>
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
                    <a class="btn btn-danger btn-icon-split btn-sm" id="resetButton" href="index.php?page=movie">
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