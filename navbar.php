<?php
$data_genre = select("SELECT * from genre ORDER BY id_genre ASC");

?>

<body class="body">
    <header class="header header-horizontal header-view-pannel position-fixed">
        <div class="container">
            <nav class="navbar">
                <a class="navbar-brand" href="index.php">
                    <span class="logo-element">
                        <span class="logo-tape">
                            <img src="images/svg/logo-kita.png" alt="" srcset="" width="200px">
                        </span>
                    </span>
                    </span>
                </a>
                <button class="navbar-toggler" type="button">
                    <span class="th-dots-active-close th-dots th-bars">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <div class="navbar-collapse">
                    <ul class="navbar-nav px-5">
                        <li class="nav-item nav-item-arrow-down nav-hover-show-sub">
                            <a class="nav-link" href="index.php?page=home">Homepage</a>
                        </li>
                        <li class="nav-item nav-item-arrow-down nav-hover-show-sub">
                            <a class="nav-link" href="#" data-role="nav-toggler">Genre</a>
                            <div class="nav-arrow"><i class="fas fa-chevron-down"></i></div>
                            <ul class="collapse nav" style="width: 250px;">
                                <div class="row">
                                    <?php foreach ($data_genre as $list) { ?>

                                        <div class="col-4">
                                            <ul class="list-unstyled px-2">
                                                <li> <a class="nav-link" href="index.php?page=movies_list&id=<?= $list['id_genre'] ?>"><?= $list['genre'] ?></a>
                                                </li>

                                            </ul>
                                        </div>
                                    <?php } ?>

                                </div>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=movies_list">Movies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=contact">Contact us</a>
                        </li>
                    </ul>
                    <div class="navbar-extra nav-item-arrow-down nav-hover-show-sub">
                        <a class="nav-link btn-theme btn text-white" href="#" data-role="nav-toggler">&nbsp;&nbsp;Login</a>
                        <div class="nav-arrow"><i class="fas fa-chevron-down"></i></div>
                        <ul class="collapse nav">
                            <li> <a class="nav-link" href="index.php?page=edit_profile">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>