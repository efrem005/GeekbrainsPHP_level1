<nav class="navbar navbar-light bg-light">
    <form method="post" class="form-row">
        <? foreach ($menu_list as $link_name => $link): ?>
            <? if ($link_name == 'Управление'): ?>
                <? if ($username == is_admin()): ?>
                    <a href="<?= $link ?>" class="btn btn-success btn-sm"><?= $link_name ?></a>
                <? endif; ?>
            <? else: ?>
                <a href="<?= $link ?>" class="btn btn-success btn-sm"><?= $link_name ?></a>
            <? endif; ?>
        <? endforeach; ?>
        <? if ($allow): ?>
        <a class="btn btn-success btn-sm my-2 my-sm-0" href="/logout">ВЫХОД</a>
        <? endif; ?>
    </form>
</nav>