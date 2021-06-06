<div class="col">
</div>
<div class="col mt-5">
    <form method="post">
        <div class="form-group">
            <label for="exampleLogin">Логин</label>
            <input type="text" name="login" class="form-control" id="exampleLogin" aria-describedby="emailHelp">
            <small id="text" class="form-text text-muted"><?=$err?></small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Пароль</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Проверить меня</label>
        </div>
        <button type="submit" name="ok" class="btn btn-primary">Отправить</button>
    </form>
</div>
<div class="col">
</div>
