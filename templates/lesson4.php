<?php

include_once "./function/classSimpleImage.php";

if (isset($_FILES['file'])) {
    if (($_FILES['file']['type'] === 'image/jpeg' || $_FILES['file']['type'] === 'image/png') & ($_FILES['file']['size'] < 1024 * 5 * 1024)) {
        $path = './templates/img/' . $_FILES['file']['name'];
        if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
            $image = new SimpleImage();
            $image->load($path);
            $image->resize(400, 200);
            $image->save('./templates/img/small/' . $_FILES['file']['name']);
            header("Location: ?page=lesson4");
        } else {
            header("Location: ?page=lesson4");
        }
    } else {
        header("Location: ?page=lesson4");
    }
}

$files = array_slice(scandir('./templates/img/small'), 2);

?>
<form class="mx-auto mt-3 mb-3 singl" style="width: 428px;" action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Загрузить фаил">
</form>

<div class="row">
    <? foreach ($files as $item): ?>
        <div class="col-md-3">
            <a href="templates\img\<?= $item ?>"><img src="templates\img\small\<?= $item ?>" class="card-img-top"
                                                         alt="<?= $item ?>"></a>
        </div>
    <? endforeach; ?>
</div>