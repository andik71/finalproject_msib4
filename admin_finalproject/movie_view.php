<?php

// Tangkap ID berdasarkan URL
$id_movie = (int)$_GET['id'];
// SQL
$data_movie = select("SELECT m.id_movie, m.title, m.synopsis, m.img, m.release_date, g.genre, t.tags, d.name as director_name, a.name as actor_name, FROM movie as m 
INNER JOIN category as c ON m.category_id = c.id_category 
INNER JOIN director as d ON m.director_id = d.id_director 
INNER JOIN actor as a ON m.actor_id = a.id_actor 
INNER JOIN genre as g ON c.genre_Id = g.id_genre 
INNER JOIN tag as t ON c.tag_id = t.id_tag WHERE id_movie = '$id_movie'")[0];

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Data Movie</h1>
    <p class="mb-4">Master Data</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="index.php?page=movie" class="btn btn-info btn-icon-split btn-sm">
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
                        <img src="<?= $data_movie['img'] ?>" class="img-thumbnail" alt="<?= $data_movie['img'] ?>">
                    </div>
                </div>
                <!-- Mid Grid -->
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="id_movie">ID MOVIE</label>
                        <input class="form-control" id="id_movie" name="id_movie" type="text" placeholder="" value="<?= $data_movie['id_movie'] ?>" disabled readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input class="form-control" id="title" name="title" type="text" placeholder="" value="<?= $data_movie['title'] ?>" disabled readonly />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="release_date">Release Date</label>
                        <input class="form-control" id="release_date" name="release_date" type="date" placeholder="" value="<?= $data_movie['release_date'] ?>" disabled readonly />
                    </div>
                </div>
                <!-- Right Grid -->
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="genre">Genre</label>
                        <input class="form-control" id="genre" name="genre" type="text" placeholder="" value="<?= $data_movie['genre'] ?>" disabled readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tags">Tags</label>
                        <input class="form-control" id="tags" name="tags" type="text" placeholder="" value="<?= $data_movie['tags'] ?>" disabled readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="director_name">Director's Name</label>
                        <input class="form-control" id="director_name" name="director_name" type="text" placeholder="" value="<?= $data_movie['director_name'] ?>" disabled readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="actor_name">Actor's Name</label>
                        <input class="form-control" id="actor_name" name="actor_name" type="text" placeholder="" value="<?= $data_movie['actor_name'] ?>" disabled readonly />
                    </div>
                </div>
            </div>
            <!-- Second Row -->
            <div class="row">
                <!-- Justify Content -->
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label" for="synopsis">Synopsis</label>
                        <textarea class="form-control" id="synopsis" name="synopsis" type="text" placeholder="" style="height: 10rem;" disabled readonly><?= $data_movie['synopsis'] ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->