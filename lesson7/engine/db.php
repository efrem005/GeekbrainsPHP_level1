<?php

function getDb() {
    static $db = '';
    if(empty($db)){
       $db = @mysqli_connect('localhost', 'nikolay', '123456', 'shopphp') or die('Ошибка: ' . mysqli_connect_error());
    }
    return $db;
}