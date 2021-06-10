<?php
function prepareVariables($page, $messages, $action)
{
    $params = [             //$params = ['menu (значение переменной)' => 'код меню', 'catalog' => [чай, пицца и тд]]
        'count' => getItemsCount(),
        'menu_list' => [
            'Главная' => '/',
            'Каталог' => '/catalog',
            'Админка' => '/admin_panel',
            'Корзина ' . getItemsCount() => "/basket"
        ],
        'username' => getUsername(),
        'allow' => isAuth(),
        'formList' => false
    ];

    switch ($page) {

        case 'login':
            $login = $_POST['login'];
            $password = $_POST['password'];
            if (auth($login, $password)) {
                if (isset($_POST['save'])) {
                    $hash = uniqid(rand(), true);
                    setcookie('hash', $hash, time() + 3600);
                    $id = $_SESSION['id'];
                    $sql = "UPDATE `users` SET `hash` = '{$hash}' WHERE `id` = '{$id}'";
                    executeQuery($sql);
                }
                header("Location: /catalog");
                die();
            } else {
                die('Неверный логин или пароль!');
            }

        case 'logout':
            setcookie('hash', '', time() - 3600, '/');
            session_destroy();
            header("Location: /");
            break;

        case 'basket':
            $user_id = $_SESSION['id'];
            $params['user_id'] = $user_id;
            $params['basket'] = getPurchaseInfo($user_id);
            $params['summ'] = getCardSum($user_id);
            $params['action'] = $action;
            $status = doCardAction($action);
            if ($status) {
                doCardAction($action);
                header("Location: " . $_SERVER['HTTP_REFERER']);
                die();
            }
            break;

        case 'delete':
            deleteItem();
            header("Location: /basket");
            die();

        case 'admin_panel':
            if (!is_admin())die('Вы не админ');
            $params['basket'] = getProduct();
            if ($action == 'deleteProduct') {
                adminDeleteProduct();
            }
            if ($action == 'updateProduct') {
                $params['productId'] = adminUpdateProduct();
                $params['formList'] = true;
            }
            break;

        case 'admin_orders':
            if (!is_admin())die('Вы не админ');
            $params['orders'] = getOrders();
            break;

        case 'admin_list':
            if (!is_admin())die('Вы не админ');
            $params['list'] = adminGetOrderPrice();
            break;

        case 'reviews':
            $params['reviews'] = adminReviews();
            break;

        case 'catalog':
            $params['catalogItem'] = getProduct();
            break;

        case 'buy':
            if (issetProduct()) {
                countUp();
            } else {
                setItemsDb();
            }
            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();

        case 'view':
            $id = $_GET['id'];
            $params['id'] = $id;
            $params['item'] = getDataFromDb("SELECT * FROM product where id={$id}");
            $params['revie'] = mysqli_query(getDb(), "SELECT * FROM reviews where product_id={$id}");
            break;

        case 'post':
            $id = $_GET['id'];
            $user = $_POST['user'];
            $text = $_POST['text'];
            executeQuery("INSERT INTO reviews(`user`, `text`, `product_id`) VALUES ('{$user}','{$text}',{$id})");
            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();
    }
    return $params;
}
