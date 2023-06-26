<?php
// Tangkap ID berdasarkan URL
$id_user = (int)$_GET['id'];

// SQL
$data_user = select("SELECT * FROM user WHERE id_user = '$id_user'")[0];

// Cek Hak Akses
if ($_SESSION['user_role'] != 'admin') {
    echo "
        <script>
        alert('Maaf. hanya Admin yang berhak');
        window.location.href = 'index.php?page=dashboard';
        </script>";
    exit;
}

if (isset($_POST['save'])) {
    if (edit_user($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Diubah');
        window.location.href = 'index.php?page=user';
        </script>";
    } else {
        echo "
        <script>
        alert('Data Gagal Diubah');
        window.location.href = 'index.php?page=user';
        </script>";
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Data User</h1>
    <p class="mb-4">Halaman ini merupakan halaman untuk melihat detail dari data user</p>

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
        <form action="" method="post">
            <div class="card-body">
                <!-- Grid System -->
                <div class="row">
                    <!-- Left Grid -->
                    <div class="col-lg-4 col-md-6">
                        <input type="hidden" id="img" name="img" value="<?= $data_user['img'] ?>">
                        <input type="hidden" id="password" name="password" value="<?= $data_user['password'] ?>">
                        <div class="mb-3">
                            <img src="<?= $data_user['img'] ?>" class="img-thumbnail" width="350" alt="<?= $data_user['img'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="user_role">User Role</label>
                            <select class="form-control form-select" id="user_role" name="user_role" aria-label="User Role">
                                <option value="admin" <?= ($data_user['user_role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                                <option value="user" <?= ($data_user['user_role'] == 'user') ? 'selected' : '' ?>>User</option>
                                <option value="viewer" <?= ($data_user['user_role'] == 'viewer') ? 'selected' : '' ?>>Viewer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save" class="btn btn-primary btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-user"></i>
                                </span>
                                <span class="text">Change Role</span>
                            </button>
                        </div>
                    </div>
                    <!-- Right Grid -->
                    <div class="col-lg-8 col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">ID</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" name="id_user" value="<?= $data_user['id_user'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput4" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleFormControlInput4" name="username" value="<?= $data_user['username'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput4" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput4" name="name" value="<?= $data_user['name'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput4" name="email" value="<?= $data_user['email'] ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->