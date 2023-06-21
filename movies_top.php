<?php

$data_movie = select("SELECT r.* , m.id_movie, m.title, m.synopsis, m.img, m.Video , m.duration ,g.id_genre, g.genre , t.tags FROM reviewer as r 
INNER JOIN movie as m ON r.movie_id = m.id_movie 
INNER JOIN category as c ON m.category_id = c.id_category 
INNER JOIN genre as g ON c.genre_id = g.id_genre 
INNER JOIN tag as t ON c.tag_id = t.id_tag ORDER BY rating DESC;
");

?>
<section class="after-head d-flex section-text-white position-relative pt-5" style="background-image: url('images/image1.png');">
    <div class="d-background bg-black-50"></div>
    <div class="top-block top-inner container">
        <div class="top-block-content">
            <h1 class="section-title">Top Movies</h1>
            <div class="page-breadcrumbs">
                <a class="content-link" href="index.php?page=home">Home</a>
                <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                <a class="content-link" href="index.php?page=movies_list">Movies</a>
            </div>
        </div>
    </div>
</section>
<section class="bg-white pt-5 pb-5">
    <div class="container">
        <div class="section-head">
            <h2 class="section-title text-uppercase text-dark">TOP 10 MOVIES</h2>
        </div>
        <div class="grid row">
            <?php
            $count = 0; 
            foreach ($data_movie as $row) {
                if ($row['rating'] > 3 && $count < 10) { 
                    $count++;
            ?>
                    <div class="col-sm-6 col-lg-3">
                        <article class="poster-entity" data-role="hover-wrap">
                            <div class="poster-content">
                                <div class="embed-responsive embed-responsive-poster">
                                    <img class="embed-responsive-item" src="./admin_panel/<?= $row['img'] ?>" alt="" />
                                </div>
                                <div class="d-over bg-highlight-bottom">
                                    <div class="collapse animated faster entity-play" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                        <a class="action-icon-theme action-icon-bordered rounded-circle" href="<?= $row['Video'] ?>" data-magnific-popup="iframe">
                                            <span class="icon-content"><i class="fas fa-play"></i></span>
                                        </a>
                                    </div>
                                    <h4 class="entity-title">
                                        <a class="content-link" href="index.php?page=movie-info&id=<?= $row['id_movie'] ?>"><?= $row['title'] ?></a>
                                    </h4>
                                    <div class="entity-category">
                                        <a class="content-link" href="index.php?page=movies_list&id=<?= $row['id_genre'] ?>"><?= $row['genre'] ?></a>
                                    </div>
                                    <div class="entity-info">
                                        <div class="info-lines">
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                                <span class="info-text"><?= $row['rating'] ?></span>
                                                <span class="info-rest">/5</span>
                                            </div>
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                                <span class="info-text"><?= $row['duration'] ?></span>
                                                <span class="info-rest">&nbsp;min</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>