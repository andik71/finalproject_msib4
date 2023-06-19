<?php

$data_movie = select("SELECT m.id_movie, m.title, m.synopsis, m.img, m.release_date, m.duration, m.production, m.video, m.country, g.genre, t.tags, d.name as director_name, a.name as actor_name FROM movie as m 
INNER JOIN category as c ON m.category_id = c.id_category 
INNER JOIN director as d ON m.director_id = d.id_director 
INNER JOIN actor as a ON m.actor_id = a.id_actor 
INNER JOIN genre as g ON c.genre_Id = g.id_genre 
INNER JOIN tag as t ON c.tag_id = t.id_tag
ORDER BY id_movie DESC
");

$arr_obj = [
    'No', 'Image', 'Title', 'Synopis', 'Release Date', 'Duration', 'Production', 'Video', 'Country', 'Genre', 'Tags', 'Director Name', 'Actor Name', 'Action'
];

$no = 1;

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">Data Movie</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="index.php?page=movie_add" class="btn btn-primary btn-icon-split btn-sm">
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
                        <?php foreach ($data_movie as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><img src="<?= $row['img'] ?>" class="img-thumbnail" width="100" alt=""></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= short_text($row['synopsis']) ?></td>
                                <td><?= date('d/m/Y', strtotime($row['release_date'])) ?></td>
                                <td class="text-center"><?= format_duration($row['duration']) ?></td>
                                <td class="text-center"><?= $row['production'] ?></td>
                                <td class="text-center"><a href="<?= $row['video'] ?>" target="_blank">Trailer</a></td>
                                <td class="text-center"><?= $row['country'] ?></td>
                                <td class="text-center"><?= $row['genre'] ?></td>
                                <td class="text-center"><?= $row['tags'] ?></td>
                                <td><?= $row['director_name'] ?></td>
                                <td><?= $row['actor_name'] ?></td>
                                <td class="text-center">
                                    <div class="d-inline">
                                        <a href="index.php?page=movie_view&id=<?= $row['id_movie'] ?>" class="btn btn-info btn-circle btn-md"><i class="fas fa-eye"></i></a>
                                        <a href="index.php?page=movie_edit&id=<?= $row['id_movie'] ?>" class="btn btn-warning btn-circle btn-md"><i class="fas fa-pen"></i></a>
                                        <a href="index.php?page=movie_delete&id=<?= $row['id_movie'] ?>" class="btn btn-danger btn-circle btn-md" onclick="return confirm('Remove this data?');"><i class="fas fa-trash"></i></a>
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