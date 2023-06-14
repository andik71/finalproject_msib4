<?php
require_once 'header.php';
require_once 'sidebar.php';
require_once 'navbar.php';


if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];

    if (!empty($page)) {
        require_once $page . '.php';
    }else {
        require_once 'dashboard.php';
    }
}else {
    $oage = 'dashboard';
    require_once 'dashboard.php';
}



require_once 'footer.php';