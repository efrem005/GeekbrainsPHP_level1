<?php
require "config/db.php";

$id = 1;

if ($_GET['pagination'] == 'page') {
    $id = (int)$_GET['id'];
    $result = pageGallery($id, $db);
} else {
    $result = pageGallery($id, $db);
};

function pageGallery($id, $db)
{
    return mysqli_query($db, "SELECT * FROM photo WHERE id >= {$id} LIMIT 6");
}


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
    <title>Php_level_1</title>
</head>
<body>
<div class="container">
    <div class="row">
        <? foreach ($result as $item): ?>
        <div class="col-sm-4 mt-3 d-flex justify-content-center">
            <div class="card shadow bg-white rounded" style="width: 20rem;">
                <a href="./view.php?id=<?= $item['id'] ?>"><img src="./small/<?= $item['href'] ?>" class="card-img-top"
                                                                alt="..."></a>
            </div>
        </div>
        <? endforeach; ?>
        <div class="col-sm-12 mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <? if (isset($_GET['pagination'])): ?>
                        <li class="page-item"><a class="page-link" href="./index.php">1</a></li>
                        <li class="page-item disabled"><a class="page-link" href="./index.php?pagination=page&id=6">2</a></li>
                    <? else: ?>
                        <li class="page-item disabled"><a class="page-link" href="./index.php">1</a></li>
                        <li class="page-item"><a class="page-link" href="./index.php?pagination=page&id=6">2</a></li>
                    <? endif; ?>
                </ul>
            </nav>
        </div>
    </div>

</body>
</html>

