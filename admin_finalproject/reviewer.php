<?php

$data_reviewer = select("SELECT r.id_reviewer, m.title, u.username, r.comment, r.date, r.rating FROM reviewer as r
INNER JOIN user as u ON u.id_user = r.user_id 
INNER JOIN movie as m ON m.id_movie = r.movie_id
ORDER BY id_reviewer DESC");

$arr_obj = [
    'No', 'Username', 'Movie Title','Comment', 'Date', 'Rating', 'Action'
];

$no = 1;

// Delete Query

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">Data reviewer</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- TODO :: Link ke Halaman Public -->
            <a href="index.php?page=reviewer" class="btn btn-primary btn-icon-split btn-sm">
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
                        <?php foreach ($data_reviewer as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= short_text($row['comment'], 50) ?></td>
                                <td><?= date('d/m/Y H:i:s', strtotime($row['date'])) ?></td>
                                <td><?= $row['rating'] ?></td>
                                <td class="text-center">
                                    <div class="d-inline">
                                        <a href="index.php?page=reviewer_view&id=<?= $row['id_reviewer'] ?>" class="btn btn-info btn-circle btn-md"><i class="fas fa-eye"></i></a>
                                        <a href="index.php?page=reviewer_delete&id=<?= $row['id_reviewer'] ?>" class="btn btn-danger btn-circle btn-md" onclick="return confirm('Remove this data?');"><i class="fas fa-trash"></i></a>
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