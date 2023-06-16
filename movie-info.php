<?php
// Tangkap ID berdasarkan URL
$id_movie = (int)$_GET['id'];
// SQL
$data_movie = select("SELECT r.* , m.id_movie, m.title, m.synopsis, m.img, m.Video , m.release_date, m.duration ,m.Production, m.Country, d.id_director, a.id_actor, m.Video, g.id_genre, g.genre , t.tags, d.name as director_name, a.name as actor_name FROM reviewer as r 
INNER JOIN movie as m ON r.movie_id = m.id_movie 
INNER JOIN category as c ON m.category_id = c.id_category 
INNER JOIN genre as g ON c.genre_id = g.id_genre 
INNER JOIN tag as t ON c.tag_id = t.id_tag
INNER JOIN director as d ON m.director_id = d.id_director
INNER JOIN actor as a ON m.actor_id = a.id_actor
WHERE id_movie = '$id_movie'")[0];

//SQL Film yang berkaitan berdasarkan genre 
$data_genre = $data_movie['genre'];
$data_recommend = select("SELECT m.id_movie, m.title, m.img, g.genre FROM movie as m 
                        INNER JOIN category as c ON m.category_id = c.id_category 
                        INNER JOIN genre as g ON c.genre_Id = g.id_genre 
                        WHERE genre = '$data_genre' AND NOT id_movie = '$id_movie'");

//SQL Data terakhir
$data_latest = select("SELECT m.id_movie, m.title, m.img, m.release_date FROM movie as m WHERE NOT release_date > NOW() 
ORDER BY id_movie DESC LIMIT 3");

//SQL reviewer
$data_reviewer = $data_movie['id_movie'];
$data_comments = select("SELECT u.name, r.date, r.comment, r.rating  FROM reviewer as r
                        INNER JOIN movie as m ON r.movie_id= m.id_movie 
                        INNER JOIN user as u ON r.user_id = u.id_user 
                        WHERE movie_id = '$data_reviewer'");


?>

<section class="after-head d-flex section-text-white pt-5" style="background-image: url('images/image1.png');">
    <div class="d-background bg-black-50"></div>
    <div class="top-block top-inner container">
        <div class="top-block-content">
            <h1 class="section-title">Movies info</h1>
            <div class="page-breadcrumbs">
                <a class="content-link" href="index.php?page=home">Home</a>
                <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                <a class="content-link" href="index.php?page=movies_list">Movies</a>
            </div>
        </div>
    </div>
</section>



<section class="bg-white">
    <div class="container ">
        <div class="sidebar-container">
            <div class="content">
                <section class="section-long">
                    <div class="section-line">
                        <div class="movie-info-entity">
                            <div class="entity-poster" data-role="hover-wrap">
                                <div class="embed-responsive embed-responsive-poster">
                                    <img class="embed-responsive-item" src="./admin_finalproject/<?= $data_movie['img'] ?>" alt="" />
                                </div>
                                <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                    <div class="entity-play">
                                        <a class="action-icon-theme action-icon-bordered rounded-circle" href="<?= $data_movie['Video'] ?>" data-magnific-popup="iframe">
                                            <span class="icon-content"><i class="fas fa-play"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="entity-content">
                                <h2 class="entity-title text-dark"><?= $data_movie['title'] ?></h2>
                                <div class="entity-category">
                                    <a class="content-link" href="index.php?page=movies_list"><?= $data_movie['genre'] ?>
                                </div>
                                <div class="entity-info">
                                    <div class="info-lines text-dark">
                                        <div class="info info-short">
                                            <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                            <span class="info-text"><?= $data_movie['rating'] ?></span>
                                            <span class="info-rest">/5</span>
                                        </div>
                                        <div class="info info-short">
                                            <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                            <span class="info-text"><?= $data_movie['duration'] ?></span>
                                            <span class="info-rest">&nbsp;min</span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="entity-list">
                                    <li>
                                        <span class="entity-list-title">Release:</span>
                                        <?= date_format(date_create($data_movie['release_date']), 'd F Y') ?>
                                    </li>
                                    <li>
                                        <span class="entity-list-title">Directed:</span>
                                        <a class="content-link" href="index.php?page=director&id=<?= $data_movie['id_director'] ?>"><?= $data_movie['director_name'] ?></a>
                                    </li>
                                    <li>
                                        <span class="entity-list-title">Actor:</span>
                                        <a class="content-link" href="index.php?page=actor&id=<?= $data_movie['id_actor'] ?>"><?= $data_movie['actor_name'] ?></a>
                                    </li>
                                    <li>
                                        <span class="entity-list-title">Production company:</span>
                                        <?= $data_movie['Production'] ?>
                                    </li>
                                    <li>
                                        <span class="entity-list-title">Country:</span><?= $data_movie['Country'] ?>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="section-line">
                        <div class="section-head">
                            <h2 class="section-title text-uppercase text-dark ">Synopsis</h2>
                        </div>
                        <div class="section-description">
                            <p class="lead text-justify"><?= $data_movie['synopsis'] ?></p>
                        </div>
                        <div class="section-bottom">
                            <div class="row">
                                <div class="mr-auto col-auto">
                                    <div class="entity-links">
                                        <div class="entity-list-title">Share:</div>
                                        <a class="content-link entity-share-link" href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a class="content-link entity-share-link" href="#"><i class="fab fa-twitter"></i></a>
                                        <a class="content-link entity-share-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                                        <a class="content-link entity-share-link" href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a class="content-link entity-share-link" href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="entity-links">
                                        <div class="entity-list-title">Tags:</div>
                                        <a class="content-link disabled" href="#"><?= $data_movie['tags'] ?></a>,&nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-line">
                        <div class="section-head">
                            <h2 class="section-title text-uppercase text-dark">Recommended For You</h2>
                        </div>
                        <div class="grid row">
                            <?php foreach ($data_recommend as $film) { ?>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="gallery-entity">
                                        <div class="entity-preview" data-role="hover-wrap">
                                            <div class="embed-responsive embed-responsive-1by1">
                                                <img class="embed-responsive-item" src="./admin_finalproject/<?= $film['img'] ?>" alt="" height="200px" />
                                            </div>
                                            <div class="bg-theme-lighted d-over collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                                <div class="entity-view-popup">
                                                    <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://https://www.youtube.com/watch?v=HkL_zVPniI8" data-magnific-popup="iframe">
                                                        <span class="icon-content"><i class="fas fa-play"></i></span>
                                                    </a>
                                                </div>
                                                <h4 class="entity-title">
                                                    <a class="content-link" href="index.php?page=movie-info"><?= $film['title'] ?></a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="section-bottom">
                            <a class="btn btn-theme" href="index.php?page=movies_list">View All</a>
                        </div>
                    </div>
                    <div class="section-line">
                        <div class="section-head">
                            <h2 class="section-title text-uppercase text-dark">Comments</h2>
                        </div>
                        <?php foreach ($data_comments as $comment) { ?>
                            <div class="comment-entity">
                                <div class="entity-inner">
                                    <div class="entity-content">
                                        <h4 class="entity-title text-dark"><?= $comment['name'] ?></h4>
                                        <p class="entity-subtext "><?= date_format(date_create($comment['date']), 'd F Y') ?>

                                        <p class="entity-text text-dark"><?= $comment['comment'] ?>.</p>
                                    </div>
                                    <div class="entity-extra">
                                        <div class="grid-md row">
                                            <div class="col-12 col-sm-auto">
                                                <div class="entity-rating">
                                                    <span class="entity-rating-icon text-theme">
                                                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                            <?php if ($i <= $comment['rating']) { ?>
                                                                <i class="fas fa-star"></i>
                                                            <?php } else { ?>
                                                                <i class="text-muted fas fa-star"></i>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="section-line mt-4">
                        <div class="section-head">
                            <h2 class="section-title text-uppercase text-dark">Add comment</h2>
                        </div>
                        <form autocomplete="off" id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                            <div class="row form-grid">
                                <div class="col-12 col-sm-7">
                                    <div class="input-view-flat input-group">
                                        <input class="form-control" id="user_id" name="user_id" type="text" placeholder="Name" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-7">
                                    <div class="input-view-flat input-group">
                                        <textarea class="form-control" name="review" placeholder="Add your comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="rating-line">
                                        <label>Rating:</label>
                                        <div class="form-rating" name="rating">
                                            <input type="radio" id="rating-input" name="rating" />
                                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                <?php if ($i <= 0) { ?>
                                                    <label>
                                                        <span class="rating-active-icon"><i class="fas fa-star"></i></span>
                                                        <span class="rating-icon"><i class="far fa-star"></i></span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label>
                                                        <span class="rating-active-icon"><i class="fas fa-star"></i></span>
                                                        <span class="rating-icon"><i class="far fa-star"></i></span>
                                                    </label>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="px-5 btn btn-theme" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
            <div class="sidebar section-long order-lg-last">
                <section class="section-sidebar">
                    <div class="section-head mb-3">
                        <h2 class="section-title text-uppercase text-dark">Latest movies</h2>
                    </div>
                    <?php foreach ($data_latest as $row) { ?>
                        <div class="movie-short-line-entity mt-2">
                            <span class="entity-preview embed-responsive embed-responsive-4by3">
                                <img class="embed-responsive-item" src="./admin_finalproject/<?= $row['img'] ?>" alt="" />
                            </span>
                            <div class="entity-content ">
                                <h4 class="entity-title  text-dark">
                                    <a class="content-link" href="index.php?page=movie-info&id=<?= $row['id_movie'] ?>"><?= $row['title'] ?></a>
                                </h4>
                                <p class="entity-subtext"><?= date_format(date_create($row['release_date']), 'd F Y') ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </section>
            </div>
        </div>
    </div>
</section>
<a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

