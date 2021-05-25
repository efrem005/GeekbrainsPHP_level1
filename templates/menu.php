<?php

$menu = [
    [
        'title' => 'Каталог',
        'href' => '?page=catalog',
    ],
    [
        'title' => 'Как купить',
        'href' => '/buy',
    ],
    [
        'title' => 'Доставка',
        'href' => '/delivery',
        'subItems' => [
            [
                'title' => 'ПЭК',
                'href' => '/pk',
            ]
        ]
    ],
    [
        'title' => 'Отзывы',
        'href' => '/reviews',
    ],
    [
        'title' => 'О нас',
        'href' => '/about',
    ],
    [
        'title' => 'Задания',
        'href' => './',
        'subItems' => [
            [
                'title' => 'Урок №1',
                'href' => '?page=lesson1'
            ],
            [
                'title' => 'Урок №2',
                'href' => '?page=lesson2'
            ],
            [
                'title' => 'Урок №3',
                'href' => '?page=lesson3'
            ],
            [
                'title' => 'Урок №4',
                'href' => '?page=lesson4'
            ],
            [
                'title' => 'API',
                'href' => '?page=api'
            ]
        ]
    ],
];
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">PHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <? foreach ($menu as $item): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                           href="<?= $item["href"] ?>"><?= $item["title"] ?></a>
                    </li>
                    <? if (isset($item['subItems'])): ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <?=$item['subItems'][0]['title']?>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <? foreach ($item['subItems'] as $subItems): ?>
                                    <li><a class="dropdown-item"
                                           href="<?= $subItems['href'] ?>"><?= $subItems['title'] ?></a></li>
                                <? endforeach; ?>
                            </ul>
                        </li>
                    <? endif; ?>
                <? endforeach; ?>
            </ul>
        </div>
    </div>
</nav>




