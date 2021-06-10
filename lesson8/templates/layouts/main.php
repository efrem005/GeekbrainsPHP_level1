<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Lesson7</title>
    <style>
        .myImage {
            width: 200px;
            height: 180px;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div class="container">
    <?= $loginForm ?>
    <div class="row">
    <?= $menu ?>
    </div>
    <div class="row">
    <?= $content ?>
    </div>
</div>
</body>
</html>