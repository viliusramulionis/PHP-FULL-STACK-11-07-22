<?php
    if(!isset($_SESSION['user'])) {
        header('Location: ?page=login');
        exit;
    }

    $data = json_decode(file_get_contents('./database.json'), true);

    $tweets = $data['tweets'];

    $order = isset($_GET['order']) ? $_GET['order'] : 'asc';    

    if($order === 'desc') {
        usort($tweets, function($a, $b) {
            if ($a == $b) {
                return 0;
            }
            return ($b < $a) ? -1 : 1;
        });
    }

    if(!empty($_POST)) {
        $data['tweets'][] = [
            'message' => $_POST['tweet'],
            'created_at' => date('Y-m-d h:i:s'),
            'author' => $_SESSION['user']['id']
        ];

        if(!empty($_FILES['tweet-photo']['tmp_name'])) {
            if(!is_dir('./uploads')) {
                mkdir('./uploads');
            } 

            $filename = explode('.', $_FILES['tweet-photo']['name']);
            $filename = time() . '.' . $filename[count($filename) - 1];
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

            if(!in_array($_FILES['tweet-photo']['type'], $allowedTypes)) {
                $params = [
                    'message' => 'Incorrect file format',
                    'status' => 'danger'
                ];
                header('Location: ?' . http_build_query($params));
                exit;
            }

            move_uploaded_file($_FILES['tweet-photo']['tmp_name'], './uploads/' . $filename);

            $data['tweets'][count($data['tweets']) - 1]['image'] = $filename;
        }

        file_put_contents('./database.json', json_encode($data));

        $params = [
            'message' => 'Tweet successfully posted!',
            'status' => 'success'
        ];

        header('Location: ?' . http_build_query($params));
        exit;
    }
?>
<h2>Post New Tweet</h2>
<form method="POST" enctype="multipart/form-data">
    <textarea name="tweet" class="form-control mb-3"></textarea>
    <input type="file" name="tweet-photo" class="form-control mb-3" />
    <button class="btn btn-primary">Tweet</button>
</form>
<div class="d-flex justify-content-between mt-5 mb-3">
    <h2>Latest tweets</h2>
    <form class="d-flex gap-3">
        <label>Select Order:</label>
        <select name="order" class="form-control">
            <!-- ASC (Ascending) didėjančia tvarka -->
            <!-- DESC (Descending) mažėjančia tvarka -->
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select>
        <button class="btn btn-primary">Order</button>
    </form>
</div>
<?php foreach($tweets as $tweet) : ?>
    <div class="card shadow-sm p-3 mb-3">
        <?php if(isset($tweet['image'])) : ?>
            <img src="uploads/<?= $tweet['image'] ?>" class="card-img-top" />
        <?php endif; ?>
        <div class="card-text mb-2">
            <?= nl2br($tweet['message']) ?>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <span><?= $tweet['author'] ?></span>
            <span><?= $tweet['created_at'] ?></span>
        </div>
    </div>
<?php endforeach; ?>