<?php
    //Norint paslepti klaidas arba priversti jas rodyti
    //ini_set('display_errors', false);

    session_start();

    try {
        $db = new mysqli('localhost', 'root', '', 'spotify');
        //Konstantos deklaravimas
        define('DB', $db);
    } catch(Exception $error) {
        echo '<h2>Nepavyko prisijungti prie duomenų bazės</h2>';
        exit;
    }

    require './includes/db.php';

    // print_r(select('users', 'first_name', [
    //     'email' => 'test@test.lt', 
    //     'password' => 'test'
    // ]));

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php if(isset($_GET['message'])) : ?>
            <div class="alert alert-<?= $_GET['status']; ?>">
                <?= $_GET['message']; ?>
            </div>
        <?php endif; ?>
        <?php
            $page = isset($_GET['page']) ? $_GET['page'] : '';

            switch($page) {
                case 'register':
                    include './views/pages/register.php';
                    break;
                case 'login':
                    include './views/pages/login.php';
                    break;
                case 'admin':
                    include './views/pages/admin.php';
                    break;
                case 'playlist':
                    include './views/pages/playlist.php';
                    break;
                default:
                    include './views/pages/main.php';
            }
        ?>
    </div>
</body>
</html>