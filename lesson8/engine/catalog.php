<?php

function getProduct()
{
    return getAssocResult("SELECT * FROM `product`");
}

function issetProduct()
{
    $product_id = $_GET['id'];
    $user_id = getUserId();
    if (getDataFromDb("SELECT * FROM `basket` WHERE product_id = {$product_id} AND user_id = {$user_id}")){
        return true;
    }
    return false;
}
