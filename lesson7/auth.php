<?php

include 'engine/db.php';


$allow = false;

if(isset($_COOKIE['login'])){
    $allow = true;
}

if(isset($_POST['logout'])){
    setcookie('login', '', time() - 3600, '/');
    setcookie('id', '', time() - 3600, '/');
    header('Location: /');
    die();
}

if(isset($_POST['ok'])){
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    if(auth($login, $pass)){
        setcookie('login', $login, time() + 500, '/');
        header('Location: /');
        die();
    } else {
        $err = 'Не верный логин или пароль';
    }
}

function userSes() {
    return $_COOKIE['login'];
}

function auth($login, $pass) {
    $db = getDb();
    $login = mysqli_real_escape_string($db, strip_tags(stripslashes($login)));
    $pass = mysqli_real_escape_string($db, strip_tags(stripslashes($pass)));
    $result = mysqli_query($db, "SELECT * FROM users WHERE login = '{$login}'");
    $row = mysqli_fetch_assoc($result);
    //password_verify()
    if ($pass == $row['pass']) {
        setcookie('id', $row['id'], time() + 500, '/');
        return true;
    }
    return false;
}