<?php
require_once 'admin/constdata/data.php';
require_once 'shop/baseconnect_class.php';
require_once 'shop/products_class.php';
require_once 'shop/sections_class.php';

require_once 'shop/basereq_class.php';


$products = new Products();
$sections = new Sections();

echo '<br/>';

//$products->getNewProd('title');
$products->getProdBySection(1, 'country');

echo '<pre>';
//print_r($products->ids);

echo '</pre>';
echo '<br/>';
echo '<pre>';

//print_r($products->sel);
echo '</pre>';
echo '<br/>';
