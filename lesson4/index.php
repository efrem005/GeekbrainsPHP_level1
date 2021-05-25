<?php
include_once "classSimpleImage.php";


$msg = [
    'OK' => 'OK',
    'error' => 'error',
    'errFile' => 'errFile',
    'errMemory' => 'errMemory'
];

$msg = $msg[$_GET['msg']];

if (isset($_FILES['file'])) {
    if (($_FILES['file']['type'] === 'image/jpeg' || $_FILES['file']['type'] === 'image/png') & ($_FILES['file']['size'] < 1024 * 5 * 1024)) {
        $path = 'big/' . $_FILES['file']['name'];
        if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
            $image = new SimpleImage();
            $image->load($path);
            $image->resize(400, 200);
            $image->save('small/' . $_FILES['file']['name']);
            header('Location: index.php?msg=OK');
        } else {
            header('Location: index.php?msg=error');
        }
    } else {
        header('Location: index.php?msg=errMemory');
    }
}

$files = array_slice(scandir('small'), 2);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Чат!</title>
</head>
<body>
<div class="container">
    <form class="mx-auto mt-3 mb-3 singl" style="width: 428px;" action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Загрузить фаил">
    </form>

    <? if ($msg === 'OK'): ?>
        <div class="alert alert-primary mx-auto" style="width: 400px" role="alert">
            Фаил загружен!!!
        </div>
    <? elseif ($msg === 'error'): ?>
        <div class="alert alert-warning mx-auto" style="width: 400px" role="alert">
            Ошибка загрузки!!!
        </div>
    <? elseif ($msg === 'errFile'): ?>
        <div class="alert alert-warning mx-auto" style="width: 400px" role="alert">
            Такой фаил уже сушествует!!!
        </div>
    <? elseif ($msg === 'errMemory'): ?>
        <div class="alert alert-warning mx-auto" style="width: 500px" role="alert">
            Не верный тип картинки или превышен размер в 5мб
        </div>
    <? endif; ?>


    <div class="row">
        <? foreach ($files as $item): ?>
            <div class="col-md-3">
                <a href="big\<?= $item ?>"><img src="small\<?= $item ?>" class="card-img-top" alt="<?= $item ?>"></a>
            </div>
        <? endforeach; ?>
    </div>
</div>
</body>
</html>