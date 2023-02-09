<?php
    if(!isset($_SESSION['user'])) {
        header('Location: ?page=login');
        exit;
    }
?>
<h1>Latest tweets</h1>