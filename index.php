<?php

session_start();

require_once 'header.php';
require_once 'navbar.php';


if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];

    if (!empty($page)) {
        require_once $page . '.php';
    } else {
        require_once 'home.php';
    }
} else {
    $page = 'home';
    require_once 'home.php';
}

require_once 'footer.php';
