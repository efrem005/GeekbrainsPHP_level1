<div class="login-form">
    Добро пожаловать, <b><?= $username ?></b>!<br>
    <?php if (!$allow) : ?>
        Если вы уже зарегистрированы, введите логин и пароль.<Br>
        <?= $message ?>
        <form action="/login" method="post">
            <input type="text" name="login" placeholder="Логин">
            <input type="password" name="password" placeholder="Пароль"><br>
            <input type="checkbox" name="save"> Запомнить меня<br>
            <input type="submit" name="send" value="Войти">
        </form>
    <?php endif ?>
</div>