<?php

include 'auth.php';

$user_id = (int)$_GET['id'];


if ($_GET['action'] == 'delete') {
    $product_id = (int)$_GET['product_id'];
    mysqli_query(getDb(), "DELETE FROM basket WHERE id = {$product_id} AND user_id = {$user_id}");
    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
}


$basket = mysqli_query(getDb(), "SELECT basket.id as `id`, basket.count as `count`, title, price, units  FROM basket, product WHERE basket.product_id = product.id  AND user_id = '{$user_id}'");

$result2 = mysqli_query(getDb(), "SELECT SUM(product.price * basket.count) as summ FROM basket, product WHERE basket.product_id = product.id  AND user_id = '{$user_id}'");
$summ = mysqli_fetch_assoc($result2)['summ'];

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
    <title>Корзина</title>
</head>
<body>
<div class="container">
    <div class="row">
    <? include 'menu.php' ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Наименование</th>
            <th scope="col" class="text-center">кол.</th>
            <th scope="col" class="text-center">цена</th>
            <th scope="col-1" class="text-center">удалить</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($basket as $item): ?>
            <tr>
                <th scope="row"><?= $item['id'] ?></th>
                <td><?= $item['title'] ?></td>
                <td class="text-center"><?= $item['count'] ?> <?= $item['units'] ?></td>
                <td class="text-center"><?= ($item['count'] * $item['price']); ?> ₽</td>
                <td class="text-center"><a href="/basket.php?action=delete&id=<?=$user_id?>&product_id=<?= $item['id'] ?>" class="btn btn-outline-success btn-sm">Удалить</a>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
    <table>
        <thead>
        <tr>
            <th scope="col" colspan="3">Всего:</th>
            <th scope="col"><?= $summ ?> ₽</th>
        </tr>
        </thead>
    </table>
    </div>
</div>
</body>
</html>
