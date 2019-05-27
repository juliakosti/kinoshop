<?php
require_once 'start.php';
require_once $dir_lib.'manage_class.php';
require_once $dir_lib.'url_class.php';

$manage = new Manage();
$url = new Url();
$func = $_REQUEST['func'];
if ($func == 'add_cart') 
	{
		$manage->addToCart();
	}
elseif ($func == 'delete_cart') 
	{
		$manage->deleteCart();
	}
	else exit;

//$link = ($_SERVER['HTTP_REFERER'] !='')? $_SERVER['HTTP_REFERER']: $url->index();
//header("Location: $url->index()");
//exit();	