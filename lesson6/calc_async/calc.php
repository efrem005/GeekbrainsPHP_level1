<?php

$data = json_decode(file_get_contents('php://input'));

$num1 = $data->num1;
$operator = $data->operator;
$num2 = $data->num2;

function plus($a, $b) {
    return $a + $b;
}
function minus($a, $b) {
    return $a - $b;
}
function mult($a, $b) {
    return $a * $b;
}
function div($a, $b) {
    if($a == 0 || $b == 0){
        return "Нельзя делить на 0";
    } else {
        return $a / $b;
    }
}

if ($num1 != "" && $num2 != "") {

    switch ($operator) {
        case '+':
            echo plus($num1, $num2);
            break;
        case '-':
            echo minus($num1,$num2);
            break;
        case '*':
            echo mult($num1,$num2);
            break;
        case '/':
            echo div($num1,$num2);
            break;
        default:
            echo 'что пошло не так';
            break;
    }
} else {
    echo 'Введите данные';
}