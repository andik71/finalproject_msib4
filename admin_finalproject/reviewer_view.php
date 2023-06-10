<?php
// Tangkap ID berdasarkan URL
$id_reviewer = (int)$_GET['id'];
// SQL
$data_reviewer = select("SELECT r.id_reviewer, u.username, r.comment, r.date, r.rating FROM reviewer as r
INNER JOIN user as u ON u.id_user = r.user_id WHERE id_reviewer = '$id_reviewer'")[0];
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">View Data genre</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= strtoupper($data_reviewer['id_reviewer']) ?></h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $data_reviewer['username'] ?>" disabled readonly>
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
            <div class="mb-3">
                <a href="index.php?page=reviewer" class="btn btn-primary">Go back</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->