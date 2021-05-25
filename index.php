<?php

define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');

function arrApi(): array
{
    return [
        [
            'name' => 'Nikolay'
        ]
    ];
}

$page = 'index';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params = [];

switch ($page) {
    case 'index':
        $params['index'] = ['name' => 'index'];
        break;
    case 'content':
        $params['content'] = ['name' => 'content'];
        break;
    case 'api':
        header('Content-Type: application/json');
        echo json_encode(arrApi(), JSON_UNESCAPED_UNICODE);
        break;
}

function renderTemplate($page, $params = [])
{
    extract($params);
    ob_start();
    $fileName = TEMPLATES_DIR . $page . '.php';
    if (file_exists($fileName)) {
        include $fileName;
    }
    return ob_get_clean();
}

function render($page, $params)
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
}

echo render($page, $params);
