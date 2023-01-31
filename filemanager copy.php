<?php
//Pagrindinė direktorija, kurioje patalpintas šis failas
$dir = './';
$back_link = '';

//Atgalinės nuorodos generavimas
if (isset($_GET['dir']) and $_GET['dir'] != '') {
    $dir = $_GET['dir'];

    $path_array = explode('/', $dir);

    if ($dir != './') {
        if (count($path_array) > 1) {
            unset($path_array[count($path_array) - 1]);
            $back_link = implode('/', $path_array);
        } else {
            $back_link = './';
        }
        $back_link = '<tr>
                            <td colspan="2"><a href="?dir=' . $back_link . '">Back to parent directory</a></td>
                        </tr>';
    }
}

//Naujo Failo arba folderio pridėjimas

if (isset($_POST['data_type']) and $_POST['data_type'] === '1') {
    if (isset($_POST['folder_name']) and $_POST['folder_name'] != '') {
        mkdir($dir . '/' . $_POST['folder_name']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
    }
} else {
    if (isset($_POST['file_name']) and $_POST['file_name'] != '') {
        file_put_contents($dir . '/' . $_POST['file_name'], $_POST['file_contents']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
    }
}

//Failo pavadinimo keitimas
if( isset($_POST['file_name_edited']) AND $_POST['file_name_edited'] != '') {
    $file_path = explode('/', $_GET['edit']);
    unset($file_path[count($file_path) - 1]);
    $file_path[] = $_POST['file_name_edited'];

    $to = implode('/', $file_path);
    rename($_GET['edit'], $to);
    
    header('Location: ?dir=' . $dir);
}


//Failų ir direktorijų ištrynimas
if( isset($_GET['delete']) AND $_GET['delete'] != '') {
    if($_GET['delete'] === 'filemanager.php') {
        echo 'error';
        exit();
    } else {
        unlink($_GET['delete']);

        header('Location: ?dir=' . $dir);
    }
}

$data = scandir($dir);

unset($data[0]);
unset($data[1]);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Atgalinės nuorodos atvaizdavimas -->
                <?php echo $back_link; ?>
                <!-- Failų ir folderių sąrašqas -->
                <?php
                foreach ($data as $item) {

                    // $path = $dir === './' ? $item : $dir . '/' . $folder;

                    $path = $dir . '/' . $item;

                    if ($dir === './') {
                        $path = $item;
                    }

                    //Ikonų priskyrimas
                    $icon = 'folder';

                    $file_formats = [
                        'pdf' => 'file-earmark-pdf',
                        'txt' => 'filetype-txt',
                        'exe' => 'filetype-exe',
                        'css' => 'filetype-css',
                        'js' => 'filetype-js',
                        'json' => 'filetype-json',
                        'jpg' => 'filetype-jpg',
                        'png' => 'filetype-png',
                        'gif' => 'filetype-gif',
                        'csv' => 'filetype-csv',
                        'php' => 'filetype-php'
                    ];

                    if (!is_dir($path)) {
                        $icon = 'file-earmark';

                        $filename = explode('.', $item);
                        $filename = $filename[count($filename) - 1];

                        if (array_key_exists($filename, $file_formats)) {
                            $icon = $file_formats[$filename];
                        }
                    }
                ?>
                    <tr>
                        <td>
                            <i class="bi bi-<?= $icon ?>"></i>
                            <?= (is_dir($path)) ? '<a href="?dir=' . $path . '">' . $item . '</a>' : $item ?>
                        </td>
                        <td>
                            <a href="?edit=<?= $path ?>&dir=<?= $dir ?>" class="btn btn-success">Edit</a>
                            <a href="?delete=<?= $path ?>&dir=<?= $dir ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Failo pavadinimo redagavimo forma -->
        <?php if(isset($_GET['edit'])) { ?>

            <h2>Edit file name</h2>

            <form method="POST">
                <!-- Jeigu norime gauti duomenis iš laukelio, tačiau šis neturi būti atvaizduojamas puslapyje, galime panaudoti type="hidden" variaciją -->
                <!-- <input type="hidden" name="file_name_original" class="form-control" value="<?= $_GET['edit'] ?>" /> -->
                <div class="mb-3">
                    <label>New File Name</label>
                    <input type="text" name="file_name_edited" class="form-control" />
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>

        <?php } else { ?> 
            <!-- Naujo failo arba folderio pridėjimo forma -->
            <h2>Create New File or Folder</h2>
            <form method="POST">
                <div class="mb-3">
                    <label>Select data type</label>
                    <select name="data_type" class="form-control">
                        <option value="1">Folder</option>
                        <option value="2">File</option>
                    </select>
                </div>
                <div class="folder">
                    <div class="mb-3">
                        <label>Folder name</label>
                        <input type="text" name="folder_name" class="form-control" />
                    </div>
                </div>
                <div class="file">
                    <div class="mb-3">
                        <label>File name</label>
                        <input type="text" name="file_name" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>File contents</label>
                        <textarea name="file_contents" class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>

            <script>
                document.querySelector('.file').style.display = 'none';

                document.querySelector('[name="data_type"]').addEventListener('change', (e) => {
                    if (e.target.value === '1') {
                        document.querySelector('.file').style.display = 'none';
                        document.querySelector('.folder').style.display = 'block';
                    } else {
                        document.querySelector('.file').style.display = 'block';
                        document.querySelector('.folder').style.display = 'none';
                    }
                });
            </script>
        <?php } ?>
    </div>
</body>

</html>