<?include('admin_menu.php');?>
<table class="table table-hover">
    <thead class="thead-dark text-center">
    <tr>
        <th scope="col" >#</th>
        <th scope="col">ОТ</th>
        <th scope="col">телефон</th>
        <th scope="col">сумма</th>
        <th scope="col">дата</th>
        <th scope="col">к заказу</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($orders as $item): ?>
    <tr class="text-center">
        <th scope="row"><?=$item['id']?></th>
        <td><?=$item['name']?></td>
        <td><?=$item['phone']?></td>
        <td><?=$item['summ']?> ₽</td>
        <td><?=$item['created_at']?></td>
        <td><a href="/admin_list/?id=<?=$item['id']?>" class="btn btn-outline-success btn-sm">ПОДРОБ.</a></td>
    </tr>
    <? endforeach; ?>
    </tbody>
</table>
