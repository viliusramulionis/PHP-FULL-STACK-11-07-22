<?php 
session_start(); 

$page = isset($_GET['page']) ? $_GET['page'] : '/';

include './views/partials/header.php';

include ('./views/partials/alerts.php');

switch($page) {
    case 'register':
        include './views/pages/register.php';
        break;
    case 'login':
        include './views/pages/login.php';
        break;
    default:
        include './views/pages/main.php';
}

include './views/partials/footer.php';

?>


    
