<?php
// Tangkap ID berdasarkan URL
$id_user = (int)$_GET['id'];
$data_user = select("SELECT * FROM user WHERE id_user = '$id_user'")[0];
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">User Profile</h1>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="index.php?page=dashboard" class="btn btn-info btn-icon-split btn-sm">
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
                        <img src="<?= $data_user['img'] ?>" class="img-thumbnail" alt="<?= $data_user['img'] ?>">
                    </div>
                </div>
                <!-- Right Grid -->
                <div class="col-lg-8 col-md-6">
                    <!-- <div class="mb-3">
                        <label for="id_user" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id_user" placeholder="" value="<?= $data_user['id_user'] ?>" disabled readonly>
                    </div> -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="" value="<?= strtoupper($data_user['name']) ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="" value="<?= $data_user['username'] ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="" value="<?= $data_user['email'] ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="user_role" class="form-label">User Level</label>
                        <input type="text" class="form-control" id="user_role" placeholder="" value="<?= $data_user['user_role'] ?>" disabled readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->