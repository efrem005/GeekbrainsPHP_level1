<?php

// 1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.

$num = 0;

while ($num <= 100) {
    echo($num % 3 == 0 ? $num . PHP_EOL : ' ');
    $num++;
}

// 2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
//  0 – ноль.
//  1 – нечетное число.
//  2 – четное число.
//  3 – нечетное число.
//  …
//  10 – четное число.

$num = 0;

do{
    if($num == 0){
        echo $num . ' – ноль. <br>';
        $num++;
    }
    echo($num % 2 == 0 ? $num . PHP_EOL . ' – четное число. <br>' : $num . PHP_EOL . ' - нечетное число <br>');
    $num++;
}
while ($num <= 10);

// 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей,
//  а в качестве значений – массивы с названиями городов из соответствующей области.
//  Вывести в цикле значения массива, чтобы результат был таким:
//      Московская область:
//      Москва, Зеленоград, Клин.
//      Ленинградская область:
//      Санкт-Петербург, Всеволожск, Павловск, Кронштадт.
//      Рязанская область … (названия городов можно найти на maps.yandex.ru) строго соблюдать формат вывода выше, т.е. двоеточие и точка в конце

$arrCountry = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Скопин']
];

foreach($arrCountry as $country => $cities){
    echo $country . ': ' . '<br>';
    foreach($cities as $city){
        if(next($cities)){
            echo $city . ', ';
        } else {
            echo $city . '. <br>';
        }
    };
};

// 4. Объявить массив, индексами которого являются буквы русского языка,
//  а значениями – соответствующие латинские буквосочетания
//  (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//  Написать функцию транслитерации строк. Она должна учитывать и заглавные буквы.

$alfabet = [
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
];

function translate($alfabet, $text){
    $res = '';
    for($i =0; $i < mb_strlen($text); $i++){
        $arr = mb_substr($text, $i, 1 );

        if(isset($alfabet[mb_strtolower($arr)])){
            $res .= $alfabet[mb_strtolower($arr)]; // так и не понял как реализовать заглавные буквы, понимаю что нужно тут что то дописать
        } else {
            $res .= $arr;
        }
    }
    return $res;
}

echo translate($alfabet,'Здраствуйте Николай') . '<br>';

// 5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
//  Можно через str_replace

function modified($text){
    return str_replace(" ", "_", $text);
}

echo modified('Мы изменяем пробелы на нижнее подчеркивание') . '<br>';


//6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP.
// Необходимо представить пункты меню как элементы массива и вывести их циклом.
// Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.
// Важное, при желании можно сделать на движке 3. ВАЖНОЕ!

// 7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:
//  for (…){ // здесь пусто}

for($i = 0; $i <= 9; print $i++);


echo '<br>';
// 9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
// производит транслитерацию и замену пробелов на подчеркивания
// (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).

function transModif($alfavit, $text){
    return translate($alfavit, modified($text));
}

echo "http://localhost/".transModif($alfabet, 'Каталог');