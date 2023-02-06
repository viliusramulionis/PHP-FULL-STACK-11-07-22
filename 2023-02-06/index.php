<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bankas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php
            $page = isset($_GET['page']) ? $_GET['page'] : '';

            switch($page) {
                case 'account':
                    include './views/account.php';
                    break;
                case 'admin':
                    include './views/admin.php';
                    break;
                case 'logout':
                    session_destroy();
                    include './views/login.php';
                    break;
                default: 
                    include './views/login.php';
            }
        ?>
    </div>
</body>
</html>