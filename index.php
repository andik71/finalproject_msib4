<?php
require_once 'header.php';
require_once 'navbar.php';
?>

<?php
if ($_REQUEST['page']) {
    $page = $_REQUEST['page'];
    if (!empty($page)) {
        require_once $page . '.php' . '';
    } else {
        require_once '404.php';
    }
} else {
    $page = 'home';
    require_once '404.php';
}
?>

<?php
require_once 'footer.php';
?>