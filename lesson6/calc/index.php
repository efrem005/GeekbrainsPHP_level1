<?php

$num1 = 0;
$operator = 0;
$num2 = 0;
$res = '';

if (isset($_GET['operator'])){

    $num1 = (int)$_GET['num1'];
    $operator = $_GET['operator'];
    $num2 = (int)$_GET['num2'];

    switch ($operator){
        case '+':
            $res = $num1 + $num2;
            break;
        case '-':
            $res = $num1 - $num2;
            break;
        case '*':
            $res = $num1 * $num2;
            break;
        case '/':
            if ($num1 == 0 || $num2 == 0){
                $res = 'Нельзя делить на ноль';
                break;
            }
            $res = $num1 / $num2;
            break;
        default:
            $res = 'что пошло не так';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Калькулятор</title>
</head>
<body>
<form action="/lesson6" method="get">
    <input type="text" name="num1" value="<?=$num1?>">
    <select name="operator">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="num2" value="<?=$num2?>">
    <button class="btn" type="submit" >=</button>
    <input type="text" name="res" value="<?=$res?>">
</form>
</body>
</html>