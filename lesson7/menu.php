<?php
$result = mysqli_query(getDb(), "SELECT count(id) as count FROM `basket` WHERE `user_id` = '{$_COOKIE['id']}'");
$count = mysqli_fetch_assoc($result)['count'];

function getAdmin()
{
    $user_id = $_COOKIE['id'];
    $result = mysqli_query(getDb(), "SELECT login FROM users WHERE id = {$user_id}");
    $login = mysqli_fetch_assoc($result);
    if ($login['login'] === 'Admin') {
        return true;
    }
    return false;
}

?>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">Добро пожаловать <?= $_COOKIE['login'] ?></a>
    <form method="post" class="form-row">
        <a href="/" class="btn btn-success btn-sm">главная</a>
        <? if (getAdmin()): ?>
            <a href="admin_panel.php" class="btn btn-success btn-sm">
                управление
            </a>
        <? endif; ?>
        <a href="basket.php?id=<?= $_COOKIE['id'] ?>" class="btn btn-success btn-sm">
            корзина <span class="badge badge-secondary"><?= $count; ?></span>
        </a>
        <button class="btn btn-success btn-sm my-2 my-sm-0" type="submit" name="logout">ВЫХОД</button>
    </form>
</nav>
