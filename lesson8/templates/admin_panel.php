<?include('admin_menu.php');?>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Наименование</th>
        <th scope="col" class="text-center">кол.</th>
        <th scope="col" class="text-center">цена</th>
        <th scope="col" class="text-center">дата поступления</th>
        <th colspan="2" class="text-center">управление</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($basket as $item): ?>
        <tr <?= styleTr($item['count']); ?>>
            <th scope="row"><?= $item['id'] ?></th>
            <td><?= $item['title'] ?></td>
            <td class="text-center"><?= $item['count'] ?> <?= $item['units'] ?></td>
            <td class="text-center"><?= $item['price'] ?> ₽</td>
            <td class="text-center"><?= $item['created_at'] ?></td>
            <td class="text-center"><a href="/admin_panel/updateProduct/?id=<?= $item['id'] ?>"
                                       class="btn btn-outline-danger btn-sm">Изменить</a></td>
            <td class="text-center"><a href="/admin_panel/deleteProduct/?id=<?= $item['id'] ?>"
                                       class="btn btn-outline-success btn-sm">Удалить</a></td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>
<? if ($formList): ?>
    <div class="col"></div>
        <form class="col" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">Наименование</label>
                <input type="text" name="title" class="form-control" id="formGroupExampleInput"
                       value="<?=$productId['title'];?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Количество</label>
                <input type="text" name="count" class="form-control" id="formGroupExampleInput2"
                       value="<?=$productId['count'];?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Цена</label>
                <input type="text" name="price" class="form-control" id="formGroupExampleInput2"
                       value="<?=$productId['price'];?>">
            </div>
            <button class="btn" type="submit" name="update_db">ИЗМЕНИТЬ</button>
        </form>
    <div class="col"></div>
<? endif; ?>
