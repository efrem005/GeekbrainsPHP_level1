<?php
require "engine/db.php";

$res = mysqli_query(getDb(), "SELECT * FROM product");

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
    <title>Lesson6</title>
    <style>
        .myImage {
            width: 200px;
            height: 180px;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <? foreach ($res as $item): ?>
            <div class="col-sm-3 mt-3 d-flex justify-content-center">
                <div class="card shadow bg-white rounded">
                    <div class="myImage">
                        <img src="<?= $item['image'] ?>" class="card-img-top" alt="<?= $item['title'] ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-3"><?= $item['title'] ?></h5>
                        <p>цена: <?= $item['price'] ?> ₽</p>
                        <a href="/view.php?id=<?=$item['id']?>" class="btn btn-outline-info btn-sm">подробно</a>
                        <a href="/" class="btn btn-outline-success btn-sm">купить</a>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>
</body>
</html>
