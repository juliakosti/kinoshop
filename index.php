<?php

require_once 'start.php';

require_once $dir_lib.'url_class.php';

$url = new URL();

//метод определяет название данного класса
//$view = $url->getView();

$uri = $_SERVER['REQUEST_URI'];
echo $uri;
echo '</br>';
echo $url->getThisURL();
echo '</br>';
echo $url->cart();
