        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-film"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Film Kita</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($_REQUEST && $_REQUEST['page'] == 'dashboard') : ?>active<?php endif; ?>">
                <a class="nav-link" href="index.php?page=dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Manager:</h6>
                        <a class="collapse-item <?php if ($_REQUEST && $_REQUEST['page'] == 'actor') echo 'active' ?>" href="index.php?page=actor">Actor</a>
                        <a class="collapse-item" href="index.php?page=director">Director</a>
                        <a class="collapse-item" href="index.php?page=reviewer">Reviewer</a>
                        <a class="collapse-item" href="index.php?page=tag">Tags</a>
                        <a class="collapse-item" href="index.php?page=genre">Genre</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Main Data
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php if ($_REQUEST && $_REQUEST['page'] == 'category') echo 'active' ?>">
                <a class="nav-link" href="index.php?page=category">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Category</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php if ($_REQUEST && $_REQUEST['page'] == 'movie') echo 'active' ?>">
                <a class="nav-link" href="index.php?page=movie">
                    <i class="fas fa-fw fa-play"></i>
                    <span>Movies</span></a>
            </li>

            <!-- Membatasi Hak Akses -->
            <?php if ($_SESSION['user_role'] === 'admin') : ?>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    User
                </div>
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=user">
                        <i class="fas fa-fw fa-user"></i>
                        <span>User Management</span></a>
                </li>
            <?php endif; ?>
            <!-- .End -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->