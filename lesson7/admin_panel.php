<?php

date_default_timezone_set('Asia/Krasnoyarsk');

include 'auth.php';

$formList = false;
$productId = '';

if ($_GET['action'] == 'delete') {
    $product_id = (int)$_GET['id'];
    mysqli_query(getDb(), "DELETE FROM product WHERE id = {$product_id}");
    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
}

if ($_GET['action'] == 'update_panel') {
    $prodId = strip_tags($_GET['id']);
    $formList = true;
    $productId = mysqli_query(getDb(), "SELECT `title`, `count`, `price` FROM product WHERE id = {$prodId}");
}

if(isset($_POST['update_db'])){
    $title = $_POST['title'];
    $count = (int)$_POST['count'];
    $price = (int)$_POST['price'];
    $timeDb = date("Y-m-d H:i:s");
    mysqli_query(getDb(), "UPDATE product SET `count` = {$count}, `price` = {$price}, `created_at` = '{$timeDb}' WHERE title = '{$title}'");
    header("Location: /admin_panel.php");
    die();
}


$basket = mysqli_query(getDb(), "SELECT *  FROM product");

function styleTr($counter)
{
    if ($counter == 0) {
        return "class='table-danger'";
    } elseif ($counter <= 10 && $counter >= 1) {
        return "class='table-warning'";
    } elseif ($counter > 10) {
        return "class='table-success'";
    }
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
    <title>Admin Panel</title>
</head>
<body>
<div class="container">
    <div class="row">
        <? include 'menu.php'?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col" class="text-center">кол.</th>
                <th scope="col" class="text-center">цена</th>
                <th scope="col" class="text-center">дата поступления</th>
                <th colspan="2" class="text-center">управление</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($basket as $item): ?>
                <tr <?= styleTr($item['count']); ?>>
                    <th scope="row"><?= $item['id'] ?></th>
                    <td><?= $item['title'] ?></td>
                    <td class="text-center"><?= $item['count'] ?> <?= $item['units'] ?></td>
                    <td class="text-center"><?= $item['price'] ?> ₽</td>
                    <td class="text-center"><?= $item['created_at'] ?></td>
                    <td class="text-center"><a href="/admin_panel.php?action=update_panel&id=<?= $item['id'] ?>"
                                               class="btn btn-outline-danger btn-sm">Изменить</a></td>
                    <td class="text-center"><a href="/admin_panel.php?action=delete&id=<?= $item['id'] ?>"
                                               class="btn btn-outline-success btn-sm">Удалить</a></td>
                </tr>
            <? endforeach; ?>
            </tbody>
        </table>
        <? if ($formList): ?>
            <? foreach ($productId as $item): ?>
            <div class="col"></div>
                <form class="col" method="POST">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Наименование</label>
                        <input type="text" name="title" class="form-control" id="formGroupExampleInput"
                               value="<?=$item['title'];?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Количество</label>
                        <input type="text" name="count" class="form-control" id="formGroupExampleInput2"
                               value="<?=$item['count'];?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Цена</label>
                        <input type="text" name="price" class="form-control" id="formGroupExampleInput2"
                               value="<?=$item['price'];?>">
                    </div>
                    <button class="btn" type="submit" name="update_db">ИЗМЕНИТЬ</button>
                </form>
            <div class="col"></div>
            <? endforeach; ?>
        <? endif; ?>
    </div>
</div>

</body>
</html>
