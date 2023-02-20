<?php
    if(empty($_SESSION['user']) OR $_SESSION['user']['role'] === '1') {
        header('Location: ?page=login');
        exit;
    }
?>

<h1>Discover songs</h1>