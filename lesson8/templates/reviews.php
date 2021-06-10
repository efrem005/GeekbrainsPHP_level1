<?include ('admin_menu.php');?>
<table class="table table-hover">
    <thead class="thead-dark text-center">
    <tr class="table-active">
        <th scope="col" >#</th>
        <th scope="col">От кого</th>
        <th scope="col">Текст</th>
        <th scope="col">Наименование</th>
        <th scope="col">Дата</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($reviews as $item): ?>
        <tr class="text-center">
            <th scope="row"><?=$item['id']?></th>
            <td><?=$item['user']?></td>
            <td><?=$item['text']?></td>
            <td><?=$item['title']?></td>
            <td><?=$item['data']?></td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>