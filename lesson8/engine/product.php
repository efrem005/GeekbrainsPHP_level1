<?php

function getItemsCount()
{
    $res = getDataFromDb("SELECT count(id) as count FROM `basket` WHERE `user_id` = '{$_SESSION['id']}'");
    if ($res['count'] != 0) return "({$res['count']})";
}

function setItemsDb()
{
    $product_id = $_GET['id'];
    $user_id = getUserId();

    $price = getDataFromDb("SELECT * FROM product WHERE id = {$product_id}")['price'];

    executeQuery("INSERT INTO basket(`user_id`, `product_id`, `count`, price) VALUES ({$user_id}, {$product_id}, 1, {$price})");
}

function getUserId()
{
    if (isAuth()) {
        $login = $_SESSION['login'];
        return getDataFromDb("SELECT `id` FROM `users` WHERE `login` = '{$login}'")['id'];
    }
    return 0;
}

function deleteItem()
{
    $product_id = $_GET['id'];
    $user_id = getUserId();

    executeQuery("DELETE FROM basket WHERE product_id = {$product_id} AND user_id = {$user_id}");
}

function countDown()
{
    $product_id = $_GET['id'];
    $user_id = getUserId();

    $count = getDataFromDb("SELECT `count` FROM basket WHERE product_id = {$product_id} AND user_id = {$user_id}")['count'];

    if ($count >= 1) {
        executeQuery("UPDATE `basket` SET `count` = `count` - 1 WHERE product_id = {$product_id} AND user_id = {$user_id}");
    } else {
        deleteItem();
    }
}

function countUp()
{
    $product_id = $_GET['id'];
    $user_id = getUserId();

    executeQuery("UPDATE `basket` SET `count` = `count` + 1 WHERE product_id = {$product_id} AND user_id = {$user_id}");

}

function doCardAction($action)
{
    if ($action == 'deleteItem') {
        deleteItem();
        return true;
    }
    if ($action == 'countDown') {
        countDown();
        return true;
    }
    if ($action == 'countUp') {
        countUp();
        return true;
    }
    return false;
}


function getCardSum($user_id)
{
    $res = getDataFromDb("SELECT SUM(`price` * `count`) as summ FROM basket WHERE user_id = '{$user_id}'");
    return $res['summ'];
}

function getPurchaseInfo($user_id)
{
    return getAssocResult("SELECT basket.id as `id`, basket.count as `count`, `title`, basket.price as `price`, `units`, product_id  FROM basket, product WHERE basket.product_id = product.id  AND user_id = '{$user_id}'");
}
