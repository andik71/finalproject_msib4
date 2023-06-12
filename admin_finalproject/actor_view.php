<?php
// Tangkap ID berdasarkan URL
$id_actor = (int)$_GET['id'];
// SQL
$data_actor = select("SELECT * FROM actor WHERE id_actor = '$id_actor'")[0];
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Data Actor</h1>
    <p class="mb-4">Master Data</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="index.php?page=actor" class="btn btn-info btn-icon-split btn-sm">
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
                        <img src="<?= $data_actor['img'] ?>" class="img-thumbnail" alt="<?= $data_actor['img'] ?>">
                    </div>
                    <!-- <div class="mb-3 me-2 text-center d-block">
                       <h6 class="mx-3 text-light fw-bold"><?= strtoupper($data_actor['name']) ?></h6> 
                        <label for="exampleFormControlInput4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="" value="<?= strtoupper($data_actor['name']) ?>" disabled readonly>
                    </div> -->
                </div>
                <!-- Right Grid -->
                <div class="col-lg-8 col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ID</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $data_actor['id_actor'] ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="" value="<?= strtoupper($data_actor['name']) ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Birth</label>
                        <input type="date" class="form-control" id="exampleFormControlInput3" placeholder="" value="<?= $data_actor['birth'] ?>" disabled readonly>
                    </div>
                </div>
            </div>
            <!-- Second Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled readonly><?= $data_actor['bio'] ?></textarea>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->