<?php
// Tangkap ID berdasarkan URL
$id_reviewer = (int)$_GET['id'];
// SQL
$data_reviewer = select("SELECT r.id_reviewer, m.title, u.username, r.comment, r.date, r.rating FROM reviewer as r
INNER JOIN user as u ON u.id_user = r.user_id 
INNER JOIN movie as m ON m.id_movie = r.movie_id
WHERE id_reviewer = '$id_reviewer'")[0];
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Data Reviewer</h1>
    <p class="mb-4">Halaman ini merupakan halaman untuk melihat detail dari data User Review</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="index.php?page=reviewer" class="btn btn-info btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Go Back</span>
            </a>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $data_reviewer['username'] ?>" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Movie Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $data_reviewer['title'] ?>" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Comment</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled readonly><?= $data_reviewer['comment'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $data_reviewer['date'] ?>" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Rating</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="" value="<?= $data_reviewer['rating'] ?>" disabled readonly>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->