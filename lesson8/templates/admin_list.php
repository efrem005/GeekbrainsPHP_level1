<?php include('admin_menu.php') ?>
<table class="table table-hover">
    <thead class="thead-dark text-center">
    <tr class="table-active">
        <th scope="col" colspan="4" >заказ</th>
        <th scope="col" colspan="2">склад</th>
    </tr>
    <tr class="table-active">
        <th scope="col" >#</th>
        <th scope="col">Наименование</th>
        <th scope="col">кол.</th>
        <th scope="col">ваша.цена</th>
        <th scope="col">отстаток</th>
        <th scope="col">факт.цена</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($list as $item): ?>
        <tr <?= styleTr($item['countProduct']); ?>>
            <th scope="row" class="text-center" ><?=$item['id']?></th>
            <td class="text-center" ><?=$item['title']?></td>
            <td class="text-center" ><?=$item['countBasket']?> <?=$item['units']?></td>
            <td class="text-center" ><?=$item['priceBasket']?> ₽</td>
            <td class="text-center" ><?=$item['countProduct']?></td>
            <td class="text-center" ><?=$item['priceProduct']?> ₽</td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>
