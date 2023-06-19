<?php

// Cek Hak Akses
if ($_SESSION['user_role'] != 'admin') {
    echo "
        <script>
        alert('Maaf. hanya Admin yang berhak');
        window.location.href = 'index.php?page=dashboard';
        </script>";
    exit;
}

$data_user = select("SELECT * FROM user ORDER BY id_user DESC");

$arr_obj = [
    'No', 'Image', 'Username', 'Name', 'Email', 'Password', 'User Role', 'Action'
];

$no = 1;

// Delete Query

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">Data user</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- TODO :: Link ke Halaman Public -->
            <a href="index.php?page=user" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">View in Public</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <?php
                            foreach ($arr_obj as $row) { ?>
                                <th class="text-center"><?= $row ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_user as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><img src="<?= $row['img'] ?>" class="img-thumbnail" width="100" alt=""></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td class="text-center">Encrypted</td>
                                <td class="text-center"><?= $row['user_role'] ?></td>
                                <td class="text-center">
                                    <div class="d-inline">
                                        <a href="index.php?page=user_view&id=<?= $row['id_user'] ?>" class="btn btn-info btn-circle btn-md"><i class="fas fa-eye"></i></a>
                                        <a href="index.php?page=user_delete&id=<?= $row['id_user'] ?>" class="btn btn-danger btn-circle btn-md" onclick="return confirm('Remove this data?');"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->