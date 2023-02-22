<?php
    if(!empty($_POST)) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        //$user = $db->query("SELECT id, role FROM users WHERE email = '{$email}' AND password = '{$password}'");
        $user = select('users', 'id, role', [
            'email' => $email,
            'password' => $password
        ]);

        $params = [
            'page' => 'login',
            'message' => 'Toks vartotojas nerastas',
            'status' => 'danger'
        ];

        if(count($user) === 0) {
            header('Location: ?' . http_build_query($params));
            exit;
        }

        $_SESSION['user']['id'] = $user[0]['id'];
        $_SESSION['user']['role'] = $user[0]['role'];

        header('Location: index.php');
        exit;
    }
?>

<h1>Login</h1>

<form method="POST">
    <div class="mb-3">
        <label>Email address</label>
        <input type="email" name="email" placeholder="test@gmail.com" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required />
    </div>

    <button class="btn btn-primary">Login</button>
</form>