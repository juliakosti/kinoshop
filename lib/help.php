<?php

//часто используется
echo '<pre>';
print_r($array);
echo '</pre>';
echo '<hr>';


//для проверки формы
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}


//тестовые данные
Юлия, +79208443208, test@test.ru, 241020, г. Брянск, ул. Маяковского, д.4, кв. 35
Доставьте быстро