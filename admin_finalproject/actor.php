<?php

$data_actor = select("SELECT * FROM actor ORDER BY id_actor DESC");

$arr_obj = [
    'No', 'Image', 'Name', 'Birth', 'Bio', 'Occupation','Country', 'Action'
];

$no = 1;

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Actor Data</h1>
    <p class="mb-4">Master Data</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="index.php?page=actor_add" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Data</span>
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
                        <?php foreach ($data_actor as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><img src="<?= $row['img'] ?>" class="img-thumbnail" width="100" alt=""></td>
                                <td><?= $row['name'] ?></td>
                                <td class="text-center"><?= date('d/m/Y', strtotime($row['birth'])) ?></td>
                                <td><?= short_text($row['bio']) ?></td>
                                <td><?= $row['Occupation'] ?></td>
                                <td><?= $row['Country'] ?></td>
                                <td class="text-center">
                                    <div class="d-inline">
                                        <a href="index.php?page=actor_view&id=<?= $row['id_actor'] ?>" class="btn btn-info btn-circle btn-md"><i class="fas fa-eye"></i></a>
                                        <a href="index.php?page=actor_edit&id=<?= $row['id_actor'] ?>" class="btn btn-warning btn-circle btn-md"><i class="fas fa-pen"></i></a>
                                        <a href="index.php?page=actor_delete&id=<?= $row['id_actor'] ?>" class="btn btn-danger btn-circle btn-md" onclick="return confirm('Remove this data?');"><i class="fas fa-trash"></i></a>
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