<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

if($_SESSION['user']->role === '0') {
    header('Location: ?page=account');
    exit;
}

$data = json_decode(file_get_contents('database.json'));
$action = isset($_GET['action']) ? $_GET['action'] : '';

if(!empty($_POST) AND $action === 'new_user') {
    $exists = array_filter($data, function($user) {
        if($_POST['id'] === $user->id OR $_POST['iban'] === $user->iban)
            return $user;
    });

    if(count($exists) > 0) {
        header('Location: ?page=admin&message=Toks ID arba sąskaitos numeris jau užimtas&status=danger');
        exit;
    }

    $data[] = $_POST;

    file_put_contents('database.json', json_encode($data));

    header('Location: ?page=admin&message=Vartotojas sėkmingai sukurtas&status=success');
    exit;
}

if(!empty($_POST) AND $action === 'edit_user') {
    $data[$_GET['id']] = $_POST;

    file_put_contents('database.json', json_encode($data));

    header('Location: ?page=admin');
    exit;
}

if($action === 'delete') {
    unset($data[$_GET['id']]);

    file_put_contents('database.json', json_encode(array_values($data)));

    header('Location: ?page=admin');
    exit;
}

?>
<h1 class="d-flex justify-content-between align-items-center">
    Administratorius
    <a href="?page=admin&action=new_user" class="btn btn-primary">Nauja sąskaita</a>
</h1>

<?php if(isset($_GET['message'])) : ?>
    <div class="alert alert-<?= $_GET['status'] ?>">
        <?= $_GET['message'] ?>
    </div>
<?php endif; ?>

<table class="table">
    <thead>
        <tr>
            <th>#ID</th>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Sąskaitos numeris</th>
            <th>Balansas</th>
            <th>Rolė</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $index => $user) : ?>
            <tr>
                <td><?= $user->id; ?></td>
                <td><?= $user->name; ?></td>
                <td><?= $user->last_name; ?></td>
                <td><?= $user->iban; ?></td>
                <td><?= isset($user->balance) ? '€ ' . $user->balance : ''; ?></td>
                <td><?= $user->role === '0' ? 'Klientas' : 'Administratorius'; ?></td>
                <td>
                    <a href="?page=admin&action=delete&id=<?= $index ?>" class="btn btn-danger">Trinti</a>
                    <a href="?page=admin&action=edit_user&id=<?= $index ?>" class="btn btn-warning">Redaguoti</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if($action === 'new_user') : ?>

    <form method="POST">
        <h2>Naujas vartotojas</h2>
        <div class="mb-3">
            <label>ID</label>
            <input type="text" name="id" class="form-control" />
        </div>
        <div class="mb-3">
            <label>Vardas</label>
            <input type="text" name="name" class="form-control" />
        </div>
        <div class="mb-3">
            <label>Pavardė</label>
            <input type="text" name="last_name" class="form-control" />
        </div>
        <div class="mb-3">
            <label>Sąskaitos numeris</label>
            <input type="text" name="iban" class="form-control" />
        </div>
        <div class="mb-3">
            <label>Sąskaitos balansas</label>
            <input type="number" name="balance" class="form-control" />
        </div>
        <div class="mb-3">
            <label>Slaptažodis</label>
            <input type="text" name="password" class="form-control" />
        </div>
        <div class="mb-3">
            <label>Vartotojo rolė</label>
            <select name="role" class="form-control">
                <option value="0">Klientas</option>
                <option value="1">Administratorius</option>
            </select>
        </div>
        <button class="btn btn-primary">Sukurti vartotoją</button>
    </form>

<?php endif; ?>

<?php 
    if($action === 'edit_user') : 
    $user = $data[$_GET['id']];
?>

<form method="POST">
    <h2>Redaguoti vartotoją</h2>
    <div class="mb-3">
        <label>ID</label>
        <input type="text" name="id" class="form-control" value="<?= $user->id ?>" />
    </div>
    <div class="mb-3">
        <label>Vardas</label>
        <input type="text" name="name" class="form-control" value="<?= $user->name ?>" required />
    </div>
    <div class="mb-3">
        <label>Pavardė</label>
        <input type="text" name="last_name" class="form-control" value="<?= $user->last_name ?>" />
    </div>
    <div class="mb-3">
        <label>Sąskaitos numeris</label>
        <input type="text" name="iban" class="form-control" value="<?= $user->iban ?>"/>
    </div>
    <div class="mb-3">
        <label>Slaptažodis</label>
        <input type="text" name="password" class="form-control" value="<?= $user->password ?>" />
    </div>
    <button class="btn btn-primary">Sukurti vartotoją</button>
</form>

<?php endif; ?>