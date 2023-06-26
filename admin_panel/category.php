<?php

$data_category = select("SELECT c.id_category, g.genre, t.tags FROM category as c INNER JOIN genre as g ON c.genre_id = g.id_genre
INNer JOIN tag as t ON c.tag_id = t.id_tag ORDER BY id_category DESC");

$arr_obj = [
    'No', 'Genre Name', 'Tag Name', 'Action'
];

$no = 1;

// Delete Query

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Category Data</h1>
    <p class="mb-4">Halaman ini merupakan sekumpulan data <strong>category</strong> yang telah tersimpan dalam database. Admin memiliki akses untuk Create, Update, Read dan Delete data</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="index.php?page=category_add" class="btn btn-primary btn-icon-split btn-sm">
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
                        <?php foreach ($data_category as $row) { ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $row['genre'] ?></td>
                                <td><?= $row['tags'] ?></td>
                                <td>
                                    <div class="d-inline">
                                        <a href="index.php?page=category_view&id=<?= $row['id_category'] ?>" class="btn btn-info btn-circle btn-md"><i class="fas fa-eye"></i></a>
                                        <a href="index.php?page=category_edit&id=<?= $row['id_category'] ?>" class="btn btn-warning btn-circle btn-md"><i class="fas fa-pen"></i></a>
                                        <a href="index.php?page=category_delete&id=<?= $row['id_category'] ?>" class="btn btn-danger btn-circle btn-md" onclick="return confirm('Hapus data category ini?');"><i class="fas fa-trash"></i></a>
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