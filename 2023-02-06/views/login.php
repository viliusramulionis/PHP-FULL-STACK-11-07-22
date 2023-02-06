<?php
    if(
        isset($_POST['login_id']) AND 
        $_POST['login_id'] != '' AND
        isset($_POST['password']) AND    
        $_POST['password'] != ''
    ) {
        // if($_POST['login_id'] === 'admin' AND $_POST['password'] === 'admin') {
        //     $_SESSION['user'] = 'admin';
        //     header('Location: ?page=admin');
        //     exit;
        // }

        $json = file_get_contents('database.json');
        $decoded = json_decode($json);

        foreach($decoded as $user) {
            // echo $user->id;
            // echo '<br />';
            // echo $user->password;

            if( 
                $_POST['login_id'] === $user->id AND 
                $_POST['password'] === $user->password
            ) {
                $_SESSION['user'] = $user;
                if($user->role === '1') {
                    header('Location: ?page=admin');
                    exit;
                } else {
                    header('Location: ?page=account');
                    exit;
                }
            }
        }
        //$_SESSION['user'] = ['id' => '65451351', 'vardas' => 'Adomas'];
        //header('Location: ?page=account');
    }
?>
<link href="css/login.css" rel="stylesheet">
<main class="form-signin w-100 m-auto">
    <form method="POST">
        <h1 class="h3 mb-3 fw-normal">Prisijunkite prie banko</h1>

        <div class="form-floating">
            <input type="text" name="login_id" class="form-control" id="floatingInput">
            <label for="floatingInput">Prisijungimo ID</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword">
            <label for="floatingPassword">Slaptažodis</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Prisijungti</button>
    </form>
</main>