<?php
    if(!isset($_SESSION['user'])) {
        header('Location: index.php');
    }

    print_r($_SESSION['user']->name);
?>
<h1>Mano bankas</h1>
<a href="?page=logout" class="btn btn-primary">Atsijungti</a>