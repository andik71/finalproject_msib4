<?php

$data_latest = select("SELECT m.id_movie, m.title, m.synopsis, m.img, m.release_date, m.duration, m.video,g.id_genre,g.genre, t.tags, d.name as director_name, a.name as actor_name, r.rating FROM movie as m 
INNER JOIN category as c ON m.category_id = c.id_category 
INNER JOIN director as d ON m.director_id = d.id_director 
INNER JOIN actor as a ON m.actor_id = a.id_actor 
INNER JOIN reviewer as r ON m.reviewer_id = r.id_reviewer 
INNER JOIN genre as g ON c.genre_Id = g.id_genre 
INNER JOIN tag as t ON c.tag_id = t.id_tag
ORDER BY id_movie DESC LIMIT 3
");

//menampilkan movie top
$data_top = select("SELECT m.id_movie, m.title, m.synopsis, m.img, m.release_date, m.duration, m.video, g.id_genre,g.genre, t.tags, d.name as director_name, a.name as actor_name, r.rating FROM movie as m 
INNER JOIN category as c ON m.category_id = c.id_category 
INNER JOIN director as d ON m.director_id = d.id_director 
INNER JOIN actor as a ON m.actor_id = a.id_actor 
INNER JOIN reviewer as r ON m.reviewer_id = r.id_reviewer 
INNER JOIN genre as g ON c.genre_Id = g.id_genre 
INNER JOIN tag as t ON c.tag_id = t.id_tag
ORDER BY rating DESC
");

//menampilkan movie list
$data_movie = select("SELECT m.id_movie, m.title, m.synopsis, m.img, m.release_date, m.duration, m.video,g.id_genre, g.genre, t.tags, d.name as director_name, a.name as actor_name, r.rating FROM movie as m 
INNER JOIN category as c ON m.category_id = c.id_category 
INNER JOIN director as d ON m.director_id = d.id_director 
INNER JOIN actor as a ON m.actor_id = a.id_actor 
INNER JOIN reviewer as r ON m.reviewer_id = r.id_reviewer 
INNER JOIN genre as g ON c.genre_Id = g.id_genre 
INNER JOIN tag as t ON c.tag_id = t.id_tag
ORDER BY id_movie ASC LIMIT 2
");

//menampilkan movie com
$data_com = select("SELECT m.id_movie, m.title, m.synopsis, m.img, m.release_date, m.duration, m.video,g.id_genre, g.genre, t.tags, d.name as director_name, a.name as actor_name, r.rating FROM movie as m 
INNER JOIN category as c ON m.category_id = c.id_category 
INNER JOIN director as d ON m.director_id = d.id_director 
INNER JOIN actor as a ON m.actor_id = a.id_actor 
INNER JOIN reviewer as r ON m.reviewer_id = r.id_reviewer 
INNER JOIN genre as g ON c.genre_Id = g.id_genre 
INNER JOIN tag as t ON c.tag_id = t.id_tag
WHERE release_date > NOW()
ORDER BY id_movie ASC LIMIT 2
");
?>

<section class="section-text-white position-relative" style="background-image: url(images/image1.png);">
    <div class="mt-auto container position-relative">
        <div class="top-block-head text-uppercase">
            <h2 class="display-4 mt-4">TOP
                <span style="color: #1d95ad;"><b>in film kita</b></span>
            </h2>
        </div>
        <div class="top-block-footer">
            <div class="slick-spaced slick-carousel" data-slick-view="navigation responsive-4">
                <div class="slick-slides">
                    <?php foreach ($data_top as $movie) { ?>
                        <div class="slick-slide">
                            <article class="poster-entity" data-role="hover-wrap">
                                <div class="embed-responsive embed-responsive-poster">
                                    <img class="embed-responsive-item" src="./admin_finalproject/<?= $movie['img'] ?>" alt="" />
                                </div>
                                <div class="d-background bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show"></div>
                                <div class="d-over bg-highlight-bottom">
                                    <div class="collapse animated faster entity-play" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                        <a class="action-icon-theme action-icon-bordered rounded-circle" href="<?= $movie['video'] ?>" data-magnific-popup="iframe">
                                            <span class="icon-content"><i class="fas fa-play"></i></span>
                                        </a>
                                    </div>
                                    <h4 class="entity-title">
                                        <a class="content-link" href="index.php?page=movie-info&id=<?= $movie['id_movie'] ?>"><?= $movie['title'] ?></a>
                                    </h4>
                                    <div class="entity-category">
                                        <a class="content-link" href="index.php?page=movies_list&id=<?= $movie['id_genre'] ?>"><?= $movie['genre'] ?></a>,
                                    </div>  
                                    <div class="entity-info">
                                        <div class="info-lines">
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                                <span class="info-text"><?= $movie['rating'] ?></span>
                                                <span class="info-rest">/5</span>
                                            </div>
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                                <span class="info-text"><?= $movie['duration'] ?></span>
                                                <span class="info-rest">&nbsp;min</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php } ?>
                </div>
                <div class="slick-arrows">
                    <div class="slick-arrow-prev">
                        <span class="th-dots th-arrow-left th-dots-animated">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div class="slick-arrow-next">
                        <span class="th-dots th-arrow-right th-dots-animated">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- New Movies Update -->
<section class="section-long" id="new-movies">
    <div class="container">
        <div class="section-head">
            <h2 class="section-title text-uppercase">LATEST MOVIES</h2>
        </div>
        <?php foreach ($data_latest as $row) { ?>

            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="./admin_finalproject/<?= $row['img'] ?>" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="<?= $row['video'] ?>" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
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
                                <span class="info-text">125</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text"><?= short_text($row['synopsis']) ?>
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">Tags</div>
                    <div class="entity-showtime">
                        <div class="showtime-wrap">
                            <?php foreach ($data_latest as $row) { ?>
                                <div class="showtime-item">
                                    <a class="btn-time btn" aria-disabled="false" href="#"><?= $row['tags'] ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
</section>

<!-- Upcoming Movies -->
<section class="section-solid-long section-text-white position-relative" id="upcoming">
    <div class="container position-relative">
        <div class="section-head">
            <h2 class="section-title text-uppercase">Comming Soon</h2>
        </div>
        <div class="slick-spaced slick-carousel" data-slick-view="navigation single">
            <div class="slick-slides">
                <?php foreach ($data_com as $comm) {?>
                    <div class="slick-slide">
                    <article class="movie-line-entity">
                        <div class="entity-preview">
                            <div class="embed-responsive embed-responsive-4by3">
                                <img class="embed-responsive-item" src="./admin_finalproject/<?= $comm['img'] ?>" alt="" />
                            </div>
                            <div class="d-over">
                                <div class="entity-play">
                                    <a class="action-icon-theme action-icon-bordered rounded-circle" href="<?= $comm['video'] ?>" data-magnific-popup="iframe">
                                        <span class="icon-content"><i class="fas fa-play"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="entity-content">
                            <h4 class="entity-title">
                                <a class="content-link" href="index.php?page=movie-info&id=<?= $comm['id_movie'] ?>"><?= $comm['title'] ?></a>
                            </h4>
                            <div class="entity-category">
                                <a class="content-link" href="index.php?page=movies_list&id=<?= $comm['id_genre'] ?>"><?= $comm['genre'] ?></a>,
                            </div>
                            <div class="entity-info">
                                <div class="info-lines">
                                    <div class="info info-short">
                                        <span class="text-theme info-icon"><i class="fas fa-calendar-alt"></i></span>
                                        <span class="info-text"><?= date_format(date_create($comm['release_date']), 'd F Y') ?></span>
                                    </div>
                                    <div class="info info-short">
                                        <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                        <span class="info-text"><?= $comm['duration'] ?></span>
                                        <span class="info-rest">&nbsp;min</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-short entity-text"><?= $comm['synopsis'] ?>
                            </p>
                        </div>
                    </article>
                </div>
               <?php }?>
               
            
            </div>
            <div class="slick-arrows">
                <div class="slick-arrow-prev">
                    <span class="th-dots th-arrow-left th-dots-animated">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
                <div class="slick-arrow-next">
                    <span class="th-dots th-arrow-right th-dots-animated">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Movies List -->
<section class="section-long">
    <div class="container">
        <div class="section-head">
            <h2 class="section-title text-uppercase">movies</h2>
        </div>
        <div class="grid row">
            <?php foreach ($data_movie as $list) { ?>
                <div class="col-md-6">
                    <article class="article-tape-entity">
                        <a class="entity-preview" href="<?= $list['video'] ?>" data-magnific-popup="iframe" data-role="hover-wrap">
                            <span class="embed-responsive embed-responsive-4by3">
                                <img class="embed-responsive-item" src="./admin_finalproject/<?= $list['img'] ?>" alt="" />
                            </span>
                            <span class="entity-date">
                                <span class="tape-block tape-horizontal tape-single bg-theme text-white">
                                    <span class="tape-dots"></span>
                                    <span class="tape-content m-auto"><?= date_format(date_create($list['release_date']), 'd F Y') ?></span>
                                    <span class="tape-dots"></span>
                                </span>
                            </span>
                            <span class="d-over bg-black-80 collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                <span class="m-auto"><i class="fas fa-play"></i></span>
                            </span>
                        </a>
                        <div class="entity-content">
                            <h4 class="entity-title">
                                <a class="content-link" href="index.php?page=movie-info&id=<?= $list['id_movie'] ?>"><?= $list['title'] ?></a>
                            </h4>
                            <div class="entity-category">
                                <a class="content-link" href="index.php?page=movie-info&id=<?= $list['id_genre'] ?>"><?= $list['genre'] ?></a>,
                            </div>
                            <p class="text-short entity-text"><?= $list['synopsis'] ?>
                            </p>
                            <div class="entity-actions">
                                <a class="text-uppercase" href="index.php?page=movie-info&id=<?= $list['id_movie'] ?>">Read More</a>
                            </div>
                        </div>
                    </article>
                </div>
            <?php  } ?>


        </div>
        <div class="section-bottom">
            <a class="btn btn-theme" href="index.php?page=movies_list">View All Movies</a>
        </div>
    </div>
</section>

<!-- Contact -->
<section>
    <div class="gmap-with-map bg-white">
        <div class="gmap" data-lat="-40.878897" data-lng="151.103737">
            <iframe style="border:0; width: 100%; height: 570px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d493.94212418348434!2d112.61591113524486!3d-7.9433266018527355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788274e9c41b51%3A0xb66aa2d4fd7ab2e5!2sStudio%20Rupa%20Malang%20Store!5e0!3m2!1sid!2sid!4v1685096592149!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ml-lg-auto">
                    <div class="gmap-form bg-white">
                        <h4 class="form-title text-uppercase">Contact
                            <span class="text-theme">us</span>
                        </h4>
                        <p class="form-text">We understand your requirement and provide quality works</p>
                        <form autocomplete="off">
                            <div class="row form-grid">
                                <div class="col-sm-6">
                                    <div class="input-view-flat input-group">
                                        <input class="form-control" name="name" type="text" placeholder="Name" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-view-flat input-group">
                                        <input class="form-control" name="email" type="email" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-view-flat input-group">
                                        <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="px-5 btn btn-theme" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



