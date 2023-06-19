<?php

// Tangkap ID berdasarkan URL
$id_category = (int)$_GET['id'];
// SQL
$data_category = select("SELECT c.id_category, c.genre_id, c.tag_id, g.genre, t.tags FROM category as c INNER JOIN genre as g ON c.genre_id = g.id_genre
INNer JOIN tag as t ON c.tag_id = t.id_tag WHERE id_category = '$id_category'")[0];
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">View Data genre</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="index.php?page=category" class="btn btn-info btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Go Back</span>
            </a>
        </div>
        <div class="card-body">
            <!-- CATEGORY -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ID</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $data_category['genre_id'] ?>" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="" value="<?= $data_category['genre'] ?>" disabled readonly>
            </div>
            <!-- TAGS -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ID</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $data_category['tag_id'] ?>" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="" value="<?= $data_category['tags'] ?>" disabled readonly>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->