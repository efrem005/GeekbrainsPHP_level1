<?php

date_default_timezone_set('Asia/Krasnoyarsk');

if(isset($_POST['update_db'])){
    $title = $_POST['title'];
    $count = (int)$_POST['count'];
    $price = (int)$_POST['price'];
    $timeDb = date("Y-m-d H:i:s");
    executeQuery("UPDATE product SET `count` = {$count}, `price` = {$price}, `created_at` = '{$timeDb}' WHERE title = '{$title}'");
    header("Location: /admin_panel");
    die();
}

if (isset($_POST['order'])){
    $name = $_POST['userName'];
    $tel = $_POST['telephone'];
    $user_id = getUserId();
    $count = getCardSum($user_id);
    $timeDb = date("Y-m-d H:i:s");
    executeQuery("INSERT INTO orders(`name`, phone, summ, user_id) VALUES ('{$name}', '{$tel}', {$count} ,{$user_id})");
    $_SESSION['message'] = 'Заказ оформлен';
}

function adminDeleteProduct(){
    $product_id = (int)$_GET['id'];

    executeQuery("DELETE FROM product WHERE id = {$product_id}");
}

function adminUpdateProduct(){
    $prodId = $_GET['id'];

    return getDataFromDb("SELECT `title`, `count`, `price` FROM product WHERE id = {$prodId}");
}

function adminGetOrderPrice(){
    $id = $_GET['id'];
    return getAssocResult("SELECT b.id as id, `title`, b.price as priceBasket, b.count as countBasket, units, p.count as countProduct, p.price as priceProduct FROM product p
    JOIN basket b on p.id = b.product_id
    JOIN orders o on b.user_id = o.user_id
WHERE o.id = {$id}");
}

function adminReviews(){
    return getAssocResult("SELECT r.id as id, `user`, r.text as text, `title`, r.created_at as data FROM reviews r
    JOIN product p on r.product_id = p.id");
}

function getOrders(){
    return getAssocResult('SELECT * FROM `orders`');
}

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