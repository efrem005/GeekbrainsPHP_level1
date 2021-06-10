<?php
include('../config/config.php');

$page_url = explode('/', $_SERVER['REQUEST_URI']);
$action = $page_url['2'];
if ($page_url['1'] == '') {
    $page = 'index';
} else {
    $page = $page_url['1'];
}


$params = prepareVariables($page, $messages, $action);

echo render($page, $params);