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


INSERT INTO sdvd_orders (name, phone, email, delivery, address, notice, product_ids, price, date_order) VALUES ('Юлия', '+79208443208', 'test@test.ru', '0', '241020, г. Брянск, ул. Маяковского, д.4, кв. 35', 'Доставьте быстро', '13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 9, 2, 5, 5', '3843', '06-06-2019 12:49:43')