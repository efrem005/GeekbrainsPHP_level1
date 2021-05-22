<?php


$menu =
    [
        [
            'title' => 'Каталог',
            'href' => '/catalog',
        ],
        [
            'title' => 'Как купить',
            'href' => '/buy',
        ],
        [
            'title' => 'Доставка',
            'href' => '/delivery',
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
            'href' => '/task.php',
        ],
    ];

function renderMenu($menu)
{
    $res = "<ul>";
    foreach ($menu as $item) {
        $res .= "<li><a href=\"{$item["href"]}\">{$item["title"]}</a></li>";
    }
    return $res;
}

echo renderMenu($menu);


