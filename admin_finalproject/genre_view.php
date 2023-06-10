<?php
// Tangkap ID berdasarkan URL
$id_genre = (int)$_GET['id'];
// SQL
$data_genre = select("SELECT * FROM genre WHERE id_genre = '$id_genre'")[0];
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">View Data genre</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= strtoupper($data_genre['genre']) ?></h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ID</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $data_genre['id_genre'] ?>" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="" value="<?= $data_genre['genre'] ?>" disabled readonly>
            </div>
            <div class="mb-3">
                <a href="index.php?page=genre" class="btn btn-primary">Go back</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->