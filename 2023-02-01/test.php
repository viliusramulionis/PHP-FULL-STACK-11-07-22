<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <table class="table w-50 text-center">
            <tr>
                <th class="border"></th>
                <?php for ($k = 1; $k < 11; $k++) { ?>
                    <th class="border"><?= $k ?></th>
                <?php } ?>
            </tr>

            <?php for ($i = 1; $i < 11; $i++) { ?>
                <tr>
                    <th class="border"><?= $i ?></th>
                
                    <?php for ($j = 1; $j < 11; $j++) { ?>
                        <td class="border"><?= $j * $i ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>