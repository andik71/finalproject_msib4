    <?php
    $id_genre = (int)$_GET['id'];
    $data_genre = select("SELECT g.id_genre, g.genre FROM genre as g");

    // Konfigurasi pagination
    $dataPerHalaman = 5;
    $queryData = select("SELECT * FROM movie");
    $rowJumlahData = count($queryData);

    // Hitung jumlah halaman
    $jumlahHalaman = ceil($rowJumlahData / $dataPerHalaman);
    if (isset($_GET['halaman'])) {
        $halamanAktif = $_GET['halaman'];
    } else {
        $halamanAktif = 1;
    }
    $dataAwal = ($halamanAktif * $dataPerHalaman) - $dataPerHalaman;

    // Search
    $search = isset($_POST['search']) ? $_POST['search'] : '';

    if ($search) {
        //menampilkan movie berdasarkan id genre dan Query untuk mengambil data dengan pagination
        $data_movie = select("SELECT m.id_movie, m.title, m.synopsis, m.img, m.release_date, m.category_id,m.duration, m.video, m.production, m.country, g.id_genre,g.genre, t.tags FROM movie as m 
    INNER JOIN category as c ON m.category_id = c.id_category 
    INNER JOIN director as d ON m.director_id = d.id_director 
    INNER JOIN actor as a ON m.actor_id = a.id_actor 
    INNER JOIN genre as g ON c.genre_Id = g.id_genre 
    INNER JOIN tag as t ON c.tag_id = t.id_tag
    WHERE id_genre = '$id_genre' AND (m.title LIKE '%$search%') LIMIT $dataAwal, $dataPerHalaman");

        //menampilkan movie berdasarkan seluruh movie
        $data_movie2 = select("SELECT m.id_movie, m.title, m.synopsis, m.img, m.release_date,m.category_id,m.duration, m.video, m.production, m.country, g.id_genre,g.genre, t.tags FROM movie as m 
    INNER JOIN category as c ON m.category_id = c.id_category 
    INNER JOIN director as d ON m.director_id = d.id_director 
    INNER JOIN actor as a ON m.actor_id = a.id_actor 
    INNER JOIN genre as g ON c.genre_Id = g.id_genre 
    INNER JOIN tag as t ON c.tag_id = t.id_tag
    WHERE m.title LIKE '%$search%'
    ORDER BY id_movie DESC  LIMIT $dataAwal, $dataPerHalaman
    ");
    } else {
        // Konfigurasi pagination
        $dataPerHalaman = 5;
        $queryData = select("SELECT * FROM movie");
        $rowJumlahData = count($queryData);

        // Hitung jumlah halaman
        $jumlahHalaman = ceil($rowJumlahData / $dataPerHalaman);
        if (isset($_GET['halaman'])) {
            $halamanAktif = $_GET['halaman'];
        } else {
            $halamanAktif = 1;
        }
        $dataAwal = ($halamanAktif * $dataPerHalaman) - $dataPerHalaman;
        //menampilkan movie berdasarkan id genre dan Query untuk mengambil data dengan pagination
        $data_movie = select("SELECT m.id_movie, m.title, m.synopsis, m.img, m.release_date,m.category_id,m.duration, m.video, m.Production, m.Country, g.id_genre,g.genre, t.tags FROM movie as m 
        INNER JOIN category as c ON m.category_id = c.id_category 
        INNER JOIN director as d ON m.director_id = d.id_director 
        INNER JOIN actor as a ON m.actor_id = a.id_actor 
        INNER JOIN genre as g ON c.genre_Id = g.id_genre 
        INNER JOIN tag as t ON c.tag_id = t.id_tag
        WHERE id_genre = '$id_genre' LIMIT $dataAwal, $dataPerHalaman");

        //menampilkan movie berdasarkan seluruh movie
        $data_movie2 = select("SELECT m.id_movie, m.title, m.synopsis, m.img, m.release_date,m.category_id,m.duration, m.video, m.Production, m.Country, g.id_genre,g.genre, t.tags FROM movie as m 
        INNER JOIN category as c ON m.category_id = c.id_category 
        INNER JOIN director as d ON m.director_id = d.id_director 
        INNER JOIN actor as a ON m.actor_id = a.id_actor 
        INNER JOIN genre as g ON c.genre_Id = g.id_genre 
        INNER JOIN tag as t ON c.tag_id = t.id_tag
        ORDER BY id_movie DESC  LIMIT $dataAwal, $dataPerHalaman
    ");
    }
    ?>

    <section class="after-head d-flex section-text-white position-relative  pt-5" style="background-image: url('images/image1.png');">
        <div class="d-background bg-black-50"></div>
        <div class="top-block top-inner container">
            <div class="top-block-content">
                <h1 class="section-title">Movies List</h1>
                <div class="page-breadcrumbs">
                    <a class="content-link" href="index.php?page=home">Home</a>
                    <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                    <span>Movies</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Movies List -->
    <section class="bg-white pt-5 pb-5 ">
        <div class="container">
            <div class="section-pannel shadow-lg">
                <div class="grid row">
                    <div class="col-md-10">
                        <form method="post" action="index.php?page=movies_list&search=<?= $search ?>">
                            <div class="row form-grid">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="input-view-flat input-group">
                                        <input class="form-control" id="search" name="search" type="text" placeholder="Search" value="<?= $search ?>" />
                                        <div class="input-group-append">
                                            <button class="input-group-text" type="submit"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-2 my-md-4 d-flex">
                        <div class="input-view-flat">
                            <select id="gemre" name="genre" class="form-control" onchange="redirectToLink(this)">
                                <option selected="true">genre</option>
                                <?php foreach ($data_genre as $genre) { ?>
                                    <option value="index.php?page=movies_list&id=<?= $genre['id_genre'] ?>">
                                        <?= $genre['genre'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kondisi ketika url memiliki id dan jika url tidak memiliki id -->
            <?php if ($id_genre) { ?>
                <?php foreach ($data_movie as $row) { ?>
                    <article class="movie-line-entity bg-white shadow-lg">
                        <div class="entity-poster" data-role="hover-wrap">
                            <div class="embed-responsive embed-responsive-poster">
                                <img class="embed-responsive-item" src="./admin_panel/<?= $row['img'] ?>" alt="" />
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
                            <h4 class="entity-title text-dark">
                                <a class="content-link " href="index.php?page=movie-info&id=<?= $row['id_movie'] ?>"><?= $row['title'] ?></a>
                            </h4>
                            <div class="entity-category">
                                <a class="content-link" href="index.php?page=movies_list&id=<?= $row['id_genre'] ?>"><?= $row['genre'] ?></a>,
                            </div>
                            <div class="entity-info text-dark">
                                <div class="info-lines">
                                    <div class="info info-short">
                                        <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                        <span class="info-text"><?= $row['duration'] ?></span>
                                        <span class="info-rest">&nbsp;min</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-short entity-text text-dark"><?= short_text($row['synopsis']) ?></p>
                        </div>
                        <div class="entity-extra">
                            <div class="text-uppercase entity-extra-title">Tags</div>
                            <div class="entity-showtime">
                                <div class="showtime-wrap">
                                    <?php foreach ($data_movie as $row) { ?>
                                        <div class="showtime-item">
                                            <a class="btn-time btn" aria-disabled="false" href="#"><?= $row['tags'] ?></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            <?php } else {  ?>
                <?php foreach ($data_movie2 as $row) { ?>
                    <article class="movie-line-entity bg-white shadow-lg">
                        <div class="entity-poster" data-role="hover-wrap">
                            <div class="embed-responsive embed-responsive-poster">
                                <img class="embed-responsive-item" src="./admin_panel/<?= $row['img'] ?>" alt="" />
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
                            <h4 class="entity-title text-dark">
                                <a class="content-link " href="index.php?page=movie-info&id=<?= $row['id_movie'] ?>"><?= $row['title'] ?></a>
                            </h4>
                            <div class="entity-category">
                                <a class="content-link" href="index.php?page=movies_list&id=<?= $row['id_genre'] ?>"><?= $row['genre'] ?></a>,
                            </div>
                            <div class="entity-info text-dark">
                                <div class="info-lines">
                                    <div class="info info-short">
                                        <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                        <span class="info-text"><?= $row['duration'] ?></span>
                                        <span class="info-rest">&nbsp;min</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-short entity-text text-dark"><?= short_text($row['synopsis']) ?></p>
                        </div>
                        <div class="entity-extra">
                            <div class="text-uppercase entity-extra-title">Tags</div>
                            <div class="entity-showtime">
                                <div class="showtime-wrap">
                                    <?php foreach ($data_movie2 as $row) { ?>
                                        <div class="showtime-item">
                                            <a class="btn-time btn" aria-disabled="false" href="#"><?= $row['tags'] ?></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            <?php } ?>

            <div class="section-bottom">
                <div class="paginator">
                    <!-- Membuat kondisi ketika halaman ke 1 maka previous disabled -->
                    <?php if ($halamanAktif <= 1) { ?>
                        <a class="paginator-item" href="index.php?page=movies_list&halaman=<?php echo $halamanAktif - 1; ?>"><i class="fas fa-chevron-left"></i></a>
                    <?php } else { ?>
                        <a class="paginator-item" href="index.php?page=movies_list&halaman=<?php echo $halamanAktif - 1; ?>"><i class="fas fa-chevron-left"></i></a>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) { ?>
                        <a class="paginator-item" href="index.php?page=movies_list&halaman=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                    <?php } ?>
                    <!-- Membuat kondisi ketika halaman terakhir maka next disabled -->
                    <?php if ($halamanAktif >= $jumlahHalaman) { ?>
                        <a class="paginator-item" style="pointer-events: none;" href="index.php?page=movies_list&halaman=<?php echo $halamanAktif + 1; ?>"><i class="fas fa-chevron-right"></i></a>
                    <?php } else { ?>
                        <a class="paginator-item" href="index.php?page=movies_list&halaman=<?php echo $halamanAktif + 1; ?>"><i class="fas fa-chevron-right"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Function select genre -->
    <script>
        function redirectToLink(selectElement) {
            var selectedValue = selectElement.value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        }
    </script>