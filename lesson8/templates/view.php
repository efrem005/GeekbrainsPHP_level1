<div class="card text-center mt-3">
    <div class="card-header">
        <h5 class="card-title"><?= $item['title'] ?></h5>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="<?= $item['image'] ?>" class="card-img" style="width: 500px; margin: 0 auto"
                 alt="<?= $item['title'] ?>">
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <div class="card-body">
                    <p class="card-text"><?= $item['text'] ?></p>
                </div>
                <p class="card-text"><b>цена: </b><?= $item['price'] ?> ₽</p>
                <p class="card-text"><b>остаток: </b><?= $item['count'] ?> <?= $item['units'] ?></p>
                <? if ($item['count'] > 0 && $allow): ?>
                    <a href="/buy/?id=<?= $id ?>" class="btn btn-outline-success">купить</a>
                <? endif; ?>
            </div>
            <div class="card w-75 mx-3 my-3">
                <form class="card-body" method="post" action="/post/?id=<?= $id ?>">
                    <div class="mb-3">
                        <label for="exampleInputUser" class="form-label">Ваше имя</label>
                        <input type="text" name="user" class="form-control" id="exampleInputUser">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Отзыв</label>
                        <textarea type="text" name="text" class="form-control" id="exampleInputText"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary btn-sm">отправить</button>
                </form>
            </div>
        </div>
    </div>


    <div class="card-footer text-muted">
        Поступление на склад: <?= $item['created_at'] ?>
    </div>
</div>
<div class="card text-center mt-3">
    <h5 class="card-header">Отзывы</h5>
    <? if (mysqli_num_rows($revie) != 0): ?>
        <? foreach ($revie as $otz): ?>
            <div class="card w-75 mx-3 my-3">
                <div class="card-body">
                    <h5 class="card-title"><?= $otz['user'] ?></h5>
                    <p class="card-text"><?= $otz['text'] ?></p>
                    <data><?= $otz['created_at'] ?></data>
                </div>
            </div>
        <? endforeach; ?>
    <? endif; ?>
</div>
