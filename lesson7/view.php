<?php
require "engine/db.php";

$id = $_GET['id'];

$item = mysqli_fetch_assoc(mysqli_query(getDb(), "SELECT * FROM product where id={$id}"));
$revie = mysqli_query(getDb(), "SELECT * FROM reviews where product_id={$id}");

if (isset($_POST['user'])) {
    $user = $_POST['user'];
    $text = $_POST['text'];
    mysqli_query(getDb(), "INSERT INTO reviews(`user`, `text`, `product_id`) VALUES ('{$user}','{$text}',{$id})");
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
    <title><?= $item['title'] ?></title>
</head>
<body>
<div class="container">
    <? include 'menu.php'?>
    <div class="card text-center mt-3">
        <div class="card-header">
            <h5 class="card-title"><?= $item['title'] ?></h5>
        </div>
        <img src="<?= $item['image'] ?>" class="card-img" style="width: 500px; margin: 0 auto"
             alt="<?= $item['title'] ?>">
        <div class="card-body">
            <p class="card-text"><?= $item['text'] ?></p>
            <p class="card-text"><b>цена: </b><?= $item['price'] ?> ₽</p>
            <p class="card-text"><b>остаток: </b><?= $item['count'] ?> <?= $item['units'] ?></p>
            <? if ($item['count'] > 0): ?>
            <a href="/?action=buy&id=<?=$id?>" class="btn btn-outline-success">купить</a>
            <? endif; ?>
        </div>
        <div class="card-footer text-muted">
            Поступление на склад: <?= $item['created_at'] ?>
        </div>
    </div>
    <div class="card text-center mt-3">
        <h5 class="card-header">Отзывы</h5>
        <? if (mysqli_num_rows($revie) != 0): ?>
            <? foreach ($revie as $otz): ?>
                <div class="card w-75 mx-3 my-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= $otz['user'] ?></h5>
                        <p class="card-text"><?= $otz['text'] ?></p>
                        <data><?= $otz['created_at'] ?></data>
                    </div>
                </div>
            <? endforeach; ?>
        <? endif; ?>
        <div class="card w-75 mx-3 my-3">
            <form class="card-body" method="post" action="view.php?id=<?= $id ?>">
                <div class="mb-3">
                    <label for="exampleInputUser" class="form-label">Ваше имя</label>
                    <input type="text" name="user" class="form-control" id="exampleInputUser">
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Отзыв</label>
                    <textarea type="text" name="text" class="form-control" id="exampleInputText"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-secondary btn-sm">отправить</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
