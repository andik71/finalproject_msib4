<?php
// Tangkap ID berdasarkan URL
$id_director = (int)$_GET['id'];
// SQL
$data_director = select("SELECT * FROM director WHERE id_director = '$id_director'")[0];
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Data Director</h1>
    <p class="mb-4">Master Data</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="index.php?page=director" class="btn btn-info btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Go Back</span>
            </a>
        </div>
        <div class="card-body">
            <!-- Grid System -->
            <div class="row">
                <!-- Left Grid -->
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <img src="<?= $data_director['img'] ?>" class="img-thumbnail" alt="<?= $data_director['img'] ?>">
                    </div>
                </div>
                <!-- Right Grid -->
                <div class="col-lg-8 col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ID</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $data_director['id_director'] ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="" value="<?= strtoupper($data_director['name']) ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Birth</label>
                        <input type="date" class="form-control" id="exampleFormControlInput3" placeholder="" value="<?= $data_director['birth'] ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Occupation</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="" value="<?= $data_director['Occupation'] ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Country</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="" value="<?= $data_director['Country'] ?>" disabled readonly>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled readonly><?= $data_director['bio'] ?></textarea>
                    </div>
                </div>
            </div>
            <!-- Second Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled readonly><?= $data_director['bio'] ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->