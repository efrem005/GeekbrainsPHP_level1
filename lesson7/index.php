<?php
include  'auth.php';

if($_GET['action'] == 'buy'){
    $id = (int)$_GET['id'];
    $user_id = (int)$_COOKIE['id'];

    mysqli_query(getDb(), "INSERT INTO basket(`user_id`, `product_id`, `count`) VALUES ({$user_id}, {$id}, 1)");
    mysqli_query(getDb(), "UPDATE product SET count = count - 1 WHERE id = {$id};");
    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
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
    <title>Lesson7</title>
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
        <? if ($allow): ?>
            <? include 'menu.php'; ?>
            <? include 'catalog.php'; ?>
        <? else: ?>
            <? include 'login.php'; ?>
        <? endif; ?>
    </div>
</div>
</body>
</html>