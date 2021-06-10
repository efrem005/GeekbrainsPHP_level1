<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Наименование</th>
        <th scope="col" class="text-center">кол.</th>
        <th scope="col" class="text-center">цена за ед.</th>
        <th scope="col" class="text-center">цена</th>
        <th scope="col" colspan="3" class="text-center">опции</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($basket as $item): ?>
        <tr>
            <th scope="row"><?= $item['id'] ?></th>
            <td><?= $item['title'] ?></td>
            <td class="text-center"><?= $item['count'] ?> <?= $item['units'] ?></td>
            <td class="text-center"><?= $item['price'] ?> ₽</td>
            <td class="text-center"><?= ($item['count'] * $item['price']); ?> ₽</td>
            <td class="text-center">
                <a href="/basket/countUp/?id=<?= $item['product_id'] ?>" class="btn btn-outline-success btn-sm">+</a>
                <a href="/basket/deleteItem/?id=<?= $item['product_id'] ?>" class="btn btn-outline-success btn-sm">удалить</a>
                <a href="/basket/countDown/?id=<?= $item['product_id'] ?>" class="btn btn-outline-success btn-sm">-</a>
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
        <th scope="col">
            <a href="/basket/orderPost" class="btn btn-outline-success btn-sm">ФОРМИТЬ ЗАКАЗ</a>
        </th>
    </tr>
    </thead>
</table>
<h1><?=$_SESSION['message'];?></h1>
<?php if ($action == 'orderPost') : ?>
<form method="POST">
    <div class="form-group">
        <label for="fastName">Ваше имя</label>
        <input type="text" name="userName" class="form-control" id="fastName">
    </div>
    <div class="form-group">
        <label for="telephone">номер телефона</label>
        <input type="text" name="telephone" class="form-control" id="telephone">
    </div>
    <button type="submit" name="order" class="btn btn-outline-success mt-3">Отправить</button>
</form>
<? endif; ?>
<?unset($_SESSION['message']);?>
