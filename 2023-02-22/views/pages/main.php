<?php
    //CRUD:
    //CREATE
    //READ
    //UPDATE
    //DELETE
    if(empty($_SESSION['user'])) {
        header('Location: ?page=login');
        exit;
    }

    if(!empty($_POST)) {
        $db->query(
            vsprintf(
                "INSERT INTO playlists (name, user_id) VALUES ('%s', %d)",
                [$_POST['name'], $_SESSION['user']['id']]
            )
        );

        $id = $db->insert_id;

        foreach($_POST['song'] as $song_id) {
            $db->query("INSERT INTO song_playlists (song_id, playlist_id) VALUES ({$song_id}, {$id})");
        }

        // $db->query("UPDATE songs SET playlist_id = {$id} WHERE id = {$_POST['song']}");

        header('Location: index.php');
    }

    $playlists = $db->query("SELECT p.id, p.name, p.user_id, p.created_at, u.first_name, u.last_name FROM playlists AS p INNER JOIN users AS u ON u.id = p.user_id;");
    $playlists = $playlists->fetch_all(MYSQLI_ASSOC);

    $songs = $db->query("SELECT * FROM songs");
    $songs = $songs->fetch_all(MYSQLI_ASSOC);
?>

<h1>Discover songs</h1>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>User</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($playlists as $playlist) : ?>
            <tr>
                <td><?= $playlist['id']; ?></td>
                <td>
                    <a href="?page=playlist&playlist_id=<?= $playlist['id']; ?>">
                        <?= $playlist['name']; ?>
                    </a>
                </td>
                <td><?= $playlist['first_name'] . ' ' . $playlist['last_name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form method="POST">
    <h2>Create new playlist</h2>
    <div class="mb-3">
        <label>Playlist Name:</label>
        <input type="text" name="name" class="form-control" />
    </div>
    <div class="mb-3">
        <label>Song:</label>
        
        <?php foreach($songs as $song) : ?>
            <div class="form-check">
                <label>
                    <input type="checkbox" name="song[]" class="form-check-input" value="<?= $song['id'] ?>">
                    <?= $song['name']; ?>
                </label>
            </div>
        <?php endforeach; ?>
        
    </div>
    <button class="btn btn-primary">Create Playlist</button>
</form>