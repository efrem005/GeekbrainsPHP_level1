<?php

// 1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт,
// который работает по следующему принципу:
//  если $a и $b положительные, вывести их разность;
//  если $а и $b отрицательные, вывести их произведение;
//  если $а и $b разных знаков, вывести их сумму;
//  Ноль можно считать положительным числом.

$a = -7;
$b = -10;

if($a >= 0 && $b >= 0) {
    echo "разность: " . ($a - $b) . "<br>";
} else if ($a < 0 && $b < 0) {
    echo "произведение: " . ($a * $b) . "<br>";
} else if(($a >= 0 && $b < 0) || ($a < 0 & $b >= 0)) {
    echo "сумма :" . ($a + $b) . "<br>";
}

// 2. Присвоить переменной $а значение в промежутке [0..15].
// С помощью оператора switch организовать вывод чисел от $a до 15.
// При желании сделайте это задание через рекурсию.

$num = 10;

switch ($num){
    case 1:
        echo 1 . '<br>';
    case 2:
        echo 2 . '<br>';
    case 3:
        echo 3 . '<br>';
    case 4:
        echo 4 . '<br>';
    case 5:
        echo 5 . '<br>';
    case 6:
        echo 6 . '<br>';
    case 7:
        echo 7 . '<br>';
    case 8:
        echo 8 . '<br>';
    case 9:
        echo 9 . '<br>';
    case 10:
        echo 10 . '<br>';
    case 11:
        echo 11 . '<br>';
    case 12:
        echo 12 . '<br>';
    case 13:
        echo 13 . '<br>';
    case 14:
        echo 14 . '<br>';
    case 15:
        echo 15 . '<br>';
        break;
    default:
        echo "Такого значения нет";
}

// 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
// Обязательно использовать оператор return. В делении проверьте деление на 0 и верните текст ошибки.


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
    if($a === 0 || $b === 0){
        return "Нельзя делить на 0";
    } else {
        return $a / $b;
    }
}

echo "задание №3: ". div(15,5) . "<br>";

// 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
// где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
// В зависимости от переданного значения операции выполнить одну из арифметических операций
// (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case "plus":
            return $arg1 + $arg2; // вызвать функцию с 3 задания plus($arg1, $arg2)
        case "minus":
            return $arg1 - $arg2; // вызвать функцию с 3 задания minus($arg1, $arg2)
        case "mult":
            return $arg1 * $arg2; // вызвать функцию с 3 задания mult($arg1, $arg2)
        case "div":
            if($arg1 === 0 || $arg2 === 0){
                return "Нельзя делить на 0";
            } else {
                return $arg1 / $arg2; // вызвать функцию с 3 задания div($arg1, $arg2)
            }
        default:
            return "Введите существующую операцию (plus, minus, mult, div)";
    }
}

echo "Задание №4: " . mathOperation(2,0,'div') . "<br>";


// 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
//  22 часа 15 минут
//  21 час 43 минуты

$hour = rand(0, 24);
$minute = rand(0, 59);

function resTimes($hour, $minute) {
    $res = ($hour <= 10) ? $hour % 10 : $hour % 20;
    switch ($res) {
        case 1:
            echo "$hour час ";
            break;
        case 2:
        case 3:
        case 4:
            echo "$hour часа ";
            break;
        default:
            echo "$hour часов ";
            break;
    }
    $res = ($minute <= 10) ? $minute % 10 : $minute % 20;
    switch ($res) {
        case 1:
            return "$minute минута";
        case 2:
        case 3:
        case 4:
            return "$minute минуты";
        default:
            return "$minute минут";
    }
}

echo "Задание №7: ";
echo resTimes($hour, $minute) . "<br>";