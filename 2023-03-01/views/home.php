<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <?php foreach($categories as $category) : ?>
                <li>
                    <a href="?page=category&id=<?= $category['id'] ?>"><?= $category['name'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <ul>
        <?php foreach($videos as $video) : ?>
            <li>
                <div><img src="<?= $video['thumbnail_url'] ?>" /></div>
                <div><?= $video['name'] ?></div>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

