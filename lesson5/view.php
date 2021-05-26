<?php
require "config/db.php";

if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM photo WHERE id = {$id}");
    mysqli_query($db,"UPDATE photo SET view = view + 1 WHERE id ={$id}");
    $item = mysqli_fetch_assoc($result);
};
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
        <div class="col-sm-1"></div>
        <div class="col-sm-10 mt-3">
            <div class="card shadow p-3 bg-white rounded">
                <div class="card-body">
                    <h2 class="card-title text-center"><?= $item['title']?></h2>
                </div>
                <a href="./big/<?= $item['href']?>" target="_blank"><img src="./big/<?= $item['href']?>" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <div class="row align-items-center">

                    <div class="col-sm-4">
                        <p class="card-text">Дата загрузки: <?= $item['created_at']?></p>
                        <p class="card-text">Количество просмотров: <?= $item['view']?></p>
                        <p class="card-text">Размер: <?= $item['size']?> байт</p>
                    </div>
                    <div class="col-sm-8 d-flex justify-content-end">
                        <a class="btn btn-info" href="./index.php" role="button">HOME</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
</body>
</html>

