<?php

$res = mysqli_query(getDb(), "SELECT * FROM product");

?>
<? foreach ($res as $item): ?>
    <div class="col-sm-3 mt-3 d-flex justify-content-center">
        <div class="card shadow bg-white rounded">
            <div class="myImage">
                <img src="<?= $item['image'] ?>" class="card-img-top" alt="<?= $item['title'] ?>">
            </div>
            <div class="card-body">
                <h5 class="card-title mb-3"><?= $item['title'] ?></h5>
                <p>цена: <?= $item['price'] ?> ₽</p>
                <a href="/view.php?id=<?=$item['id']?>" class="btn btn-outline-info btn-sm">подробно</a>
                <? if ($item['count'] > 0): ?>
                <a href="/?action=buy&id=<?=$item['id']?>" class="btn btn-outline-success btn-sm">купить</a>
                <?endif;?>
        </div>
        </div>
    </div>
<? endforeach; ?>