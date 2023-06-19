<?php
// Tangkap ID berdasarkan URL
$id_tag = (int)$_GET['id'];
// SQL
$data_tag = select("SELECT * FROM tag WHERE id_tag = '$id_tag'")[0];
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Data Tag</h1>
    <p class="mb-4">Master Data</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="index.php?page=tag" class="btn btn-info btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Go Back</span>
            </a>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ID</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $data_tag['id_tag'] ?>" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="" value="<?= $data_tag['tags'] ?>" disabled readonly>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->