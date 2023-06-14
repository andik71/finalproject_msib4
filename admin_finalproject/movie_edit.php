<?php

// Tangkap ID berdasarkan URL
$id_movie = (int)$_GET['id'];
// Select Data yang terintegrasi
$data_category = select("SELECT c.id_category, g.genre, t.tags FROM category as c INNER JOIN genre as g ON g.id_genre = c.genre_id INNER JOIN tag as t ON t.id_tag = c.tag_id ORDER BY id_tag DESC");
$data_reviewer  = select("SELECT * FROM reviewer ORDER BY id_reviewer DESC");
$data_director  = select("SELECT * FROM director ORDER BY id_director DESC");
$data_actor     = select("SELECT * FROM actor ORDER BY id_actor DESC");
// Tangkap ID Movie
$data_movie = select("SELECT * FROM movie WHERE id_movie = '$id_movie'")[0];

if (isset($_POST['save'])) {
    if (edit_movie($_POST) > 0) {
        echo "
<script>
alert('Data Berhasil Diubah');
window.location.href = 'index.php?page=movie';
</script>";
    } else {
        echo "
<script>
alert('Data Gagal Diubah');
window.location.href = 'index.php?page=movie';
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
        <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Edit Data</h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <!-- Left Grid -->
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-0">
                            <input class="form-control" id="id_movie" type="hidden" name="id_movie" value="<?= $data_movie['id_movie'] ?>">
                        </div>
                        <div class="mb-3">
                            <img src="<?= $data_movie['img'] ?>" class="img-thumbnail" alt="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="formFile">Replace Image</label>
                            <input class="form-control-file" id="formFile" name="img" type="file" data-sb-validations="required" />
                        </div>
                    </div>
                    <!-- Mid Grid -->
                    <div class="col-lg-8 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input class="form-control" id="title" name="title" type="text" placeholder="" data-sb-validations="required" value="<?= $data_movie['title'] ?>" />
                            <div class="invalid-feedback" data-sb-feedback="title:required">Title is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="release_date">Release Date</label>
                            <input class="form-control" id="release_date" name="release_date" type="date" placeholder="" data-sb-validations="required" value="<?= $data_movie['release_date'] ?>" />
                            <div class="invalid-feedback" data-sb-feedback="release_date:required">Release Date is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="id_category">Category (Genre & Tags)</label>
                            <select class="form-control form-select" id="id_category" name="id_category" aria-label="Category Name">
                                <?php
                                foreach ($data_category as $dc) {
                                    $selected = ($dc['id_category'] == $data_movie['category_id']) ? 'selected' : '';
                                    echo '<option ' . $selected . ' value="' . $dc['id_category'] . '">' . $dc['genre'] . ' || ' . $dc['tags'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="id_director">Director Name</label>
                            <select class="form-control form-select" id="id_director" name="id_director" aria-label="Director Name">
                                <?php
                                foreach ($data_director as $dd) {
                                    $selected = ($dd['id_director'] == $data_movie['director_id']) ? 'selected' : '';
                                    echo '<option ' . $selected . ' value="' . $dd['id_director'] . '">' . $dd['name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="id_actor">Actor Name</label>
                            <select class="form-control form-select" id="id_actor" name="id_actor" aria-label="Actor Name">
                                <?php
                                foreach ($data_actor as $da) {
                                    $selected = ($da['id_actor'] == $data_movie['actor_id']) ? 'selected' : '';
                                    echo '<option ' . $selected . ' value="' . $da['id_actor'] . '">' . $da['name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="id_reviewer">Rating</label>
                            <select class="form-control form-select" id="id_reviewer" name="id_reviewer" aria-label="Rating">
                                <?php
                                foreach ($data_reviewer as $dr) {
                                    $selected = ($dr['id_reviewer'] == $data_movie['reviewer_id']) ? 'selected' : '';
                                    echo '<option ' . $selected . ' value="' . $dr['id_reviewer'] . '">' . $dr['rating'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Second Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label" for="synopsis">Synopsis</label>
                            <textarea class="form-control" id="synopsis" name="synopsis" type="text" placeholder="" style="height: 10rem;" data-sb-validations="required"><?= $data_movie['synopsis'] ?></textarea>
                            <div class="invalid-feedback" data-sb-feedback="synopsis:required">Synopis is required.</div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-footer">
                <!-- Tombol -->
                <div class="d-grid m-0">
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
            </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->