<?php
    if(!empty($_POST)) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $params = [
            'page' => 'login',
            'message' => 'Varotojas sėkmingai sukurtas',
            'status' => 'success'
        ];

        $inserted = insert('users', [
            'email' => $email, 
            'first_name' => $_POST['first_name'], 
            'last_name' => $_POST['last_name'], 
            'password' => $password
        ]);

        if($inserted) {
            header('Location: ?' . http_build_query($params));
        }
    }
?>          

<h1>Registration</h1>

<form method="POST">
    <div class="mb-3">
        <label>Email address</label>
        <input type="email" name="email" placeholder="test@gmail.com" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="first_name" placeholder="John" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="last_name" placeholder="Smith" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required />
    </div>

    <button class="btn btn-primary">Register</button>
</form>