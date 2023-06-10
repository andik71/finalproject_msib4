<?php
// Tangkap ID berdasarkan URL
$id_actor = (int)$_GET['id'];
// SQL
$data_actor = select("SELECT * FROM actor WHERE id_actor = '$id_actor'")[0];
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">View Data Actor</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
        </div>
        <div class="card-body">
            <!-- Grid System -->
            <div class="row">
                <!-- Left Grid -->
                <div class="col-lg-3 col-md-6">
                    <div class="mb-2 me-2 p-2 border-left-primary bg-light d-block">
                        <h6 class="text fw-bold"><?= strtoupper($data_actor['name']) ?></h6>
                        <!-- <label for="exampleFormControlInput4" class="form-label">Img</label> -->
                        <!-- <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="" value="" disabled readonly> -->
                    </div>
                    <div class="mb-3">
                        <img src="<?= $data_actor['img'] ?>" class="img-thumbnail" alt="image">
                    </div>
                </div>
                <!-- Right Grid -->
                <div class="col-lg-9 col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ID</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $data_actor['id_actor'] ?>" disabled readonly>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="" value="<?= $data_actor['name'] ?>" disabled readonly>
                    </div> -->
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Birth</label>
                        <input type="date" class="form-control" id="exampleFormControlInput3" placeholder="" value="<?= $data_actor['birth'] ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled readonly><?= $data_actor['bio'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <a href="index.php?page=actor" class="btn btn-primary">Go back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->


