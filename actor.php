<?php
// Tangkap ID berdasarkan URL
$id_actor = (int)$_GET['id'];
// SQL
$data_actor = select("SELECT * FROM actor WHERE id_actor = '$id_actor'")[0];
?>

<section class="after-head d-flex section-text-white position-relative  pt-5" style="background-image: url('images/image1.png');">
    <div class="d-background bg-black-50"></div>
    <div class="top-block top-inner container">
        <div class="top-block-content">
            <h1 class="section-title"><?= $data_actor['name'] ?></h1>
            <div class="page-breadcrumbs">
                <a class="content-link" href="index.php?page=home">Home</a>
                <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                Biography
            </div>
        </div>
    </div>
</section>
<section class="bg-white p-5">
    <div class="container">
        <div class="section-head">
            <h2 class="section-title text-uppercase text-dark">overview</h2>
        </div>
        <div class="section-description">
            <div class="card p-3">
                <div class="grid row">
                    <div class="col-md-3 p-4">
                        <center> <img src="./admin_panel/<?= $data_actor['img'] ?>" alt="" srcset="" width="150px"></center>
                    </div>
                    <div class="col-md-6 p-4">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="font-weight-bold text-dark"><b>Born</b></span>
                            </div>
                            <div class="col-md-4">
                                <?= date_format(date_create($data_actor['birth']), 'd F Y') ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="font-weight-bold text-dark">Occupation</span>
                            </div>
                            <div class="col-md-4">
                                <?= $data_actor['occupation'] ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="font-weight-bold text-dark">Country</span>
                            </div>
                            <div class="col-md-4">
                                <?= $data_actor['country'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="section-head">
            <h2 class="section-title text-uppercase text-dark">mini bio</h2>
        </div>
        <div class="card section-description p-5">
            <p class="lead text-justify"><?= $data_actor['bio'] ?></p>
        </div>
        <br>
    </div>
</section>