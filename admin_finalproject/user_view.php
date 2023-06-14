<?php
// Tangkap ID berdasarkan URL
$id_user = (int)$_GET['id'];
// SQL
$data_user = select("SELECT * FROM user WHERE id_user = '$id_user'")[0];
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Data User</h1>
    <p class="mb-4">Master Data</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="index.php?page=user" class="btn btn-info btn-icon-split btn-sm">
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
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ID</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $data_user['id_user'] ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="" value="<?= $data_user['username'] ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="" value="<?= $data_user['name'] ?>" disabled readonly>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput4" placeholder="" value="<?= $data_user['email'] ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleFormControlInput4" placeholder="" value="<?= $data_user['password'] ?>" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">User Role</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="" value="<?= $data_user['user_role'] ?>" disabled readonly>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->