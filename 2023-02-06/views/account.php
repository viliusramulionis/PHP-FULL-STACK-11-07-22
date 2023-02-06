<?php
    if(!isset($_SESSION['user'])) {
        header('Location: index.php');
        exit;
    }

    if($_SESSION['user']->role === '1') {
        header('Location: ?page=admin');
        exit;
    }

    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $data = json_decode(file_get_contents('database.json'));
    $id = $_SESSION['user']->id;

    if(!empty($_POST) AND $action === 'new-transfer') {
        $currentUser = [];
        $transferCost = 0.43;

        foreach($data as $user) {
            if($user->id === $id)
                $currentUser = $user;
        }

        if(($_POST['amount'] + $transferCost) > $currentUser->balance) {
            header('Location: ?page=account&message=Nepakankamas sąskaitos likutis&status=danger');
            exit;
        }

        foreach($data as $key => $user) {
            if($_POST['recipient'] === $user->id) {
                $data[$key]->balance += $_POST['amount'];
            }

            if($id === $user->id) {
                $data[$key]->balance -= $_POST['amount'] + 0.43;
            }
        }

        file_put_contents('database.json', json_encode($data));

        header('Location: ?page=account&message=Pavedimas sėkmingai atliktas&status=success');
        
        exit;
    }

    //Duomenų išfiltravimas aprašant savo ciklą
    // $recipients = [];

    // foreach($data as $user) {
    //     if($user->role != '1' AND $user->id != $id)
    //         $recipients[] = $user;
    // }

    //Duomenų filtravimas pasitelkiant funkcija

    $recipients = array_filter($data, function($user) {
        if($user->role != '1' AND $user->id != $_SESSION['user']->id)
            return $user;
    });
?>
<div class="d-flex align-items-center justify-content-between">
    <h1>Mano bankas</h1>
    <div>
        <a href="?page=account&action=new-transfer" class="btn btn-success">Naujas pavedimas</a>
        <a href="?page=logout" class="btn btn-primary">Atsijungti</a>
    </div>
</div>

<?php if(isset($_GET['message'])) : ?>
    <div class="alert alert-<?= $_GET['status'] ?>">
        <?= $_GET['message'] ?>
    </div>
<?php endif; ?>

<?php if($action === 'new-transfer') : ?>
    <form method="POST">
        <div class="mb-3">
            <label>Pavedimo gavėjas</label>
            <select name="recipient" class="form-control">
                <?php foreach($recipients as $account) : ?>
                    <option value="<?= $account->id ?>"><?= $account->name . ' ' . $account->last_name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Pavedimo suma</label>
            <input type="number" step="0.01" name="amount" class="form-control" />
        </div>
        <button class="btn btn-primary">Siųsti</button>
    </form>
<?php endif; ?>